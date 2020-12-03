<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class EmailtemplateDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'key_id' => 'add-quotation',
                'status' => '1',
                'created_at' => '2019-07-13 08:28:02',
                'updated_at' => '2019-07-13 08:28:02',
            ],

            [
                'id' => '2',
                'key_id' => '001',
                'status' => '1',
                'created_at' => '2019-07-13 08:49:46',
                'updated_at' => '2019-07-13 08:49:46',
            ],

            [
                'id' => '3',
                'key_id' => 'change-status-quotation',
                'status' => '1',
                'created_at' => '2019-07-13 09:19:50',
                'updated_at' => '2019-07-13 09:58:35',
            ],

            [
                'id' => '4',
                'key_id' => 'add-order',
                'status' => '1',
                'created_at' => '2019-07-15 01:28:00',
                'updated_at' => '2019-07-15 01:28:00',
            ],

            [
                'id' => '5',
                'key_id' => 'change-status-order',
                'status' => '1',
                'created_at' => '2019-07-15 01:32:47',
                'updated_at' => '2019-07-15 01:32:47',
            ],

            [
                'id' => '6',
                'key_id' => 'add-contract',
                'status' => '1',
                'created_at' => '2019-07-15 02:54:11',
                'updated_at' => '2019-07-15 02:54:21',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("emailtemplate", $item);
        }
    }

}