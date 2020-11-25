<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationNosDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'created_at' => '2019-07-26 06:32:01',
                'updated_at' => '2019-07-26 06:32:01',
            ],

            [
                'id' => '2',
                'created_at' => '2019-07-26 09:09:30',
                'updated_at' => '2019-07-26 09:09:30',
            ],

            [
                'id' => '3',
                'created_at' => '2019-07-26 09:13:12',
                'updated_at' => '2019-07-26 09:13:12',
            ],

            [
                'id' => '4',
                'created_at' => '2019-07-26 10:02:53',
                'updated_at' => '2019-07-26 10:02:53',
            ],

            [
                'id' => '5',
                'created_at' => '2019-07-26 10:03:03',
                'updated_at' => '2019-07-26 10:03:03',
            ],

            [
                'id' => '6',
                'created_at' => '2019-07-26 10:03:04',
                'updated_at' => '2019-07-26 10:03:04',
            ],

            [
                'id' => '7',
                'created_at' => '2019-07-26 10:03:05',
                'updated_at' => '2019-07-26 10:03:05',
            ],

            [
                'id' => '8',
                'created_at' => '2019-07-26 10:03:05',
                'updated_at' => '2019-07-26 10:03:05',
            ],

            [
                'id' => '9',
                'created_at' => '2019-07-26 10:04:05',
                'updated_at' => '2019-07-26 10:04:05',
            ],

            [
                'id' => '10',
                'created_at' => '2019-07-26 10:04:22',
                'updated_at' => '2019-07-26 10:04:22',
            ],

            [
                'id' => '11',
                'created_at' => '2019-07-26 10:05:22',
                'updated_at' => '2019-07-26 10:05:22',
            ],

            [
                'id' => '12',
                'created_at' => '2019-07-26 10:06:53',
                'updated_at' => '2019-07-26 10:06:53',
            ],

            [
                'id' => '13',
                'created_at' => '2019-07-26 10:26:01',
                'updated_at' => '2019-07-26 10:26:01',
            ],

            [
                'id' => '14',
                'created_at' => '2019-07-26 10:26:24',
                'updated_at' => '2019-07-26 10:26:24',
            ],

            [
                'id' => '15',
                'created_at' => '2019-07-26 10:28:17',
                'updated_at' => '2019-07-26 10:28:17',
            ],

            [
                'id' => '16',
                'created_at' => '2019-07-26 10:28:55',
                'updated_at' => '2019-07-26 10:28:55',
            ],

            [
                'id' => '17',
                'created_at' => '2019-07-26 11:17:47',
                'updated_at' => '2019-07-26 11:17:47',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_nos", $item);
        }
    }

}