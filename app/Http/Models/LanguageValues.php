<?php

namespace App\Http\Models;


class LanguageValues extends BaseModel
{
    protected $table = "language_values";
    protected function label(){
    	return $this->hasOne('App\Http\Models\LanguageLabels', 'label_id', 'id');
    }
}
