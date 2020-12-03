<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactoryItemNotes extends Model
{
    protected $table = 'mstfactoryitem_notes';

    protected $fillable = [
        'lang_id',
        'factory_code',
        'note'
    ];
}
