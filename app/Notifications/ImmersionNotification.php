<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImmersionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->success()
            ->subject('Confirmation d\'Inscription au Programme Immersion Communautaire')
            ->line("Bonjour {$notifiable->name}!")
            ->line('Nous nous réjouissons de votre volonté de participation au programme immersion communautaire de la Fondation Benianh International dans la région de la NAWA.')
            ->line('Ce séjour s’étalera sur quatre jours du 25 au 28 Août 2022.')
            ->line('Le programme est fait de :')
            ->line('    •   Un diner avec le président du conseil du conseil régional, le ministre Alain DONWAHI et son équipe')
            ->line('    •	Plusieurs déjeuners de travail avec les acteurs politiques, administratifs et économique de la région')
            ->line('    •	Visite d’infrastructures')
            ->line('    •	Visite des sites touristiques')
            ->line('Les frais de participation sont de 250.000 frs CFA qui couvrent :')
            ->line('    •	Les frais d’hébergement')
            ->line('    •	Les déjeuners, diners et cocktails')
            ->line('    •	Les frais de transports et de navettes')
            ->action('Pour finaliser votre inscription veuillez cliquer sur ce lien :', url("/PIC/programmes_immersion_commnunautaire/{$notifiable->id}/" . urlencode($notifiable->statut)))
            ->line('Nos sincères salutations !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
