<?php

namespace App\Http\Models;

class ContractPeriods extends BaseModel
{
    protected $fillable = [
        'contract_id',
        'start_date',
        'end_date',
        'period_amount'
    ];

    public function payments() {
        return $this->hasMany('App\Http\Models\ContractPayments', 'periods_id');
    }
    public function completion()
    {
        return $this->hasOne('App\Models\CompletionReport', 'period_id');

    }
}
