<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ExcelTemplatesDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'key' => '001',
                'status_id' => '25',
                'created_at' => '2019-07-04 04:16:42',
                'updated_at' => '2019-07-04 04:16:42',
            ],

            [
                'id' => '2',
                'key' => '002',
                'status_id' => '25',
                'created_at' => '2019-07-05 10:28:32',
                'updated_at' => '2019-07-05 10:28:32',
            ],

            [
                'id' => '3',
                'key' => '003',
                'status_id' => '25',
                'created_at' => '2019-07-06 04:56:06',
                'updated_at' => '2019-07-06 05:01:55',
            ],

            [
                'id' => '4',
                'key' => '004',
                'status_id' => '25',
                'created_at' => '2019-07-08 08:48:30',
                'updated_at' => '2019-07-08 08:48:30',
            ],

            [
                'id' => '5',
                'key' => '005',
                'status_id' => null,
                'created_at' => '2019-07-09 10:24:54',
                'updated_at' => '2019-07-09 10:25:01',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("excel_templates", $item);
        }
    }

}