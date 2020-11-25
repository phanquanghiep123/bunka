<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public function getStatus(){
    	if($this->table == 'quotation'){
    		$quotation  = Quotations::find($this->general_id);
    		return $q->status;
    	}
    	if($this->table == 'order'){
    		$order = Orders::find($this->general_id);
    		return $order->status;
    	}
    	return null;
    }
}
