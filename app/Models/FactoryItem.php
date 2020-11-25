<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactoryItem extends Model
{
    //
    public $lang_id;

    public $timestamps = false;

    protected $table = 'mstfactoryitem';

    protected $fillable = [
        'FactoryCode',
        'FactoryName'
    ];

    public $incrementing = false;

    protected $primaryKey = 'FactoryCode';

    public function items()
    {
        return $this->hasMany('App\Models\Items', 'FactoryCode');
    }

    public function type()
    {
        return $this->hasOne('App\Models\FactoryItemExtends', 'FactoryCode');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\FactoryItemNotes', 'factory_code');
    }

    public function note()
    {
        if($this->lang_id == null)
            $this->lang_id = session('_LANG_ID');

        return $this->hasOne('App\Models\FactoryItemNotes', 'factory_code')->where('lang_id', $this->lang_id);
    }
}
