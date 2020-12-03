<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactoryItemExtends extends Model
{
    public $timestamps = false;

    protected $table = 'mstfactoryitem_extends';

    protected $fillable = [
        'FactoryCode',
        'Type'
    ];

    public $incrementing = false;

    protected $primaryKey = 'FactoryCode';
}
