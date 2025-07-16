<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Production;
use App\Models\Purchase;
use App\Notifications\NewPurchaseNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;


use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class StripeController extends Controller
{
    /**
     * Créer une session de paiement Stripe
     */
    public function createCheckoutSession(Request $request)
    {
        $request->validate([
            'production_id' => 'required|exists:productions,id',
        ]);

        $production = Production::findOrFail($request->production_id);

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $production->title,
                            'description' => $production->description,
                            'images' => [$production->cover_image ? url($production->cover_image) : null],
                        ],
                        'unit_amount' => (int)($production->price * 100), // Stripe utilise les centimes
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}&production_id=' . $production->id,
                'cancel_url' => route('stripe.cancel'),
                'metadata' => [
                    'production_id' => $production->id,
                ],
                'customer_email' => Auth::check() ? Auth::user()->email : null,
            ]);

            // Créer un enregistrement d'achat en attente
            Purchase::create([
                'user_id' => Auth::id(),
                'production_id' => $production->id,
                'stripe_session_id' => $session->id,
                'amount_paid' => $production->price,
                'email' => Auth::check() ? Auth::user()->email : null,
                'status' => 'pending',
                'download_expires_at' => Carbon::now()->addDays(7),
            ]);

            return response()->json(['id' => $session->id]);
        } catch (ApiErrorException $e) {
            Log::error('Stripe error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Page de succès après paiement
     */
    public function success(Request $request)
    {
        $sessionId = $request->session_id;
        $productionId = $request->production_id;

        if (!$sessionId || !$productionId) {
            return redirect()->route('productions')->with('error', 'Informations de paiement manquantes.');
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                $production = Production::findOrFail($productionId);

                // Mettre à jour l'achat
                $purchase = Purchase::where('stripe_session_id', $sessionId)->first();
                if ($purchase) {
                    $purchase->update([
                        'status' => 'completed',
                        'stripe_payment_intent_id' => $session->payment_intent,
                    ]);

                    // Envoyer une notification à l'administrateur
                    $this->sendPurchaseNotification($purchase);
                }

                // Stocker la session_id dans la session pour permettre le téléchargement même sans être connecté
                $request->session()->put('stripe_session_id', $sessionId);

                // S'assurer que les données sont correctement formatées pour la vue
                $productionData = $production->toArray();

                // Calculer la date d'expiration du téléchargement
                $expirationDate = null;
                if ($purchase) {
                    $expirationDate = $purchase->download_expires_at->format('d/m/Y');
                }

                return Inertia::render('PaymentSuccess', [
                    'production' => $productionData,
                    'downloadLink' => route('download.beat', $production->id),
                    'expirationDate' => $expirationDate
                ]);
            }

            return redirect()->route('productions')->with('error', 'Le paiement n\'a pas été confirmé.');
        } catch (ApiErrorException $e) {
            Log::error('Stripe error: ' . $e->getMessage());
            return redirect()->route('productions')->with('error', 'Une erreur est survenue lors de la vérification du paiement.');
        }
    }

    /**
     * Page d'annulation de paiement
     */
    public function cancel()
    {
        return Inertia::render('PaymentCancel');
    }

    /**
     * Webhook pour recevoir les événements Stripe
     */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpointSecret
            );

            // Traiter l'événement
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
                    $this->handleSuccessfulPayment($session);
                    break;
                default:
                    Log::info('Événement Stripe non traité: ' . $event->type);
            }

            return response()->json(['status' => 'success']);
        } catch (\UnexpectedValueException $e) {
            Log::error('Stripe webhook error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Stripe webhook error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }
    }

    /**
     * Traiter un paiement réussi
     */
    private function handleSuccessfulPayment($session)
    {
        $purchase = Purchase::where('stripe_session_id', $session->id)->first();

        if ($purchase) {
            $purchase->update([
                'status' => 'completed',
                'stripe_payment_intent_id' => $session->payment_intent,
            ]);

            // Envoyer une notification à l'administrateur
            $this->sendPurchaseNotification($purchase);

            Log::info('Paiement réussi pour l\'achat: ' . $purchase->id);
        }
    }

    /**
     * Envoyer une notification à l'administrateur pour un nouvel achat
     */
    private function sendPurchaseNotification(Purchase $purchase)
    {
        try {
            // Créer un objet Admin avec l'email de l'administrateur
            $admin = new Admin();

            // Envoyer la notification
            $admin->notify(new NewPurchaseNotification($purchase));

            Log::info('Notification d\'achat envoyée à l\'administrateur');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de la notification d\'achat: ' . $e->getMessage());
        }
    }
}
