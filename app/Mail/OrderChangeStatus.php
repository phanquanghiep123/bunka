<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Models\RequestOrders;
use App\Http\Models\EmailTemplate;
use App\Http\Models\Notifications;
use App\Http\Models\Status;
class OrderChangeStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $request,$order,$status,$lang,$user;
    public function __construct(RequestOrders $RequestOrder,$User)
    {
        $this->request = $RequestOrder;
        $this->order   = $RequestOrder->order;
        $this->status  = $this->order->status;
        $this->lang    = $User->lang_id;
        $this->user    = $User;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body    = '';
        $auth    = \Auth::user();
        $replace = [
            '{{FIRST_NAME}}',
            '{{UESR_CREATE}}',
        ];
        $replace_with = [
            $this->user->first_name,
            $auth->first_name,
        ];
        if (@$this->request->pid) {
            $oldRequest = RequestOrders::find($this->request->pid);
            $oldStatus  = Status::find($oldRequest->status_change);
            $email      = EmailTemplate::where("key_id", '=', 'change-status-order')->first();
            $replace[]  = '{{STATUS_FROM}}';
            $replace[]  = '{{STATUS_TO}}';
            $replace_with[] = $oldStatus->status_name($this->lang)->first()->name;
            $replace_with[] = $this->status->status_name($this->lang)->first()->name;
            if ($email) {
                $ByLang = $email->valueByLang($this->lang)->first();
                $this->subject($ByLang->title);
                $body = $ByLang->content;
            }
        } else {
            $email = EmailTemplate::where("key_id", '=', 'add-order')->first();
            if ($email) {
                $ByLang = $email->valueByLang($this->lang)->first();
                $this->subject($ByLang->title);
                $body = $ByLang->content;
            }
        }
        $replace[]      = '{{QUOTATION_NUMBER}}';
        $replace_with[] = $this->order->quotation->quotation_number;
        $replace[]      = '{{ORDER_NUMBER}}';
        $replace_with[] = $this->order->order_number;
        if ($this->status->options > 1 && $this->status->options < 4) {
            $url1 = asset('orders/view/' . $this->order->id);
            $url  = '/orders/view/' . $this->order->id;
        } else {
            $url1 = asset('orders/edit/' . $this->order->id);
            $url  = '/orders/edit/' . $this->order->id;
        }
        $replace[]      = '{{URL}}';
        $replace_with[]  = $url;
        $replace[]      = '{{URL1}}';
        $replace_with[]  = $url1;
        $body            = str_replace($replace, $replace_with, $body);
        $data['html']    = $body;
        $n               = new Notifications();
        $n->table        = 'order';
        $n->user_send    = $auth->id;
        $n->user_receive = $this->user->id;
        $n->token        = bcrypt(uniqid());
        $n->url_detail   = $url1;
        $n->title        = $ByLang->title . ' - ' . 'No.' . $this->order->order_number;
        $n->general_id  = $this->order->id;
        $n->save();
        return $this->view('emails.orders.view', $data);
    }
}
