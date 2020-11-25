<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class RequestQuotationsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'user_id' => '1',
                'user_old_id' => null,
                'quotation_id' => '1',
                'status_change' => '23',
                'old_status' => null,
                'message' => null,
                'pid' => '0',
                'path' => '/0/1/',
                'created_at' => '2019-07-26 06:32:26',
                'updated_at' => '2019-07-26 06:32:26',
            ],

            [
                'id' => '2',
                'user_id' => '4',
                'user_old_id' => '1',
                'quotation_id' => '1',
                'status_change' => '19',
                'old_status' => null,
                'message' => null,
                'pid' => '1',
                'path' => '/0/1/2/',
                'created_at' => '2019-07-26 06:42:59',
                'updated_at' => '2019-07-26 06:42:59',
            ],

            [
                'id' => '3',
                'user_id' => '3',
                'user_old_id' => null,
                'quotation_id' => '3',
                'status_change' => '23',
                'old_status' => null,
                'message' => null,
                'pid' => '0',
                'path' => '/0/3/',
                'created_at' => '2019-07-26 07:09:13',
                'updated_at' => '2019-07-26 07:09:13',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("request_quotations", $item);
        }
    }

}