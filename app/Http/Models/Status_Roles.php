<?php

namespace App\Http\Models;


class Status_Roles extends BaseModel
{
    protected $table = "status_role";
   	protected function role()
	{
	    return $this->hasOne('App\Http\Models\Roles','id','role_id');
	}
	 
}
