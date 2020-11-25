<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherModulesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [

            [
                'name' => 'Item Class Management',
                'controller' => 'ItemClass',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Item Price Management',
                'controller' => 'ItemPrice',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Items Management',
                'controller' => 'Items',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Matrix Type Management',
                'controller' => 'MatrixType',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Matrix Value Management',
                'controller' => 'MatrixValue',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Price Pattern Management',
                'controller' => 'PricePattern',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Product Class Management',
                'controller' => 'ProductClass',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Tax Class Management',
                'controller' => 'Tax',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Currency',
                'controller' => 'Currency',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

            [
                'name' => 'Completion Report',
                'controller' => 'CompletionReport',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1'
            ],

        ];

        DB::table('modules')->insert($data);
    }
}
