<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classes extends Model
{
    public $timestamps = false;

    protected $table = 'mstclass';

    protected $primaryKey = ['Class', 'ClassKey'];

    public $incrementing = false;

    public $ClassNumber = 0;

    public function getPriceByMatrix(String $PricePatternKey, Int $Matrix, Float $width = 0, Float $height = 0)
    {
        $ClassFactoryPriceKey = '7';
        $data = null;

        $dimension = DB::table($this->table)
            ->select(DB::raw('MIN(Value3) as width, MIN(Value4) as height'))
            ->where([
                ['Class', '=', $ClassFactoryPriceKey],
                ['Value1', '=', $PricePatternKey],
                ['Value2', '=', $Matrix],
                ['Value3', '>=', $width],
                ['Value4', '>=', $height]
            ]);

        $data = DB::table($this->table)
            ->select("{$this->table}.Value5 as MatrixPrice")
            ->joinSub($dimension, 'dimension', function ($join) {
                $join->on([
                    ["{$this->table}.Value3", '=', 'dimension.width'],
                    ["{$this->table}.Value4", '=', 'dimension.height']
                ]);
            })
            ->where([
                ['Class', '=', $ClassFactoryPriceKey],
                ['Value1', '=', $PricePatternKey],
                ['Value2', '=', $Matrix]
            ])
            ->pluck('MatrixPrice')
            ->first();

        return is_null($data) ? 0.0 : (float)$data;
    }

    /**
     * Trả về ClassKey lớn nhất của một Class
     * @return number
     */
    public function lastClassKey()
    {
        return $this->select(DB::raw('MAX(CAST(ClassKey AS UNSIGNED INTEGER)) AS ClassKey'))->where('Class', '=', $this->ClassNumber)->first();
    }

    public function msItemPrices(){
        return $this->hasMany('App\Models\ItemClass', 'ClassKey', 'GroupClassKey');
    }
}
