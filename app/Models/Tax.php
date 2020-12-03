<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tax extends Classes
{
    public $ClassNumber = 3;

    public function get()
    {
        //
        return DB::table($this->table)
            ->select('ClassKey', 'ClassName AS Name', 'Value1 as TaxRate')
            ->where('Class', $this->ClassNumber);
    }
}
