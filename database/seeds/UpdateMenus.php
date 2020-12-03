<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Price Pattern
        DB::table('menus')
            ->whereIn('id', [19, 20])
            ->update([
                'path' => 'admin/price-pattern'
            ]);

        // Matrix Value
        DB::table('menus')
            ->whereIn('id', [21])
            ->update([
                'path' => 'admin/matrix-value'
            ]);

        // Matrix Type
        DB::table('menus')
            ->whereIn('id', [22])
            ->update([
                'path' => 'admin/matrix-type'
            ]);

        // Currency
        DB::table('menus')
            ->whereIn('id', [28, 29])
            ->update([
                'path' => 'admin/currency'
            ]);
    }
}
