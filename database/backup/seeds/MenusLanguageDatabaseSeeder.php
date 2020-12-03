<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class MenusLanguageDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '64',
                'lang_id' => '2',
                'bind_key' => '38',
                'name' => 'Quản lý tài khoản',
                'description' => null,
                'created_at' => '2019-06-18 01:52:20',
                'updated_at' => '2019-06-18 01:52:20',
            ],

            [
                'id' => '65',
                'lang_id' => '3',
                'bind_key' => '38',
                'name' => 'Manage accounts',
                'description' => null,
                'created_at' => '2019-06-18 01:52:20',
                'updated_at' => '2019-06-18 01:52:20',
            ],

            [
                'id' => '66',
                'lang_id' => '4',
                'bind_key' => '38',
                'name' => 'アカウントを管理する',
                'description' => null,
                'created_at' => '2019-06-18 01:52:21',
                'updated_at' => '2019-06-18 01:52:21',
            ],

            [
                'id' => '67',
                'lang_id' => '2',
                'bind_key' => '39',
                'name' => 'Đổi mật khẩu',
                'description' => null,
                'created_at' => '2019-06-18 02:06:13',
                'updated_at' => '2019-06-18 02:06:13',
            ],

            [
                'id' => '68',
                'lang_id' => '3',
                'bind_key' => '39',
                'name' => 'Change password',
                'description' => null,
                'created_at' => '2019-06-18 02:06:13',
                'updated_at' => '2019-06-18 02:06:13',
            ],

            [
                'id' => '69',
                'lang_id' => '4',
                'bind_key' => '39',
                'name' => 'パスワードを変更する',
                'description' => null,
                'created_at' => '2019-06-18 02:06:13',
                'updated_at' => '2019-06-18 02:06:13',
            ],

            [
                'id' => '70',
                'lang_id' => '2',
                'bind_key' => '40',
                'name' => 'Kiểm tra hộp thư đến',
                'description' => null,
                'created_at' => '2019-06-18 02:06:51',
                'updated_at' => '2019-06-18 02:06:51',
            ],

            [
                'id' => '71',
                'lang_id' => '3',
                'bind_key' => '40',
                'name' => 'Check inbox',
                'description' => null,
                'created_at' => '2019-06-18 02:06:51',
                'updated_at' => '2019-06-18 02:06:51',
            ],

            [
                'id' => '72',
                'lang_id' => '4',
                'bind_key' => '40',
                'name' => '受信トレイをチェック',
                'description' => null,
                'created_at' => '2019-06-18 02:06:51',
                'updated_at' => '2019-06-18 02:06:51',
            ],

            [
                'id' => '73',
                'lang_id' => '2',
                'bind_key' => '41',
                'name' => 'Đăng xuất',
                'description' => null,
                'created_at' => '2019-06-18 02:07:38',
                'updated_at' => '2019-06-18 02:07:38',
            ],

            [
                'id' => '74',
                'lang_id' => '3',
                'bind_key' => '41',
                'name' => 'Sign out',
                'description' => null,
                'created_at' => '2019-06-18 02:07:39',
                'updated_at' => '2019-06-18 02:07:39',
            ],

            [
                'id' => '75',
                'lang_id' => '4',
                'bind_key' => '41',
                'name' => 'サインアウト',
                'description' => null,
                'created_at' => '2019-06-18 02:07:39',
                'updated_at' => '2019-06-18 02:07:39',
            ],

            [
                'id' => '76',
                'lang_id' => '2',
                'bind_key' => '2',
                'name' => '[_dashboard_]',
                'description' => null,
                'created_at' => '2019-06-18 02:08:58',
                'updated_at' => '2019-06-27 03:30:20',
            ],

            [
                'id' => '77',
                'lang_id' => '3',
                'bind_key' => '2',
                'name' => '[_dashboard_]',
                'description' => null,
                'created_at' => '2019-06-18 02:08:58',
                'updated_at' => '2019-06-27 03:30:20',
            ],

            [
                'id' => '78',
                'lang_id' => '4',
                'bind_key' => '2',
                'name' => '[_dashboard_]',
                'description' => null,
                'created_at' => '2019-06-18 02:08:58',
                'updated_at' => '2019-06-27 03:30:20',
            ],

            [
                'id' => '79',
                'lang_id' => '2',
                'bind_key' => '53',
                'name' => '_quotation_',
                'description' => null,
                'created_at' => '2019-06-18 02:10:27',
                'updated_at' => '2019-06-21 09:10:00',
            ],

            [
                'id' => '80',
                'lang_id' => '3',
                'bind_key' => '53',
                'name' => '_quotation_',
                'description' => null,
                'created_at' => '2019-06-18 02:10:27',
                'updated_at' => '2019-06-21 09:10:00',
            ],

            [
                'id' => '81',
                'lang_id' => '4',
                'bind_key' => '53',
                'name' => '_quotation_',
                'description' => null,
                'created_at' => '2019-06-18 02:10:27',
                'updated_at' => '2019-06-21 09:10:00',
            ],

            [
                'id' => '82',
                'lang_id' => '2',
                'bind_key' => '54',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:11:40',
                'updated_at' => '2019-06-21 09:15:20',
            ],

            [
                'id' => '83',
                'lang_id' => '3',
                'bind_key' => '54',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:11:41',
                'updated_at' => '2019-06-21 09:15:20',
            ],

            [
                'id' => '84',
                'lang_id' => '4',
                'bind_key' => '54',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:11:41',
                'updated_at' => '2019-06-21 09:15:20',
            ],

            [
                'id' => '85',
                'lang_id' => '2',
                'bind_key' => '55',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:06',
                'updated_at' => '2019-06-21 09:12:32',
            ],

            [
                'id' => '86',
                'lang_id' => '3',
                'bind_key' => '55',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:06',
                'updated_at' => '2019-06-21 09:12:32',
            ],

            [
                'id' => '87',
                'lang_id' => '4',
                'bind_key' => '55',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:06',
                'updated_at' => '2019-06-21 09:12:32',
            ],

            [
                'id' => '88',
                'lang_id' => '2',
                'bind_key' => '49',
                'name' => '[_order_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:35',
                'updated_at' => '2019-06-21 09:17:17',
            ],

            [
                'id' => '89',
                'lang_id' => '3',
                'bind_key' => '49',
                'name' => '[_order_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:35',
                'updated_at' => '2019-06-21 09:17:17',
            ],

            [
                'id' => '90',
                'lang_id' => '4',
                'bind_key' => '49',
                'name' => '[_order_]',
                'description' => null,
                'created_at' => '2019-06-18 02:12:35',
                'updated_at' => '2019-06-21 09:17:17',
            ],

            [
                'id' => '91',
                'lang_id' => '2',
                'bind_key' => '51',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:17',
                'updated_at' => '2019-06-21 09:15:38',
            ],

            [
                'id' => '92',
                'lang_id' => '3',
                'bind_key' => '51',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:17',
                'updated_at' => '2019-06-21 09:15:38',
            ],

            [
                'id' => '93',
                'lang_id' => '4',
                'bind_key' => '51',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:17',
                'updated_at' => '2019-06-21 09:15:39',
            ],

            [
                'id' => '94',
                'lang_id' => '2',
                'bind_key' => '52',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:53',
                'updated_at' => '2019-06-21 09:13:21',
            ],

            [
                'id' => '95',
                'lang_id' => '3',
                'bind_key' => '52',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:53',
                'updated_at' => '2019-06-21 09:13:21',
            ],

            [
                'id' => '96',
                'lang_id' => '4',
                'bind_key' => '52',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-18 02:13:53',
                'updated_at' => '2019-06-21 09:13:21',
            ],

            [
                'id' => '97',
                'lang_id' => '2',
                'bind_key' => '46',
                'name' => '[_contracts_]',
                'description' => null,
                'created_at' => '2019-06-18 02:14:28',
                'updated_at' => '2019-06-21 09:18:25',
            ],

            [
                'id' => '98',
                'lang_id' => '3',
                'bind_key' => '46',
                'name' => '[_contracts_]',
                'description' => null,
                'created_at' => '2019-06-18 02:14:28',
                'updated_at' => '2019-06-21 09:18:25',
            ],

            [
                'id' => '99',
                'lang_id' => '4',
                'bind_key' => '46',
                'name' => '[_contracts_]',
                'description' => null,
                'created_at' => '2019-06-18 02:14:28',
                'updated_at' => '2019-06-21 09:18:26',
            ],

            [
                'id' => '100',
                'lang_id' => '2',
                'bind_key' => '47',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:15:02',
                'updated_at' => '2019-06-21 09:15:52',
            ],

            [
                'id' => '101',
                'lang_id' => '3',
                'bind_key' => '47',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:15:02',
                'updated_at' => '2019-06-21 09:15:52',
            ],

            [
                'id' => '102',
                'lang_id' => '4',
                'bind_key' => '47',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-06-18 02:15:02',
                'updated_at' => '2019-06-21 09:15:52',
            ],

            [
                'id' => '109',
                'lang_id' => '2',
                'bind_key' => '43',
                'name' => '[_all_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:09',
                'updated_at' => '2019-06-26 04:53:43',
            ],

            [
                'id' => '110',
                'lang_id' => '3',
                'bind_key' => '43',
                'name' => '[_all_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:09',
                'updated_at' => '2019-06-26 04:53:43',
            ],

            [
                'id' => '111',
                'lang_id' => '4',
                'bind_key' => '43',
                'name' => '[_all_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:10',
                'updated_at' => '2019-06-26 04:53:44',
            ],

            [
                'id' => '112',
                'lang_id' => '2',
                'bind_key' => '44',
                'name' => '[_add_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:37',
                'updated_at' => '2019-06-26 04:54:42',
            ],

            [
                'id' => '113',
                'lang_id' => '3',
                'bind_key' => '44',
                'name' => '[_add_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:37',
                'updated_at' => '2019-06-26 04:54:42',
            ],

            [
                'id' => '114',
                'lang_id' => '4',
                'bind_key' => '44',
                'name' => '[_add_customer_]',
                'description' => null,
                'created_at' => '2019-06-18 02:17:37',
                'updated_at' => '2019-06-26 04:54:42',
            ],

            [
                'id' => '142',
                'lang_id' => '2',
                'bind_key' => '9',
                'name' => '_user_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:31',
                'updated_at' => '2019-07-01 04:05:16',
            ],

            [
                'id' => '143',
                'lang_id' => '3',
                'bind_key' => '9',
                'name' => '_user_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:31',
                'updated_at' => '2019-07-01 04:05:16',
            ],

            [
                'id' => '144',
                'lang_id' => '4',
                'bind_key' => '9',
                'name' => '_user_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:31',
                'updated_at' => '2019-07-01 04:05:16',
            ],

            [
                'id' => '145',
                'lang_id' => '2',
                'bind_key' => '57',
                'name' => '_status_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:54',
                'updated_at' => '2019-06-21 09:23:07',
            ],

            [
                'id' => '146',
                'lang_id' => '3',
                'bind_key' => '57',
                'name' => '_status_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:54',
                'updated_at' => '2019-06-21 09:23:07',
            ],

            [
                'id' => '147',
                'lang_id' => '4',
                'bind_key' => '57',
                'name' => '_status_',
                'description' => null,
                'created_at' => '2019-06-18 02:22:54',
                'updated_at' => '2019-06-21 09:23:07',
            ],

            [
                'id' => '148',
                'lang_id' => '2',
                'bind_key' => '32',
                'name' => '_MODULES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:06',
                'updated_at' => '2019-06-18 02:23:06',
            ],

            [
                'id' => '149',
                'lang_id' => '3',
                'bind_key' => '32',
                'name' => '_MODULES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:06',
                'updated_at' => '2019-06-18 02:23:06',
            ],

            [
                'id' => '150',
                'lang_id' => '4',
                'bind_key' => '32',
                'name' => '_MODULES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:06',
                'updated_at' => '2019-06-18 02:23:06',
            ],

            [
                'id' => '151',
                'lang_id' => '2',
                'bind_key' => '33',
                'name' => '_ROLES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:19',
                'updated_at' => '2019-06-18 02:23:19',
            ],

            [
                'id' => '152',
                'lang_id' => '3',
                'bind_key' => '33',
                'name' => '_ROLES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:20',
                'updated_at' => '2019-06-18 02:23:20',
            ],

            [
                'id' => '153',
                'lang_id' => '4',
                'bind_key' => '33',
                'name' => '_ROLES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:20',
                'updated_at' => '2019-06-18 02:23:20',
            ],

            [
                'id' => '154',
                'lang_id' => '2',
                'bind_key' => '34',
                'name' => '_LANGUAGES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:38',
                'updated_at' => '2019-06-18 02:23:38',
            ],

            [
                'id' => '155',
                'lang_id' => '3',
                'bind_key' => '34',
                'name' => '_LANGUAGES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:39',
                'updated_at' => '2019-06-18 02:23:39',
            ],

            [
                'id' => '156',
                'lang_id' => '4',
                'bind_key' => '34',
                'name' => '_LANGUAGES_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:39',
                'updated_at' => '2019-06-18 02:23:39',
            ],

            [
                'id' => '157',
                'lang_id' => '2',
                'bind_key' => '37',
                'name' => '_LANGUAGE_LABELS_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:50',
                'updated_at' => '2019-06-18 02:23:50',
            ],

            [
                'id' => '158',
                'lang_id' => '3',
                'bind_key' => '37',
                'name' => '_LANGUAGE_LABELS_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:50',
                'updated_at' => '2019-06-18 02:23:50',
            ],

            [
                'id' => '159',
                'lang_id' => '4',
                'bind_key' => '37',
                'name' => '_LANGUAGE_LABELS_',
                'description' => null,
                'created_at' => '2019-06-18 02:23:50',
                'updated_at' => '2019-06-18 02:23:50',
            ],

            [
                'id' => '160',
                'lang_id' => '2',
                'bind_key' => '35',
                'name' => '[_menu_]',
                'description' => null,
                'created_at' => '2019-06-18 02:24:27',
                'updated_at' => '2019-06-21 09:23:37',
            ],

            [
                'id' => '161',
                'lang_id' => '3',
                'bind_key' => '35',
                'name' => '[_menu_]',
                'description' => null,
                'created_at' => '2019-06-18 02:24:27',
                'updated_at' => '2019-06-21 09:23:37',
            ],

            [
                'id' => '162',
                'lang_id' => '4',
                'bind_key' => '35',
                'name' => '[_menu_]',
                'description' => null,
                'created_at' => '2019-06-18 02:24:27',
                'updated_at' => '2019-06-21 09:23:37',
            ],

            [
                'id' => '163',
                'lang_id' => '2',
                'bind_key' => '58',
                'name' => 'Cấu hình web',
                'description' => null,
                'created_at' => '2019-06-18 02:25:17',
                'updated_at' => '2019-07-01 04:05:05',
            ],

            [
                'id' => '164',
                'lang_id' => '3',
                'bind_key' => '58',
                'name' => 'Web Configs',
                'description' => null,
                'created_at' => '2019-06-18 02:25:17',
                'updated_at' => '2019-07-01 04:05:05',
            ],

            [
                'id' => '165',
                'lang_id' => '4',
                'bind_key' => '58',
                'name' => '設定 App',
                'description' => null,
                'created_at' => '2019-06-18 02:25:17',
                'updated_at' => '2019-07-01 04:05:05',
            ],

            [
                'id' => '190',
                'lang_id' => '2',
                'bind_key' => '10',
                'name' => '[_setting_]',
                'description' => null,
                'created_at' => '2019-06-18 02:42:59',
                'updated_at' => '2019-06-21 09:20:50',
            ],

            [
                'id' => '191',
                'lang_id' => '3',
                'bind_key' => '10',
                'name' => '[_setting_]',
                'description' => null,
                'created_at' => '2019-06-18 02:42:59',
                'updated_at' => '2019-06-21 09:20:50',
            ],

            [
                'id' => '192',
                'lang_id' => '4',
                'bind_key' => '10',
                'name' => '[_setting_]',
                'description' => null,
                'created_at' => '2019-06-18 02:42:59',
                'updated_at' => '2019-06-21 09:20:50',
            ],

            [
                'id' => '202',
                'lang_id' => '2',
                'bind_key' => '62',
                'name' => '[_master_info_]',
                'description' => null,
                'created_at' => '2019-06-18 10:12:51',
                'updated_at' => '2019-07-20 01:42:39',
            ],

            [
                'id' => '203',
                'lang_id' => '3',
                'bind_key' => '62',
                'name' => '[_master_info_]',
                'description' => null,
                'created_at' => '2019-06-18 10:12:51',
                'updated_at' => '2019-07-20 01:42:39',
            ],

            [
                'id' => '204',
                'lang_id' => '4',
                'bind_key' => '62',
                'name' => '[_master_info_]',
                'description' => null,
                'created_at' => '2019-06-18 10:12:51',
                'updated_at' => '2019-07-20 01:42:39',
            ],

            [
                'id' => '205',
                'lang_id' => '2',
                'bind_key' => '63',
                'name' => '[_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:14:02',
                'updated_at' => '2019-07-20 01:45:12',
            ],

            [
                'id' => '206',
                'lang_id' => '3',
                'bind_key' => '63',
                'name' => '[_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:14:02',
                'updated_at' => '2019-07-20 01:45:12',
            ],

            [
                'id' => '207',
                'lang_id' => '4',
                'bind_key' => '63',
                'name' => '[_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:14:02',
                'updated_at' => '2019-07-20 01:45:12',
            ],

            [
                'id' => '214',
                'lang_id' => '2',
                'bind_key' => '66',
                'name' => '[_add_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:19:53',
                'updated_at' => '2019-07-20 01:45:32',
            ],

            [
                'id' => '215',
                'lang_id' => '3',
                'bind_key' => '66',
                'name' => '[_add_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:19:53',
                'updated_at' => '2019-07-20 01:45:32',
            ],

            [
                'id' => '216',
                'lang_id' => '4',
                'bind_key' => '66',
                'name' => '[_add_area_]',
                'description' => null,
                'created_at' => '2019-06-18 10:19:53',
                'updated_at' => '2019-07-20 01:45:32',
            ],

            [
                'id' => '217',
                'lang_id' => '2',
                'bind_key' => '67',
                'name' => 'Email Template',
                'description' => null,
                'created_at' => '2019-06-22 02:31:32',
                'updated_at' => '2019-06-22 02:31:32',
            ],

            [
                'id' => '218',
                'lang_id' => '3',
                'bind_key' => '67',
                'name' => 'Email Template',
                'description' => null,
                'created_at' => '2019-06-22 02:31:33',
                'updated_at' => '2019-06-22 02:31:33',
            ],

            [
                'id' => '219',
                'lang_id' => '4',
                'bind_key' => '67',
                'name' => 'Email Template',
                'description' => null,
                'created_at' => '2019-06-22 02:31:33',
                'updated_at' => '2019-06-22 02:31:33',
            ],

            [
                'id' => '220',
                'lang_id' => '2',
                'bind_key' => '68',
                'name' => '[_all_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:00:06',
                'updated_at' => '2019-06-26 05:00:06',
            ],

            [
                'id' => '221',
                'lang_id' => '3',
                'bind_key' => '68',
                'name' => '[_all_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:00:06',
                'updated_at' => '2019-06-26 05:00:06',
            ],

            [
                'id' => '222',
                'lang_id' => '4',
                'bind_key' => '68',
                'name' => '[_all_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:00:06',
                'updated_at' => '2019-06-26 05:00:06',
            ],

            [
                'id' => '223',
                'lang_id' => '2',
                'bind_key' => '69',
                'name' => '[_create_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:01:28',
                'updated_at' => '2019-06-26 05:01:28',
            ],

            [
                'id' => '224',
                'lang_id' => '3',
                'bind_key' => '69',
                'name' => '[_create_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:01:28',
                'updated_at' => '2019-06-26 05:01:28',
            ],

            [
                'id' => '225',
                'lang_id' => '4',
                'bind_key' => '69',
                'name' => '[_create_construction_]',
                'description' => null,
                'created_at' => '2019-06-26 05:01:28',
                'updated_at' => '2019-06-26 05:01:28',
            ],

            [
                'id' => '226',
                'lang_id' => '2',
                'bind_key' => '70',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-26 08:55:58',
                'updated_at' => '2019-07-16 01:51:51',
            ],

            [
                'id' => '227',
                'lang_id' => '3',
                'bind_key' => '70',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-26 08:55:58',
                'updated_at' => '2019-07-16 01:51:51',
            ],

            [
                'id' => '228',
                'lang_id' => '4',
                'bind_key' => '70',
                'name' => '[_add_new_]',
                'description' => null,
                'created_at' => '2019-06-26 08:55:58',
                'updated_at' => '2019-07-16 01:51:51',
            ],

            [
                'id' => '229',
                'lang_id' => '2',
                'bind_key' => '71',
                'name' => '[_procedure_]',
                'description' => null,
                'created_at' => '2019-06-28 08:39:53',
                'updated_at' => '2019-06-28 08:49:46',
            ],

            [
                'id' => '230',
                'lang_id' => '3',
                'bind_key' => '71',
                'name' => '[_procedure_]',
                'description' => null,
                'created_at' => '2019-06-28 08:39:53',
                'updated_at' => '2019-06-28 08:49:46',
            ],

            [
                'id' => '231',
                'lang_id' => '4',
                'bind_key' => '71',
                'name' => '[_procedure_]',
                'description' => null,
                'created_at' => '2019-06-28 08:39:53',
                'updated_at' => '2019-06-28 08:49:46',
            ],

            [
                'id' => '235',
                'lang_id' => '2',
                'bind_key' => '73',
                'name' => '[_excel_template_]',
                'description' => null,
                'created_at' => '2019-07-03 03:26:59',
                'updated_at' => '2019-07-03 05:01:26',
            ],

            [
                'id' => '236',
                'lang_id' => '3',
                'bind_key' => '73',
                'name' => '[_excel_template_]',
                'description' => null,
                'created_at' => '2019-07-03 03:26:59',
                'updated_at' => '2019-07-03 05:01:26',
            ],

            [
                'id' => '237',
                'lang_id' => '4',
                'bind_key' => '73',
                'name' => '[_excel_template_]',
                'description' => null,
                'created_at' => '2019-07-03 03:26:59',
                'updated_at' => '2019-07-03 05:01:26',
            ],

            [
                'id' => '241',
                'lang_id' => '2',
                'bind_key' => '75',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-07-06 08:59:24',
                'updated_at' => '2019-07-16 03:31:10',
            ],

            [
                'id' => '242',
                'lang_id' => '3',
                'bind_key' => '75',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-07-06 08:59:24',
                'updated_at' => '2019-07-16 03:31:10',
            ],

            [
                'id' => '243',
                'lang_id' => '4',
                'bind_key' => '75',
                'name' => '[_view_all_]',
                'description' => null,
                'created_at' => '2019-07-06 08:59:24',
                'updated_at' => '2019-07-16 03:31:10',
            ],

            [
                'id' => '244',
                'lang_id' => '2',
                'bind_key' => '76',
                'name' => 'Lớp vật phẩm',
                'description' => null,
                'created_at' => '2019-07-06 09:02:44',
                'updated_at' => '2019-07-20 02:34:48',
            ],

            [
                'id' => '245',
                'lang_id' => '3',
                'bind_key' => '76',
                'name' => 'Item Class',
                'description' => null,
                'created_at' => '2019-07-06 09:02:44',
                'updated_at' => '2019-07-20 02:34:48',
            ],

            [
                'id' => '246',
                'lang_id' => '4',
                'bind_key' => '76',
                'name' => 'Item Class',
                'description' => null,
                'created_at' => '2019-07-06 09:02:44',
                'updated_at' => '2019-07-20 02:34:48',
            ],

            [
                'id' => '247',
                'lang_id' => '2',
                'bind_key' => '77',
                'name' => '[_factory_]',
                'description' => null,
                'created_at' => '2019-07-16 03:17:10',
                'updated_at' => '2019-07-16 03:17:10',
            ],

            [
                'id' => '248',
                'lang_id' => '3',
                'bind_key' => '77',
                'name' => '[_factory_]',
                'description' => null,
                'created_at' => '2019-07-16 03:17:10',
                'updated_at' => '2019-07-16 03:17:10',
            ],

            [
                'id' => '249',
                'lang_id' => '4',
                'bind_key' => '77',
                'name' => '[_factory_]',
                'description' => null,
                'created_at' => '2019-07-16 03:17:10',
                'updated_at' => '2019-07-16 03:17:10',
            ],

            [
                'id' => '250',
                'lang_id' => '2',
                'bind_key' => '78',
                'name' => '[_internal_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:10',
                'updated_at' => '2019-07-16 03:18:10',
            ],

            [
                'id' => '251',
                'lang_id' => '3',
                'bind_key' => '78',
                'name' => '[_internal_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:10',
                'updated_at' => '2019-07-16 03:18:10',
            ],

            [
                'id' => '252',
                'lang_id' => '4',
                'bind_key' => '78',
                'name' => '[_internal_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:10',
                'updated_at' => '2019-07-16 03:18:10',
            ],

            [
                'id' => '253',
                'lang_id' => '2',
                'bind_key' => '79',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:59',
                'updated_at' => '2019-07-16 03:18:59',
            ],

            [
                'id' => '254',
                'lang_id' => '3',
                'bind_key' => '79',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:59',
                'updated_at' => '2019-07-16 03:18:59',
            ],

            [
                'id' => '255',
                'lang_id' => '4',
                'bind_key' => '79',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:18:59',
                'updated_at' => '2019-07-16 03:18:59',
            ],

            [
                'id' => '256',
                'lang_id' => '2',
                'bind_key' => '80',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:21:13',
                'updated_at' => '2019-07-16 03:21:13',
            ],

            [
                'id' => '257',
                'lang_id' => '3',
                'bind_key' => '80',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:21:13',
                'updated_at' => '2019-07-16 03:21:13',
            ],

            [
                'id' => '258',
                'lang_id' => '4',
                'bind_key' => '80',
                'name' => '[_external_]',
                'description' => null,
                'created_at' => '2019-07-16 03:21:13',
                'updated_at' => '2019-07-16 03:21:13',
            ],

            [
                'id' => '259',
                'lang_id' => '2',
                'bind_key' => '81',
                'name' => 'Ma trận giá',
                'description' => null,
                'created_at' => '2019-07-20 02:23:53',
                'updated_at' => '2019-07-20 02:23:53',
            ],

            [
                'id' => '260',
                'lang_id' => '3',
                'bind_key' => '81',
                'name' => 'Matrix Value',
                'description' => null,
                'created_at' => '2019-07-20 02:23:53',
                'updated_at' => '2019-07-20 02:23:53',
            ],

            [
                'id' => '261',
                'lang_id' => '4',
                'bind_key' => '81',
                'name' => 'Matrix Value',
                'description' => null,
                'created_at' => '2019-07-20 02:23:53',
                'updated_at' => '2019-07-20 02:23:53',
            ],

            [
                'id' => '262',
                'lang_id' => '2',
                'bind_key' => '82',
                'name' => 'Loại ma trận',
                'description' => null,
                'created_at' => '2019-07-20 02:24:38',
                'updated_at' => '2019-07-20 02:24:38',
            ],

            [
                'id' => '263',
                'lang_id' => '3',
                'bind_key' => '82',
                'name' => 'Matrix Type',
                'description' => null,
                'created_at' => '2019-07-20 02:24:38',
                'updated_at' => '2019-07-20 02:24:38',
            ],

            [
                'id' => '264',
                'lang_id' => '4',
                'bind_key' => '82',
                'name' => 'Matrix Type',
                'description' => null,
                'created_at' => '2019-07-20 02:24:38',
                'updated_at' => '2019-07-20 02:24:38',
            ],

            [
                'id' => '265',
                'lang_id' => '2',
                'bind_key' => '83',
                'name' => 'Lớp sản phẩm',
                'description' => null,
                'created_at' => '2019-07-20 02:26:37',
                'updated_at' => '2019-07-20 02:26:37',
            ],

            [
                'id' => '266',
                'lang_id' => '3',
                'bind_key' => '83',
                'name' => 'Product Class',
                'description' => null,
                'created_at' => '2019-07-20 02:26:37',
                'updated_at' => '2019-07-20 02:26:37',
            ],

            [
                'id' => '267',
                'lang_id' => '4',
                'bind_key' => '83',
                'name' => 'Product Class',
                'description' => null,
                'created_at' => '2019-07-20 02:26:37',
                'updated_at' => '2019-07-20 02:26:37',
            ],

            [
                'id' => '268',
                'lang_id' => '2',
                'bind_key' => '84',
                'name' => 'Vật giá',
                'description' => null,
                'created_at' => '2019-07-20 02:36:18',
                'updated_at' => '2019-07-20 02:36:18',
            ],

            [
                'id' => '269',
                'lang_id' => '3',
                'bind_key' => '84',
                'name' => 'Item Price',
                'description' => null,
                'created_at' => '2019-07-20 02:36:18',
                'updated_at' => '2019-07-20 02:36:18',
            ],

            [
                'id' => '270',
                'lang_id' => '4',
                'bind_key' => '84',
                'name' => 'Item Price',
                'description' => null,
                'created_at' => '2019-07-20 02:36:18',
                'updated_at' => '2019-07-20 02:36:18',
            ],

            [
                'id' => '271',
                'lang_id' => '2',
                'bind_key' => '85',
                'name' => 'Quản lý vật phẩm',
                'description' => null,
                'created_at' => '2019-07-20 02:38:44',
                'updated_at' => '2019-07-20 02:38:44',
            ],

            [
                'id' => '272',
                'lang_id' => '3',
                'bind_key' => '85',
                'name' => 'Item Manage',
                'description' => null,
                'created_at' => '2019-07-20 02:38:44',
                'updated_at' => '2019-07-20 02:38:44',
            ],

            [
                'id' => '273',
                'lang_id' => '4',
                'bind_key' => '85',
                'name' => 'Item Manage',
                'description' => null,
                'created_at' => '2019-07-20 02:38:44',
                'updated_at' => '2019-07-20 02:38:44',
            ],

            [
                'id' => '274',
                'lang_id' => '2',
                'bind_key' => '86',
                'name' => 'Khung giá',
                'description' => null,
                'created_at' => '2019-07-20 03:36:10',
                'updated_at' => '2019-07-20 03:36:10',
            ],

            [
                'id' => '275',
                'lang_id' => '3',
                'bind_key' => '86',
                'name' => 'Price Pattern',
                'description' => null,
                'created_at' => '2019-07-20 03:36:10',
                'updated_at' => '2019-07-20 03:36:10',
            ],

            [
                'id' => '276',
                'lang_id' => '4',
                'bind_key' => '86',
                'name' => 'Price Pattern',
                'description' => null,
                'created_at' => '2019-07-20 03:36:10',
                'updated_at' => '2019-07-20 03:36:10',
            ],

            [
                'id' => '277',
                'lang_id' => '2',
                'bind_key' => '87',
                'name' => 'Tiền tệ',
                'description' => null,
                'created_at' => '2019-07-23 08:28:29',
                'updated_at' => '2019-07-23 08:28:29',
            ],

            [
                'id' => '278',
                'lang_id' => '3',
                'bind_key' => '87',
                'name' => 'Currency',
                'description' => null,
                'created_at' => '2019-07-23 08:28:29',
                'updated_at' => '2019-07-23 08:28:29',
            ],

            [
                'id' => '279',
                'lang_id' => '4',
                'bind_key' => '87',
                'name' => '通貨',
                'description' => null,
                'created_at' => '2019-07-23 08:28:29',
                'updated_at' => '2019-07-23 08:28:29',
            ],

            [
                'id' => '280',
                'lang_id' => '2',
                'bind_key' => '88',
                'name' => 'Main List',
                'description' => null,
                'created_at' => '2019-07-26 08:57:40',
                'updated_at' => '2019-07-26 08:57:40',
            ],

            [
                'id' => '281',
                'lang_id' => '3',
                'bind_key' => '88',
                'name' => 'Main List',
                'description' => null,
                'created_at' => '2019-07-26 08:57:40',
                'updated_at' => '2019-07-26 08:57:40',
            ],

            [
                'id' => '282',
                'lang_id' => '4',
                'bind_key' => '88',
                'name' => 'Main List',
                'description' => null,
                'created_at' => '2019-07-26 08:57:41',
                'updated_at' => '2019-07-26 08:57:41',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("menus_language", $item);
        }
    }

}