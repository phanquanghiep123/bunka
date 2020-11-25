<?php

namespace App\Notifications;

use App\Http\Models\RequestQuotation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserChangeQuotationStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email,$request,$user)
    {
        $this->token      = md5(time());
        $this->request    = $request;
        $this->email      = $email;
        $this->oldrequest = RequestQuotation::find($request->pid);
        $this->user       = $user;
        $this->userChange = $this->request->user;
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
        if($this->oldrequest){
            return (new MailMessage)
            ->subject('Báo giá của bạn đã chuyển trạng thái')
            ->greeting('Xin chào! ' . $this->user->first_name ." " .$this->user->last_name)
            ->line('Từ: ' .$this->oldrequest->status->get_name() .' -> ' . $this->request->status->get_name())
            ->line('Người chuyển: '. $this->userChange->first_name . " " .$this->userChange->last_name)
            ->action('Xem chi tiết:', route('notifications.check', ['token' => $this->token]));
        }else{
            return (new MailMessage)
            ->subject('Gửi yêu cầu Báo giá')
            ->greeting('Xin chào! ' . $this->user->first_name ." " .$this->user->last_name)
            ->line('Người tạo: '. $this->userChange->first_name . " " .$this->userChange->last_name)
            ->action('Xem chi tiết:', route('notifications.check', ['token' => $this->token]));
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
