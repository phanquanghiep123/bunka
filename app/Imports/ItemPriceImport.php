<?php

namespace App\Imports;

use App\Models\ItemPrice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::extend('custom', function($value) {
    return preg_replace("/\s/", "", $value);
});
HeadingRowFormatter::default('custom');

class ItemPriceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ItemPrice([
            //
        ]);
    }
}
