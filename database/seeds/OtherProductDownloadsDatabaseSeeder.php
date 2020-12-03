<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class OtherProductDownloadsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'order_id' => '11',
                'user_id' => '8',
                'type' => '1',
                'created_at' => '2019-07-22 01:16:53',
                'updated_at' => '2019-07-22 01:16:53',
            ],

            [
                'id' => '2',
                'order_id' => '11',
                'user_id' => '8',
                'type' => '2',
                'created_at' => '2019-07-22 01:16:55',
                'updated_at' => '2019-07-22 01:16:55',
            ],

            [
                'id' => '3',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '1',
                'created_at' => '2019-07-22 01:37:34',
                'updated_at' => '2019-07-22 01:37:34',
            ],

            [
                'id' => '4',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '1',
                'created_at' => '2019-07-22 01:47:41',
                'updated_at' => '2019-07-22 01:47:41',
            ],

            [
                'id' => '5',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '1',
                'created_at' => '2019-07-22 01:49:14',
                'updated_at' => '2019-07-22 01:49:14',
            ],

            [
                'id' => '6',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '2',
                'created_at' => '2019-07-22 01:49:15',
                'updated_at' => '2019-07-22 01:49:15',
            ],

            [
                'id' => '7',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '1',
                'created_at' => '2019-07-22 01:49:31',
                'updated_at' => '2019-07-22 01:49:31',
            ],

            [
                'id' => '8',
                'order_id' => '11',
                'user_id' => '1',
                'type' => '2',
                'created_at' => '2019-07-22 01:49:33',
                'updated_at' => '2019-07-22 01:49:33',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("other_product_downloads", $item);
        }
    }

}