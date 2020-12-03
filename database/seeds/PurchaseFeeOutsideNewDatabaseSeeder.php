<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class PurchaseFeeOutsideNewDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'number' => '7',
                'building_code' => 'BHN-9-032',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2018-12-19 00:00:00',
                'document_number' => 'JPV1812-323',
                'explains' => 'BVE0091 Posco S1031 Hạch toán tiền mua tài liệu tiêu chuẩn ANSI_DO LUONG CHAT LUONG_TT/18P_0000126',
                'reciprocal_account' => '3311',
                'debt_side' => '4495000',
                'have_side' => '0',
                'total' => '4495000',
                'created_at' => '2019-07-25 19:20:46',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '2',
                'number' => '7',
                'building_code' => 'BHN-9-032',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-01 00:00:00',
                'document_number' => 'PK02/19-0331',
                'explains' => 'BVS0769 Dai Quang Minh S500 Hạch toán 40% HĐ: TPBK/61218_TIEN PHONG_TP',
                'reciprocal_account' => '3311',
                'debt_side' => '39200000',
                'have_side' => '0',
                'total' => '39200000',
                'created_at' => '2019-07-25 19:20:48',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '3',
                'number' => '7',
                'building_code' => 'BHN-9-032',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-01 00:00:00',
                'document_number' => 'PK02/19-0334',
                'explains' => 'BVS0769 Dai Quang Minh S500 Hạch toán 20% HĐ: TPBK/61218_TIEN PHONG_TA',
                'reciprocal_account' => '3311',
                'debt_side' => '19600000',
                'have_side' => '0',
                'total' => '19600000',
                'created_at' => '2019-07-25 19:20:59',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '4',
                'number' => '7',
                'building_code' => 'BHN-9-032',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-15 00:00:00',
                'document_number' => 'PK02/19-0083',
                'explains' => 'BVE0105 Aeon Long Bien S542 Hạch toán tiền mua kính_EUROWINDOW_AA/17P_',
                'reciprocal_account' => '3311',
                'debt_side' => '3109267',
                'have_side' => '0',
                'total' => '3109267',
                'created_at' => '2019-07-25 19:21:01',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '5',
                'number' => '7',
                'building_code' => 'BVE0099',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-19 00:00:00',
                'document_number' => 'PK02/19-0093',
                'explains' => 'BVE0099 Aeon Long Bien S542 Hạch toán tiền mua kính theo HĐ: 1910110/1',
                'reciprocal_account' => '3311',
                'debt_side' => '3080069',
                'have_side' => '0',
                'total' => '3080069',
                'created_at' => '2019-07-24 10:04:40',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '6',
                'number' => '7',
                'building_code' => 'BVE0078',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-25 00:00:00',
                'document_number' => 'PK02/19-0199',
                'explains' => 'BVE0078 Chicland S580 Hạch toán tiền mua chất chống cháy lan (600 cái ',
                'reciprocal_account' => '3311',
                'debt_side' => '48033000',
                'have_side' => '0',
                'total' => '48033000',
                'created_at' => '2019-07-24 10:04:40',
                'updated_at' => '2019-07-24 10:04:40',
            ],

            [
                'id' => '7',
                'number' => '7',
                'building_code' => 'BVS0769',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-27 00:00:00',
                'document_number' => 'PK02/19-0393',
                'explains' => 'BVS0769 DQM S500 HT 40% HĐ: TPBK/6128_TIEN PHONG_TP/13P_0000521',
                'reciprocal_account' => '3311',
                'debt_side' => '39200000',
                'have_side' => '0',
                'total' => '39200000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '8',
                'number' => '7',
                'building_code' => 'BVH9998',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-02-28 00:00:00',
                'document_number' => 'PK02/19-0244',
                'explains' => 'BVH9998 WFC S1000 Hạch toán chi phí lắp đặt lần 1 theo HĐ: 02.05/HDT-F',
                'reciprocal_account' => '3311',
                'debt_side' => '2147483647',
                'have_side' => '0',
                'total' => '2147483647',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '9',
                'number' => '7',
                'building_code' => 'BVE0099',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-01 00:00:00',
                'document_number' => 'PK03/19-0044',
                'explains' => 'BVE0099 Aeon Long Bien S542 Hạch toán tiền mua kính theo HĐ: 1910110/1',
                'reciprocal_account' => '3311',
                'debt_side' => '27100000',
                'have_side' => '0',
                'total' => '27100000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '10',
                'number' => '7',
                'building_code' => 'BVS0769',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-04 00:00:00',
                'document_number' => 'PK03/19-0013',
                'explains' => 'BVS0769 DQM S500 HT 40% HĐ: TPBK/040319_TIEN PHONG_TP/13P_0000523',
                'reciprocal_account' => '3311',
                'debt_side' => '30389200',
                'have_side' => '0',
                'total' => '30389200',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '11',
                'number' => '7',
                'building_code' => 'BVE0099',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-08 00:00:00',
                'document_number' => 'PK03/19-0047',
                'explains' => 'BVE0099 Aeon LB S542 HT tiền mua kính theo HĐ: 1910110/18108229/DA_EUR',
                'reciprocal_account' => '3311',
                'debt_side' => '12934315',
                'have_side' => '0',
                'total' => '12934315',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '12',
                'number' => '7',
                'building_code' => 'BVE0099',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-12 00:00:00',
                'document_number' => 'PK03/19-0114',
                'explains' => 'BVE0099 Aeon LB S542 HT tiền mua kính_EUROWINDOW_AA/17P_0003904',
                'reciprocal_account' => '3311',
                'debt_side' => '20047876',
                'have_side' => '0',
                'total' => '20047876',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '13',
                'number' => '7',
                'building_code' => 'BVE0104',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-12 00:00:00',
                'document_number' => 'PK03/19-0115',
                'explains' => 'BVE0104  Aeon LB S542 HT tiền mua kính_EUROWINDOW_AA/17P_0003899',
                'reciprocal_account' => '3311',
                'debt_side' => '1908689',
                'have_side' => '0',
                'total' => '1908689',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '14',
                'number' => '8',
                'building_code' => 'BVS0599D',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-12 00:00:00',
                'document_number' => 'PK03/19-0132',
                'explains' => 'BVS0599D Nipro S1028 HT 60% HĐ: 19102018/BK-MM ngày 19/10/2018_METAL-M',
                'reciprocal_account' => '3311',
                'debt_side' => '111600000',
                'have_side' => '0',
                'total' => '111600000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '15',
                'number' => '7',
                'building_code' => 'BVE0099',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-20 00:00:00',
                'document_number' => 'PK03/19-0215',
                'explains' => 'BVE0099 Aeon LB S1028 HT tiền mua trụ thép_METAL MART_MM/17P_0000496',
                'reciprocal_account' => '3311',
                'debt_side' => '7600000',
                'have_side' => '7800000',
                'total' => '-200000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '16',
                'number' => '10',
                'building_code' => 'BVE-92-005',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-21 00:00:00',
                'document_number' => 'PK03/19-0172',
                'explains' => 'BVE-92-005 Aeon LB S5335 HT CPLĐ theo PO BUNKA/2018/576 ngày 8.1.2019_T',
                'reciprocal_account' => '3311',
                'debt_side' => '35000000',
                'have_side' => '0',
                'total' => '35000000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '17',
                'number' => '7',
                'building_code' => 'BVH9998',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-03-31 00:00:00',
                'document_number' => 'PK03/19-0403',
                'explains' => 'BVH9998 WFC S1000 HT chi phí lắp đặt lần 2 theo HĐ: 02.05/HDT-F_HD032',
                'reciprocal_account' => '3311',
                'debt_side' => '2147483647',
                'have_side' => '0',
                'total' => '2147483647',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '18',
                'number' => '7',
                'building_code' => 'BVS0863',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-04-22 00:00:00',
                'document_number' => 'PK04/19-0214',
                'explains' => 'BVS0863 Nipro S1042 Hạch toán tiền vải chống cháy_NISHIO_HD13',
                'reciprocal_account' => '3311',
                'debt_side' => '1800000',
                'have_side' => '0',
                'total' => '1800000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '19',
                'number' => '10',
                'building_code' => 'BVS-91-009',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-05-01 00:00:00',
                'document_number' => 'PK05/19-0066',
                'explains' => 'BVS-91-009 Nipro S1028 HT 100% HĐ:10032019/BK-MM_METAL-M_HD002',
                'reciprocal_account' => '3311',
                'debt_side' => '21400000',
                'have_side' => '0',
                'total' => '21400000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '20',
                'number' => '8',
                'building_code' => 'BVE0041A',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-05-06 00:00:00',
                'document_number' => 'PK05/19-0050',
                'explains' => 'BVE0041A  S1037 HT mua bộ Dorma PR110 (Khóa tay gạt, thân khóa)_HD105',
                'reciprocal_account' => '3311',
                'debt_side' => '3000000',
                'have_side' => '0',
                'total' => '3000000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '21',
                'number' => '10',
                'building_code' => 'BVE-91-001',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-05-06 00:00:00',
                'document_number' => 'PK05/19-0134',
                'explains' => 'BVE-91-001 S01068 HTchi phí dự án nhà để xe cao tầng_P-SMART_HD62',
                'reciprocal_account' => '3311',
                'debt_side' => '119510000',
                'have_side' => '0',
                'total' => '119510000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '22',
                'number' => '10',
                'building_code' => 'BVH-93-006',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-01 00:00:00',
                'document_number' => 'PK06/19-0009',
                'explains' => 'BVH-93-006  Haseko S542 HT mua kính_Eurowindow_HD3931',
                'reciprocal_account' => '3311',
                'debt_side' => '2880113',
                'have_side' => '0',
                'total' => '2880113',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '23',
                'number' => '10',
                'building_code' => 'BVS-97-009',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-01 00:00:00',
                'document_number' => 'PK06/19-0063',
                'explains' => 'BVS-97-009 Z1 S01085 HT tiền dặm vá cửa_DAI TRUNG THUC__HD34618',
                'reciprocal_account' => '3311',
                'debt_side' => '80000000',
                'have_side' => '0',
                'total' => '80000000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '24',
                'number' => '8',
                'building_code' => 'BVS0863A',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-01 00:00:00',
                'document_number' => 'PK06/19-0267',
                'explains' => 'BVS0863A Nipro S1087 HT tiền thuê thiết bị làm việc_U-MAC_HD2339',
                'reciprocal_account' => '3311',
                'debt_side' => '25000000',
                'have_side' => '0',
                'total' => '25000000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '25',
                'number' => '10',
                'building_code' => 'BVH-91-011',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-05 00:00:00',
                'document_number' => 'PK06/19-0041',
                'explains' => 'BVH-91-011 S00155 HT tiền mua bản lề cho CT_SON HA__HD415',
                'reciprocal_account' => '3311',
                'debt_side' => '24720000',
                'have_side' => '0',
                'total' => '24720000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '26',
                'number' => '10',
                'building_code' => 'BVS-92-002',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-10 00:00:00',
                'document_number' => 'PK06/19-0057',
                'explains' => 'BVS-92-002 S500 HT TT 40% giá trị HD TPBK/060619_TIEN PHONG_HD581',
                'reciprocal_account' => '3311',
                'debt_side' => '268000000',
                'have_side' => '0',
                'total' => '268000000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '27',
                'number' => '10',
                'building_code' => 'BVE-92-008',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-13 00:00:00',
                'document_number' => 'PK06/19-0036',
                'explains' => 'BVE-92-008 S00542 HT tiền kua kính cho CT_EUROWINDOW__HD185',
                'reciprocal_account' => '3311',
                'debt_side' => '243465205',
                'have_side' => '0',
                'total' => '243465205',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '28',
                'number' => '7',
                'building_code' => 'BVH1691',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-15 00:00:00',
                'document_number' => 'PK06/19-0065',
                'explains' => 'BVH1691 YKK Hà Nam S480 HT tiền mua bộ lưu điện_APOLLO_HD727',
                'reciprocal_account' => '3311',
                'debt_side' => '11200000',
                'have_side' => '0',
                'total' => '11200000',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '29',
                'number' => '10',
                'building_code' => 'BVH-93-013',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-17 00:00:00',
                'document_number' => 'PK06/19-0362',
                'explains' => 'BVH-93-013 Haseko S542 HT tiền mua vật tư và CPVC_EUROWINDOW_HD227',
                'reciprocal_account' => '3311',
                'debt_side' => '8882331',
                'have_side' => '0',
                'total' => '8882331',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '30',
                'number' => '10',
                'building_code' => 'BVS-97-004',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-29 00:00:00',
                'document_number' => 'PK06/19-0289',
                'explains' => 'BVS-97-004 Peb Steel  S241 HT tiền CPVC tháng 06.2019_NEWPOST_HD2542',
                'reciprocal_account' => '3311',
                'debt_side' => '1136484',
                'have_side' => '0',
                'total' => '1136484',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

            [
                'id' => '31',
                'number' => '7',
                'building_code' => 'BVS0795',
                'back_order' => '0',
                'sales' => '1',
                'document_date' => '2019-06-29 00:00:00',
                'document_number' => 'PK06/19-0289',
                'explains' => 'BVS0795 Mabuchi S241 HT tiền CPVC tháng 06.2019_NEWPOST_HD2542',
                'reciprocal_account' => '3311',
                'debt_side' => '476915',
                'have_side' => '0',
                'total' => '476915',
                'created_at' => '2019-07-24 10:04:41',
                'updated_at' => '2019-07-24 10:04:41',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("purchase_fee_outside_new", $item);
        }
    }

}