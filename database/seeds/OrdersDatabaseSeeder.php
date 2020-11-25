<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class OrdersDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'order_number' => 'BHN-9-010',
                'order_no_id' => null,
                'quotation_id' => '1',
                'status_id' => '37',
                'person_in_charge' => '17',
                'receiving_order_date' => '2019-07-26',
                'planned_delivery_date' => '2019-07-26',
                'planned_installation_date' => '2019-07-26',
                'planned_completion_date' => '2019-07-26',
                'discount' => '0',
                'sub_total' => '7001010246',
                'grand_sub_total' => '7001010246',
                'tax_price' => '700101024.6',
                'product_price' => '4627725246',
                'other_price' => '2373285000',
                'total' => '7701111270.6',
                'user_created' => '3',
                'user_updated' => '3',
                'is_edit' => '0',
                'not_sent_notifition' => '0',
                'created_at' => '2019-07-26 07:00:39',
                'updated_at' => '2019-07-26 07:01:24',
            ]

        ];

        foreach($data as $item) 
        {
            $this->saveData("orders", $item);
        }
    }

}