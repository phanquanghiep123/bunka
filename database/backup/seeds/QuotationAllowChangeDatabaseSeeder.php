<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationAllowChangeDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'user_create' => '1',
                'user_id' => '1',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '2',
                'user_create' => '1',
                'user_id' => '4',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '3',
                'user_create' => '1',
                'user_id' => '8',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '4',
                'user_create' => '1',
                'user_id' => '12',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '5',
                'user_create' => '1',
                'user_id' => '16',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '6',
                'user_create' => '1',
                'user_id' => '19',
                'quotation_id' => '1',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:32:42',
            ],

            [
                'id' => '7',
                'user_create' => '3',
                'user_id' => '3',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '8',
                'user_create' => '3',
                'user_id' => '4',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '9',
                'user_create' => '3',
                'user_id' => '8',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '10',
                'user_create' => '3',
                'user_id' => '12',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '11',
                'user_create' => '3',
                'user_id' => '16',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '12',
                'user_create' => '3',
                'user_id' => '19',
                'quotation_id' => '2',
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '13',
                'user_create' => '3',
                'user_id' => '3',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:08',
                'updated_at' => '2019-07-26 07:07:08',
            ],

            [
                'id' => '14',
                'user_create' => '3',
                'user_id' => '4',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

            [
                'id' => '15',
                'user_create' => '3',
                'user_id' => '8',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

            [
                'id' => '16',
                'user_create' => '3',
                'user_id' => '12',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

            [
                'id' => '17',
                'user_create' => '3',
                'user_id' => '16',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

            [
                'id' => '18',
                'user_create' => '3',
                'user_id' => '19',
                'quotation_id' => '3',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_allow_change", $item);
        }
    }

}