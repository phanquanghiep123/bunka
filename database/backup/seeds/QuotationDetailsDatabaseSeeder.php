<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationDetailsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'quotation_id' => '1',
                'product_id' => '2',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '3380484',
                'inlandfreightfee' => '327281790',
                'installationqsmini' => null,
                'productprice' => '32619000',
                'price' => '4423715274',
                'saleprice' => '2763568000',
                'total' => '4423715274',
                'created_at' => '2019-07-26 06:37:14',
                'updated_at' => '2019-07-26 06:39:37',
            ],

            [
                'id' => '2',
                'quotation_id' => '1',
                'product_id' => '7',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '4144566',
                'inlandfreightfee' => '14795406',
                'installationqsmini' => null,
                'productprice' => '185070000',
                'price' => '204009972',
                'saleprice' => '127516000',
                'total' => '204009972',
                'created_at' => '2019-07-26 06:37:15',
                'updated_at' => '2019-07-26 06:37:16',
            ],

            [
                'id' => '3',
                'quotation_id' => '2',
                'product_id' => '2',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '3380484',
                'inlandfreightfee' => '327281790',
                'installationqsmini' => null,
                'productprice' => '32619000',
                'price' => '4423715274',
                'saleprice' => '2763568000',
                'total' => '4423715274',
                'created_at' => '2019-07-26 07:01:44',
                'updated_at' => '2019-07-26 07:01:44',
            ],

            [
                'id' => '4',
                'quotation_id' => '2',
                'product_id' => '7',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '4144566',
                'inlandfreightfee' => '14795406',
                'installationqsmini' => null,
                'productprice' => '185070000',
                'price' => '204009972',
                'saleprice' => '127516000',
                'total' => '204009972',
                'created_at' => '2019-07-26 07:01:45',
                'updated_at' => '2019-07-26 07:01:45',
            ],

            [
                'id' => '5',
                'quotation_id' => '3',
                'product_id' => '2',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '3380484',
                'inlandfreightfee' => '327281790',
                'installationqsmini' => null,
                'productprice' => '32619000',
                'price' => '4423715274',
                'saleprice' => '2763568000',
                'total' => '4423715274',
                'created_at' => '2019-07-26 07:07:07',
                'updated_at' => '2019-07-26 07:07:07',
            ],

            [
                'id' => '6',
                'quotation_id' => '3',
                'product_id' => '7',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '4144566',
                'inlandfreightfee' => '14795406',
                'installationqsmini' => null,
                'productprice' => '185070000',
                'price' => '204009972',
                'saleprice' => '127516000',
                'total' => '204009972',
                'created_at' => '2019-07-26 07:07:07',
                'updated_at' => '2019-07-26 07:07:07',
            ],

            [
                'id' => '7',
                'quotation_id' => '3',
                'product_id' => '7',
                'code' => '002',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '4149197',
                'inlandfreightfee' => '15743724',
                'installationqsmini' => null,
                'productprice' => '196797000',
                'price' => '216689921',
                'saleprice' => '135431000',
                'total' => '216689921',
                'created_at' => '2019-07-26 07:09:07',
                'updated_at' => '2019-07-26 07:09:08',
            ],

            [
                'id' => '8',
                'quotation_id' => '3',
                'product_id' => '1',
                'code' => '001',
                'quantity' => '1',
                'discount' => '0',
                'discount1' => '0',
                'discount2' => '0',
                'discount_active' => '0',
                'installfee' => '1111392',
                'inlandfreightfee' => '237310724',
                'installationqsmini' => null,
                'productprice' => '24732000',
                'price' => '1721613116',
                'saleprice' => '1076008000',
                'total' => '1721613116',
                'created_at' => '2019-07-26 07:09:08',
                'updated_at' => '2019-07-26 07:09:12',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotation_details", $item);
        }
    }

}