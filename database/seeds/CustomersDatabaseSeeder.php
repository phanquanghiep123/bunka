<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class CustomersDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'code' => 'C012 : Obayashi',
                'authorized_name' => 'Obayashi VietNam Corporation',
                'owner' => 'C013',
                'phone' => '0987 23 23 12',
                'email' => 'contact@Obayashi_vietNam.com',
                'construction_name' => 'Sanyu Factory',
                'construction_address' => 'C013',
                'construction_phone' => 'C013',
                'construction_fax' => 'C013',
                'construction_manager' => 'C013',
                'created_at' => '2019-04-16 03:10:00',
                'updated_at' => '2019-04-16 03:10:00',
                'deleted_at' => '0000-00-00 00:00:00',
                'status_id' => '25',
            ],

            [
                'id' => '2',
                'code' => 'C013 : Obayashi',
                'authorized_name' => 'Obayashi C013',
                'owner' => 'C013',
                'phone' => '0987 23 23 C013',
                'email' => 'C013@Obayashi_vietNam.com',
                'construction_name' => 'C013 Sanyu Factory',
                'construction_address' => 'C013',
                'construction_phone' => 'C013',
                'construction_fax' => 'C013',
                'construction_manager' => 'C013',
                'created_at' => '2019-04-16 03:10:00',
                'updated_at' => '2019-04-16 03:10:00',
                'deleted_at' => '0000-00-00 00:00:00',
                'status_id' => '25',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("customers", $item);
        }
    }

}