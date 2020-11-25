<?php

namespace App\Http\Models;
use EmailTemplateValue ;
class EmailTemplate extends BaseModel
{
	protected $table = "emailtemplate";
    public function value(){
    	return $this->hasMany('App\Http\Models\EmailTemplateValue', 'emailtemplate_id', 'id');
    }

    public function valueByLang($langId){
    	return $this->hasMany('App\Http\Models\EmailTemplateValue', 'emailtemplate_id', 'id')->where('lang_id','=',$langId);
    }
}
