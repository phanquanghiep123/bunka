<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class RequestOrders extends Model
{
    protected $table = "request_orders";
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
    public function order (){
        return $this->hasOne('App\Http\Models\Orders', 'id', 'order_id');
    }
}
