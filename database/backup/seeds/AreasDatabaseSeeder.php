<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class AreasDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '3',
                'name' => 'The Middle',
                'short_name' => '200',
                'address' => 'abc',
                'status_id' => '25',
                'created_at' => '2019-06-07 08:42:39',
                'updated_at' => '2019-06-19 08:03:28',
            ],

            [
                'id' => '4',
                'name' => 'Ha Noi\'s Neighborhood',
                'short_name' => null,
                'address' => null,
                'status_id' => '25',
                'created_at' => '2019-06-07 08:42:59',
                'updated_at' => '2019-06-07 08:42:59',
            ],

            [
                'id' => '5',
                'name' => 'The South',
                'short_name' => 'The South',
                'address' => 'The South',
                'status_id' => '25',
                'created_at' => '2019-07-21 08:50:49',
                'updated_at' => '2019-07-21 08:50:49',
            ],

            [
                'id' => '6',
                'name' => 'The North',
                'short_name' => 'The North',
                'address' => 'The North',
                'status_id' => '25',
                'created_at' => '2019-07-21 08:51:05',
                'updated_at' => '2019-07-21 08:51:05',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("areas", $item);
        }
    }

}