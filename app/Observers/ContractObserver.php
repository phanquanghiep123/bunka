<?php

namespace App\Observers;

use App\Http\Models\Contracts;
use App\Http\Models\Orders;
use App\Http\Models\Status;
use App\Http\Models\WebConfigs;
use App\Http\Models\Users;
class ContractObserver
{
    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Http\Models\Contracts  $contract
     * @return void
     */
    public function created(Contracts $contract)
    {
        $m                = WebConfigs::where('key', '=', 'OrderID')->first();
        $status           = $this->getListStatusByModels($m->value)->where("options", '=', '3')->first();
        $order            = $contract->order;
        $order->status_id = $status->id;
        $order->save();
        $user   = \Auth::user();
        $users = Users::where("id","!=",$user->id)->get();
        foreach ($users as $keyuser => $valueuser) {
            if($valueuser->hasTypeUserForContract(1,$contract) == 1){
                $valueuser->sendContractChangeStatusMail($contract);
            }
        }
    }

    /**
     * Handle the contract "updated" event.
     *
     * @param  \App\Http\Models\Contracts  $contract
     * @return void
     */
    public function updated(Contracts $contract)
    {
        $m      = WebConfigs::where('key', '=', 'OrderID')->first();
        $status = $this->getListStatusByModels($m->value)->where("options", '=', '2')->first();
        Orders::leftjoin(Contracts::getTableName(), Contracts::getTableName() . ".order_id", "=", Orders::getTableName() . ".id")
            ->join(Status::getTableName(), Status::getTableName() . ".id", "=", Orders::getTableName() . ".status_id")
            ->whereNull(Contracts::getTableName() . ".id")
            ->where(Status::getTableName() . ".options", "=", "3")
            ->update([Orders::getTableName() . ".status_id" => $status->id]);
    }
    /**
     * Handle the contract "deleted" event.
     *
     * @param  \App\Http\Models\Contracts  $contract
     * @return void
     */
    public function deleted(Contracts $contract)
    {
        //
    }
    /**
     * Handle the contract "restored" event.
     *
     * @param  \App\Http\Models\Contracts  $contract
     * @return void
     */
    public function restored(Contracts $contract)
    {
        //
    }

    /**
     * Handle the contract "force deleted" event.
     *
     * @param  \App\Http\Models\Contracts  $contract
     * @return void
     */
    public function forceDeleted(Contracts $contract)
    {
        //
    }
    public function getListStatusByModels($module_id = null)
    {
        $statusARG = Status::
            where("module_id", "=", $module_id)
            ->select(["status.*"])
            ->orderby("status.sort", "DESC");
        return $statusARG;
    }
}
