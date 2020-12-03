<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationDownloadsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'user_id' => '8',
                'order_id' => '11',
                'product_id' => '7',
                'quotation_id' => '23',
                'created_at' => '2019-07-22 01:16:46',
                'updated_at' => '2019-07-22 01:16:46',
            ],

            [
                'id' => '2',
                'user_id' => '1',
                'order_id' => '11',
                'product_id' => '7',
                'quotation_id' => '23',
                'created_at' => '2019-07-22 01:42:54',
                'updated_at' => '2019-07-22 01:42:54',
            ],

            [
                'id' => '3',
                'user_id' => '1',
                'order_id' => '11',
                'product_id' => '7',
                'quotation_id' => '23',
                'created_at' => '2019-07-22 01:43:18',
                'updated_at' => '2019-07-22 01:43:18',
            ],

            [
                'id' => '4',
                'user_id' => '1',
                'order_id' => '11',
                'product_id' => '7',
                'quotation_id' => '23',
                'created_at' => '2019-07-22 01:50:04',
                'updated_at' => '2019-07-22 01:50:04',
            ],

            [
                'id' => '5',
                'user_id' => '7',
                'order_id' => '14',
                'product_id' => '1',
                'quotation_id' => '40',
                'created_at' => '2019-07-22 03:16:45',
                'updated_at' => '2019-07-22 03:16:45',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_downloads", $item);
        }
    }

}