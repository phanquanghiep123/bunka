<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class RolesDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'name' => 'Admin',
                'is_sys' => '1',
                'status_id' => '25',
                'created_at' => '2019-06-20 12:10:06',
                'updated_at' => '2019-04-11 07:42:22',
            ],

            [
                'id' => '2',
                'name' => 'Manager',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-04-11 03:36:34',
                'updated_at' => '2019-05-09 02:44:56',
            ],

            [
                'id' => '3',
                'name' => 'Saler',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-04-11 07:42:51',
                'updated_at' => '2019-05-04 09:32:04',
            ],

            [
                'id' => '4',
                'name' => 'Accountant',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-04-11 07:43:23',
                'updated_at' => '2019-07-20 02:13:11',
            ],

            [
                'id' => '5',
                'name' => 'Director',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-06-18 11:53:14',
                'updated_at' => '2019-06-18 11:53:14',
            ],

            [
                'id' => '6',
                'name' => 'Assitant',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-06-18 11:53:32',
                'updated_at' => '2019-06-18 11:53:32',
            ],

            [
                'id' => '7',
                'name' => 'Factory',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-06-18 11:53:39',
                'updated_at' => '2019-06-18 11:53:39',
            ],

            [
                'id' => '8',
                'name' => 'System Admin',
                'is_sys' => '0',
                'status_id' => '25',
                'created_at' => '2019-06-18 11:54:39',
                'updated_at' => '2019-06-18 11:54:39',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("roles", $item);
        }
    }

}