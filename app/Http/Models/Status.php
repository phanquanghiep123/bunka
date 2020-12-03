<?php

namespace App\Http\Models;


class Status extends BaseModel
{
   	protected $table = "status";
   	public function module()
	{
	    return $this->hasOne('App\Http\Models\Modules','id','module_id');
	}
	public function role ($role_id){
		return $this->hasOne('App\Http\Models\Status_Roles','status_id','id')->where("status_role.role_id","=",$role_id)->first();
	}
	 
	public function status_name ($lang_id = null) {
		if($lang_id == null)
			$lang_id = session('_LANG_ID');
		return $this->hasOne('App\Http\Models\Status_Language','bind_key','id')->where("lang_id","=",$lang_id);
	}
	public function value(){
    	return $this->hasMany('App\Http\Models\Status_Language', 'bind_key', 'id');
    }
}
