<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationRateDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'quotation_id' => '1',
                'rate_id' => '1',
                'value' => '1',
                'name' => 'VND',
                'format' => '0,0[.]00',
                'is_default' => '0',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:41:40',
            ],

            [
                'id' => '2',
                'quotation_id' => '1',
                'rate_id' => '2',
                'value' => '23154',
                'name' => 'USD',
                'format' => '0,0[.]00',
                'is_default' => '0',
                'created_at' => '2019-07-26 06:32:42',
                'updated_at' => '2019-07-26 06:41:00',
            ],

            [
                'id' => '3',
                'quotation_id' => '1',
                'rate_id' => '3',
                'value' => '214',
                'name' => 'JPY',
                'format' => '0,0[.]00',
                'is_default' => '1',
                'created_at' => '2019-07-26 06:32:43',
                'updated_at' => '2019-07-26 06:41:40',
            ],

            [
                'id' => '4',
                'quotation_id' => '3',
                'rate_id' => '1',
                'value' => '1',
                'name' => 'VND',
                'format' => '0,0[.]00',
                'is_default' => '1',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:09:06',
            ],

            [
                'id' => '5',
                'quotation_id' => '3',
                'rate_id' => '2',
                'value' => '23154',
                'name' => 'USD',
                'format' => '0,0[.]00',
                'is_default' => '0',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:07:09',
            ],

            [
                'id' => '6',
                'quotation_id' => '3',
                'rate_id' => '3',
                'value' => '214',
                'name' => 'JPY',
                'format' => '0,0[.]00',
                'is_default' => '0',
                'created_at' => '2019-07-26 07:07:09',
                'updated_at' => '2019-07-26 07:09:06',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_rate", $item);
        }
    }

}