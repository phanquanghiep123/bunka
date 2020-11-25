<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ConstructionCompletionDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '13',
                'user_id' => '3',
                'month' => '1',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '120000000',
                'current' => '100000000',
                'total' => '1200000000',
                'percent' => '83',
                'system_percent' => '100',
                'status' => '1',
                'created_at' => '2019-07-25 10:30:12',
                'updated_at' => '2019-07-25 03:30:12',
            ],

            [
                'id' => '14',
                'user_id' => '3',
                'month' => '2',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '120000000',
                'current' => '120000000',
                'total' => '1200000000',
                'percent' => '100',
                'system_percent' => '120',
                'status' => '1',
                'created_at' => '2019-07-25 10:30:14',
                'updated_at' => '2019-07-25 03:30:14',
            ],

            [
                'id' => '15',
                'user_id' => '3',
                'month' => '3',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '16',
                'user_id' => '3',
                'month' => '4',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '17',
                'user_id' => '3',
                'month' => '5',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '18',
                'user_id' => '3',
                'month' => '6',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '19',
                'user_id' => '3',
                'month' => '7',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '20',
                'user_id' => '3',
                'month' => '8',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '25',
                'user_id' => '3',
                'month' => '1',
                'year' => '2020',
                'target' => '100000000',
                'expected' => '0',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-20 17:16:45',
                'updated_at' => '2019-07-20 09:38:07',
            ],

            [
                'id' => '26',
                'user_id' => '3',
                'month' => '2',
                'year' => '2020',
                'target' => '100000000',
                'expected' => '0',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-20 17:16:46',
                'updated_at' => '2019-07-20 09:38:07',
            ],

            [
                'id' => '31',
                'user_id' => '3',
                'month' => '9',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '32',
                'user_id' => '3',
                'month' => '10',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '33',
                'user_id' => '3',
                'month' => '11',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

            [
                'id' => '34',
                'user_id' => '3',
                'month' => '12',
                'year' => '2019',
                'target' => '100000000',
                'expected' => '100000000',
                'current' => '0',
                'total' => '1200000000',
                'percent' => '0',
                'system_percent' => '0',
                'status' => '0',
                'created_at' => '2019-07-25 10:07:23',
                'updated_at' => '2019-07-25 03:07:23',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("construction_completion", $item);
        }
    }

}