<?php

namespace App\Observers;

use App\Http\Models\Orders;
use App\Http\Models\RequestOrders;
use App\Http\Models\Users;
use App\Http\Models\Quotations;
use App\Http\Models\Status;
use App\Http\Models\WebConfigs;
use Auth;
class OrderObserver
{
    /**
     * Handle the orders "created" event.
     *
     * @param  \App\Orders  $order
     * @return void
     */
    public function created(Orders $order)
    {
        $status = $order->status;
        if(@$status->options > 0){
            $user = Auth::user();
            $RequestOrder = new RequestOrders();
            $RequestOrder->user_id       = $user->id;
            $RequestOrder->order_id      = $order->id;
            $RequestOrder->status_change = $order->status_id;
            $RequestOrder->path = '/0/';
            $RequestOrder->pid  = 0;
            $RequestOrder->save();
            $RequestOrder->path = $RequestOrder->path . $RequestOrder->id . "/";
            $RequestOrder->save();
            $users = Users::where("id","!=",$user->id)->get();
            foreach ($users as $keyuser => $valueuser) {
                if($valueuser->hasTypeUserForOrder( $order ) == 1){
                    $valueuser->sendUserChangeOrderStatusMail($RequestOrder);
                }
            }
             
        }
        $quotation = $order->quotation;
        $m         = WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $status    = $this->getListStatusByModels($m->value)->where("options", '=', '3')->first();
        $quotation->status_id = $status->id;
        $quotation->save();
    }
    /**
     * Handle the orders "updated" event.
     *
     * @param  \App\Orders  $order
     * @return void
     */
    public function updated(Orders $order)
    {
        $status = $order->status;
        if(@$status->options > 0 && @$status->options < 3){
            $user = Auth::user();
            if($order->request->count() > 0 ){
                $request = $order->request->first();
                if($request->status_change != $order->status_id){
                    $RequestOrder = new RequestOrders();
                    $RequestOrder->user_id       = $user->id;
                    $RequestOrder->order_id      = $order->id;
                    $RequestOrder->status_change = $order->status_id;
                    $RequestOrder->pid           = $request->id;
                    $RequestOrder->path          = $request->path;
                    $RequestOrder->user_old_id   = $request->user_id;
                    $RequestOrder->save();
                    $RequestOrder->path = $RequestOrder->path . $RequestOrder->id . "/";
                    $RequestOrder->save();
                    $user = Users::find($request->user_id);
                    if($user){
                        $user->sendUserChangeOrderStatusMail($RequestOrder);
                    }else{
                        $users = Users::where("id","!=",$user->id)->get();
                        foreach ($users as $keyuser => $valueuser) {
                            if($valueuser->hasTypeUserForOrder() == 1){
                                $valueuser->sendUserChangeOrderStatusMail($RequestOrder);
                            }
                        }
                    }
                }
            }else{
                $RequestOrder = new RequestOrders();
                $RequestOrder->user_id       = $user->id;
                $RequestOrder->order_id  = $order->id;
                $RequestOrder->status_change = $order->status_id;
                $RequestOrder->path = '/0/';
                $RequestOrder->pid  = 0;
                $RequestOrder->save();
                $RequestOrder->path = $RequestOrder->path . $RequestOrder->id . "/";
                $RequestOrder->save();
                $users = Users::where("id","!=",$user->id)->get();
                foreach ($users as $keyuser => $valueuser) {
                    if($valueuser->hasTypeUserForOrder() == 1){
                        $valueuser->sendUserChangeOrderStatusMail($RequestOrder);
                    }
                }
            }   
        }
        if($status->options = '2'){
            $quotation = $order->quotation;
            $m         = WebConfigs::where('key', '=', 'QuotaitionID')->first();
            $status    = $this->getListStatusByModels($m->value)->where("options", '=', '3')->first();
            $quotation->status_id = $status->id;
            $quotation->save();
            $status    = $this->getListStatusByModels($m->value)->where("options", '=', '2')->first();
            Quotations::leftjoin(Orders::getTableName(),Orders::getTableName().".quotation_id","=",Quotations::getTableName().".id")
            ->join(Status::getTableName(),Status::getTableName().".id","=",Quotations::getTableName().".status_id")
            ->whereNull(Orders::getTableName().".id")
            ->where(Status::getTableName(). ".options","=","3")
            ->update([Quotations::getTableName().".status_id" => $status->id]);
        }

    }

    /**
     * Handle the orders "deleted" event.
     *
     * @param  \App\Orders  $order
     * @return void
     */
    public function deleted(Orders $order)
    {
        $m         = WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $status    = $this->getListStatusByModels($m->value)->where("options", '=', '2')->first();
        $quotation = Quotations::find($order->quotation_id);
        $quotation->status_id = $status->id;
        $quotation->construction_id = null;
        $quotation->save();
    }

    /**
     * Handle the orders "restored" event.
     *
     * @param  \App\Orders  $order
     * @return void
     */
    public function restored(Orders $order)
    {
        //
    }

    /**
     * Handle the orders "force deleted" event.
     *
     * @param  \App\Orders  $order
     * @return void
     */
    public function forceDeleted(Orders $order)
    {
        //
    }
    public function getListStatusByModels ($module_id = null){
        $statusARG = Status::
        where("module_id","=",$module_id)
        ->select(["status.*"])
        ->orderby("status.sort","DESC");
        return $statusARG;
    }
}
