<?php

namespace App\Notifications;

use App\Http\Models\RequestQuotation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserChangeOrderStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email,$order,$user)
    {
        $this->token      = md5(time());
        $this->order      = $order;
        $this->email      = $email;
        $this->oldorder   = RequestQuotation::find($order->pid);
        $this->user       = $user;
        $this->userChange = $this->order->user;
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
        if ($this->oldorder) {
            return (new MailMessage)
            ->subject('Đơn hàng của bạn đã chuyển trạng thái')
            ->view('notifications.order1');
        } else {
            return (new MailMessage)
            ->subject('Gửi yêu cầu Đơn hàng')
            ->view('notifications.order2');
        }   
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
