<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class MenuGroupsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '3',
                'name' => 'Admin Menu',
                'slug' => 'admin-menu',
                'status_id' => '25',
                'created_at' => '2019-04-11 03:59:43',
                'updated_at' => '2019-04-11 09:39:48',
            ],

            [
                'id' => '4',
                'name' => 'Menu Profile',
                'slug' => 'menu-profile',
                'status_id' => '25',
                'created_at' => '2019-04-20 08:24:22',
                'updated_at' => '2019-04-20 08:24:22',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("menu_groups", $item);
        }
    }

}