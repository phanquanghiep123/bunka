<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class StatusLanguageDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '4',
                'lang_id' => '2',
                'bind_key' => '19',
                'name' => 'Chấp nhận',
                'description' => null,
                'created_at' => '2019-05-03 10:57:57',
                'updated_at' => '2019-06-21 01:29:13',
            ],

            [
                'id' => '5',
                'lang_id' => '3',
                'bind_key' => '19',
                'name' => 'Accepted',
                'description' => null,
                'created_at' => '2019-05-03 10:57:57',
                'updated_at' => '2019-06-21 01:29:13',
            ],

            [
                'id' => '6',
                'lang_id' => '4',
                'bind_key' => '19',
                'name' => '受け入れ済み',
                'description' => null,
                'created_at' => '2019-05-03 10:57:57',
                'updated_at' => '2019-06-21 01:29:13',
            ],

            [
                'id' => '7',
                'lang_id' => '2',
                'bind_key' => '25',
                'name' => 'Hoạt động',
                'description' => null,
                'created_at' => '2019-05-03 11:16:04',
                'updated_at' => '2019-05-03 11:16:04',
            ],

            [
                'id' => '8',
                'lang_id' => '3',
                'bind_key' => '25',
                'name' => 'Active',
                'description' => null,
                'created_at' => '2019-05-03 11:16:04',
                'updated_at' => '2019-05-03 11:16:04',
            ],

            [
                'id' => '9',
                'lang_id' => '4',
                'bind_key' => '25',
                'name' => 'アクティブ',
                'description' => null,
                'created_at' => '2019-05-03 11:16:04',
                'updated_at' => '2019-05-03 11:16:04',
            ],

            [
                'id' => '10',
                'lang_id' => '2',
                'bind_key' => '26',
                'name' => 'Vô hiệu hóa',
                'description' => null,
                'created_at' => '2019-05-03 11:17:16',
                'updated_at' => '2019-05-03 11:17:16',
            ],

            [
                'id' => '11',
                'lang_id' => '3',
                'bind_key' => '26',
                'name' => 'Deactive',
                'description' => null,
                'created_at' => '2019-05-03 11:17:16',
                'updated_at' => '2019-05-03 11:17:16',
            ],

            [
                'id' => '12',
                'lang_id' => '4',
                'bind_key' => '26',
                'name' => '非アクティブ',
                'description' => null,
                'created_at' => '2019-05-03 11:17:16',
                'updated_at' => '2019-05-03 11:17:16',
            ],

            [
                'id' => '19',
                'lang_id' => '2',
                'bind_key' => '23',
                'name' => 'Đang chờ xác nhận',
                'description' => null,
                'created_at' => '2019-05-03 11:24:46',
                'updated_at' => '2019-06-20 11:17:40',
            ],

            [
                'id' => '20',
                'lang_id' => '3',
                'bind_key' => '23',
                'name' => 'Awaiting approval',
                'description' => null,
                'created_at' => '2019-05-03 11:24:46',
                'updated_at' => '2019-06-20 11:17:40',
            ],

            [
                'id' => '21',
                'lang_id' => '4',
                'bind_key' => '23',
                'name' => '確認待ち',
                'description' => null,
                'created_at' => '2019-05-03 11:24:46',
                'updated_at' => '2019-06-20 11:17:40',
            ],

            [
                'id' => '22',
                'lang_id' => '2',
                'bind_key' => '24',
                'name' => 'Bị từ chối',
                'description' => null,
                'created_at' => '2019-05-03 11:25:36',
                'updated_at' => '2019-06-20 11:17:49',
            ],

            [
                'id' => '23',
                'lang_id' => '3',
                'bind_key' => '24',
                'name' => 'Rejected',
                'description' => null,
                'created_at' => '2019-05-03 11:25:36',
                'updated_at' => '2019-06-20 11:17:49',
            ],

            [
                'id' => '24',
                'lang_id' => '4',
                'bind_key' => '24',
                'name' => '拒否されました',
                'description' => null,
                'created_at' => '2019-05-03 11:25:36',
                'updated_at' => '2019-06-20 11:17:49',
            ],

            [
                'id' => '31',
                'lang_id' => '2',
                'bind_key' => '32',
                'name' => 'Nháp',
                'description' => null,
                'created_at' => '2019-06-07 09:46:14',
                'updated_at' => '2019-06-07 09:46:14',
            ],

            [
                'id' => '32',
                'lang_id' => '3',
                'bind_key' => '32',
                'name' => 'Draft (New)',
                'description' => null,
                'created_at' => '2019-06-07 09:46:14',
                'updated_at' => '2019-06-08 08:08:13',
            ],

            [
                'id' => '33',
                'lang_id' => '4',
                'bind_key' => '32',
                'name' => 'ドラフト',
                'description' => null,
                'created_at' => '2019-06-07 09:46:14',
                'updated_at' => '2019-06-07 09:46:14',
            ],

            [
                'id' => '34',
                'lang_id' => '2',
                'bind_key' => '33',
                'name' => 'Đã tạo đơn hàng',
                'description' => null,
                'created_at' => '2019-06-10 08:38:57',
                'updated_at' => '2019-06-21 01:29:20',
            ],

            [
                'id' => '35',
                'lang_id' => '3',
                'bind_key' => '33',
                'name' => 'Created Order',
                'description' => null,
                'created_at' => '2019-06-10 08:38:57',
                'updated_at' => '2019-06-21 01:29:20',
            ],

            [
                'id' => '36',
                'lang_id' => '4',
                'bind_key' => '33',
                'name' => '作成した注文',
                'description' => null,
                'created_at' => '2019-06-10 08:38:57',
                'updated_at' => '2019-06-21 01:29:20',
            ],

            [
                'id' => '37',
                'lang_id' => '2',
                'bind_key' => '36',
                'name' => 'Nháp',
                'description' => null,
                'created_at' => '2019-06-10 10:22:08',
                'updated_at' => '2019-06-10 10:22:08',
            ],

            [
                'id' => '38',
                'lang_id' => '3',
                'bind_key' => '36',
                'name' => 'Draft (New)',
                'description' => null,
                'created_at' => '2019-06-10 10:22:08',
                'updated_at' => '2019-06-10 10:22:08',
            ],

            [
                'id' => '39',
                'lang_id' => '4',
                'bind_key' => '36',
                'name' => 'ドラフト（新）',
                'description' => null,
                'created_at' => '2019-06-10 10:22:08',
                'updated_at' => '2019-06-10 10:22:08',
            ],

            [
                'id' => '40',
                'lang_id' => '2',
                'bind_key' => '37',
                'name' => 'Đang chờ phê duyệt',
                'description' => null,
                'created_at' => '2019-06-10 10:24:31',
                'updated_at' => '2019-06-21 09:36:55',
            ],

            [
                'id' => '41',
                'lang_id' => '3',
                'bind_key' => '37',
                'name' => 'Awaiting approval',
                'description' => null,
                'created_at' => '2019-06-10 10:24:31',
                'updated_at' => '2019-06-21 09:36:55',
            ],

            [
                'id' => '42',
                'lang_id' => '4',
                'bind_key' => '37',
                'name' => '承認待ち',
                'description' => null,
                'created_at' => '2019-06-10 10:24:31',
                'updated_at' => '2019-06-21 09:36:55',
            ],

            [
                'id' => '43',
                'lang_id' => '2',
                'bind_key' => '38',
                'name' => 'Chấp nhận',
                'description' => null,
                'created_at' => '2019-06-10 10:25:28',
                'updated_at' => '2019-06-21 09:37:15',
            ],

            [
                'id' => '44',
                'lang_id' => '3',
                'bind_key' => '38',
                'name' => 'Accepted',
                'description' => null,
                'created_at' => '2019-06-10 10:25:28',
                'updated_at' => '2019-06-21 09:37:15',
            ],

            [
                'id' => '45',
                'lang_id' => '4',
                'bind_key' => '38',
                'name' => '受け入れ済み',
                'description' => null,
                'created_at' => '2019-06-10 10:25:28',
                'updated_at' => '2019-06-21 09:37:15',
            ],

            [
                'id' => '46',
                'lang_id' => '2',
                'bind_key' => '39',
                'name' => 'Đã tạo hợp đồng',
                'description' => null,
                'created_at' => '2019-06-10 10:26:42',
                'updated_at' => '2019-06-21 09:37:20',
            ],

            [
                'id' => '47',
                'lang_id' => '3',
                'bind_key' => '39',
                'name' => 'Created contract',
                'description' => null,
                'created_at' => '2019-06-10 10:26:42',
                'updated_at' => '2019-06-21 09:37:21',
            ],

            [
                'id' => '48',
                'lang_id' => '4',
                'bind_key' => '39',
                'name' => '作成した契約',
                'description' => null,
                'created_at' => '2019-06-10 10:26:42',
                'updated_at' => '2019-06-21 09:37:21',
            ],

            [
                'id' => '49',
                'lang_id' => '2',
                'bind_key' => '40',
                'name' => 'Từ chối',
                'description' => null,
                'created_at' => '2019-06-10 10:28:17',
                'updated_at' => '2019-07-15 02:41:01',
            ],

            [
                'id' => '50',
                'lang_id' => '3',
                'bind_key' => '40',
                'name' => 'Rejected',
                'description' => null,
                'created_at' => '2019-06-10 10:28:17',
                'updated_at' => '2019-07-15 02:41:02',
            ],

            [
                'id' => '51',
                'lang_id' => '4',
                'bind_key' => '40',
                'name' => '拒否されました',
                'description' => null,
                'created_at' => '2019-06-10 10:28:17',
                'updated_at' => '2019-07-15 02:41:02',
            ],

            [
                'id' => '52',
                'lang_id' => '2',
                'bind_key' => '41',
                'name' => 'Đang xây dựng',
                'description' => null,
                'created_at' => '2019-06-10 10:30:24',
                'updated_at' => '2019-06-21 09:37:32',
            ],

            [
                'id' => '53',
                'lang_id' => '3',
                'bind_key' => '41',
                'name' => 'Under construction',
                'description' => null,
                'created_at' => '2019-06-10 10:30:24',
                'updated_at' => '2019-06-21 09:37:32',
            ],

            [
                'id' => '54',
                'lang_id' => '4',
                'bind_key' => '41',
                'name' => '工事中',
                'description' => null,
                'created_at' => '2019-06-10 10:30:24',
                'updated_at' => '2019-06-21 09:37:32',
            ],

            [
                'id' => '55',
                'lang_id' => '2',
                'bind_key' => '42',
                'name' => 'Hoàn thành',
                'description' => null,
                'created_at' => '2019-06-10 10:31:47',
                'updated_at' => '2019-07-15 02:40:52',
            ],

            [
                'id' => '56',
                'lang_id' => '3',
                'bind_key' => '42',
                'name' => 'Completed',
                'description' => null,
                'created_at' => '2019-06-10 10:31:47',
                'updated_at' => '2019-07-15 02:40:52',
            ],

            [
                'id' => '57',
                'lang_id' => '4',
                'bind_key' => '42',
                'name' => '完了しました',
                'description' => null,
                'created_at' => '2019-06-10 10:31:47',
                'updated_at' => '2019-07-15 02:40:52',
            ],

            [
                'id' => '58',
                'lang_id' => '2',
                'bind_key' => '43',
                'name' => 'Nháp',
                'description' => null,
                'created_at' => '2019-06-12 07:57:41',
                'updated_at' => '2019-06-12 07:57:41',
            ],

            [
                'id' => '59',
                'lang_id' => '3',
                'bind_key' => '43',
                'name' => 'Draft (New)',
                'description' => null,
                'created_at' => '2019-06-12 07:57:41',
                'updated_at' => '2019-06-12 07:57:41',
            ],

            [
                'id' => '60',
                'lang_id' => '4',
                'bind_key' => '43',
                'name' => 'ドラフト',
                'description' => null,
                'created_at' => '2019-06-12 07:57:41',
                'updated_at' => '2019-06-12 07:57:41',
            ],

            [
                'id' => '61',
                'lang_id' => '2',
                'bind_key' => '44',
                'name' => 'Công khai',
                'description' => null,
                'created_at' => '2019-06-12 08:16:14',
                'updated_at' => '2019-06-19 04:49:41',
            ],

            [
                'id' => '62',
                'lang_id' => '3',
                'bind_key' => '44',
                'name' => 'Public',
                'description' => null,
                'created_at' => '2019-06-12 08:16:14',
                'updated_at' => '2019-06-12 08:16:14',
            ],

            [
                'id' => '63',
                'lang_id' => '4',
                'bind_key' => '44',
                'name' => '一般公開',
                'description' => null,
                'created_at' => '2019-06-12 08:16:14',
                'updated_at' => '2019-06-12 08:16:14',
            ],

            [
                'id' => '65',
                'lang_id' => '2',
                'bind_key' => '45',
                'name' => 'Hoạt động',
                'description' => null,
                'created_at' => '2019-06-19 10:01:20',
                'updated_at' => '2019-06-19 10:01:20',
            ],

            [
                'id' => '66',
                'lang_id' => '3',
                'bind_key' => '45',
                'name' => 'Active',
                'description' => null,
                'created_at' => '2019-06-19 10:01:20',
                'updated_at' => '2019-06-19 10:01:20',
            ],

            [
                'id' => '67',
                'lang_id' => '4',
                'bind_key' => '45',
                'name' => 'アクティブ',
                'description' => null,
                'created_at' => '2019-06-19 10:01:20',
                'updated_at' => '2019-06-19 10:01:20',
            ],

            [
                'id' => '68',
                'lang_id' => '2',
                'bind_key' => '46',
                'name' => 'Vô hiệu hóa',
                'description' => null,
                'created_at' => '2019-06-19 10:02:46',
                'updated_at' => '2019-06-19 10:02:46',
            ],

            [
                'id' => '69',
                'lang_id' => '3',
                'bind_key' => '46',
                'name' => 'Deactive',
                'description' => null,
                'created_at' => '2019-06-19 10:02:46',
                'updated_at' => '2019-06-19 10:02:46',
            ],

            [
                'id' => '70',
                'lang_id' => '4',
                'bind_key' => '46',
                'name' => '非アクティブ',
                'description' => null,
                'created_at' => '2019-06-19 10:02:46',
                'updated_at' => '2019-06-19 10:02:46',
            ],

            [
                'id' => '71',
                'lang_id' => '2',
                'bind_key' => '47',
                'name' => 'Hoạt động',
                'description' => null,
                'created_at' => '2019-06-26 03:37:36',
                'updated_at' => '2019-06-26 03:37:36',
            ],

            [
                'id' => '72',
                'lang_id' => '3',
                'bind_key' => '47',
                'name' => 'Active',
                'description' => null,
                'created_at' => '2019-06-26 03:37:36',
                'updated_at' => '2019-06-26 03:37:36',
            ],

            [
                'id' => '73',
                'lang_id' => '4',
                'bind_key' => '47',
                'name' => 'アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 03:37:36',
                'updated_at' => '2019-06-26 03:37:36',
            ],

            [
                'id' => '74',
                'lang_id' => '2',
                'bind_key' => '48',
                'name' => 'Vô hiệu hóa',
                'description' => null,
                'created_at' => '2019-06-26 03:38:37',
                'updated_at' => '2019-06-26 03:38:37',
            ],

            [
                'id' => '75',
                'lang_id' => '3',
                'bind_key' => '48',
                'name' => 'Deactive',
                'description' => null,
                'created_at' => '2019-06-26 03:38:37',
                'updated_at' => '2019-06-26 03:38:37',
            ],

            [
                'id' => '76',
                'lang_id' => '4',
                'bind_key' => '48',
                'name' => '非アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 03:38:37',
                'updated_at' => '2019-06-26 03:38:37',
            ],

            [
                'id' => '77',
                'lang_id' => '2',
                'bind_key' => '49',
                'name' => 'Hoạt động',
                'description' => null,
                'created_at' => '2019-06-26 08:50:00',
                'updated_at' => '2019-06-26 08:50:00',
            ],

            [
                'id' => '78',
                'lang_id' => '3',
                'bind_key' => '49',
                'name' => 'Active',
                'description' => null,
                'created_at' => '2019-06-26 08:50:00',
                'updated_at' => '2019-06-26 08:50:00',
            ],

            [
                'id' => '79',
                'lang_id' => '4',
                'bind_key' => '49',
                'name' => 'アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 08:50:00',
                'updated_at' => '2019-06-26 08:50:00',
            ],

            [
                'id' => '80',
                'lang_id' => '2',
                'bind_key' => '50',
                'name' => 'Vô hiệu hóa',
                'description' => null,
                'created_at' => '2019-06-26 08:50:46',
                'updated_at' => '2019-06-26 08:50:46',
            ],

            [
                'id' => '81',
                'lang_id' => '3',
                'bind_key' => '50',
                'name' => 'Deactive',
                'description' => null,
                'created_at' => '2019-06-26 08:50:46',
                'updated_at' => '2019-06-26 08:50:46',
            ],

            [
                'id' => '82',
                'lang_id' => '4',
                'bind_key' => '50',
                'name' => '非アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 08:50:46',
                'updated_at' => '2019-06-26 08:50:46',
            ],

            [
                'id' => '83',
                'lang_id' => '2',
                'bind_key' => '51',
                'name' => 'Hoạt động',
                'description' => null,
                'created_at' => '2019-06-26 08:51:36',
                'updated_at' => '2019-06-26 08:51:36',
            ],

            [
                'id' => '84',
                'lang_id' => '3',
                'bind_key' => '51',
                'name' => 'Active',
                'description' => null,
                'created_at' => '2019-06-26 08:51:36',
                'updated_at' => '2019-06-26 08:51:36',
            ],

            [
                'id' => '85',
                'lang_id' => '4',
                'bind_key' => '51',
                'name' => 'アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 08:51:36',
                'updated_at' => '2019-06-26 08:51:36',
            ],

            [
                'id' => '86',
                'lang_id' => '2',
                'bind_key' => '52',
                'name' => 'Vô hiệu hóa',
                'description' => null,
                'created_at' => '2019-06-26 08:52:48',
                'updated_at' => '2019-06-26 08:52:48',
            ],

            [
                'id' => '87',
                'lang_id' => '3',
                'bind_key' => '52',
                'name' => 'Deactive',
                'description' => null,
                'created_at' => '2019-06-26 08:52:48',
                'updated_at' => '2019-06-26 08:52:48',
            ],

            [
                'id' => '88',
                'lang_id' => '4',
                'bind_key' => '52',
                'name' => '非アクティブ',
                'description' => null,
                'created_at' => '2019-06-26 08:52:48',
                'updated_at' => '2019-06-26 08:52:48',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("status_language", $item);
        }
    }

}