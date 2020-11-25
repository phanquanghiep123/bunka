<?php

namespace App\Http\Models;

class ConstructionCompletion extends BaseModel {

    protected $table = 'construction_completion';

    public function user() {
        return $this->belongsTo('App\Http\Models\Users', 'user_id');
    }
}