<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class OrderDownloadsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'order_id' => '11',
                'user_id' => '8',
                'created_at' => '2019-07-22 01:16:58',
                'updated_at' => '2019-07-22 01:16:58',
                'type' => '1',
            ],

            [
                'id' => '2',
                'order_id' => '11',
                'user_id' => '1',
                'created_at' => '2019-07-22 01:38:46',
                'updated_at' => '2019-07-22 01:38:46',
                'type' => '1',
            ],

            [
                'id' => '3',
                'order_id' => '11',
                'user_id' => '1',
                'created_at' => '2019-07-22 01:41:56',
                'updated_at' => '2019-07-22 01:41:56',
                'type' => '1',
            ],

            [
                'id' => '4',
                'order_id' => '11',
                'user_id' => '1',
                'created_at' => '2019-07-22 01:50:02',
                'updated_at' => '2019-07-22 01:50:02',
                'type' => '1',
            ],

            [
                'id' => '5',
                'order_id' => '14',
                'user_id' => '7',
                'created_at' => '2019-07-22 03:15:53',
                'updated_at' => '2019-07-22 03:15:53',
                'type' => '1',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("order_downloads", $item);
        }
    }

}