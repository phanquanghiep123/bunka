<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class RequestOrdersDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'user_id' => '3',
                'user_old_id' => null,
                'order_id' => '1',
                'status_change' => '37',
                'pid' => '0',
                'path' => '/0/1/',
                'created_at' => '2019-07-26 07:00:39',
                'updated_at' => '2019-07-26 07:00:39',
            ]

        ];

        foreach($data as $item) 
        {
            $this->saveData("request_orders", $item);
        }
    }

}