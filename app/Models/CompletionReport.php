<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletionReport extends Model
{
    protected $fillable = [
        'order_id',
        'percent',
        'note',
        'created_by',
        'updated_by',
        'status'
    ];

    public function media()
    {
        return $this->hasMany('App\Models\Media', 'value')->where('key', 'completion_report_id');
    }

    public function status_detail()
    {
        return $this->hasOne('App\Http\Models\Status', 'id', 'status')->with('status_name');
    }
}
