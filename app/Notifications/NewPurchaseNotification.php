<?php

namespace App\Notifications;

use App\Models\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPurchaseNotification extends Notification
{
    use Queueable;

    protected $purchase;

    /**
     * Create a new notification instance.
     */
    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $productionTitle = $this->purchase->production ? $this->purchase->production->title : 'Produit inconnu';
        
        return (new MailMessage)
            ->subject('Nouvel achat sur votre site')
            ->greeting('Bonjour!')
            ->line('Un nouvel achat a été effectué sur votre site.')
            ->line('Détails de l\'achat:')
            ->line('Produit: ' . $productionTitle)
            ->line('Montant: ' . number_format($this->purchase->amount_paid, 2) . ' €')
            ->line('Client: ' . ($this->purchase->email ?? 'Email non disponible'))
            ->line('Date: ' . $this->purchase->created_at->format('d/m/Y H:i'))
            ->action('Voir tous les achats', url('/admin/purchases'))
            ->line('Merci d\'utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
} 