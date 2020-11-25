<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class ItemClass extends Model
{
    //
    protected $table = 'mstitemclass';

    public $timestamps = false;

    protected $primaryKey = 'ItemClassId';

}
