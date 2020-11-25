<?php

namespace App\Mail;

use App\Http\Models\EmailTemplate;
use App\Http\Models\Notifications;
use App\Http\Models\RequestQuotations;
use App\Http\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotationChangeStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user,$request,$quotation,$status,$lang;
    public function __construct(RequestQuotations $RequestQuotation, $User)
    {

        $this->request   = $RequestQuotation;
        $this->quotation = $this->request->quotation;
        $this->status    = $this->quotation->status;
        $this->lang      = $User->lang_id;
        $this->user      = $User;
        if (@$this->request) {
            $this->oldrequset = RequestQuotations::find($this->request->pid);
        }
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
            @$this->user->first_name,
            @$auth->first_name,
        ];
        if (@$this->request->pid) {
            $oldRequest     = RequestQuotations::find($this->request->pid);
            $oldStatus      = Status::find($oldRequest->status_change);
            $email          = EmailTemplate::where("key_id", '=', 'change-status-quotation')->first();
            $replace[]      = '{{STATUS_FROM}}';
            $replace[]      = '{{STATUS_TO}}';
            $replace_with[] = $oldStatus->status_name($this->lang)->first()->name;
            $replace_with[] = $this->status->status_name($this->lang)->first()->name;
            if ($email) {
                $ByLang = $email->valueByLang($this->lang)->first();
                $this->subject($ByLang->title);
                $body = $ByLang->content;
            }
        } else {
            $email = EmailTemplate::where("key_id", '=', 'add-quotation')->first();
            if ($email) {
                $ByLang = $email->valueByLang($this->lang)->first();
                $this->subject($ByLang->title);
                $body = $ByLang->content;
            }
        }
        $replace[]      = '{{QUOTATION_NUMBER}}';
        $replace_with[] = $this->quotation->quotation_number;
        
        if ($this->status->options > 1 && $this->status->options < 4) {
            $url1 = asset('quotations/view/' . $this->quotation->id);
            $url = '/quotations/view/' . $this->quotation->id;
        } else {
            $url1 = asset('quotations/edit/' . $this->quotation->id);
            $url = '/quotations/edit/' . $this->quotation->id;
        }
        $replace[]       = '{{URL}}';
        $replace_with[]  = $url;
        $replace[]       = '{{URL1}}';
        $replace_with[]  = $url1;
        $body            = str_replace($replace, $replace_with, $body);
        $data['html']    = $body;
        $n               = new Notifications();
        $n->table        = 'quotation';
        $n->user_send    = $auth->id;
        $n->user_receive = $this->user->id;
        $n->token        = bcrypt(uniqid());
        $n->url_detail   = $url1;
        $n->title        = @$ByLang->title.' - ' . 'No.' . $this->quotation->quotation_number;
        $n->general_id  = $this->quotation->id;
        $n->save();
        return $this->view('emails.quotations.view', $data);
    }
}
