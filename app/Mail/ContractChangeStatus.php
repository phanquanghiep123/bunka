<?php

namespace App\Mail;

use App\Http\Models\Contracts;
use App\Http\Models\EmailTemplate;
use App\Http\Models\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractChangeStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contract,$order,$lang,$user;
    public function __construct(Contracts $Contracts, $User)
    {
        $this->contract = $Contracts;
        $this->order    = $this->contract->order;
        $this->lang     = $User->lang_id;
        $this->user     = $User;
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
        $email = EmailTemplate::where("key_id", '=', 'add-contract')->first();
        if ($email) {
            $ByLang = $email->valueByLang($this->lang)->first();
            $this->subject($ByLang->title);
            $body = $ByLang->content;
        }
        $replace[]       = '{{CONTRACT_NUMBER}}';
        $replace_with[]  = $this->contract->contract_number;
        $replace[]       = '{{ORDER_NUMBER}}';
        $replace_with[]  = $this->order->order_number;
        $replace[]       = '{{URL}}';
        $replace_with[]  = '/contracts/view/' . $this->contract->id;
        $replace[]       = '{{URL1}}';
        $replace_with[]  = asset('contracts/view/' . $this->contract->id);
        $body            = str_replace($replace, $replace_with, $body);
        $data['html']    = $body;
        $n               = new Notifications();
        $n->table        = 'contract';
        $n->user_send    = $auth->id;
        $n->user_receive = $this->user->id;
        $n->token        = bcrypt(uniqid());
        $n->url_detail   = asset('contracts/view/' . $this->contract->id);
        $n->title        = @$ByLang->title . ' - ' . 'No.' . $this->contract->contract_number;
        $n->general_id   = $this->contract->id;
        $n->save();
        return $this->view('emails.contracts.view', $data);
    }
}
