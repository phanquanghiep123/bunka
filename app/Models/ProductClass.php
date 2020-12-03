<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;

class ProductClass extends Classes
{

    public $ClassNumber = 1;

    //
    public function getProduceByClassKey($ClassKey = null)
    {
        if (is_null($ClassKey))
            return;

        $result = DB::table('mstclass')
            ->select('ClassKey', 'ClassName', 'ClassFullName', 'Value1 as Keisuu', 'Value2 as MinSquare', 'Value3 as InstallFeeFixed', 'Value4 as BasePrice', 'Value5 as FactoryPrice', 'Value6 as ClassFullNameVN', 'Value7 as ClassFullNameJP')
            ->where([
                ['Class', '=', $this->ClassNumber],
                ['ClassKey', '=', $ClassKey]
            ])
            ->first();

        return $result;
    }

    //
    public function listProductClass()
    {
        return DB::table('mstclass')->select('ClassKey', 'ClassName')->where('Class', '=', $this->ClassNumber);
    }
}
