<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class BranchsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'name' => 'Hà Nội',
                'short_name' => 'HN',
                'avatar' => 'Hà Nội',
                'address' => null,
                'description' => null,
                'created_at' => '2019-04-29 09:00:05',
                'updated_at' => '2019-04-29 09:00:05',
                'status_id' => '25',
            ],

            [
                'id' => '2',
                'name' => 'Thành Phố Hồ Chí Minh',
                'short_name' => 'HCM',
                'avatar' => null,
                'address' => null,
                'description' => null,
                'created_at' => '2019-04-29 09:00:42',
                'updated_at' => '2019-04-29 09:00:42',
                'status_id' => '25',
            ],

            [
                'id' => '3',
                'name' => 'Japan',
                'short_name' => 'JP',
                'avatar' => null,
                'address' => null,
                'description' => null,
                'created_at' => '2019-04-29 09:00:56',
                'updated_at' => '2019-04-29 09:00:56',
                'status_id' => '25',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("branchs", $item);
        }
    }

}