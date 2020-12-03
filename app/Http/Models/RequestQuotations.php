<?php

namespace App\Http\Models;

class RequestQuotations extends BaseModel
{
    protected $table = "request_quotations";
    public function user()
    {
        return $this->hasOne('App\Http\Models\Users', 'id', 'user_id');
    }
    public function user_old_id()
    {
        return $this->hasOne('App\Http\Models\Users', 'id', 'user_old_id');
    }

    public function status()
    {
        return $this->hasOne('App\Http\Models\Status', 'id', 'status_change');
    }
    public function quotation () 
    {
        return $this->hasOne('App\Http\Models\Quotations', 'id', 'quotation_id');
    }
}
