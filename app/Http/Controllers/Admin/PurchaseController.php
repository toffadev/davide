<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PurchaseController extends Controller
{
    /**
     * Affiche la liste des achats
     */
    public function index(Request $request)
    {
        // Récupérer les paramètres de recherche et de filtrage
        $search = $request->input('search');
        $status = $request->input('status');

        // Construire la requête
        $query = Purchase::with(['user', 'production'])
            ->orderBy('created_at', 'desc');

        // Appliquer le filtre de recherche
        if ($search) {
            $query->where(function ($q) use ($search) {
                // Recherche par ID de session Stripe
                $q->where('stripe_session_id', 'like', "%{$search}%")
                    // Recherche par email
                    ->orWhere('email', 'like', "%{$search}%")
                    // Recherche par relation avec l'utilisateur
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    })
                    // Recherche par relation avec la production
                    ->orWhereHas('production', function ($prodQuery) use ($search) {
                        $prodQuery->where('title', 'like', "%{$search}%");
                    });
            });
        }

        // Appliquer le filtre de statut
        if ($status) {
            $query->where('status', $status);
        }

        // Paginer les résultats
        $purchases = $query->paginate(10)->withQueryString();

        // Obtenir les statistiques globales (pour toutes les données, pas seulement la page actuelle)
        $stats = [
            'completed' => Purchase::where('status', 'completed')->count(),
            'pending' => Purchase::where('status', 'pending')->count(),
            'revenue' => Purchase::where('status', 'completed')->sum('amount_paid')
        ];

        return Inertia::render('Purchases', [
            'purchases' => $purchases,
            'filters' => [
                'search' => $search,
                'status' => $status
            ],
            'stats' => $stats,
            'flash' => [
                'success' => session('success'),
                'error' => session('error')
            ]
        ]);
    }

    /**
     * Mettre à jour le statut d'un achat
     */
    public function updateStatus(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $purchase->update([
            'status' => $validated['status']
        ]);

        return redirect()->back()->with('success', 'Statut de l\'achat mis à jour avec succès');
    }

    /**
     * Supprimer un achat
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->back()->with('success', 'Achat supprimé avec succès');
    }
}
