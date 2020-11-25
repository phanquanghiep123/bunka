<?php

namespace App\Http\Models;

class Contracts extends BaseModel
{
    const PENDING_SIGNED = 0;
    const SIGNED = 1;
    const CANCEL = 2;

    public function customer() {
        return $this->join('orders', 'orders.id', '=', 'contracts.order_id')
            ->join('quotations', 'quotations.id', '=', 'orders.quotation_id')
            ->join('customers', 'customers.id', '=', 'quotations.customer_id')
            ->select('customers.id', 'customers.authorized_name')
            ->first();
    }

    public function order() {
        return $this->belongsTo('App\Http\Models\Orders', 'order_id');
    }

    public function periods() {
        return $this->hasMany('App\Http\Models\ContractPeriods', 'contract_id')->orderBy('start_date');
    }

    public function payments() {
        return $this->hasMany('App\Http\Models\ContractPayments', 'contract_id');
    }

    public function total() {
        // this total get from quotation
        return 100;
    }

    public function completion()
    {
        return $this->hasMany('App\Models\CompletionReport', 'contract_id');
    }

    public function external($building_code) {
        return \App\Http\Models\PurchaseFeeOutsideNew::where(['building_code' => $building_code])->sum('total');
    }
}
