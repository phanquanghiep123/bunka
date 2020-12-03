<?php

namespace App\Http\Models;

class Menus extends BaseModel
{
    protected $table = "menus";
    public function module(){
    	return $this->hasOne('App\Http\Models\Modules', 'id', 'module_id');
    }
}
