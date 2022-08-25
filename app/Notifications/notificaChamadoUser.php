<?php

namespace App\Notifications;

use App\Models\Chamado;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;




class notificaChamadoUser extends Notification
{
    use Queueable;

    private $user;
    private $chamado;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Chamado $chamado)
    {
        $this->user = $user;
        $this->chamado = $chamado;
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
                    ->greeting('Olá! ' . $this->user->name)
                    ->subject('Chamado aberto Sudesb')
                    ->line('O chamado ' . $this->chamado->titulo . ' foi aberto por ' . Auth::user()->name . 'e registrado no sistema com o número ' . $this->chamado->id)
                    ->line('Para visualizar o chamado, clique no botão abaixo.')
                    ->action('Entrar no sistema', url('/'))
                    ->line('Thank you for using our application!');
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