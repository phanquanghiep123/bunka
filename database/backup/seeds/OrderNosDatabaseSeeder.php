<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class OrderNosDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'created_at' => '2019-07-26 06:43:28',
                'updated_at' => '2019-07-26 06:43:28',
            ],

            [
                'id' => '2',
                'created_at' => '2019-07-26 06:50:47',
                'updated_at' => '2019-07-26 06:50:47',
            ],

            [
                'id' => '3',
                'created_at' => '2019-07-26 06:51:08',
                'updated_at' => '2019-07-26 06:51:08',
            ],

            [
                'id' => '4',
                'created_at' => '2019-07-26 06:53:20',
                'updated_at' => '2019-07-26 06:53:20',
            ],

            [
                'id' => '5',
                'created_at' => '2019-07-26 06:54:13',
                'updated_at' => '2019-07-26 06:54:13',
            ],

            [
                'id' => '6',
                'created_at' => '2019-07-26 06:54:34',
                'updated_at' => '2019-07-26 06:54:34',
            ],

            [
                'id' => '7',
                'created_at' => '2019-07-26 06:56:19',
                'updated_at' => '2019-07-26 06:56:19',
            ],

            [
                'id' => '8',
                'created_at' => '2019-07-26 06:56:48',
                'updated_at' => '2019-07-26 06:56:48',
            ],

            [
                'id' => '9',
                'created_at' => '2019-07-26 06:57:21',
                'updated_at' => '2019-07-26 06:57:21',
            ],

            [
                'id' => '10',
                'created_at' => '2019-07-26 07:00:25',
                'updated_at' => '2019-07-26 07:00:25',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("order_nos", $item);
        }
    }

}