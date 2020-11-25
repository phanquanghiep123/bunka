<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class TrnquotationDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'QuotationId' => '36',
                'QuotationNo' => '0011',
                'ClientName' => null,
                'CustomerId' => '1',
                'ProjectName' => '234347',
                'QuotationDate' => '0000-00-00 00:00:00',
                'SubTotal' => '0',
                'QuotationDiscount' => null,
                'GrandSubTotal' => '0',
                'TaxClassKey' => null,
                'TaxValue' => null,
                'QuotationCost' => '0',
                'Rate' => '1',
                'RateId' => '2',
                'ChargeClassKey' => null,
                'ChargeValue' => null,
                'DeleteFlg' => null,
                'status_id' => '19',
                'InsertUser' => null,
                'created_at' => '2019-06-01 10:18:47',
                'updated_at' => '2019-06-01 10:18:47',
                'SalesId' => '1',
                'branch_id' => '1',
            ]

        ];

        foreach($data as $item) 
        {
            $this->saveData("trnquotation", $item);
        }
    }

}