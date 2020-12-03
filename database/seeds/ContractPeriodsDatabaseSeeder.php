<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ContractPeriodsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'contract_id' => '6',
                'title' => 'Đợt 1',
                'start_date' => '2019-06-27 11:08:42',
                'end_date' => '2019-06-28 11:08:42',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-06-27 11:08:42',
                'updated_at' => '2019-06-27 11:08:42',
            ],

            [
                'id' => '2',
                'contract_id' => '9',
                'title' => 'Đợt 1',
                'start_date' => '2019-06-27 11:21:28',
                'end_date' => '2019-06-30 11:21:28',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-06-27 11:21:28',
                'updated_at' => '2019-06-27 11:21:28',
            ],

            [
                'id' => '3',
                'contract_id' => '11',
                'title' => 'Đợt 1',
                'start_date' => '2019-06-27 11:36:40',
                'end_date' => '2019-06-28 11:36:40',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-06-27 11:36:40',
                'updated_at' => '2019-06-27 11:36:40',
            ],

            [
                'id' => '4',
                'contract_id' => '12',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-03 11:13:01',
                'end_date' => '2019-07-04 11:13:01',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-07-03 11:13:01',
                'updated_at' => '2019-07-03 11:13:01',
            ],

            [
                'id' => '5',
                'contract_id' => '13',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-03 11:13:01',
                'end_date' => '2019-07-04 11:13:01',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-07-03 11:13:01',
                'updated_at' => '2019-07-03 11:13:01',
            ],

            [
                'id' => '6',
                'contract_id' => '13',
                'title' => 'Đợt 2',
                'start_date' => '2019-07-05 11:35:22',
                'end_date' => '2019-07-07 11:35:22',
                'period_amount' => '7453767523',
                'percent' => '30',
                'created_at' => '2019-07-03 11:35:22',
                'updated_at' => '2019-07-03 11:35:22',
            ],

            [
                'id' => '7',
                'contract_id' => '13',
                'title' => 'Đợt 3',
                'start_date' => '2019-07-10 11:35:22',
                'end_date' => '2019-07-19 11:35:22',
                'period_amount' => '4969178348',
                'percent' => '20',
                'created_at' => '2019-07-03 11:35:22',
                'updated_at' => '2019-07-03 11:35:22',
            ],

            [
                'id' => '8',
                'contract_id' => '14',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-24 08:06:17',
                'end_date' => '2019-07-25 08:06:17',
                'period_amount' => '2484589174',
                'percent' => '10',
                'created_at' => '2019-07-06 08:06:17',
                'updated_at' => '2019-07-06 08:06:17',
            ],

            [
                'id' => '9',
                'contract_id' => '14',
                'title' => 'Đợt 2',
                'start_date' => '2019-07-30 08:06:17',
                'end_date' => '2019-08-01 08:06:17',
                'period_amount' => '7453767523',
                'percent' => '30',
                'created_at' => '2019-07-06 08:06:17',
                'updated_at' => '2019-07-06 08:06:17',
            ],

            [
                'id' => '10',
                'contract_id' => '14',
                'title' => 'Đợt 3',
                'start_date' => '2019-08-02 08:06:17',
                'end_date' => '2019-08-08 08:06:17',
                'period_amount' => '9999999999',
                'percent' => '60',
                'created_at' => '2019-07-06 08:06:17',
                'updated_at' => '2019-07-06 08:06:17',
            ],

            [
                'id' => '11',
                'contract_id' => '15',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-06 08:12:22',
                'end_date' => '2019-07-14 08:12:22',
                'period_amount' => '4969178348',
                'percent' => '20',
                'created_at' => '2019-07-06 08:12:23',
                'updated_at' => '2019-07-06 08:12:23',
            ],

            [
                'id' => '12',
                'contract_id' => '15',
                'title' => 'Đợt 2',
                'start_date' => '2019-07-15 08:12:23',
                'end_date' => '2019-07-20 08:12:23',
                'period_amount' => '9999999999',
                'percent' => '80',
                'created_at' => '2019-07-06 08:12:23',
                'updated_at' => '2019-07-06 08:12:23',
            ],

            [
                'id' => '13',
                'contract_id' => '16',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-08 10:31:08',
                'end_date' => '2019-07-09 10:31:08',
                'period_amount' => '4969178348',
                'percent' => '20',
                'created_at' => '2019-07-08 10:31:08',
                'updated_at' => '2019-07-08 10:31:08',
            ],

            [
                'id' => '14',
                'contract_id' => '16',
                'title' => 'Đợt 2',
                'start_date' => '2019-07-10 10:31:08',
                'end_date' => '2019-07-11 10:31:08',
                'period_amount' => '7453767523',
                'percent' => '30',
                'created_at' => '2019-07-08 10:31:08',
                'updated_at' => '2019-07-08 10:31:08',
            ],

            [
                'id' => '15',
                'contract_id' => '16',
                'title' => 'Đợt 3',
                'start_date' => '2019-07-12 10:31:08',
                'end_date' => '2019-07-13 10:31:08',
                'period_amount' => '9999999999',
                'percent' => '50',
                'created_at' => '2019-07-08 10:31:08',
                'updated_at' => '2019-07-08 10:31:08',
            ],

            [
                'id' => '16',
                'contract_id' => '17',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-13 07:50:08',
                'end_date' => '2019-07-21 07:50:08',
                'period_amount' => '9999999999',
                'percent' => '100',
                'created_at' => '2019-07-13 07:50:08',
                'updated_at' => '2019-07-13 07:50:08',
            ],

            [
                'id' => '17',
                'contract_id' => '18',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-13 07:51:58',
                'end_date' => '2019-07-14 07:51:58',
                'period_amount' => '9999999999',
                'percent' => '50',
                'created_at' => '2019-07-13 07:51:58',
                'updated_at' => '2019-07-13 07:51:58',
            ],

            [
                'id' => '18',
                'contract_id' => '18',
                'title' => 'Đợt 2',
                'start_date' => '2019-07-15 07:51:58',
                'end_date' => '2019-07-19 07:51:58',
                'period_amount' => '9999999999',
                'percent' => '50',
                'created_at' => '2019-07-13 07:51:58',
                'updated_at' => '2019-07-13 07:51:58',
            ],

            [
                'id' => '19',
                'contract_id' => '19',
                'title' => 'Đợt 1',
                'start_date' => '2019-07-13 07:58:45',
                'end_date' => '2019-07-15 07:58:45',
                'period_amount' => '9999999999',
                'percent' => '100',
                'created_at' => '2019-07-13 07:58:45',
                'updated_at' => '2019-07-13 07:58:45',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("contract_periods", $item);
        }
    }

}