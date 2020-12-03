<?php

namespace App\Http\Models;
class ContractPayments extends BaseModel
{
    protected $fillable = [
        'contract_id',
        'from',
        'to',
        'payment_amount',
        'receipts'
    ];

    public function getReceiptsAttribute($value){
        if(is_array($array = @json_decode($value)))
            return $array;
        return [$value];
    }

    public function setReceiptsAttribute($value){
        if ($value) {
            $this->attributes['receipts'] = json_encode($value);
        } else {
            $this->attributes['receipts'] = null;
        }
    }

    public function period() {
        return $this->belongsTo('App\Http\Models\ContractPeriods', 'periods_id');
    }
}
