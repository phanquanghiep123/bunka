<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationDetailOtherItemsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'detail_id' => '1',
                'name' => '001',
                'width' => '10',
                'height' => '10',
                'remarks' => null,
                'quantity' => '200',
                'saleprice' => '0',
                'price' => '2000000',
                'type' => '1',
                'created_at' => '2019-07-26 06:39:37',
                'updated_at' => '2019-07-26 06:39:37',
            ],

            [
                'id' => '2',
                'detail_id' => '3',
                'name' => '001',
                'width' => '10',
                'height' => '10',
                'remarks' => null,
                'quantity' => '200',
                'saleprice' => '0',
                'price' => '2000000',
                'type' => '1',
                'created_at' => '2019-07-26 07:01:45',
                'updated_at' => '2019-07-26 07:01:45',
            ],

            [
                'id' => '3',
                'detail_id' => '5',
                'name' => '001',
                'width' => '10',
                'height' => '10',
                'remarks' => null,
                'quantity' => '200',
                'saleprice' => '0',
                'price' => '2000000',
                'type' => '1',
                'created_at' => '2019-07-26 07:07:07',
                'updated_at' => '2019-07-26 07:07:07',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_detail_other_items", $item);
        }
    }

}