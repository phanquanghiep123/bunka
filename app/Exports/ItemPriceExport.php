<?php

namespace App\Exports;

use App\Models\ItemPrice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Illuminate\Support\Facades\DB;

class ItemPriceExport implements FromQuery, WithHeadings, WithStrictNullComparison
{
    use Exportable;

    public function query()
    {
        $itemPrice = new ItemPrice;
        return ItemPrice::query()->select([
            'mstitemprice.ItemId',
            'mstitem.ItemName',
            'mstitemclass.ItemClassName',
            'groupclass.ClassName',
            'mstitemprice.UnitPrice',
            'mstitemprice.UnitPriceOther',
            DB::raw('MAX(mstitemprice.ValidFrom) AS ValidFrom'),
            'mstitemprice.ValidTo'
        ])
        ->leftJoin('mstitem', 'mstitem.ItemId', '=', 'mstitemprice.ItemId')
        ->leftJoin('mstitemclass', 'mstitemclass.ItemClassId', '=', 'mstitem.ItemClassId')
        ->leftJoinSub($itemPrice->groupClass(), 'groupclass', function ($join) {
            $join->on('groupclass.ClassKey', '=', 'mstitemprice.GroupClassKey');
        })
        ->where('ValidFrom', '<', DB::raw('NOW()'))
        ->groupBy('mstitemprice.ItemId')
        ->orderBy('mstitemprice.ItemId');
    }

    public function headings(): array
    {
        return [
            'Item Id',
            'Item Name',
            'Item Class',
            'Class',
            'Unit Price',
            'Unit Price Other',
            'Valid From',
            'Valid To'
        ];
    }
}
