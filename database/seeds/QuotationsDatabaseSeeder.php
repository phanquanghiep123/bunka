<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class QuotationsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'quotation_number' => 'BHN-9-001',
                'project' => '001',
                'date_start' => '1970-01-01 00:00:00',
                'customer_id' => '1',
                'branch_id' => '1',
                'tax_id' => '58',
                'tax_value' => '10',
                'rate_id' => '3',
                'area_id' => '3',
                'construction_id' => '1',
                'status_id' => '33',
                'quotation_no_id' => '1',
                'user_created' => '1',
                'user_updated' => '3',
                'customer_code' => null,
                'customer_authorized_name' => null,
                'customer_construction_owner' => null,
                'customer_construction_name' => null,
                'customer_construction_address' => null,
                'customer_construction_phone' => null,
                'customer_construction_fax' => null,
                'customer_construction_manager' => null,
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'sub_total' => '7001010246',
                'tax_price' => '700101024.6',
                'product_price' => '4627725246',
                'other_price' => '2373285000',
                'grand_sub_total' => '7001010246',
                'total' => '7701111270.6',
                'pid' => '0',
                'path' => '/0/1/',
                'reversion_pid' => '0',
                'reversion_root_id' => '1',
                'reversion' => '0',
                'index_reversion' => '0',
                'path_reversion' => '/0/1/',
                'comment' => null,
                'not_sent_notifition' => '0',
                'onsave' => '0',
                'created_at' => '2019-07-26 06:32:26',
                'updated_at' => '2019-07-26 07:07:07',
            ],

            [
                'id' => '3',
                'quotation_number' => 'BHN-9-001',
                'project' => '001',
                'date_start' => '1970-01-01 00:00:00',
                'customer_id' => '1',
                'branch_id' => '1',
                'tax_id' => '58',
                'tax_value' => '10',
                'rate_id' => '1',
                'area_id' => '3',
                'construction_id' => '1',
                'status_id' => '23',
                'quotation_no_id' => '1',
                'user_created' => '3',
                'user_updated' => '1',
                'customer_code' => null,
                'customer_authorized_name' => null,
                'customer_construction_owner' => null,
                'customer_construction_name' => null,
                'customer_construction_address' => null,
                'customer_construction_phone' => null,
                'customer_construction_fax' => null,
                'customer_construction_manager' => null,
                'discount' => '0',
                'discount1' => null,
                'discount2' => '0',
                'discount_active' => null,
                'sub_total' => '8939313283',
                'tax_price' => '893931328.3',
                'product_price' => '6566028283',
                'other_price' => '2373285000',
                'grand_sub_total' => '8939313283',
                'total' => '9833244611.3',
                'pid' => '0',
                'path' => '/0/1/',
                'reversion_pid' => '1',
                'reversion_root_id' => '1',
                'reversion' => '1',
                'index_reversion' => '1',
                'path_reversion' => '/0/1/3/',
                'comment' => null,
                'not_sent_notifition' => '0',
                'onsave' => '0',
                'created_at' => '2019-07-26 07:07:07',
                'updated_at' => '2019-07-26 10:12:54',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("quotations", $item);
        }
    }

}