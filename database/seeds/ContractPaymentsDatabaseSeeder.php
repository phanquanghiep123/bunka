<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ContractPaymentsDatabaseSeeder extends Seeder
{

	use SeederHelper;

    public function run()
    {

        $data = [

            [
<<<<<<< HEAD
                'id' => '2',
                'contract_id' => '15',
                'periods_id' => '11',
                'from' => null,
                'to' => null,
                'date' => '2019-07-06 10:21:50',
                'payment_amount' => '100000000',
                'receipts' => '["adventure-blue-sky-boat-2115578.jpg","bg-eco.jpg","close-up-colors-landscape-2099541.jpg"]',
                'created_at' => '2019-07-06 10:21:50',
                'updated_at' => '2019-07-06 10:21:50',
=======
                'id' => '1',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:14:07',
                'payment_amount' => '4294967295',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:14:07',
                'updated_at' => '2019-07-18 11:14:07',
            ],

            [
                'id' => '2',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:14:47',
                'payment_amount' => '4294967295',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:14:47',
                'updated_at' => '2019-07-18 11:14:47',
>>>>>>> origin/develop-bad_or_best
            ],

            [
                'id' => '3',
<<<<<<< HEAD
                'contract_id' => '15',
                'periods_id' => '11',
                'from' => null,
                'to' => null,
                'date' => '2019-07-12 11:15:12',
                'payment_amount' => '1000000000',
                'receipts' => '["TheSpring-devnotes.pdf"]',
                'created_at' => '2019-07-09 11:15:12',
                'updated_at' => '2019-07-09 11:15:12',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:15:03',
                'payment_amount' => '4294967295',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:15:03',
                'updated_at' => '2019-07-18 11:15:03',
>>>>>>> origin/develop-bad_or_best
            ],

            [
                'id' => '4',
<<<<<<< HEAD
                'contract_id' => '15',
                'periods_id' => '11',
                'from' => null,
                'to' => null,
                'date' => '2019-07-13 11:21:37',
                'payment_amount' => '1000000000',
                'receipts' => '["DIRTTGalleryProject21_Photo05.jpg"]',
                'created_at' => '2019-07-09 11:21:37',
                'updated_at' => '2019-07-09 11:21:37',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:15:37',
                'payment_amount' => '4294967295',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:15:37',
                'updated_at' => '2019-07-18 11:15:37',
>>>>>>> origin/develop-bad_or_best
            ],

            [
                'id' => '5',
<<<<<<< HEAD
                'contract_id' => '15',
                'periods_id' => '11',
                'from' => null,
                'to' => null,
                'date' => '2019-07-14 11:21:37',
                'payment_amount' => '1000000000',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:16:52',
                'payment_amount' => '12999',
>>>>>>> origin/develop-bad_or_best
                'receipts' => '[""]',
                'created_at' => '2019-07-09 11:21:37',
                'updated_at' => '2019-07-09 11:21:37',
            ],

            [
                'id' => '6',
<<<<<<< HEAD
                'contract_id' => '15',
                'periods_id' => '12',
                'from' => null,
                'to' => null,
                'date' => '2019-07-09 11:24:47',
                'payment_amount' => '1000000000',
                'receipts' => '["1537935128-product-shae-store-4.jpg","1537935136-product-shae-store-5.jpg","1537935143-product-shae-store-6.jpg"]',
                'created_at' => '2019-07-09 11:24:47',
                'updated_at' => '2019-07-09 11:24:47',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:17:30',
                'payment_amount' => '4294967295',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:17:30',
                'updated_at' => '2019-07-18 11:17:30',
>>>>>>> origin/develop-bad_or_best
            ],

            [
                'id' => '7',
<<<<<<< HEAD
                'contract_id' => '15',
                'periods_id' => '12',
                'from' => null,
                'to' => null,
                'date' => '2019-07-10 11:24:47',
                'payment_amount' => '1000000000',
                'receipts' => '["DIRTT-Architectural-Solutions-Primary-Image_a4e97dd0a828fbd49085d6ce30571158.jpg","DIRTTGalleryProject21_Photo05.jpg"]',
                'created_at' => '2019-07-09 11:24:47',
                'updated_at' => '2019-07-09 11:24:47',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 11:19:31',
                'payment_amount' => '9999999999',
                'receipts' => '[""]',
                'created_at' => '2019-07-18 11:19:31',
                'updated_at' => '2019-07-18 11:19:31',
>>>>>>> origin/develop-bad_or_best
            ],

            [
                'id' => '8',
<<<<<<< HEAD
                'contract_id' => '18',
                'periods_id' => '17',
                'from' => null,
                'to' => null,
                'date' => '2019-07-24 08:32:06',
                'payment_amount' => '100000000',
                'receipts' => '[""]',
                'created_at' => '2019-07-24 08:32:06',
                'updated_at' => '2019-07-24 08:32:06',
=======
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:31:36',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:31:36',
                'updated_at' => '2019-07-19 08:31:36',
            ],

            [
                'id' => '9',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:31:43',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:31:43',
                'updated_at' => '2019-07-19 08:31:43',
            ],

            [
                'id' => '10',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:33:45',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:33:45',
                'updated_at' => '2019-07-19 08:33:45',
            ],

            [
                'id' => '11',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:33:48',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:33:48',
                'updated_at' => '2019-07-19 08:33:48',
            ],

            [
                'id' => '12',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:34:08',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:34:08',
                'updated_at' => '2019-07-19 08:34:08',
            ],

            [
                'id' => '13',
                'contract_id' => '1',
                'periods_id' => '1',
                'from' => date('Y-m-d H:i:s'),
                'to' => date('Y-m-d H:i:s', strtotime( '+1 weeks' )),
                'date' => '2019-07-18 08:34:11',
                'payment_amount' => '5465464565',
                'receipts' => '["erweu-e-weeecs-sDD\u0111.pdf"]',
                'created_at' => '2019-07-19 08:34:11',
                'updated_at' => '2019-07-19 08:34:11',
>>>>>>> origin/develop-bad_or_best
            ],

        ];

        foreach($data as $item)
        {
            $this->saveData("contract_payments", $item);
        }
    }

}