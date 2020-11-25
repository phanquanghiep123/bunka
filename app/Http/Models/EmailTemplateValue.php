<?php

namespace App\Http\Models;


class EmailTemplateValue extends BaseModel
{
    protected $table = "emailtemplate_values";
    protected function label(){
    	return $this->hasOne('App\Http\Models\LanguageLabels', 'label_id', 'id');
    }
}
