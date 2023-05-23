<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;

    /**
     * @var array $project
     */

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
    * Build the message.
    *
    * @return $this
    */

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
            ->subject('Confirmation d\'Inscription au Programme Bourse d\'Excellence')
            ->line("Bonjour {$notifiable->name},")
            ->line('Nous avons bien pris en compte votre inscription pour le Programme Bourse d\'Excellence.')
            ->line('Pour la finaliser, il vous faudra cliquer sur le bouton “confirmer mon adresse email”.
                Une fois cette action effectuée, il vous faudra vous conncetez et par la suite soumettre
                vos dossiersde à candidature !')
            ->line('Nos sincères salutations.')
            ->action('Confirmer mon adresse email', url("/soumision/{$notifiable->id}/" . urlencode($notifiable->confirmation_token)))
            ->line('Service des Bourses')
            ->line('Fondation BENIANH International');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

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
