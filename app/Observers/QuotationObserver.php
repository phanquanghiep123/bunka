<?php

namespace App\Observers;

use App\Http\Models\Quotations;
use App\Http\Models\RequestQuotations;
use App\Http\Models\Users;
use Auth;
class QuotationObserver
{
    /**
     * Handle the quotations "created" event.
     *
     * @param  \App\Quotations  $quotation
     * @return void
     */
    public function created(Quotations $quotation)
    {
        $status = $quotation->status;
        if(@$status->options > 0){
            $user = Auth::user();
            $RequestQuotation = new RequestQuotations();
            $RequestQuotation->user_id       = $user->id;
            $RequestQuotation->quotation_id  = $quotation->id;
            $RequestQuotation->status_change = $quotation->status_id;
            $RequestQuotation->path = '/0/';
            $RequestQuotation->pid  = 0;
            $RequestQuotation->save();
            $RequestQuotation->path = $RequestQuotation->path . $RequestQuotation->id . "/";
            $RequestQuotation->save();
            $users = Users::where("id","!=",$user->id)->get();
            foreach ($users as $keyuser => $valueuser) {
                if($valueuser->hasTypeUserForQuotation($quotation) == 1){
                    $valueuser->sendQuotationChangeStatusMail($RequestQuotation);
                }
            }  
        }
    }

    /**
     * Handle the quotations "updated" event.
     *
     * @param  \App\Quotations  $quotation
     * @return void
     */
    public function updated(Quotations $quotation)
    {
 
        $status = $quotation->status;
        if($quotation->onsave == 0 && @$status->options > 0 && @$status->options < 3){
            $user = Auth::user();
            if($quotation->request->count() > 0){
                $request = $quotation->request->first();
                if($request->status_change != $quotation->status_id){
                    $RequestQuotation = new RequestQuotations();
                    $RequestQuotation->user_id       = $user->id;
                    $RequestQuotation->quotation_id  = $quotation->id;
                    $RequestQuotation->status_change = $quotation->status_id;
                    $RequestQuotation->pid           = $request->id;
                    $RequestQuotation->path          = $request->path;
                    $RequestQuotation->user_old_id   = $request->user_id;
                    $RequestQuotation->save();
                    $RequestQuotation->path = $RequestQuotation->path . $RequestQuotation->id . "/";
                    $RequestQuotation->save();
                    $user = Users::find($request->user_id);
                    if($user){
                        $user->sendQuotationChangeStatusMail($RequestQuotation);
                    }else{
                        $users = Users::where("id","!=",$user->id)->get();
                        foreach ($users as $keyuser => $valueuser) {
                            if($valueuser->hasTypeUserForQuotation() == 1){
                                $valueuser->sendQuotationChangeStatusMail($RequestQuotation);
                            }
                        }
                    }
                }
            }else{
                $RequestQuotation = new RequestQuotations();
                $RequestQuotation->user_id       = $user->id;
                $RequestQuotation->quotation_id  = $quotation->id;
                $RequestQuotation->status_change = $quotation->status_id;
                $RequestQuotation->path = '/0/';
                $RequestQuotation->pid  = 0;
                $RequestQuotation->save();
                $RequestQuotation->path = $RequestQuotation->path . $RequestQuotation->id . "/";
                $RequestQuotation->save();
                $users = Users::where("id","!=",$user->id)->get();
                foreach ($users as $keyuser => $valueuser) {
                    if($valueuser->hasTypeUserForQuotation() == 1){
                        $valueuser->sendQuotationChangeStatusMail($RequestQuotation);
                    }
                }
            }   
        }
    }

    /**
     * Handle the quotations "deleted" event.
     *
     * @param  \App\Quotations  $quotation
     * @return void
     */
    public function deleted(Quotations $quotation)
    {
        
    }

    /**
     * Handle the quotations "restored" event.
     *
     * @param  \App\Quotations  $quotation
     * @return void
     */
    public function restored(Quotations $quotation)
    {
        //
    }

    /**
     * Handle the quotations "force deleted" event.
     *
     * @param  \App\Quotations  $quotation
     * @return void
     */
    public function forceDeleted(Quotations $quotation)
    {
        die($quotation->id);
    }
}
