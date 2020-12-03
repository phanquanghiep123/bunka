<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Classes;

class Matrix extends Classes
{

    public $ClassNumber = 6;

    //
    public function matrixTypeFromClass()
    {
        return DB::table('mstclass')
            ->select(DB::raw('CAST(ClassKey AS UNSIGNED INTEGER) as ClassKey'), 'ClassName', 'ClassFullName')
            ->where('Class', $this->ClassNumber);
    }

    public function matrixTypeFromCache()
    {
        $matrixTypes = Cache::get('matrixTypes');
        if ( is_null($matrixTypes) ) {
            $matrixTypes = Cache::remember('matrixTypes', 10, function() {
                return $this->matrixTypeFromClass()->get();
            });
        }

        return $matrixTypes;
    }
}
