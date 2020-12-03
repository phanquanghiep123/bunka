<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class TaxsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'number' => '10',
                'status_id' => '25',
                'created_at' => '2019-05-08 11:35:26',
                'updated_at' => '2019-05-08 11:37:17',
            ],

            [
                'id' => '2',
                'number' => '15',
                'status_id' => '25',
                'created_at' => '2019-05-08 11:35:34',
                'updated_at' => '2019-05-08 11:37:25',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("taxs", $item);
        }
    }

}