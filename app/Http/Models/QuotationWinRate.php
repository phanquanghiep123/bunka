<?php

namespace App\Http\Models;

use App\Http\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class QuotationWinRate extends Model
{
    //
    protected $fillable = [
        'win_rate', 'quotation_id', 'created_by'
    ];
}
