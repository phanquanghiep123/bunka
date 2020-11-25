<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class PurchaseFeeOutsideDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'date_of_recording' => '2019-03-01 00:00:00',
                'document_number' => 'PC03/19-0050',
                'document_date' => '2019-03-01 00:00:00',
                'building_code' => 'BHN-9-021',
                'explains' => 'BHN-9-021 Hutamaki+terumo-Hân -tiếp khách_Capella-D1_EE/18T_0221077',
                'reciprocal_account' => '1114',
                'number_of_debt_incurred' => '4744000',
                'the_number_arises_there' => '0',
                'outstanding_balance' => '6523980353',
                'credit' => '0',
                'created_at' => '2019-07-21 03:00:34',
                'updated_at' => '2019-07-21 03:00:34',
            ],

            [
                'id' => '2',
                'date_of_recording' => '2019-03-01 00:00:00',
                'document_number' => 'PC03/19-0051',
                'document_date' => '2019-03-01 00:00:00',
                'building_code' => 'BHN-9-021',
                'explains' => 'BHN-9-021  Nipro - Lâm - TT tiền mua sắt, bạt xanh, tắc kê, xi măng ',
                'reciprocal_account' => '1114',
                'number_of_debt_incurred' => '3100000',
                'the_number_arises_there' => '0',
                'outstanding_balance' => '6527080353',
                'credit' => '0',
                'created_at' => '2019-07-21 03:00:34',
                'updated_at' => '2019-07-21 03:00:34',
            ],

            [
                'id' => '3',
                'date_of_recording' => '2019-03-01 00:00:00',
                'document_number' => 'PC03/19-0050',
                'document_date' => '2019-03-01 00:00:00',
                'building_code' => 'BHN-9-032',
                'explains' => 'BHN-9-032 Hutamaki+terumo-Hân -tiếp khách_Capella-D1_EE/18T_0221077',
                'reciprocal_account' => '1114',
                'number_of_debt_incurred' => '4744000',
                'the_number_arises_there' => '0',
                'outstanding_balance' => '6523980353',
                'credit' => '0',
                'created_at' => '2019-07-22 03:31:53',
                'updated_at' => '2019-07-22 03:31:53',
            ],

            [
                'id' => '4',
                'date_of_recording' => '2019-03-01 00:00:00',
                'document_number' => 'PC03/19-0051',
                'document_date' => '2019-03-01 00:00:00',
                'building_code' => 'BHN-9-032',
                'explains' => 'BHN-9-032  Nipro - Lâm - TT tiền mua sắt, bạt xanh, tắc kê, xi măng ',
                'reciprocal_account' => '1114',
                'number_of_debt_incurred' => '3100000',
                'the_number_arises_there' => '0',
                'outstanding_balance' => '6527080353',
                'credit' => '0',
                'created_at' => '2019-07-22 03:31:53',
                'updated_at' => '2019-07-22 03:31:53',
            ],

            [
                'id' => '5',
                'date_of_recording' => '2019-03-01 00:00:00',
                'document_number' => 'PK03/19-0031',
                'document_date' => '2019-03-01 00:00:00',
                'building_code' => 'BHN-9-032',
                'explains' => 'BHN-9-032 Ojitex S123 HT tiền thuê cont kho 20\' tháng 02.2019 và PVC lượ',
                'reciprocal_account' => '3311',
                'number_of_debt_incurred' => '6800000',
                'the_number_arises_there' => '0',
                'outstanding_balance' => '6533880353',
                'credit' => '0',
                'created_at' => '2019-07-22 03:31:53',
                'updated_at' => '2019-07-22 03:31:53',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("purchase_fee_outside", $item);
        }
    }

}