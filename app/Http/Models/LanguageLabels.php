<?php

namespace App\Http\Models;
use LanguageValues ;
class LanguageLabels extends BaseModel
{
    public function value(){
    	return $this->hasMany('App\Http\Models\LanguageValues', 'label_id', 'id');
    }
}
