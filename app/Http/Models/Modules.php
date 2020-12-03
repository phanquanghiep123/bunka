<?php

namespace App\Http\Models;

class Modules extends BaseModel
{
    public function status_items()
    {
        return $this->hasMany('App\Http\models\Status','module_id','id')->orderby("module_id","ASC")->orderby("sort","DESC");
    }
}
