<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaNotification extends Notification
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
            ->subject('Confirmation d\'Inscription au Programme Bourse d\'Excellence')
                    
            ->line($notifiable->name.'! Nous avons bien pris en compte votre inscription sur Programme Bourse d\'Excellence !
                    Pour la finaliser, il vous faudra cliquer sur le bouton “confirmer mon adresse email”.
                    Une fois cette action effectuée, il vous faudra vous conncetez eet par la suite soumettre
                    vos dossiersde à candidature !
            ')
            ->action('Activer votre compte', url("/soumision/{$notifiable->id}/" . urlencode($notifiable->confirmation_token)))
            ->line('Merci d\'utiliser notre application PBE !');
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
