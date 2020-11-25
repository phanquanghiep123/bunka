<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationOtherDetailsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'name' => '001',
                'quotation_id' => '1',
                'saleprice' => '2315400',
                'price' => '23154000',
                'round_price' => '0',
                'total' => '23154000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 06:32:43',
                'updated_at' => '2019-07-26 06:32:43',
            ],

            [
                'id' => '2',
                'name' => '002',
                'quotation_id' => '1',
                'saleprice' => '2315400',
                'price' => '34731000',
                'round_price' => '0',
                'total' => '34731000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 06:37:16',
                'updated_at' => '2019-07-26 06:37:16',
            ],

            [
                'id' => '3',
                'name' => '02',
                'quotation_id' => '1',
                'saleprice' => '23154000',
                'price' => '2315400000',
                'round_price' => '0',
                'total' => '2315400000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 06:39:37',
                'updated_at' => '2019-07-26 06:39:37',
            ],

            [
                'id' => '4',
                'name' => '001',
                'quotation_id' => '2',
                'saleprice' => '2315400',
                'price' => '23154000',
                'round_price' => '0',
                'total' => '23154000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:01:45',
                'updated_at' => '2019-07-26 07:01:45',
            ],

            [
                'id' => '5',
                'name' => '002',
                'quotation_id' => '2',
                'saleprice' => '2315400',
                'price' => '34731000',
                'round_price' => '0',
                'total' => '34731000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:01:45',
                'updated_at' => '2019-07-26 07:01:45',
            ],

            [
                'id' => '6',
                'name' => '02',
                'quotation_id' => '2',
                'saleprice' => '23154000',
                'price' => '2315400000',
                'round_price' => '0',
                'total' => '2315400000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:01:46',
                'updated_at' => '2019-07-26 07:01:46',
            ],

            [
                'id' => '7',
                'name' => '001',
                'quotation_id' => '3',
                'saleprice' => '2315400',
                'price' => '23154000',
                'round_price' => '0',
                'total' => '23154000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:07:08',
                'updated_at' => '2019-07-26 07:07:08',
            ],

            [
                'id' => '8',
                'name' => '002',
                'quotation_id' => '3',
                'saleprice' => '2315400',
                'price' => '34731000',
                'round_price' => '0',
                'total' => '34731000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:07:08',
                'updated_at' => '2019-07-26 07:07:08',
            ],

            [
                'id' => '9',
                'name' => '02',
                'quotation_id' => '3',
                'saleprice' => '23154000',
                'price' => '2315400000',
                'round_price' => '0',
                'total' => '2315400000',
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'created_at' => '2019-07-26 07:07:08',
                'updated_at' => '2019-07-26 07:07:08',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_other_details", $item);
        }
    }

}