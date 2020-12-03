<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ConstructionsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'code' => '001',
                'name' => 'Vincom Plaza',
                'address' => 'Vincom Plaza',
                'phone' => '4432432',
                'fax' => '000000',
                'manager' => '000000',
                'status_id' => '25',
                'created_at' => '2019-06-06 19:15:01',
                'updated_at' => '2019-06-18 10:05:31',
            ],

            [
                'id' => '2',
                'code' => '002',
                'name' => 'Big C Plaza',
                'address' => 'Big C Plaza',
                'phone' => '000000',
                'fax' => '000000',
                'manager' => '000000',
                'status_id' => '25',
                'created_at' => '2019-06-06 19:15:13',
                'updated_at' => '2019-06-18 10:05:53',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("constructions", $item);
        }
    }

}