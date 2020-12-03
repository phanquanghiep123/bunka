<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class LanguageValuesDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '4',
                'label_id' => '11',
                'lang_id' => '2',
                'value' => 'Chức năng',
                'created_at' => '2019-04-12 09:58:13',
                'updated_at' => '2019-04-12 17:00:05',
            ],

            [
                'id' => '5',
                'label_id' => '11',
                'lang_id' => '3',
                'value' => 'Modules',
                'created_at' => '2019-04-12 09:58:13',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '6',
                'label_id' => '11',
                'lang_id' => '4',
                'value' => 'チャナン',
                'created_at' => '2019-04-12 09:58:13',
                'updated_at' => '2019-04-20 07:54:15',
            ],

            [
                'id' => '7',
                'label_id' => '12',
                'lang_id' => '2',
                'value' => 'Vai trò',
                'created_at' => '2019-04-16 08:36:17',
                'updated_at' => '2019-04-16 08:36:17',
            ],

            [
                'id' => '8',
                'label_id' => '12',
                'lang_id' => '3',
                'value' => 'Roles',
                'created_at' => '2019-04-16 08:36:17',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '9',
                'label_id' => '12',
                'lang_id' => '4',
                'value' => 'ヴァイトロ',
                'created_at' => '2019-04-16 08:36:17',
                'updated_at' => '2019-04-20 07:55:22',
            ],

            [
                'id' => '10',
                'label_id' => '13',
                'lang_id' => '2',
                'value' => 'Ngôn ngữ',
                'created_at' => '2019-04-16 08:37:34',
                'updated_at' => '2019-04-16 08:37:34',
            ],

            [
                'id' => '11',
                'label_id' => '13',
                'lang_id' => '3',
                'value' => 'Languages',
                'created_at' => '2019-04-16 08:37:34',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '12',
                'label_id' => '13',
                'lang_id' => '4',
                'value' => '言語',
                'created_at' => '2019-04-16 08:37:34',
                'updated_at' => '2019-04-20 07:54:46',
            ],

            [
                'id' => '16',
                'label_id' => '15',
                'lang_id' => '2',
                'value' => 'Tài khoản',
                'created_at' => '2019-04-20 07:59:59',
                'updated_at' => '2019-04-20 07:59:59',
            ],

            [
                'id' => '17',
                'label_id' => '15',
                'lang_id' => '3',
                'value' => 'User name',
                'created_at' => '2019-04-20 07:59:59',
                'updated_at' => '2019-04-20 07:59:59',
            ],

            [
                'id' => '18',
                'label_id' => '15',
                'lang_id' => '4',
                'value' => 'アカウント',
                'created_at' => '2019-04-20 08:00:00',
                'updated_at' => '2019-04-20 08:00:00',
            ],

            [
                'id' => '19',
                'label_id' => '16',
                'lang_id' => '2',
                'value' => 'Mật khẩu',
                'created_at' => '2019-04-20 08:00:47',
                'updated_at' => '2019-04-20 08:00:47',
            ],

            [
                'id' => '20',
                'label_id' => '16',
                'lang_id' => '3',
                'value' => 'Password',
                'created_at' => '2019-04-20 08:00:47',
                'updated_at' => '2019-04-20 08:00:47',
            ],

            [
                'id' => '21',
                'label_id' => '16',
                'lang_id' => '4',
                'value' => 'パスワード',
                'created_at' => '2019-04-20 08:00:47',
                'updated_at' => '2019-04-20 08:00:47',
            ],

            [
                'id' => '22',
                'label_id' => '17',
                'lang_id' => '2',
                'value' => 'Đăng nhập',
                'created_at' => '2019-04-20 08:20:29',
                'updated_at' => '2019-04-20 08:20:29',
            ],

            [
                'id' => '23',
                'label_id' => '17',
                'lang_id' => '3',
                'value' => 'Login',
                'created_at' => '2019-04-20 08:20:29',
                'updated_at' => '2019-04-20 08:20:29',
            ],

            [
                'id' => '24',
                'label_id' => '17',
                'lang_id' => '4',
                'value' => 'ログイン',
                'created_at' => '2019-04-20 08:20:29',
                'updated_at' => '2019-04-20 08:20:29',
            ],

            [
                'id' => '25',
                'label_id' => '18',
                'lang_id' => '2',
                'value' => 'Giữ cho tôi đăng nhập',
                'created_at' => '2019-04-20 08:21:52',
                'updated_at' => '2019-04-20 08:21:52',
            ],

            [
                'id' => '26',
                'label_id' => '18',
                'lang_id' => '3',
                'value' => 'Keep me signed in',
                'created_at' => '2019-04-20 08:21:52',
                'updated_at' => '2019-04-20 08:21:52',
            ],

            [
                'id' => '27',
                'label_id' => '18',
                'lang_id' => '4',
                'value' => 'ログイン状態を保持する',
                'created_at' => '2019-04-20 08:21:52',
                'updated_at' => '2019-04-20 08:21:52',
            ],

            [
                'id' => '28',
                'label_id' => '19',
                'lang_id' => '2',
                'value' => 'Quên mật khẩu',
                'created_at' => '2019-04-20 08:22:34',
                'updated_at' => '2019-04-20 08:22:34',
            ],

            [
                'id' => '29',
                'label_id' => '19',
                'lang_id' => '3',
                'value' => 'Forgot Password',
                'created_at' => '2019-04-20 08:22:34',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '30',
                'label_id' => '19',
                'lang_id' => '4',
                'value' => 'パスワードをお忘れですか',
                'created_at' => '2019-04-20 08:22:34',
                'updated_at' => '2019-04-20 08:22:34',
            ],

            [
                'id' => '31',
                'label_id' => '20',
                'lang_id' => '2',
                'value' => 'Họ',
                'created_at' => '2019-04-20 09:01:14',
                'updated_at' => '2019-04-20 09:01:14',
            ],

            [
                'id' => '32',
                'label_id' => '20',
                'lang_id' => '3',
                'value' => 'First name',
                'created_at' => '2019-04-20 09:01:14',
                'updated_at' => '2019-04-20 09:01:14',
            ],

            [
                'id' => '33',
                'label_id' => '20',
                'lang_id' => '4',
                'value' => 'First name',
                'created_at' => '2019-04-20 09:01:14',
                'updated_at' => '2019-04-20 09:01:14',
            ],

            [
                'id' => '34',
                'label_id' => '21',
                'lang_id' => '2',
                'value' => 'Tên',
                'created_at' => '2019-04-20 09:02:46',
                'updated_at' => '2019-04-20 09:02:46',
            ],

            [
                'id' => '35',
                'label_id' => '21',
                'lang_id' => '3',
                'value' => 'Last name',
                'created_at' => '2019-04-20 09:02:46',
                'updated_at' => '2019-04-20 09:02:46',
            ],

            [
                'id' => '36',
                'label_id' => '21',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:02:46',
                'updated_at' => '2019-04-20 09:02:46',
            ],

            [
                'id' => '40',
                'label_id' => '23',
                'lang_id' => '2',
                'value' => 'Biểu tượng',
                'created_at' => '2019-04-20 09:03:55',
                'updated_at' => '2019-04-20 09:03:55',
            ],

            [
                'id' => '41',
                'label_id' => '23',
                'lang_id' => '3',
                'value' => 'Icon',
                'created_at' => '2019-04-20 09:03:55',
                'updated_at' => '2019-04-20 09:03:55',
            ],

            [
                'id' => '42',
                'label_id' => '23',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:03:55',
                'updated_at' => '2019-04-20 09:03:55',
            ],

            [
                'id' => '43',
                'label_id' => '24',
                'lang_id' => '2',
                'value' => 'Ngày tạo',
                'created_at' => '2019-04-20 09:05:46',
                'updated_at' => '2019-04-20 09:05:46',
            ],

            [
                'id' => '44',
                'label_id' => '24',
                'lang_id' => '3',
                'value' => 'Date Created',
                'created_at' => '2019-04-20 09:05:46',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '45',
                'label_id' => '24',
                'lang_id' => '4',
                'value' => '作成日',
                'created_at' => '2019-04-20 09:05:46',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '49',
                'label_id' => '26',
                'lang_id' => '2',
                'value' => 'Thành viên',
                'created_at' => '2019-04-20 09:07:30',
                'updated_at' => '2019-04-20 09:07:30',
            ],

            [
                'id' => '50',
                'label_id' => '26',
                'lang_id' => '3',
                'value' => 'User',
                'created_at' => '2019-04-20 09:07:30',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '51',
                'label_id' => '26',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:07:30',
                'updated_at' => '2019-04-20 09:07:30',
            ],

            [
                'id' => '52',
                'label_id' => '27',
                'lang_id' => '2',
                'value' => 'Email',
                'created_at' => '2019-04-20 09:30:10',
                'updated_at' => '2019-04-20 09:30:10',
            ],

            [
                'id' => '53',
                'label_id' => '27',
                'lang_id' => '3',
                'value' => 'Email',
                'created_at' => '2019-04-20 09:30:10',
                'updated_at' => '2019-04-20 09:30:10',
            ],

            [
                'id' => '54',
                'label_id' => '27',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:30:10',
                'updated_at' => '2019-04-20 09:30:10',
            ],

            [
                'id' => '55',
                'label_id' => '28',
                'lang_id' => '2',
                'value' => 'Ảnh đại diện',
                'created_at' => '2019-04-20 09:31:21',
                'updated_at' => '2019-04-20 09:31:21',
            ],

            [
                'id' => '56',
                'label_id' => '28',
                'lang_id' => '3',
                'value' => 'Avatar',
                'created_at' => '2019-04-20 09:31:21',
                'updated_at' => '2019-04-20 09:31:21',
            ],

            [
                'id' => '57',
                'label_id' => '28',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:31:21',
                'updated_at' => '2019-04-20 09:31:21',
            ],

            [
                'id' => '58',
                'label_id' => '29',
                'lang_id' => '2',
                'value' => 'Chọn ảnh',
                'created_at' => '2019-04-20 09:31:42',
                'updated_at' => '2019-04-20 09:31:42',
            ],

            [
                'id' => '59',
                'label_id' => '29',
                'lang_id' => '3',
                'value' => 'Select Add Image',
                'created_at' => '2019-04-20 09:31:42',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '60',
                'label_id' => '29',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-20 09:31:42',
                'updated_at' => '2019-04-20 09:31:42',
            ],

            [
                'id' => '61',
                'label_id' => '32',
                'lang_id' => '2',
                'value' => 'Ngày tạo',
                'created_at' => '2019-04-22 04:36:53',
                'updated_at' => '2019-04-22 04:36:53',
            ],

            [
                'id' => '62',
                'label_id' => '32',
                'lang_id' => '3',
                'value' => 'Creared at',
                'created_at' => '2019-04-22 04:36:53',
                'updated_at' => '2019-04-22 04:36:53',
            ],

            [
                'id' => '63',
                'label_id' => '32',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-22 04:36:53',
                'updated_at' => '2019-04-22 04:36:53',
            ],

            [
                'id' => '64',
                'label_id' => '33',
                'lang_id' => '2',
                'value' => 'Báo giá số',
                'created_at' => '2019-04-27 03:04:56',
                'updated_at' => '2019-04-27 03:04:56',
            ],

            [
                'id' => '65',
                'label_id' => '33',
                'lang_id' => '3',
                'value' => 'Quotation No.',
                'created_at' => '2019-04-27 03:04:56',
                'updated_at' => '2019-04-27 03:04:56',
            ],

            [
                'id' => '66',
                'label_id' => '33',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 03:04:56',
                'updated_at' => '2019-04-27 03:04:56',
            ],

            [
                'id' => '67',
                'label_id' => '34',
                'lang_id' => '2',
                'value' => 'Khách hàng',
                'created_at' => '2019-04-27 07:52:49',
                'updated_at' => '2019-04-27 07:52:49',
            ],

            [
                'id' => '68',
                'label_id' => '34',
                'lang_id' => '3',
                'value' => 'Customer',
                'created_at' => '2019-04-27 07:52:49',
                'updated_at' => '2019-04-27 07:52:49',
            ],

            [
                'id' => '69',
                'label_id' => '34',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 07:52:49',
                'updated_at' => '2019-04-27 07:52:49',
            ],

            [
                'id' => '70',
                'label_id' => '35',
                'lang_id' => '2',
                'value' => 'Tên',
                'created_at' => '2019-04-27 08:05:45',
                'updated_at' => '2019-04-27 08:05:45',
            ],

            [
                'id' => '71',
                'label_id' => '35',
                'lang_id' => '3',
                'value' => 'Name',
                'created_at' => '2019-04-27 08:05:45',
                'updated_at' => '2019-04-27 08:05:45',
            ],

            [
                'id' => '72',
                'label_id' => '35',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:05:46',
                'updated_at' => '2019-04-27 08:05:46',
            ],

            [
                'id' => '73',
                'label_id' => '36',
                'lang_id' => '2',
                'value' => 'Báo giá số',
                'created_at' => '2019-04-27 08:08:43',
                'updated_at' => '2019-04-27 08:08:43',
            ],

            [
                'id' => '74',
                'label_id' => '36',
                'lang_id' => '3',
                'value' => 'Quotation No.',
                'created_at' => '2019-04-27 08:08:44',
                'updated_at' => '2019-04-27 08:08:44',
            ],

            [
                'id' => '75',
                'label_id' => '36',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:08:44',
                'updated_at' => '2019-04-27 08:08:44',
            ],

            [
                'id' => '76',
                'label_id' => '37',
                'lang_id' => '2',
                'value' => 'Dự án',
                'created_at' => '2019-04-27 08:10:03',
                'updated_at' => '2019-04-27 08:10:03',
            ],

            [
                'id' => '77',
                'label_id' => '37',
                'lang_id' => '3',
                'value' => 'Project',
                'created_at' => '2019-04-27 08:10:03',
                'updated_at' => '2019-04-27 08:10:03',
            ],

            [
                'id' => '78',
                'label_id' => '37',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:10:03',
                'updated_at' => '2019-04-27 08:10:03',
            ],

            [
                'id' => '79',
                'label_id' => '38',
                'lang_id' => '2',
                'value' => 'Code',
                'created_at' => '2019-04-27 08:18:24',
                'updated_at' => '2019-04-27 08:18:24',
            ],

            [
                'id' => '80',
                'label_id' => '38',
                'lang_id' => '3',
                'value' => 'Code',
                'created_at' => '2019-04-27 08:18:24',
                'updated_at' => '2019-04-27 08:18:24',
            ],

            [
                'id' => '81',
                'label_id' => '38',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:18:24',
                'updated_at' => '2019-04-27 08:18:24',
            ],

            [
                'id' => '82',
                'label_id' => '39',
                'lang_id' => '2',
                'value' => 'Tên ủy quyền',
                'created_at' => '2019-04-27 08:18:57',
                'updated_at' => '2019-04-27 08:18:57',
            ],

            [
                'id' => '83',
                'label_id' => '39',
                'lang_id' => '3',
                'value' => 'Authorized name',
                'created_at' => '2019-04-27 08:18:57',
                'updated_at' => '2019-04-27 08:18:57',
            ],

            [
                'id' => '84',
                'label_id' => '39',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:18:57',
                'updated_at' => '2019-04-27 08:18:57',
            ],

            [
                'id' => '85',
                'label_id' => '40',
                'lang_id' => '2',
                'value' => 'Chủ nhân',
                'created_at' => '2019-04-27 08:19:23',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '86',
                'label_id' => '40',
                'lang_id' => '3',
                'value' => 'Owner',
                'created_at' => '2019-04-27 08:19:23',
                'updated_at' => '2019-04-27 08:19:23',
            ],

            [
                'id' => '87',
                'label_id' => '40',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:19:23',
                'updated_at' => '2019-04-27 08:19:23',
            ],

            [
                'id' => '88',
                'label_id' => '41',
                'lang_id' => '2',
                'value' => 'Tên',
                'created_at' => '2019-04-27 08:19:36',
                'updated_at' => '2019-04-27 08:19:36',
            ],

            [
                'id' => '89',
                'label_id' => '41',
                'lang_id' => '3',
                'value' => 'Name',
                'created_at' => '2019-04-27 08:19:36',
                'updated_at' => '2019-04-27 08:19:36',
            ],

            [
                'id' => '90',
                'label_id' => '41',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:19:36',
                'updated_at' => '2019-04-27 08:19:36',
            ],

            [
                'id' => '91',
                'label_id' => '42',
                'lang_id' => '2',
                'value' => 'Địa chỉ',
                'created_at' => '2019-04-27 08:19:57',
                'updated_at' => '2019-04-27 08:19:57',
            ],

            [
                'id' => '92',
                'label_id' => '42',
                'lang_id' => '3',
                'value' => 'Address',
                'created_at' => '2019-04-27 08:19:57',
                'updated_at' => '2019-04-27 08:19:57',
            ],

            [
                'id' => '93',
                'label_id' => '42',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:19:57',
                'updated_at' => '2019-04-27 08:19:57',
            ],

            [
                'id' => '94',
                'label_id' => '43',
                'lang_id' => '2',
                'value' => 'Số điện thoại',
                'created_at' => '2019-04-27 08:43:40',
                'updated_at' => '2019-04-27 08:43:40',
            ],

            [
                'id' => '95',
                'label_id' => '43',
                'lang_id' => '3',
                'value' => 'Phone',
                'created_at' => '2019-04-27 08:43:40',
                'updated_at' => '2019-04-27 08:43:40',
            ],

            [
                'id' => '96',
                'label_id' => '43',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:43:40',
                'updated_at' => '2019-04-27 08:43:40',
            ],

            [
                'id' => '97',
                'label_id' => '44',
                'lang_id' => '2',
                'value' => 'Fax',
                'created_at' => '2019-04-27 08:45:35',
                'updated_at' => '2019-04-27 08:45:35',
            ],

            [
                'id' => '98',
                'label_id' => '44',
                'lang_id' => '3',
                'value' => 'Fax',
                'created_at' => '2019-04-27 08:45:35',
                'updated_at' => '2019-04-27 08:45:35',
            ],

            [
                'id' => '99',
                'label_id' => '44',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:45:35',
                'updated_at' => '2019-04-27 08:45:35',
            ],

            [
                'id' => '100',
                'label_id' => '45',
                'lang_id' => '2',
                'value' => 'Người quản lý',
                'created_at' => '2019-04-27 08:45:56',
                'updated_at' => '2019-04-27 08:45:56',
            ],

            [
                'id' => '101',
                'label_id' => '45',
                'lang_id' => '3',
                'value' => 'Manager',
                'created_at' => '2019-04-27 08:45:56',
                'updated_at' => '2019-04-27 08:45:56',
            ],

            [
                'id' => '102',
                'label_id' => '45',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:45:56',
                'updated_at' => '2019-04-27 08:45:56',
            ],

            [
                'id' => '103',
                'label_id' => '46',
                'lang_id' => '2',
                'value' => 'Ngày tạo',
                'created_at' => '2019-04-27 08:46:18',
                'updated_at' => '2019-04-27 08:46:18',
            ],

            [
                'id' => '104',
                'label_id' => '46',
                'lang_id' => '3',
                'value' => 'Created at',
                'created_at' => '2019-04-27 08:46:18',
                'updated_at' => '2019-04-27 08:46:18',
            ],

            [
                'id' => '105',
                'label_id' => '46',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-04-27 08:46:18',
                'updated_at' => '2019-04-27 08:46:18',
            ],

            [
                'id' => '106',
                'label_id' => '47',
                'lang_id' => '2',
                'value' => 'Tên trạng thái',
                'created_at' => '2019-05-03 11:30:04',
                'updated_at' => '2019-05-03 11:30:04',
            ],

            [
                'id' => '107',
                'label_id' => '47',
                'lang_id' => '3',
                'value' => 'Satus name',
                'created_at' => '2019-05-03 11:30:04',
                'updated_at' => '2019-05-03 11:30:04',
            ],

            [
                'id' => '108',
                'label_id' => '47',
                'lang_id' => '4',
                'value' => 'ステータス名',
                'created_at' => '2019-05-03 11:30:04',
                'updated_at' => '2019-05-03 11:30:04',
            ],

            [
                'id' => '109',
                'label_id' => '48',
                'lang_id' => '2',
                'value' => 'Tên mô-đun',
                'created_at' => '2019-05-03 11:31:27',
                'updated_at' => '2019-05-03 11:31:27',
            ],

            [
                'id' => '110',
                'label_id' => '48',
                'lang_id' => '3',
                'value' => 'Module name',
                'created_at' => '2019-05-03 11:31:27',
                'updated_at' => '2019-05-03 11:31:27',
            ],

            [
                'id' => '111',
                'label_id' => '48',
                'lang_id' => '4',
                'value' => 'モジュール名',
                'created_at' => '2019-05-03 11:31:27',
                'updated_at' => '2019-05-03 11:31:27',
            ],

            [
                'id' => '112',
                'label_id' => '49',
                'lang_id' => '2',
                'value' => 'Dùng chung',
                'created_at' => '2019-05-03 11:48:01',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '113',
                'label_id' => '49',
                'lang_id' => '3',
                'value' => 'Is common',
                'created_at' => '2019-05-03 11:48:01',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '114',
                'label_id' => '49',
                'lang_id' => '4',
                'value' => '普通です',
                'created_at' => '2019-05-03 11:48:01',
                'updated_at' => '2019-05-03 11:48:01',
            ],

            [
                'id' => '115',
                'label_id' => '50',
                'lang_id' => '2',
                'value' => 'Có',
                'created_at' => '2019-05-03 11:48:40',
                'updated_at' => '2019-05-03 11:48:40',
            ],

            [
                'id' => '116',
                'label_id' => '50',
                'lang_id' => '3',
                'value' => 'Yes',
                'created_at' => '2019-05-03 11:48:40',
                'updated_at' => '2019-05-03 11:48:40',
            ],

            [
                'id' => '117',
                'label_id' => '50',
                'lang_id' => '4',
                'value' => 'はい',
                'created_at' => '2019-05-03 11:48:40',
                'updated_at' => '2019-05-03 11:48:40',
            ],

            [
                'id' => '118',
                'label_id' => '51',
                'lang_id' => '2',
                'value' => 'Không',
                'created_at' => '2019-05-04 08:58:57',
                'updated_at' => '2019-05-04 08:58:57',
            ],

            [
                'id' => '119',
                'label_id' => '51',
                'lang_id' => '3',
                'value' => 'No',
                'created_at' => '2019-05-04 08:58:57',
                'updated_at' => '2019-05-04 08:58:57',
            ],

            [
                'id' => '120',
                'label_id' => '51',
                'lang_id' => '4',
                'value' => 'いいえ',
                'created_at' => '2019-05-04 08:58:57',
                'updated_at' => '2019-05-04 08:58:57',
            ],

            [
                'id' => '125',
                'label_id' => '52',
                'lang_id' => '2',
                'value' => 'Số thứ tự',
                'created_at' => '2019-05-06 08:34:42',
                'updated_at' => '2019-05-06 08:34:42',
            ],

            [
                'id' => '126',
                'label_id' => '52',
                'lang_id' => '3',
                'value' => 'Order No.',
                'created_at' => '2019-05-06 08:34:42',
                'updated_at' => '2019-05-06 08:34:42',
            ],

            [
                'id' => '127',
                'label_id' => '52',
                'lang_id' => '4',
                'value' => '注文番号。',
                'created_at' => '2019-05-06 08:34:42',
                'updated_at' => '2019-05-06 08:34:42',
            ],

            [
                'id' => '131',
                'label_id' => '57',
                'lang_id' => '2',
                'value' => 'Chi nhánh',
                'created_at' => '2019-05-06 08:38:32',
                'updated_at' => '2019-05-06 08:38:32',
            ],

            [
                'id' => '132',
                'label_id' => '57',
                'lang_id' => '3',
                'value' => 'Branch',
                'created_at' => '2019-05-06 08:38:32',
                'updated_at' => '2019-05-06 08:59:48',
            ],

            [
                'id' => '133',
                'label_id' => '57',
                'lang_id' => '4',
                'value' => '支店',
                'created_at' => '2019-05-06 08:38:32',
                'updated_at' => '2019-05-06 08:38:32',
            ],

            [
                'id' => '134',
                'label_id' => '58',
                'lang_id' => '2',
                'value' => 'Thông tin chung',
                'created_at' => '2019-05-08 09:57:15',
                'updated_at' => '2019-05-08 09:57:15',
            ],

            [
                'id' => '135',
                'label_id' => '58',
                'lang_id' => '3',
                'value' => 'General Informations',
                'created_at' => '2019-05-08 09:57:15',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '136',
                'label_id' => '58',
                'lang_id' => '4',
                'value' => '一般的な情報',
                'created_at' => '2019-05-08 09:57:15',
                'updated_at' => '2019-05-08 09:57:15',
            ],

            [
                'id' => '137',
                'label_id' => '59',
                'lang_id' => '2',
                'value' => 'Thông tin khách hàng',
                'created_at' => '2019-05-08 09:58:26',
                'updated_at' => '2019-05-08 09:58:26',
            ],

            [
                'id' => '138',
                'label_id' => '59',
                'lang_id' => '3',
                'value' => 'Customer Informations',
                'created_at' => '2019-05-08 09:58:26',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '139',
                'label_id' => '59',
                'lang_id' => '4',
                'value' => 'お客様情報',
                'created_at' => '2019-05-08 09:58:26',
                'updated_at' => '2019-05-08 09:58:26',
            ],

            [
                'id' => '140',
                'label_id' => '60',
                'lang_id' => '2',
                'value' => 'Thông tin xây dựng',
                'created_at' => '2019-05-08 09:59:28',
                'updated_at' => '2019-05-08 09:59:28',
            ],

            [
                'id' => '141',
                'label_id' => '60',
                'lang_id' => '3',
                'value' => 'Construction Informations',
                'created_at' => '2019-05-08 09:59:28',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '142',
                'label_id' => '60',
                'lang_id' => '4',
                'value' => '建設情報',
                'created_at' => '2019-05-08 09:59:28',
                'updated_at' => '2019-05-08 09:59:28',
            ],

            [
                'id' => '143',
                'label_id' => '61',
                'lang_id' => '2',
                'value' => 'Giảm giá',
                'created_at' => '2019-05-08 10:04:23',
                'updated_at' => '2019-05-08 10:04:23',
            ],

            [
                'id' => '144',
                'label_id' => '61',
                'lang_id' => '3',
                'value' => 'Discount',
                'created_at' => '2019-05-08 10:04:23',
                'updated_at' => '2019-05-08 10:04:23',
            ],

            [
                'id' => '145',
                'label_id' => '61',
                'lang_id' => '4',
                'value' => 'ディスカウント',
                'created_at' => '2019-05-08 10:04:23',
                'updated_at' => '2019-05-08 10:04:23',
            ],

            [
                'id' => '146',
                'label_id' => '62',
                'lang_id' => '2',
                'value' => 'Thuế',
                'created_at' => '2019-05-08 10:08:27',
                'updated_at' => '2019-05-08 10:08:27',
            ],

            [
                'id' => '147',
                'label_id' => '62',
                'lang_id' => '3',
                'value' => 'Tax',
                'created_at' => '2019-05-08 10:08:27',
                'updated_at' => '2019-05-08 10:08:27',
            ],

            [
                'id' => '148',
                'label_id' => '62',
                'lang_id' => '4',
                'value' => '税金',
                'created_at' => '2019-05-08 10:08:27',
                'updated_at' => '2019-05-08 10:08:27',
            ],

            [
                'id' => '149',
                'label_id' => '63',
                'lang_id' => '2',
                'value' => 'Chọn',
                'created_at' => '2019-05-08 10:09:48',
                'updated_at' => '2019-05-08 10:09:48',
            ],

            [
                'id' => '150',
                'label_id' => '63',
                'lang_id' => '3',
                'value' => 'Choose',
                'created_at' => '2019-05-08 10:09:48',
                'updated_at' => '2019-05-08 10:09:48',
            ],

            [
                'id' => '151',
                'label_id' => '63',
                'lang_id' => '4',
                'value' => '選ぶ',
                'created_at' => '2019-05-08 10:09:48',
                'updated_at' => '2019-05-08 10:09:48',
            ],

            [
                'id' => '152',
                'label_id' => '64',
                'lang_id' => '2',
                'value' => 'Ngày',
                'created_at' => '2019-05-08 10:10:24',
                'updated_at' => '2019-05-08 10:10:24',
            ],

            [
                'id' => '153',
                'label_id' => '64',
                'lang_id' => '3',
                'value' => 'Date',
                'created_at' => '2019-05-08 10:10:24',
                'updated_at' => '2019-05-08 10:10:24',
            ],

            [
                'id' => '154',
                'label_id' => '64',
                'lang_id' => '4',
                'value' => '日付',
                'created_at' => '2019-05-08 10:10:24',
                'updated_at' => '2019-05-08 10:10:24',
            ],

            [
                'id' => '155',
                'label_id' => '65',
                'lang_id' => '2',
                'value' => 'Áp dụng',
                'created_at' => '2019-05-08 10:11:02',
                'updated_at' => '2019-05-08 10:11:02',
            ],

            [
                'id' => '156',
                'label_id' => '65',
                'lang_id' => '3',
                'value' => 'Apply',
                'created_at' => '2019-05-08 10:11:02',
                'updated_at' => '2019-05-08 10:11:02',
            ],

            [
                'id' => '157',
                'label_id' => '65',
                'lang_id' => '4',
                'value' => '適用する',
                'created_at' => '2019-05-08 10:11:02',
                'updated_at' => '2019-05-08 10:11:02',
            ],

            [
                'id' => '158',
                'label_id' => '66',
                'lang_id' => '2',
                'value' => 'Sản phẩm mới',
                'created_at' => '2019-05-08 10:12:00',
                'updated_at' => '2019-05-08 10:12:00',
            ],

            [
                'id' => '159',
                'label_id' => '66',
                'lang_id' => '3',
                'value' => 'New Production',
                'created_at' => '2019-05-08 10:12:00',
                'updated_at' => '2019-05-08 10:12:00',
            ],

            [
                'id' => '160',
                'label_id' => '66',
                'lang_id' => '4',
                'value' => '新作',
                'created_at' => '2019-05-08 10:12:00',
                'updated_at' => '2019-05-08 10:12:00',
            ],

            [
                'id' => '161',
                'label_id' => '67',
                'lang_id' => '2',
                'value' => 'Suẩn xuất',
                'created_at' => '2019-05-08 10:13:11',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '162',
                'label_id' => '67',
                'lang_id' => '3',
                'value' => 'Production',
                'created_at' => '2019-05-08 10:13:11',
                'updated_at' => '2019-05-08 10:13:11',
            ],

            [
                'id' => '163',
                'label_id' => '67',
                'lang_id' => '4',
                'value' => '製造',
                'created_at' => '2019-05-08 10:13:11',
                'updated_at' => '2019-05-08 10:13:11',
            ],

            [
                'id' => '164',
                'label_id' => '68',
                'lang_id' => '2',
                'value' => 'Không có sản phẩm nào được thêm vào',
                'created_at' => '2019-05-08 10:14:12',
                'updated_at' => '2019-05-08 10:14:12',
            ],

            [
                'id' => '165',
                'label_id' => '68',
                'lang_id' => '3',
                'value' => 'There are no products added',
                'created_at' => '2019-05-08 10:14:13',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '166',
                'label_id' => '68',
                'lang_id' => '4',
                'value' => '追加された商品はありません',
                'created_at' => '2019-05-08 10:14:13',
                'updated_at' => '2019-05-08 10:14:13',
            ],

            [
                'id' => '167',
                'label_id' => '69',
                'lang_id' => '2',
                'value' => 'Chi phí mới',
                'created_at' => '2019-05-08 10:15:11',
                'updated_at' => '2019-05-08 10:15:11',
            ],

            [
                'id' => '168',
                'label_id' => '69',
                'lang_id' => '3',
                'value' => 'New Expense',
                'created_at' => '2019-05-08 10:15:11',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '169',
                'label_id' => '69',
                'lang_id' => '4',
                'value' => '新しい費用',
                'created_at' => '2019-05-08 10:15:11',
                'updated_at' => '2019-05-08 10:15:11',
            ],

            [
                'id' => '170',
                'label_id' => '70',
                'lang_id' => '2',
                'value' => 'Chi phí khác',
                'created_at' => '2019-05-08 10:15:54',
                'updated_at' => '2019-05-08 10:15:54',
            ],

            [
                'id' => '171',
                'label_id' => '70',
                'lang_id' => '3',
                'value' => 'Other Expense',
                'created_at' => '2019-05-08 10:15:54',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '172',
                'label_id' => '70',
                'lang_id' => '4',
                'value' => 'その他の経費',
                'created_at' => '2019-05-08 10:15:54',
                'updated_at' => '2019-05-08 10:15:54',
            ],

            [
                'id' => '173',
                'label_id' => '71',
                'lang_id' => '2',
                'value' => 'Không có chi phí được thêm vào',
                'created_at' => '2019-05-08 10:16:45',
                'updated_at' => '2019-05-08 10:16:45',
            ],

            [
                'id' => '174',
                'label_id' => '71',
                'lang_id' => '3',
                'value' => 'There are no Expense added',
                'created_at' => '2019-05-08 10:16:45',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '175',
                'label_id' => '71',
                'lang_id' => '4',
                'value' => '追加費用はありません',
                'created_at' => '2019-05-08 10:16:45',
                'updated_at' => '2019-05-08 10:16:45',
            ],

            [
                'id' => '176',
                'label_id' => '72',
                'lang_id' => '2',
                'value' => 'Tổng số tiền báo giá',
                'created_at' => '2019-05-08 10:17:34',
                'updated_at' => '2019-05-08 10:17:34',
            ],

            [
                'id' => '177',
                'label_id' => '72',
                'lang_id' => '3',
                'value' => 'Quotation Total',
                'created_at' => '2019-05-08 10:17:34',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '178',
                'label_id' => '72',
                'lang_id' => '4',
                'value' => '見積合計',
                'created_at' => '2019-05-08 10:17:34',
                'updated_at' => '2019-05-08 10:17:34',
            ],

            [
                'id' => '179',
                'label_id' => '73',
                'lang_id' => '2',
                'value' => 'Kiểu',
                'created_at' => '2019-05-08 10:18:12',
                'updated_at' => '2019-05-08 10:18:12',
            ],

            [
                'id' => '180',
                'label_id' => '73',
                'lang_id' => '3',
                'value' => 'Type',
                'created_at' => '2019-05-08 10:18:12',
                'updated_at' => '2019-05-08 10:18:12',
            ],

            [
                'id' => '181',
                'label_id' => '73',
                'lang_id' => '4',
                'value' => 'タイプ',
                'created_at' => '2019-05-08 10:18:12',
                'updated_at' => '2019-05-08 10:18:12',
            ],

            [
                'id' => '182',
                'label_id' => '74',
                'lang_id' => '2',
                'value' => 'Giá bán',
                'created_at' => '2019-05-08 10:18:54',
                'updated_at' => '2019-06-10 07:52:00',
            ],

            [
                'id' => '183',
                'label_id' => '74',
                'lang_id' => '3',
                'value' => 'Price',
                'created_at' => '2019-05-08 10:18:54',
                'updated_at' => '2019-05-08 10:18:54',
            ],

            [
                'id' => '184',
                'label_id' => '74',
                'lang_id' => '4',
                'value' => '価格',
                'created_at' => '2019-05-08 10:18:54',
                'updated_at' => '2019-05-08 10:18:54',
            ],

            [
                'id' => '185',
                'label_id' => '75',
                'lang_id' => '2',
                'value' => 'Chi phí',
                'created_at' => '2019-05-08 10:19:39',
                'updated_at' => '2019-05-08 10:19:39',
            ],

            [
                'id' => '186',
                'label_id' => '75',
                'lang_id' => '3',
                'value' => 'Expense',
                'created_at' => '2019-05-08 10:19:39',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '187',
                'label_id' => '75',
                'lang_id' => '4',
                'value' => '経費',
                'created_at' => '2019-05-08 10:19:39',
                'updated_at' => '2019-05-08 10:19:39',
            ],

            [
                'id' => '188',
                'label_id' => '76',
                'lang_id' => '2',
                'value' => 'Tổng số phụ',
                'created_at' => '2019-05-08 10:20:19',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '189',
                'label_id' => '76',
                'lang_id' => '3',
                'value' => 'Sub Total',
                'created_at' => '2019-05-08 10:20:19',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '190',
                'label_id' => '76',
                'lang_id' => '4',
                'value' => '小計',
                'created_at' => '2019-05-08 10:20:19',
                'updated_at' => '2019-05-08 10:20:19',
            ],

            [
                'id' => '191',
                'label_id' => '77',
                'lang_id' => '2',
                'value' => 'Tổng phụ',
                'created_at' => '2019-05-08 10:21:59',
                'updated_at' => '2019-05-08 10:21:59',
            ],

            [
                'id' => '192',
                'label_id' => '77',
                'lang_id' => '3',
                'value' => 'Grand Sub Total',
                'created_at' => '2019-05-08 10:21:59',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '193',
                'label_id' => '77',
                'lang_id' => '4',
                'value' => '総計',
                'created_at' => '2019-05-08 10:21:59',
                'updated_at' => '2019-05-08 10:21:59',
            ],

            [
                'id' => '194',
                'label_id' => '78',
                'lang_id' => '2',
                'value' => 'VAT',
                'created_at' => '2019-05-08 10:22:34',
                'updated_at' => '2019-05-08 10:22:34',
            ],

            [
                'id' => '195',
                'label_id' => '78',
                'lang_id' => '3',
                'value' => 'VAT',
                'created_at' => '2019-05-08 10:22:34',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '196',
                'label_id' => '78',
                'lang_id' => '4',
                'value' => 'VAT',
                'created_at' => '2019-05-08 10:22:34',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '197',
                'label_id' => '79',
                'lang_id' => '2',
                'value' => 'Tổng cộng',
                'created_at' => '2019-05-08 10:23:15',
                'updated_at' => '2019-05-08 10:23:15',
            ],

            [
                'id' => '198',
                'label_id' => '79',
                'lang_id' => '3',
                'value' => 'Total',
                'created_at' => '2019-05-08 10:23:15',
                'updated_at' => '2019-05-08 10:23:15',
            ],

            [
                'id' => '199',
                'label_id' => '79',
                'lang_id' => '4',
                'value' => '合計',
                'created_at' => '2019-05-08 10:23:15',
                'updated_at' => '2019-05-08 10:23:15',
            ],

            [
                'id' => '200',
                'label_id' => '80',
                'lang_id' => '2',
                'value' => 'Thuế',
                'created_at' => '2019-05-08 11:34:14',
                'updated_at' => '2019-05-08 11:34:14',
            ],

            [
                'id' => '201',
                'label_id' => '80',
                'lang_id' => '3',
                'value' => 'Taxs',
                'created_at' => '2019-05-08 11:34:14',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '202',
                'label_id' => '80',
                'lang_id' => '4',
                'value' => '税金',
                'created_at' => '2019-05-08 11:34:14',
                'updated_at' => '2019-05-08 11:34:14',
            ],

            [
                'id' => '203',
                'label_id' => '81',
                'lang_id' => '2',
                'value' => 'Tỷ giá',
                'created_at' => '2019-05-09 01:50:32',
                'updated_at' => '2019-05-09 01:50:32',
            ],

            [
                'id' => '204',
                'label_id' => '81',
                'lang_id' => '3',
                'value' => 'Rate Price',
                'created_at' => '2019-05-09 01:50:32',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '205',
                'label_id' => '81',
                'lang_id' => '4',
                'value' => '料金を見る',
                'created_at' => '2019-05-09 01:50:32',
                'updated_at' => '2019-05-09 01:50:32',
            ],

            [
                'id' => '206',
                'label_id' => '82',
                'lang_id' => '2',
                'value' => 'Mặt định',
                'created_at' => '2019-05-09 01:53:51',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '207',
                'label_id' => '82',
                'lang_id' => '3',
                'value' => 'Default',
                'created_at' => '2019-05-09 01:53:51',
                'updated_at' => '2019-05-09 01:53:51',
            ],

            [
                'id' => '208',
                'label_id' => '82',
                'lang_id' => '4',
                'value' => 'デフォルト',
                'created_at' => '2019-05-09 01:53:52',
                'updated_at' => '2019-05-09 01:53:52',
            ],

            [
                'id' => '209',
                'label_id' => '83',
                'lang_id' => '2',
                'value' => 'Viết tắc tiền',
                'created_at' => '2019-05-09 02:04:51',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '210',
                'label_id' => '83',
                'lang_id' => '3',
                'value' => 'Money short',
                'created_at' => '2019-05-09 02:04:51',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '211',
                'label_id' => '83',
                'lang_id' => '4',
                'value' => 'マネーショート',
                'created_at' => '2019-05-09 02:04:51',
                'updated_at' => '2019-05-09 02:04:51',
            ],

            [
                'id' => '212',
                'label_id' => '84',
                'lang_id' => '2',
                'value' => 'Chọn nhóm sản phẩm',
                'created_at' => '2019-05-13 03:19:04',
                'updated_at' => '2019-05-13 03:19:04',
            ],

            [
                'id' => '213',
                'label_id' => '84',
                'lang_id' => '3',
                'value' => 'Select Product Group',
                'created_at' => '2019-05-13 03:19:04',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '214',
                'label_id' => '84',
                'lang_id' => '4',
                'value' => '製品グループを選択',
                'created_at' => '2019-05-13 03:19:04',
                'updated_at' => '2019-05-13 03:19:04',
            ],

            [
                'id' => '215',
                'label_id' => '85',
                'lang_id' => '2',
                'value' => 'Chi nhánh',
                'created_at' => '2019-06-07 01:51:23',
                'updated_at' => '2019-06-07 01:51:23',
            ],

            [
                'id' => '216',
                'label_id' => '85',
                'lang_id' => '3',
                'value' => 'Branch',
                'created_at' => '2019-06-07 01:51:23',
                'updated_at' => '2019-06-07 01:51:23',
            ],

            [
                'id' => '217',
                'label_id' => '85',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 01:51:23',
                'updated_at' => '2019-06-07 01:51:23',
            ],

            [
                'id' => '218',
                'label_id' => '86',
                'lang_id' => '2',
                'value' => 'Chọn',
                'created_at' => '2019-06-07 01:52:12',
                'updated_at' => '2019-06-07 01:52:12',
            ],

            [
                'id' => '219',
                'label_id' => '86',
                'lang_id' => '3',
                'value' => 'Select',
                'created_at' => '2019-06-07 01:52:12',
                'updated_at' => '2019-06-07 01:52:12',
            ],

            [
                'id' => '220',
                'label_id' => '86',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 01:52:12',
                'updated_at' => '2019-06-07 01:52:12',
            ],

            [
                'id' => '221',
                'label_id' => '87',
                'lang_id' => '2',
                'value' => 'Công trình',
                'created_at' => '2019-06-07 01:53:49',
                'updated_at' => '2019-06-07 01:53:49',
            ],

            [
                'id' => '222',
                'label_id' => '87',
                'lang_id' => '3',
                'value' => 'Construction',
                'created_at' => '2019-06-07 01:53:50',
                'updated_at' => '2019-06-07 01:53:50',
            ],

            [
                'id' => '223',
                'label_id' => '87',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 01:53:50',
                'updated_at' => '2019-06-07 01:53:50',
            ],

            [
                'id' => '224',
                'label_id' => '88',
                'lang_id' => '2',
                'value' => 'Khu vực',
                'created_at' => '2019-06-07 01:58:54',
                'updated_at' => '2019-06-07 01:58:54',
            ],

            [
                'id' => '225',
                'label_id' => '88',
                'lang_id' => '3',
                'value' => 'Area',
                'created_at' => '2019-06-07 01:58:54',
                'updated_at' => '2019-06-07 01:58:54',
            ],

            [
                'id' => '226',
                'label_id' => '88',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 01:58:54',
                'updated_at' => '2019-06-07 01:58:54',
            ],

            [
                'id' => '227',
                'label_id' => '89',
                'lang_id' => '2',
                'value' => 'Ngày cập nhật',
                'created_at' => '2019-06-07 08:39:46',
                'updated_at' => '2019-06-07 08:39:46',
            ],

            [
                'id' => '228',
                'label_id' => '89',
                'lang_id' => '3',
                'value' => 'Updated at',
                'created_at' => '2019-06-07 08:39:46',
                'updated_at' => '2019-06-07 08:39:46',
            ],

            [
                'id' => '229',
                'label_id' => '89',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 08:39:46',
                'updated_at' => '2019-06-07 08:39:46',
            ],

            [
                'id' => '230',
                'label_id' => '90',
                'lang_id' => '2',
                'value' => 'Nhóm',
                'created_at' => '2019-06-07 09:37:52',
                'updated_at' => '2019-06-07 09:37:52',
            ],

            [
                'id' => '231',
                'label_id' => '90',
                'lang_id' => '3',
                'value' => 'Group',
                'created_at' => '2019-06-07 09:37:52',
                'updated_at' => '2019-06-07 09:37:52',
            ],

            [
                'id' => '232',
                'label_id' => '90',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-07 09:37:52',
                'updated_at' => '2019-06-07 09:37:52',
            ],

            [
                'id' => '233',
                'label_id' => '91',
                'lang_id' => '2',
                'value' => 'Xem',
                'created_at' => '2019-06-08 07:26:24',
                'updated_at' => '2019-06-08 07:26:24',
            ],

            [
                'id' => '234',
                'label_id' => '91',
                'lang_id' => '3',
                'value' => 'View',
                'created_at' => '2019-06-08 07:26:24',
                'updated_at' => '2019-06-08 07:26:24',
            ],

            [
                'id' => '235',
                'label_id' => '91',
                'lang_id' => '4',
                'value' => '見る',
                'created_at' => '2019-06-08 07:26:24',
                'updated_at' => '2019-06-08 07:26:24',
            ],

            [
                'id' => '239',
                'label_id' => '93',
                'lang_id' => '2',
                'value' => 'Xóa',
                'created_at' => '2019-06-08 07:27:34',
                'updated_at' => '2019-06-08 07:27:34',
            ],

            [
                'id' => '240',
                'label_id' => '93',
                'lang_id' => '3',
                'value' => 'Delete',
                'created_at' => '2019-06-08 07:27:34',
                'updated_at' => '2019-06-08 07:27:34',
            ],

            [
                'id' => '241',
                'label_id' => '93',
                'lang_id' => '4',
                'value' => '削除する',
                'created_at' => '2019-06-08 07:27:34',
                'updated_at' => '2019-06-08 07:27:34',
            ],

            [
                'id' => '242',
                'label_id' => '94',
                'lang_id' => '2',
                'value' => 'Báo giá',
                'created_at' => '2019-06-10 04:02:33',
                'updated_at' => '2019-06-10 04:02:33',
            ],

            [
                'id' => '243',
                'label_id' => '94',
                'lang_id' => '3',
                'value' => 'Quotation',
                'created_at' => '2019-06-10 04:02:33',
                'updated_at' => '2019-06-10 04:02:33',
            ],

            [
                'id' => '244',
                'label_id' => '94',
                'lang_id' => '4',
                'value' => '見積もり',
                'created_at' => '2019-06-10 04:02:33',
                'updated_at' => '2019-06-10 04:02:33',
            ],

            [
                'id' => '245',
                'label_id' => '95',
                'lang_id' => '2',
                'value' => 'Mã',
                'created_at' => '2019-06-10 07:34:27',
                'updated_at' => '2019-06-10 07:34:27',
            ],

            [
                'id' => '246',
                'label_id' => '95',
                'lang_id' => '3',
                'value' => 'Code',
                'created_at' => '2019-06-10 07:34:27',
                'updated_at' => '2019-06-10 07:34:27',
            ],

            [
                'id' => '247',
                'label_id' => '95',
                'lang_id' => '4',
                'value' => 'コード',
                'created_at' => '2019-06-10 07:34:27',
                'updated_at' => '2019-06-10 07:34:27',
            ],

            [
                'id' => '248',
                'label_id' => '96',
                'lang_id' => '2',
                'value' => 'Số lượng',
                'created_at' => '2019-06-10 07:37:44',
                'updated_at' => '2019-06-10 07:37:44',
            ],

            [
                'id' => '249',
                'label_id' => '96',
                'lang_id' => '3',
                'value' => 'Quantity',
                'created_at' => '2019-06-10 07:37:44',
                'updated_at' => '2019-06-10 07:37:44',
            ],

            [
                'id' => '250',
                'label_id' => '96',
                'lang_id' => '4',
                'value' => '量',
                'created_at' => '2019-06-10 07:37:44',
                'updated_at' => '2019-06-10 07:37:44',
            ],

            [
                'id' => '251',
                'label_id' => '97',
                'lang_id' => '2',
                'value' => 'Thêm báo giá',
                'created_at' => '2019-06-10 07:38:37',
                'updated_at' => '2019-06-10 07:38:37',
            ],

            [
                'id' => '252',
                'label_id' => '97',
                'lang_id' => '3',
                'value' => 'Add new quotation',
                'created_at' => '2019-06-10 07:38:37',
                'updated_at' => '2019-06-10 07:38:37',
            ],

            [
                'id' => '253',
                'label_id' => '97',
                'lang_id' => '4',
                'value' => '新しい見積もりを追加',
                'created_at' => '2019-06-10 07:38:37',
                'updated_at' => '2019-06-10 07:38:37',
            ],

            [
                'id' => '254',
                'label_id' => '98',
                'lang_id' => '2',
                'value' => 'Giá sản phẩm',
                'created_at' => '2019-06-10 07:39:25',
                'updated_at' => '2019-06-10 07:39:25',
            ],

            [
                'id' => '255',
                'label_id' => '98',
                'lang_id' => '3',
                'value' => 'Product price',
                'created_at' => '2019-06-10 07:39:25',
                'updated_at' => '2019-06-10 07:39:25',
            ],

            [
                'id' => '256',
                'label_id' => '98',
                'lang_id' => '4',
                'value' => '商品の価格',
                'created_at' => '2019-06-10 07:39:25',
                'updated_at' => '2019-06-10 07:39:25',
            ],

            [
                'id' => '257',
                'label_id' => '99',
                'lang_id' => '2',
                'value' => 'Phí cài đặt',
                'created_at' => '2019-06-10 07:42:44',
                'updated_at' => '2019-06-10 07:42:44',
            ],

            [
                'id' => '258',
                'label_id' => '99',
                'lang_id' => '3',
                'value' => 'Installation fee',
                'created_at' => '2019-06-10 07:42:44',
                'updated_at' => '2019-06-10 07:42:44',
            ],

            [
                'id' => '259',
                'label_id' => '99',
                'lang_id' => '4',
                'value' => '設置料',
                'created_at' => '2019-06-10 07:42:44',
                'updated_at' => '2019-06-10 07:42:44',
            ],

            [
                'id' => '260',
                'label_id' => '100',
                'lang_id' => '2',
                'value' => 'Phí vận chuyển nội địa',
                'created_at' => '2019-06-10 07:43:19',
                'updated_at' => '2019-06-10 07:43:19',
            ],

            [
                'id' => '261',
                'label_id' => '100',
                'lang_id' => '3',
                'value' => 'Inland freight fee',
                'created_at' => '2019-06-10 07:43:19',
                'updated_at' => '2019-06-10 07:43:19',
            ],

            [
                'id' => '262',
                'label_id' => '100',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-10 07:43:19',
                'updated_at' => '2019-06-10 07:43:19',
            ],

            [
                'id' => '263',
                'label_id' => '101',
                'lang_id' => '2',
                'value' => 'Giá gốc',
                'created_at' => '2019-06-10 07:44:38',
                'updated_at' => '2019-06-10 07:51:13',
            ],

            [
                'id' => '264',
                'label_id' => '101',
                'lang_id' => '3',
                'value' => 'Sale price',
                'created_at' => '2019-06-10 07:44:38',
                'updated_at' => '2019-06-10 07:44:38',
            ],

            [
                'id' => '265',
                'label_id' => '101',
                'lang_id' => '4',
                'value' => '元の価格',
                'created_at' => '2019-06-10 07:44:39',
                'updated_at' => '2019-06-10 07:51:13',
            ],

            [
                'id' => '266',
                'label_id' => '102',
                'lang_id' => '2',
                'value' => 'Xuất bản',
                'created_at' => '2019-06-10 07:46:00',
                'updated_at' => '2019-06-10 07:46:00',
            ],

            [
                'id' => '267',
                'label_id' => '102',
                'lang_id' => '3',
                'value' => 'Publish',
                'created_at' => '2019-06-10 07:46:00',
                'updated_at' => '2019-06-10 07:46:00',
            ],

            [
                'id' => '268',
                'label_id' => '102',
                'lang_id' => '4',
                'value' => '公開する',
                'created_at' => '2019-06-10 07:46:00',
                'updated_at' => '2019-06-10 07:46:00',
            ],

            [
                'id' => '269',
                'label_id' => '103',
                'lang_id' => '2',
                'value' => 'Tải báo giá đặc biệt',
                'created_at' => '2019-06-10 07:47:26',
                'updated_at' => '2019-06-10 07:50:33',
            ],

            [
                'id' => '270',
                'label_id' => '103',
                'lang_id' => '3',
                'value' => 'Download Special Quotation',
                'created_at' => '2019-06-10 07:47:26',
                'updated_at' => '2019-06-10 07:47:26',
            ],

            [
                'id' => '271',
                'label_id' => '103',
                'lang_id' => '4',
                'value' => '特別見積をダウンロード',
                'created_at' => '2019-06-10 07:47:26',
                'updated_at' => '2019-06-10 07:47:26',
            ],

            [
                'id' => '272',
                'label_id' => '104',
                'lang_id' => '2',
                'value' => 'Tải báo giá',
                'created_at' => '2019-06-10 07:47:56',
                'updated_at' => '2019-06-10 07:47:56',
            ],

            [
                'id' => '273',
                'label_id' => '104',
                'lang_id' => '3',
                'value' => 'Download Quotation',
                'created_at' => '2019-06-10 07:47:56',
                'updated_at' => '2019-06-10 07:47:56',
            ],

            [
                'id' => '274',
                'label_id' => '104',
                'lang_id' => '4',
                'value' => '見積もりをダウンロード',
                'created_at' => '2019-06-10 07:47:56',
                'updated_at' => '2019-06-10 07:47:56',
            ],

            [
                'id' => '275',
                'label_id' => '105',
                'lang_id' => '2',
                'value' => 'Thông báo',
                'created_at' => '2019-06-10 07:52:45',
                'updated_at' => '2019-06-10 07:52:45',
            ],

            [
                'id' => '276',
                'label_id' => '105',
                'lang_id' => '3',
                'value' => 'Warning',
                'created_at' => '2019-06-10 07:52:45',
                'updated_at' => '2019-06-10 07:52:45',
            ],

            [
                'id' => '277',
                'label_id' => '105',
                'lang_id' => '4',
                'value' => '警告',
                'created_at' => '2019-06-10 07:52:45',
                'updated_at' => '2019-06-10 07:52:45',
            ],

            [
                'id' => '278',
                'label_id' => '106',
                'lang_id' => '2',
                'value' => 'Vui lòng thêm nhóm sản phẩm',
                'created_at' => '2019-06-10 07:54:27',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '279',
                'label_id' => '106',
                'lang_id' => '3',
                'value' => 'Please add product group',
                'created_at' => '2019-06-10 07:54:27',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '280',
                'label_id' => '106',
                'lang_id' => '4',
                'value' => '商品グループを追加してください',
                'created_at' => '2019-06-10 07:54:27',
                'updated_at' => '2019-06-10 07:54:27',
            ],

            [
                'id' => '281',
                'label_id' => '107',
                'lang_id' => '2',
                'value' => 'Sửa',
                'created_at' => '2019-06-10 07:56:05',
                'updated_at' => '2019-06-10 07:56:05',
            ],

            [
                'id' => '282',
                'label_id' => '107',
                'lang_id' => '3',
                'value' => 'Edit',
                'created_at' => '2019-06-10 07:56:05',
                'updated_at' => '2019-06-10 07:56:05',
            ],

            [
                'id' => '283',
                'label_id' => '107',
                'lang_id' => '4',
                'value' => '編集する',
                'created_at' => '2019-06-10 07:56:05',
                'updated_at' => '2019-06-10 07:56:05',
            ],

            [
                'id' => '284',
                'label_id' => '108',
                'lang_id' => '2',
                'value' => 'Thêm',
                'created_at' => '2019-06-10 07:56:32',
                'updated_at' => '2019-06-10 07:56:32',
            ],

            [
                'id' => '285',
                'label_id' => '108',
                'lang_id' => '3',
                'value' => 'Add',
                'created_at' => '2019-06-10 07:56:32',
                'updated_at' => '2019-06-10 07:56:32',
            ],

            [
                'id' => '286',
                'label_id' => '108',
                'lang_id' => '4',
                'value' => '追加する',
                'created_at' => '2019-06-10 07:56:32',
                'updated_at' => '2019-06-10 07:56:32',
            ],

            [
                'id' => '287',
                'label_id' => '109',
                'lang_id' => '2',
                'value' => 'Lưu',
                'created_at' => '2019-06-10 08:03:20',
                'updated_at' => '2019-06-10 08:03:20',
            ],

            [
                'id' => '288',
                'label_id' => '109',
                'lang_id' => '3',
                'value' => 'Save',
                'created_at' => '2019-06-10 08:03:20',
                'updated_at' => '2019-06-10 08:03:20',
            ],

            [
                'id' => '289',
                'label_id' => '109',
                'lang_id' => '4',
                'value' => '保存する',
                'created_at' => '2019-06-10 08:03:20',
                'updated_at' => '2019-06-10 08:03:20',
            ],

            [
                'id' => '290',
                'label_id' => '110',
                'lang_id' => '2',
                'value' => 'Thoát',
                'created_at' => '2019-06-10 08:04:02',
                'updated_at' => '2019-06-10 08:04:02',
            ],

            [
                'id' => '291',
                'label_id' => '110',
                'lang_id' => '3',
                'value' => 'Cancel',
                'created_at' => '2019-06-10 08:04:02',
                'updated_at' => '2019-06-10 08:04:02',
            ],

            [
                'id' => '292',
                'label_id' => '110',
                'lang_id' => '4',
                'value' => 'キャンセル',
                'created_at' => '2019-06-10 08:04:02',
                'updated_at' => '2019-06-10 08:04:02',
            ],

            [
                'id' => '293',
                'label_id' => '111',
                'lang_id' => '2',
                'value' => 'Sao chép',
                'created_at' => '2019-06-10 09:12:06',
                'updated_at' => '2019-06-10 09:12:06',
            ],

            [
                'id' => '294',
                'label_id' => '111',
                'lang_id' => '3',
                'value' => 'Copy',
                'created_at' => '2019-06-10 09:12:06',
                'updated_at' => '2019-06-10 09:12:06',
            ],

            [
                'id' => '295',
                'label_id' => '111',
                'lang_id' => '4',
                'value' => 'コピーする',
                'created_at' => '2019-06-10 09:12:06',
                'updated_at' => '2019-06-10 09:12:06',
            ],

            [
                'id' => '296',
                'label_id' => '112',
                'lang_id' => '2',
                'value' => 'Tạo đơn hàng',
                'created_at' => '2019-06-10 09:13:17',
                'updated_at' => '2019-06-10 09:13:17',
            ],

            [
                'id' => '297',
                'label_id' => '112',
                'lang_id' => '3',
                'value' => 'Created Order',
                'created_at' => '2019-06-10 09:13:17',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '298',
                'label_id' => '112',
                'lang_id' => '4',
                'value' => '作成した注文',
                'created_at' => '2019-06-10 09:13:17',
                'updated_at' => '2019-06-10 09:13:17',
            ],

            [
                'id' => '299',
                'label_id' => '113',
                'lang_id' => '2',
                'value' => 'Thêm mới',
                'created_at' => '2019-06-10 11:26:56',
                'updated_at' => '2019-06-10 11:26:56',
            ],

            [
                'id' => '300',
                'label_id' => '113',
                'lang_id' => '3',
                'value' => 'Add new',
                'created_at' => '2019-06-10 11:26:56',
                'updated_at' => '2019-06-10 11:26:56',
            ],

            [
                'id' => '301',
                'label_id' => '113',
                'lang_id' => '4',
                'value' => '新しく追加する',
                'created_at' => '2019-06-10 11:26:56',
                'updated_at' => '2019-06-10 11:26:56',
            ],

            [
                'id' => '302',
                'label_id' => '114',
                'lang_id' => '2',
                'value' => 'Trạng thái báo giá không cho phép tạo đơn hàng',
                'created_at' => '2019-06-12 02:11:43',
                'updated_at' => '2019-06-12 02:11:43',
            ],

            [
                'id' => '303',
                'label_id' => '114',
                'lang_id' => '3',
                'value' => 'Quotation status does not allow creation of orders',
                'created_at' => '2019-06-12 02:11:43',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '304',
                'label_id' => '114',
                'lang_id' => '4',
                'value' => '見積もりステータスでは注文を作成できません',
                'created_at' => '2019-06-12 02:11:43',
                'updated_at' => '2019-06-12 02:11:43',
            ],

            [
                'id' => '305',
                'label_id' => '115',
                'lang_id' => '2',
                'value' => 'Đơn hàng No.',
                'created_at' => '2019-06-12 04:29:55',
                'updated_at' => '2019-06-12 04:29:55',
            ],

            [
                'id' => '306',
                'label_id' => '115',
                'lang_id' => '3',
                'value' => 'Order No.',
                'created_at' => '2019-06-12 04:29:55',
                'updated_at' => '2019-06-12 04:29:55',
            ],

            [
                'id' => '307',
                'label_id' => '115',
                'lang_id' => '4',
                'value' => '注文番号。',
                'created_at' => '2019-06-12 04:29:55',
                'updated_at' => '2019-06-12 04:29:55',
            ],

            [
                'id' => '308',
                'label_id' => '116',
                'lang_id' => '2',
                'value' => 'Người phụ trách',
                'created_at' => '2019-06-12 04:31:08',
                'updated_at' => '2019-06-12 04:31:08',
            ],

            [
                'id' => '309',
                'label_id' => '116',
                'lang_id' => '3',
                'value' => 'Person in charge',
                'created_at' => '2019-06-12 04:31:08',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '310',
                'label_id' => '116',
                'lang_id' => '4',
                'value' => '担当者',
                'created_at' => '2019-06-12 04:31:08',
                'updated_at' => '2019-06-12 04:31:08',
            ],

            [
                'id' => '311',
                'label_id' => '117',
                'lang_id' => '2',
                'value' => 'Ngày nhận đơn đặt hàng',
                'created_at' => '2019-06-12 04:31:57',
                'updated_at' => '2019-06-12 04:31:57',
            ],

            [
                'id' => '312',
                'label_id' => '117',
                'lang_id' => '3',
                'value' => 'Receiving order date',
                'created_at' => '2019-06-12 04:31:57',
                'updated_at' => '2019-06-12 04:31:57',
            ],

            [
                'id' => '313',
                'label_id' => '117',
                'lang_id' => '4',
                'value' => '受注日',
                'created_at' => '2019-06-12 04:31:57',
                'updated_at' => '2019-06-12 04:31:57',
            ],

            [
                'id' => '317',
                'label_id' => '119',
                'lang_id' => '2',
                'value' => 'Ngày cài đặt theo kế hoạch',
                'created_at' => '2019-06-12 04:33:32',
                'updated_at' => '2019-06-12 04:33:32',
            ],

            [
                'id' => '318',
                'label_id' => '119',
                'lang_id' => '3',
                'value' => 'Planned installation date',
                'created_at' => '2019-06-12 04:33:32',
                'updated_at' => '2019-06-12 04:33:32',
            ],

            [
                'id' => '319',
                'label_id' => '119',
                'lang_id' => '4',
                'value' => '設置予定日',
                'created_at' => '2019-06-12 04:33:32',
                'updated_at' => '2019-06-12 04:33:32',
            ],

            [
                'id' => '320',
                'label_id' => '120',
                'lang_id' => '2',
                'value' => 'Ngày hoàn thành kế hoạch',
                'created_at' => '2019-06-12 04:34:10',
                'updated_at' => '2019-06-12 04:34:10',
            ],

            [
                'id' => '321',
                'label_id' => '120',
                'lang_id' => '3',
                'value' => 'Planned completion date',
                'created_at' => '2019-06-12 04:34:10',
                'updated_at' => '2019-06-12 04:34:10',
            ],

            [
                'id' => '322',
                'label_id' => '120',
                'lang_id' => '4',
                'value' => '計画完了日',
                'created_at' => '2019-06-12 04:34:10',
                'updated_at' => '2019-06-12 04:34:10',
            ],

            [
                'id' => '323',
                'label_id' => '121',
                'lang_id' => '2',
                'value' => 'Hành động',
                'created_at' => '2019-06-12 04:35:02',
                'updated_at' => '2019-06-12 04:35:02',
            ],

            [
                'id' => '324',
                'label_id' => '121',
                'lang_id' => '3',
                'value' => 'Action',
                'created_at' => '2019-06-12 04:35:02',
                'updated_at' => '2019-06-12 04:35:02',
            ],

            [
                'id' => '325',
                'label_id' => '121',
                'lang_id' => '4',
                'value' => 'アクション',
                'created_at' => '2019-06-12 04:35:02',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '326',
                'label_id' => '122',
                'lang_id' => '2',
                'value' => 'Lớp vật phẩm',
                'created_at' => '2019-06-12 04:43:01',
                'updated_at' => '2019-06-12 04:43:01',
            ],

            [
                'id' => '327',
                'label_id' => '122',
                'lang_id' => '3',
                'value' => 'Item class',
                'created_at' => '2019-06-12 04:43:01',
                'updated_at' => '2019-06-12 04:43:01',
            ],

            [
                'id' => '328',
                'label_id' => '122',
                'lang_id' => '4',
                'value' => '品目クラス',
                'created_at' => '2019-06-12 04:43:01',
                'updated_at' => '2019-06-12 04:43:01',
            ],

            [
                'id' => '329',
                'label_id' => '123',
                'lang_id' => '2',
                'value' => 'Tên mục',
                'created_at' => '2019-06-12 04:43:47',
                'updated_at' => '2019-06-12 04:43:47',
            ],

            [
                'id' => '330',
                'label_id' => '123',
                'lang_id' => '3',
                'value' => 'Item name',
                'created_at' => '2019-06-12 04:43:47',
                'updated_at' => '2019-06-12 04:43:47',
            ],

            [
                'id' => '331',
                'label_id' => '123',
                'lang_id' => '4',
                'value' => '項目名',
                'created_at' => '2019-06-12 04:43:47',
                'updated_at' => '2019-06-12 04:43:47',
            ],

            [
                'id' => '332',
                'label_id' => '124',
                'lang_id' => '2',
                'value' => 'Chiều rộng',
                'created_at' => '2019-06-12 04:44:17',
                'updated_at' => '2019-06-12 04:44:17',
            ],

            [
                'id' => '333',
                'label_id' => '124',
                'lang_id' => '3',
                'value' => 'Width',
                'created_at' => '2019-06-12 04:44:17',
                'updated_at' => '2019-06-12 04:44:17',
            ],

            [
                'id' => '334',
                'label_id' => '124',
                'lang_id' => '4',
                'value' => '幅',
                'created_at' => '2019-06-12 04:44:17',
                'updated_at' => '2019-06-12 04:44:17',
            ],

            [
                'id' => '335',
                'label_id' => '125',
                'lang_id' => '2',
                'value' => 'Chiều cao',
                'created_at' => '2019-06-12 04:44:53',
                'updated_at' => '2019-06-12 04:44:53',
            ],

            [
                'id' => '336',
                'label_id' => '125',
                'lang_id' => '3',
                'value' => 'Height',
                'created_at' => '2019-06-12 04:44:53',
                'updated_at' => '2019-06-12 04:44:53',
            ],

            [
                'id' => '337',
                'label_id' => '125',
                'lang_id' => '4',
                'value' => '高さ',
                'created_at' => '2019-06-12 04:44:53',
                'updated_at' => '2019-06-12 04:44:53',
            ],

            [
                'id' => '338',
                'label_id' => '126',
                'lang_id' => '2',
                'value' => 'Nhận xét',
                'created_at' => '2019-06-12 04:45:41',
                'updated_at' => '2019-06-12 04:45:41',
            ],

            [
                'id' => '339',
                'label_id' => '126',
                'lang_id' => '3',
                'value' => 'Remarks',
                'created_at' => '2019-06-12 04:45:41',
                'updated_at' => '2019-06-12 04:45:41',
            ],

            [
                'id' => '340',
                'label_id' => '126',
                'lang_id' => '4',
                'value' => '備考',
                'created_at' => '2019-06-12 04:45:41',
                'updated_at' => '2019-06-12 04:45:41',
            ],

            [
                'id' => '341',
                'label_id' => '127',
                'lang_id' => '2',
                'value' => 'Tổng giá gốc',
                'created_at' => '2019-06-12 04:46:34',
                'updated_at' => '2019-06-12 04:48:39',
            ],

            [
                'id' => '342',
                'label_id' => '127',
                'lang_id' => '3',
                'value' => 'Total sale price',
                'created_at' => '2019-06-12 04:46:34',
                'updated_at' => '2019-06-12 04:46:34',
            ],

            [
                'id' => '343',
                'label_id' => '127',
                'lang_id' => '4',
                'value' => 'タンギアムア',
                'created_at' => '2019-06-12 04:46:34',
                'updated_at' => '2019-06-12 04:46:34',
            ],

            [
                'id' => '344',
                'label_id' => '128',
                'lang_id' => '2',
                'value' => 'Tổng giá bán',
                'created_at' => '2019-06-12 04:47:21',
                'updated_at' => '2019-06-12 04:47:21',
            ],

            [
                'id' => '345',
                'label_id' => '128',
                'lang_id' => '3',
                'value' => 'Total price',
                'created_at' => '2019-06-12 04:47:21',
                'updated_at' => '2019-06-12 04:47:21',
            ],

            [
                'id' => '346',
                'label_id' => '128',
                'lang_id' => '4',
                'value' => '合計金額',
                'created_at' => '2019-06-12 04:47:21',
                'updated_at' => '2019-06-12 04:47:21',
            ],

            [
                'id' => '347',
                'label_id' => '129',
                'lang_id' => '2',
                'value' => 'Thêm vào danh sách',
                'created_at' => '2019-06-12 04:49:45',
                'updated_at' => '2019-06-12 04:49:45',
            ],

            [
                'id' => '348',
                'label_id' => '129',
                'lang_id' => '3',
                'value' => 'Add To List',
                'created_at' => '2019-06-12 04:49:46',
                'updated_at' => '2019-06-12 04:49:46',
            ],

            [
                'id' => '349',
                'label_id' => '129',
                'lang_id' => '4',
                'value' => 'リストに追加',
                'created_at' => '2019-06-12 04:49:46',
                'updated_at' => '2019-06-12 04:49:46',
            ],

            [
                'id' => '350',
                'label_id' => '130',
                'lang_id' => '2',
                'value' => 'Lưu thay đổi',
                'created_at' => '2019-06-12 04:51:31',
                'updated_at' => '2019-06-12 04:51:31',
            ],

            [
                'id' => '351',
                'label_id' => '130',
                'lang_id' => '3',
                'value' => 'Save changes',
                'created_at' => '2019-06-12 04:51:31',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '352',
                'label_id' => '130',
                'lang_id' => '4',
                'value' => '変更を保存',
                'created_at' => '2019-06-12 04:51:31',
                'updated_at' => '2019-06-12 04:51:31',
            ],

            [
                'id' => '353',
                'label_id' => '131',
                'lang_id' => '2',
                'value' => 'Mặt hàng mới khác',
                'created_at' => '2019-06-12 04:52:41',
                'updated_at' => '2019-06-12 04:52:41',
            ],

            [
                'id' => '354',
                'label_id' => '131',
                'lang_id' => '3',
                'value' => 'New Other Item',
                'created_at' => '2019-06-12 04:52:41',
                'updated_at' => '2019-06-12 04:52:41',
            ],

            [
                'id' => '355',
                'label_id' => '131',
                'lang_id' => '4',
                'value' => 'その他の新商品',
                'created_at' => '2019-06-12 04:52:41',
                'updated_at' => '2019-06-12 04:52:41',
            ],

            [
                'id' => '356',
                'label_id' => '132',
                'lang_id' => '2',
                'value' => 'Ngày giao hàng theo kế hoạch',
                'created_at' => '2019-06-12 04:55:58',
                'updated_at' => '2019-06-12 04:55:58',
            ],

            [
                'id' => '357',
                'label_id' => '132',
                'lang_id' => '3',
                'value' => 'Planned delivery date',
                'created_at' => '2019-06-12 04:55:58',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '358',
                'label_id' => '132',
                'lang_id' => '4',
                'value' => '配達予定日',
                'created_at' => '2019-06-12 04:55:58',
                'updated_at' => '2019-06-12 04:55:58',
            ],

            [
                'id' => '359',
                'label_id' => '133',
                'lang_id' => '2',
                'value' => 'Tên công trường',
                'created_at' => '2019-06-12 04:58:08',
                'updated_at' => '2019-06-12 04:58:08',
            ],

            [
                'id' => '360',
                'label_id' => '133',
                'lang_id' => '3',
                'value' => 'Construction site name',
                'created_at' => '2019-06-12 04:58:08',
                'updated_at' => '2019-06-12 04:58:08',
            ],

            [
                'id' => '361',
                'label_id' => '133',
                'lang_id' => '4',
                'value' => '工事現場名',
                'created_at' => '2019-06-12 04:58:08',
                'updated_at' => '2019-06-12 04:58:08',
            ],

            [
                'id' => '362',
                'label_id' => '134',
                'lang_id' => '2',
                'value' => 'Địa chỉ công trường',
                'created_at' => '2019-06-12 04:58:48',
                'updated_at' => '2019-06-12 04:58:48',
            ],

            [
                'id' => '363',
                'label_id' => '134',
                'lang_id' => '3',
                'value' => 'Construction site address',
                'created_at' => '2019-06-12 04:58:48',
                'updated_at' => '2019-07-17 11:30:08',
            ],

            [
                'id' => '364',
                'label_id' => '134',
                'lang_id' => '4',
                'value' => '工事現場アドレス',
                'created_at' => '2019-06-12 04:58:48',
                'updated_at' => '2019-06-12 04:58:48',
            ],

            [
                'id' => '365',
                'label_id' => '135',
                'lang_id' => '2',
                'value' => 'Quản lý xây dựng',
                'created_at' => '2019-06-12 05:00:02',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '366',
                'label_id' => '135',
                'lang_id' => '3',
                'value' => 'Construction manager',
                'created_at' => '2019-06-12 05:00:02',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '367',
                'label_id' => '135',
                'lang_id' => '4',
                'value' => '建設部長',
                'created_at' => '2019-06-12 05:00:02',
                'updated_at' => '2019-06-12 05:00:02',
            ],

            [
                'id' => '368',
                'label_id' => '136',
                'lang_id' => '2',
                'value' => 'Chi tiết báo giá',
                'created_at' => '2019-06-12 05:05:22',
                'updated_at' => '2019-06-12 05:05:22',
            ],

            [
                'id' => '369',
                'label_id' => '136',
                'lang_id' => '3',
                'value' => 'Quotation details',
                'created_at' => '2019-06-12 05:05:22',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '370',
                'label_id' => '136',
                'lang_id' => '4',
                'value' => '価格詳細',
                'created_at' => '2019-06-12 05:05:22',
                'updated_at' => '2019-06-12 05:05:22',
            ],

            [
                'id' => '371',
                'label_id' => '137',
                'lang_id' => '2',
                'value' => 'Số điện thoại',
                'created_at' => '2019-06-12 05:10:25',
                'updated_at' => '2019-06-12 05:10:25',
            ],

            [
                'id' => '372',
                'label_id' => '137',
                'lang_id' => '3',
                'value' => 'Phone',
                'created_at' => '2019-06-12 05:10:25',
                'updated_at' => '2019-06-12 05:10:25',
            ],

            [
                'id' => '373',
                'label_id' => '137',
                'lang_id' => '4',
                'value' => '電話番号',
                'created_at' => '2019-06-12 05:10:25',
                'updated_at' => '2019-06-12 05:10:25',
            ],

            [
                'id' => '374',
                'label_id' => '138',
                'lang_id' => '2',
                'value' => 'Số fax',
                'created_at' => '2019-06-12 05:11:00',
                'updated_at' => '2019-06-12 05:11:00',
            ],

            [
                'id' => '375',
                'label_id' => '138',
                'lang_id' => '3',
                'value' => 'Fax',
                'created_at' => '2019-06-12 05:11:00',
                'updated_at' => '2019-06-12 05:11:00',
            ],

            [
                'id' => '376',
                'label_id' => '138',
                'lang_id' => '4',
                'value' => 'ファックス',
                'created_at' => '2019-06-12 05:11:00',
                'updated_at' => '2019-06-12 05:11:00',
            ],

            [
                'id' => '377',
                'label_id' => '139',
                'lang_id' => '2',
                'value' => 'Trạng thái',
                'created_at' => '2019-06-12 05:13:18',
                'updated_at' => '2019-06-12 05:13:18',
            ],

            [
                'id' => '378',
                'label_id' => '139',
                'lang_id' => '3',
                'value' => 'Status',
                'created_at' => '2019-06-12 05:13:18',
                'updated_at' => '2019-06-12 05:13:18',
            ],

            [
                'id' => '379',
                'label_id' => '139',
                'lang_id' => '4',
                'value' => '状態',
                'created_at' => '2019-06-12 05:13:18',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '380',
                'label_id' => '140',
                'lang_id' => '2',
                'value' => 'Tạo hợp đồng',
                'created_at' => '2019-06-12 07:24:36',
                'updated_at' => '2019-06-12 07:24:36',
            ],

            [
                'id' => '381',
                'label_id' => '140',
                'lang_id' => '3',
                'value' => 'Create contract',
                'created_at' => '2019-06-12 07:24:36',
                'updated_at' => '2019-06-12 07:24:36',
            ],

            [
                'id' => '382',
                'label_id' => '140',
                'lang_id' => '4',
                'value' => '契約を作成する',
                'created_at' => '2019-06-12 07:24:36',
                'updated_at' => '2019-06-12 07:24:36',
            ],

            [
                'id' => '383',
                'label_id' => '141',
                'lang_id' => '2',
                'value' => 'Bạn có chắc chắn muốn làm điều này?',
                'created_at' => '2019-06-13 09:52:31',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '384',
                'label_id' => '141',
                'lang_id' => '3',
                'value' => 'Are you sure you want to do this?',
                'created_at' => '2019-06-13 09:52:31',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '385',
                'label_id' => '141',
                'lang_id' => '4',
                'value' => 'これは何ですか？',
                'created_at' => '2019-06-13 09:52:31',
                'updated_at' => '2019-06-13 09:52:31',
            ],

            [
                'id' => '386',
                'label_id' => '142',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập giá tiền',
                'created_at' => '2019-06-14 01:31:28',
                'updated_at' => '2019-06-14 01:31:28',
            ],

            [
                'id' => '387',
                'label_id' => '142',
                'lang_id' => '3',
                'value' => 'Please enter the price',
                'created_at' => '2019-06-14 01:31:28',
                'updated_at' => '2019-06-14 01:31:28',
            ],

            [
                'id' => '388',
                'label_id' => '142',
                'lang_id' => '4',
                'value' => '価格を入力してください',
                'created_at' => '2019-06-14 01:31:28',
                'updated_at' => '2019-06-14 01:31:28',
            ],

            [
                'id' => '389',
                'label_id' => '143',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập số',
                'created_at' => '2019-06-14 01:32:06',
                'updated_at' => '2019-06-14 01:32:06',
            ],

            [
                'id' => '390',
                'label_id' => '143',
                'lang_id' => '3',
                'value' => 'Please enter the number',
                'created_at' => '2019-06-14 01:32:06',
                'updated_at' => '2019-06-14 01:32:06',
            ],

            [
                'id' => '391',
                'label_id' => '143',
                'lang_id' => '4',
                'value' => '番号を入力してください',
                'created_at' => '2019-06-14 01:32:07',
                'updated_at' => '2019-06-14 01:32:07',
            ],

            [
                'id' => '392',
                'label_id' => '144',
                'lang_id' => '2',
                'value' => 'Thay đổi mật khẩu',
                'created_at' => '2019-06-19 02:04:56',
                'updated_at' => '2019-06-19 02:04:56',
            ],

            [
                'id' => '393',
                'label_id' => '144',
                'lang_id' => '3',
                'value' => 'Change password',
                'created_at' => '2019-06-19 02:04:56',
                'updated_at' => '2019-06-19 02:04:56',
            ],

            [
                'id' => '394',
                'label_id' => '144',
                'lang_id' => '4',
                'value' => 'パスワードを変更する',
                'created_at' => '2019-06-19 02:04:56',
                'updated_at' => '2019-06-19 02:04:56',
            ],

            [
                'id' => '395',
                'label_id' => '145',
                'lang_id' => '2',
                'value' => 'Mật khẩu hiện tại',
                'created_at' => '2019-06-19 02:06:02',
                'updated_at' => '2019-06-19 02:06:02',
            ],

            [
                'id' => '396',
                'label_id' => '145',
                'lang_id' => '3',
                'value' => 'Current password',
                'created_at' => '2019-06-19 02:06:02',
                'updated_at' => '2019-06-19 02:06:02',
            ],

            [
                'id' => '397',
                'label_id' => '145',
                'lang_id' => '4',
                'value' => '現在のパスワード',
                'created_at' => '2019-06-19 02:06:02',
                'updated_at' => '2019-06-19 02:06:02',
            ],

            [
                'id' => '398',
                'label_id' => '146',
                'lang_id' => '2',
                'value' => 'Mật khẩu mới',
                'created_at' => '2019-06-19 02:06:36',
                'updated_at' => '2019-06-19 02:06:36',
            ],

            [
                'id' => '399',
                'label_id' => '146',
                'lang_id' => '3',
                'value' => 'New password',
                'created_at' => '2019-06-19 02:06:36',
                'updated_at' => '2019-06-19 02:06:36',
            ],

            [
                'id' => '400',
                'label_id' => '146',
                'lang_id' => '4',
                'value' => '新しいパスワード',
                'created_at' => '2019-06-19 02:06:36',
                'updated_at' => '2019-06-19 02:06:36',
            ],

            [
                'id' => '401',
                'label_id' => '147',
                'lang_id' => '2',
                'value' => 'Xác nhận lại mật khẩu',
                'created_at' => '2019-06-19 02:07:22',
                'updated_at' => '2019-06-19 02:07:22',
            ],

            [
                'id' => '402',
                'label_id' => '147',
                'lang_id' => '3',
                'value' => 'Confirm password',
                'created_at' => '2019-06-19 02:07:23',
                'updated_at' => '2019-06-19 02:07:23',
            ],

            [
                'id' => '403',
                'label_id' => '147',
                'lang_id' => '4',
                'value' => 'パスワードを認証する',
                'created_at' => '2019-06-19 02:07:23',
                'updated_at' => '2019-06-19 02:07:23',
            ],

            [
                'id' => '404',
                'label_id' => '148',
                'lang_id' => '2',
                'value' => 'Thay đổi thành công',
                'created_at' => '2019-06-19 02:35:56',
                'updated_at' => '2019-06-19 02:35:56',
            ],

            [
                'id' => '405',
                'label_id' => '148',
                'lang_id' => '3',
                'value' => 'Successful change',
                'created_at' => '2019-06-19 02:35:56',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '406',
                'label_id' => '148',
                'lang_id' => '4',
                'value' => '成功した変更',
                'created_at' => '2019-06-19 02:35:56',
                'updated_at' => '2019-06-19 02:35:56',
            ],

            [
                'id' => '407',
                'label_id' => '149',
                'lang_id' => '2',
                'value' => 'Tên ngắn',
                'created_at' => '2019-06-19 03:12:15',
                'updated_at' => '2019-06-19 03:12:15',
            ],

            [
                'id' => '408',
                'label_id' => '149',
                'lang_id' => '3',
                'value' => 'Short name',
                'created_at' => '2019-06-19 03:12:15',
                'updated_at' => '2019-06-19 03:12:15',
            ],

            [
                'id' => '409',
                'label_id' => '149',
                'lang_id' => '4',
                'value' => '短い名前',
                'created_at' => '2019-06-19 03:12:15',
                'updated_at' => '2019-06-19 03:12:15',
            ],

            [
                'id' => '410',
                'label_id' => '150',
                'lang_id' => '2',
                'value' => 'Địa chỉ',
                'created_at' => '2019-06-19 03:12:47',
                'updated_at' => '2019-06-19 03:12:47',
            ],

            [
                'id' => '411',
                'label_id' => '150',
                'lang_id' => '3',
                'value' => 'Address',
                'created_at' => '2019-06-19 03:12:47',
                'updated_at' => '2019-06-19 03:12:47',
            ],

            [
                'id' => '412',
                'label_id' => '150',
                'lang_id' => '4',
                'value' => '住所',
                'created_at' => '2019-06-19 03:12:47',
                'updated_at' => '2019-06-19 03:12:47',
            ],

            [
                'id' => '413',
                'label_id' => '151',
                'lang_id' => '2',
                'value' => 'Thêm mới',
                'created_at' => '2019-06-19 03:15:17',
                'updated_at' => '2019-06-19 03:15:17',
            ],

            [
                'id' => '414',
                'label_id' => '151',
                'lang_id' => '3',
                'value' => 'Add new',
                'created_at' => '2019-06-19 03:15:17',
                'updated_at' => '2019-06-19 03:15:17',
            ],

            [
                'id' => '415',
                'label_id' => '151',
                'lang_id' => '4',
                'value' => '追加する',
                'created_at' => '2019-06-19 03:15:17',
                'updated_at' => '2019-06-19 03:15:17',
            ],

            [
                'id' => '416',
                'label_id' => '152',
                'lang_id' => '2',
                'value' => 'Xuất bản',
                'created_at' => '2019-06-19 03:16:42',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '417',
                'label_id' => '152',
                'lang_id' => '3',
                'value' => 'Export',
                'created_at' => '2019-06-19 03:16:42',
                'updated_at' => '2019-06-19 03:16:42',
            ],

            [
                'id' => '418',
                'label_id' => '152',
                'lang_id' => '4',
                'value' => '輸出する',
                'created_at' => '2019-06-19 03:16:42',
                'updated_at' => '2019-06-19 03:16:42',
            ],

            [
                'id' => '419',
                'label_id' => '153',
                'lang_id' => '2',
                'value' => 'Quản lý báo giá',
                'created_at' => '2019-06-19 03:19:20',
                'updated_at' => '2019-06-19 03:19:20',
            ],

            [
                'id' => '420',
                'label_id' => '153',
                'lang_id' => '3',
                'value' => 'Quotations management',
                'created_at' => '2019-06-19 03:19:20',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '421',
                'label_id' => '153',
                'lang_id' => '4',
                'value' => '見積を管理する',
                'created_at' => '2019-06-19 03:19:20',
                'updated_at' => '2019-06-19 03:19:20',
            ],

            [
                'id' => '422',
                'label_id' => '154',
                'lang_id' => '2',
                'value' => 'Lỗi',
                'created_at' => '2019-06-19 03:23:50',
                'updated_at' => '2019-06-19 03:23:50',
            ],

            [
                'id' => '423',
                'label_id' => '154',
                'lang_id' => '3',
                'value' => 'Error',
                'created_at' => '2019-06-19 03:23:50',
                'updated_at' => '2019-06-19 03:23:50',
            ],

            [
                'id' => '424',
                'label_id' => '154',
                'lang_id' => '4',
                'value' => 'ルイ',
                'created_at' => '2019-06-19 03:23:50',
                'updated_at' => '2019-06-19 03:23:50',
            ],

            [
                'id' => '425',
                'label_id' => '155',
                'lang_id' => '2',
                'value' => 'Tìm kiếm',
                'created_at' => '2019-06-19 03:25:57',
                'updated_at' => '2019-06-19 03:25:57',
            ],

            [
                'id' => '426',
                'label_id' => '155',
                'lang_id' => '3',
                'value' => 'Search',
                'created_at' => '2019-06-19 03:25:57',
                'updated_at' => '2019-06-19 03:25:57',
            ],

            [
                'id' => '427',
                'label_id' => '155',
                'lang_id' => '4',
                'value' => 'サーチ',
                'created_at' => '2019-06-19 03:25:57',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '428',
                'label_id' => '156',
                'lang_id' => '2',
                'value' => 'Ngày bắt đầu - Ngày kết thúc',
                'created_at' => '2019-06-19 03:27:01',
                'updated_at' => '2019-06-19 03:27:01',
            ],

            [
                'id' => '429',
                'label_id' => '156',
                'lang_id' => '3',
                'value' => 'Start date - End date',
                'created_at' => '2019-06-19 03:27:01',
                'updated_at' => '2019-06-19 03:27:01',
            ],

            [
                'id' => '430',
                'label_id' => '156',
                'lang_id' => '4',
                'value' => '開始日 - 終了日',
                'created_at' => '2019-06-19 03:27:01',
                'updated_at' => '2019-06-19 03:27:01',
            ],

            [
                'id' => '431',
                'label_id' => '157',
                'lang_id' => '2',
                'value' => 'Từ khóa',
                'created_at' => '2019-06-19 03:28:27',
                'updated_at' => '2019-06-19 03:28:27',
            ],

            [
                'id' => '432',
                'label_id' => '157',
                'lang_id' => '3',
                'value' => 'Keyword',
                'created_at' => '2019-06-19 03:28:27',
                'updated_at' => '2019-06-19 03:28:27',
            ],

            [
                'id' => '433',
                'label_id' => '157',
                'lang_id' => '4',
                'value' => 'キーワード',
                'created_at' => '2019-06-19 03:28:27',
                'updated_at' => '2019-06-19 03:28:27',
            ],

            [
                'id' => '434',
                'label_id' => '158',
                'lang_id' => '2',
                'value' => 'Quản lý khu vực',
                'created_at' => '2019-06-19 03:30:10',
                'updated_at' => '2019-06-19 03:30:10',
            ],

            [
                'id' => '435',
                'label_id' => '158',
                'lang_id' => '3',
                'value' => 'Areas management',
                'created_at' => '2019-06-19 03:30:10',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '436',
                'label_id' => '158',
                'lang_id' => '4',
                'value' => 'エリアを管理する',
                'created_at' => '2019-06-19 03:30:10',
                'updated_at' => '2019-06-19 03:30:10',
            ],

            [
                'id' => '437',
                'label_id' => '159',
                'lang_id' => '2',
                'value' => 'Chọn thuộc tính',
                'created_at' => '2019-06-19 03:37:07',
                'updated_at' => '2019-06-19 03:37:07',
            ],

            [
                'id' => '438',
                'label_id' => '159',
                'lang_id' => '3',
                'value' => 'Select Attribute',
                'created_at' => '2019-06-19 03:37:07',
                'updated_at' => '2019-06-19 03:37:07',
            ],

            [
                'id' => '439',
                'label_id' => '159',
                'lang_id' => '4',
                'value' => '属性を選択',
                'created_at' => '2019-06-19 03:37:07',
                'updated_at' => '2019-06-19 03:37:07',
            ],

            [
                'id' => '440',
                'label_id' => '160',
                'lang_id' => '2',
                'value' => 'Mô hình giá',
                'created_at' => '2019-06-19 03:38:16',
                'updated_at' => '2019-06-19 03:38:16',
            ],

            [
                'id' => '441',
                'label_id' => '160',
                'lang_id' => '3',
                'value' => 'Price Pattern',
                'created_at' => '2019-06-19 03:38:16',
                'updated_at' => '2019-06-19 03:38:16',
            ],

            [
                'id' => '442',
                'label_id' => '160',
                'lang_id' => '4',
                'value' => '価格パターン',
                'created_at' => '2019-06-19 03:38:17',
                'updated_at' => '2019-06-19 03:38:17',
            ],

            [
                'id' => '443',
                'label_id' => '161',
                'lang_id' => '2',
                'value' => 'Khóa giá',
                'created_at' => '2019-06-19 03:39:21',
                'updated_at' => '2019-06-19 03:39:21',
            ],

            [
                'id' => '444',
                'label_id' => '161',
                'lang_id' => '3',
                'value' => 'Price Key',
                'created_at' => '2019-06-19 03:39:21',
                'updated_at' => '2019-06-19 03:39:21',
            ],

            [
                'id' => '445',
                'label_id' => '161',
                'lang_id' => '4',
                'value' => '価格キー',
                'created_at' => '2019-06-19 03:39:21',
                'updated_at' => '2019-06-19 03:39:21',
            ],

            [
                'id' => '446',
                'label_id' => '162',
                'lang_id' => '2',
                'value' => 'Giá trị thuộc tính',
                'created_at' => '2019-06-19 03:44:33',
                'updated_at' => '2019-06-19 03:44:33',
            ],

            [
                'id' => '447',
                'label_id' => '162',
                'lang_id' => '3',
                'value' => 'Atribute value',
                'created_at' => '2019-06-19 03:44:34',
                'updated_at' => '2019-06-19 03:44:34',
            ],

            [
                'id' => '448',
                'label_id' => '162',
                'lang_id' => '4',
                'value' => '性値',
                'created_at' => '2019-06-19 03:44:34',
                'updated_at' => '2019-06-19 03:44:34',
            ],

            [
                'id' => '449',
                'label_id' => '163',
                'lang_id' => '2',
                'value' => 'Thêm mục',
                'created_at' => '2019-06-19 03:48:09',
                'updated_at' => '2019-06-19 03:48:09',
            ],

            [
                'id' => '450',
                'label_id' => '163',
                'lang_id' => '3',
                'value' => 'Add item',
                'created_at' => '2019-06-19 03:48:09',
                'updated_at' => '2019-06-19 03:48:09',
            ],

            [
                'id' => '451',
                'label_id' => '163',
                'lang_id' => '4',
                'value' => 'アイテムを追加',
                'created_at' => '2019-06-19 03:48:09',
                'updated_at' => '2019-06-19 03:48:09',
            ],

            [
                'id' => '452',
                'label_id' => '164',
                'lang_id' => '2',
                'value' => 'Url',
                'created_at' => '2019-06-19 03:48:41',
                'updated_at' => '2019-06-19 03:48:41',
            ],

            [
                'id' => '453',
                'label_id' => '164',
                'lang_id' => '3',
                'value' => 'Url',
                'created_at' => '2019-06-19 03:48:41',
                'updated_at' => '2019-06-19 03:48:41',
            ],

            [
                'id' => '454',
                'label_id' => '164',
                'lang_id' => '4',
                'value' => 'Url',
                'created_at' => '2019-06-19 03:48:41',
                'updated_at' => '2019-06-19 03:48:41',
            ],

            [
                'id' => '455',
                'label_id' => '165',
                'lang_id' => '2',
                'value' => 'Nhãn ngôn ngữ',
                'created_at' => '2019-06-19 03:52:46',
                'updated_at' => '2019-06-19 03:52:46',
            ],

            [
                'id' => '456',
                'label_id' => '165',
                'lang_id' => '3',
                'value' => 'Language labels',
                'created_at' => '2019-06-19 03:52:46',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '457',
                'label_id' => '165',
                'lang_id' => '4',
                'value' => 'いらっしゃいませ',
                'created_at' => '2019-06-19 03:52:46',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '458',
                'label_id' => '166',
                'lang_id' => '2',
                'value' => 'Quản lý nhãn ngôn ngữ',
                'created_at' => '2019-06-19 03:54:36',
                'updated_at' => '2019-06-19 03:54:36',
            ],

            [
                'id' => '459',
                'label_id' => '166',
                'lang_id' => '3',
                'value' => 'Language label management',
                'created_at' => '2019-06-19 03:54:36',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '460',
                'label_id' => '166',
                'lang_id' => '4',
                'value' => '言語ラベル管理',
                'created_at' => '2019-06-19 03:54:36',
                'updated_at' => '2019-06-19 03:54:36',
            ],

            [
                'id' => '461',
                'label_id' => '167',
                'lang_id' => '2',
                'value' => 'Cấu hinh web',
                'created_at' => '2019-06-19 03:57:13',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '462',
                'label_id' => '167',
                'lang_id' => '3',
                'value' => 'Web config',
                'created_at' => '2019-06-19 03:57:13',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '463',
                'label_id' => '167',
                'lang_id' => '4',
                'value' => 'Web設定',
                'created_at' => '2019-06-19 03:57:13',
                'updated_at' => '2019-06-19 03:57:13',
            ],

            [
                'id' => '464',
                'label_id' => '168',
                'lang_id' => '2',
                'value' => 'Quản lý cấu hình',
                'created_at' => '2019-06-19 04:02:21',
                'updated_at' => '2019-06-19 04:02:21',
            ],

            [
                'id' => '465',
                'label_id' => '168',
                'lang_id' => '3',
                'value' => 'Web configuration management',
                'created_at' => '2019-06-19 04:02:21',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '466',
                'label_id' => '168',
                'lang_id' => '4',
                'value' => 'Web構成管理',
                'created_at' => '2019-06-19 04:02:22',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '467',
                'label_id' => '169',
                'lang_id' => '2',
                'value' => 'Key',
                'created_at' => '2019-06-19 04:03:53',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '468',
                'label_id' => '169',
                'lang_id' => '3',
                'value' => 'Key',
                'created_at' => '2019-06-19 04:03:53',
                'updated_at' => '2019-06-19 04:03:53',
            ],

            [
                'id' => '469',
                'label_id' => '169',
                'lang_id' => '4',
                'value' => 'キー',
                'created_at' => '2019-06-19 04:03:53',
                'updated_at' => '2019-06-19 04:03:53',
            ],

            [
                'id' => '470',
                'label_id' => '170',
                'lang_id' => '2',
                'value' => 'Giá trị',
                'created_at' => '2019-06-19 04:04:11',
                'updated_at' => '2019-06-19 04:04:11',
            ],

            [
                'id' => '471',
                'label_id' => '170',
                'lang_id' => '3',
                'value' => 'Value',
                'created_at' => '2019-06-19 04:04:11',
                'updated_at' => '2019-06-19 04:04:11',
            ],

            [
                'id' => '472',
                'label_id' => '170',
                'lang_id' => '4',
                'value' => '値',
                'created_at' => '2019-06-19 04:04:11',
                'updated_at' => '2019-06-19 04:04:11',
            ],

            [
                'id' => '473',
                'label_id' => '171',
                'lang_id' => '2',
                'value' => 'Quản lý đơn hàng',
                'created_at' => '2019-06-19 04:06:16',
                'updated_at' => '2019-06-19 04:06:16',
            ],

            [
                'id' => '474',
                'label_id' => '171',
                'lang_id' => '3',
                'value' => 'Order management',
                'created_at' => '2019-06-19 04:06:16',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '475',
                'label_id' => '171',
                'lang_id' => '4',
                'value' => '注文管理',
                'created_at' => '2019-06-19 04:06:16',
                'updated_at' => '2019-06-19 04:06:16',
            ],

            [
                'id' => '476',
                'label_id' => '172',
                'lang_id' => '2',
                'value' => 'Đơn hàng',
                'created_at' => '2019-06-19 04:09:05',
                'updated_at' => '2019-06-19 04:09:05',
            ],

            [
                'id' => '477',
                'label_id' => '172',
                'lang_id' => '3',
                'value' => 'Order',
                'created_at' => '2019-06-19 04:09:05',
                'updated_at' => '2019-06-19 04:09:05',
            ],

            [
                'id' => '478',
                'label_id' => '172',
                'lang_id' => '4',
                'value' => 'ご注文',
                'created_at' => '2019-06-19 04:09:05',
                'updated_at' => '2019-06-19 04:09:05',
            ],

            [
                'id' => '479',
                'label_id' => '173',
                'lang_id' => '2',
                'value' => 'Bộ điều khiển',
                'created_at' => '2019-06-19 04:17:29',
                'updated_at' => '2019-06-19 04:17:29',
            ],

            [
                'id' => '480',
                'label_id' => '173',
                'lang_id' => '3',
                'value' => 'Controller',
                'created_at' => '2019-06-19 04:17:29',
                'updated_at' => '2019-06-19 04:17:29',
            ],

            [
                'id' => '481',
                'label_id' => '173',
                'lang_id' => '4',
                'value' => 'コントローラ',
                'created_at' => '2019-06-19 04:17:29',
                'updated_at' => '2019-06-19 04:17:29',
            ],

            [
                'id' => '482',
                'label_id' => '174',
                'lang_id' => '2',
                'value' => 'Quản lý chức năng hệ thống',
                'created_at' => '2019-06-19 04:20:00',
                'updated_at' => '2019-06-19 04:20:00',
            ],

            [
                'id' => '483',
                'label_id' => '174',
                'lang_id' => '3',
                'value' => 'Manage system functions',
                'created_at' => '2019-06-19 04:20:00',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '484',
                'label_id' => '174',
                'lang_id' => '4',
                'value' => 'システム機能を管理する',
                'created_at' => '2019-06-19 04:20:00',
                'updated_at' => '2019-06-19 04:20:00',
            ],

            [
                'id' => '485',
                'label_id' => '175',
                'lang_id' => '2',
                'value' => 'Quản lý trạng thái',
                'created_at' => '2019-06-19 04:24:03',
                'updated_at' => '2019-06-19 04:24:03',
            ],

            [
                'id' => '486',
                'label_id' => '175',
                'lang_id' => '3',
                'value' => 'Status management',
                'created_at' => '2019-06-19 04:24:04',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '487',
                'label_id' => '175',
                'lang_id' => '4',
                'value' => 'ステータス管理',
                'created_at' => '2019-06-19 04:24:04',
                'updated_at' => '2019-06-19 04:24:04',
            ],

            [
                'id' => '488',
                'label_id' => '176',
                'lang_id' => '2',
                'value' => 'Ẩn khi chọn trạng thái',
                'created_at' => '2019-06-19 04:28:21',
                'updated_at' => '2019-06-19 04:28:21',
            ],

            [
                'id' => '489',
                'label_id' => '176',
                'lang_id' => '3',
                'value' => 'Hide when selecting status',
                'created_at' => '2019-06-19 04:28:21',
                'updated_at' => '2019-06-19 04:28:21',
            ],

            [
                'id' => '490',
                'label_id' => '176',
                'lang_id' => '4',
                'value' => 'ステータス選択時に非表示',
                'created_at' => '2019-06-19 04:28:21',
                'updated_at' => '2019-06-19 04:28:21',
            ],

            [
                'id' => '491',
                'label_id' => '177',
                'lang_id' => '2',
                'value' => 'Màu nền',
                'created_at' => '2019-06-19 04:29:17',
                'updated_at' => '2019-06-19 04:29:17',
            ],

            [
                'id' => '492',
                'label_id' => '177',
                'lang_id' => '3',
                'value' => 'Background color',
                'created_at' => '2019-06-19 04:29:17',
                'updated_at' => '2019-06-19 04:29:17',
            ],

            [
                'id' => '493',
                'label_id' => '177',
                'lang_id' => '4',
                'value' => '背景色',
                'created_at' => '2019-06-19 04:29:18',
                'updated_at' => '2019-06-19 04:29:18',
            ],

            [
                'id' => '494',
                'label_id' => '178',
                'lang_id' => '2',
                'value' => 'Mầu chữ',
                'created_at' => '2019-06-19 04:29:46',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '495',
                'label_id' => '178',
                'lang_id' => '3',
                'value' => 'Text color',
                'created_at' => '2019-06-19 04:29:46',
                'updated_at' => '2019-06-19 04:29:46',
            ],

            [
                'id' => '496',
                'label_id' => '178',
                'lang_id' => '4',
                'value' => 'フォント色',
                'created_at' => '2019-06-19 04:29:46',
                'updated_at' => '2019-06-19 04:29:46',
            ],

            [
                'id' => '497',
                'label_id' => '179',
                'lang_id' => '2',
                'value' => 'Sắp xếp',
                'created_at' => '2019-06-19 04:30:30',
                'updated_at' => '2019-06-19 04:30:30',
            ],

            [
                'id' => '498',
                'label_id' => '179',
                'lang_id' => '3',
                'value' => 'Sort',
                'created_at' => '2019-06-19 04:30:30',
                'updated_at' => '2019-06-19 04:30:30',
            ],

            [
                'id' => '499',
                'label_id' => '179',
                'lang_id' => '4',
                'value' => 'ソート',
                'created_at' => '2019-06-19 04:30:30',
                'updated_at' => '2019-06-19 04:30:30',
            ],

            [
                'id' => '500',
                'label_id' => '180',
                'lang_id' => '2',
                'value' => 'Tùy chọn',
                'created_at' => '2019-06-19 04:32:14',
                'updated_at' => '2019-06-19 04:32:14',
            ],

            [
                'id' => '501',
                'label_id' => '180',
                'lang_id' => '3',
                'value' => 'Options',
                'created_at' => '2019-06-19 04:32:14',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '502',
                'label_id' => '180',
                'lang_id' => '4',
                'value' => 'オプション',
                'created_at' => '2019-06-19 04:32:14',
                'updated_at' => '2019-06-19 04:32:14',
            ],

            [
                'id' => '503',
                'label_id' => '181',
                'lang_id' => '2',
                'value' => 'Quản lý thành viên',
                'created_at' => '2019-06-19 04:36:53',
                'updated_at' => '2019-06-19 04:36:53',
            ],

            [
                'id' => '504',
                'label_id' => '181',
                'lang_id' => '3',
                'value' => 'Manage member',
                'created_at' => '2019-06-19 04:36:53',
                'updated_at' => '2019-06-19 04:36:53',
            ],

            [
                'id' => '505',
                'label_id' => '181',
                'lang_id' => '4',
                'value' => '会員管理',
                'created_at' => '2019-06-19 04:36:53',
                'updated_at' => '2019-06-19 04:36:53',
            ],

            [
                'id' => '506',
                'label_id' => '182',
                'lang_id' => '2',
                'value' => 'Quản lý vai trò',
                'created_at' => '2019-06-19 07:11:07',
                'updated_at' => '2019-06-19 07:11:07',
            ],

            [
                'id' => '507',
                'label_id' => '182',
                'lang_id' => '3',
                'value' => 'Role management',
                'created_at' => '2019-06-19 07:11:07',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '508',
                'label_id' => '182',
                'lang_id' => '4',
                'value' => 'ロール管理',
                'created_at' => '2019-06-19 07:11:07',
                'updated_at' => '2019-06-19 07:11:07',
            ],

            [
                'id' => '509',
                'label_id' => '183',
                'lang_id' => '2',
                'value' => 'Quyền truy cập',
                'created_at' => '2019-06-19 07:15:06',
                'updated_at' => '2019-06-19 07:15:06',
            ],

            [
                'id' => '510',
                'label_id' => '183',
                'lang_id' => '3',
                'value' => 'Rules',
                'created_at' => '2019-06-19 07:15:06',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '511',
                'label_id' => '183',
                'lang_id' => '4',
                'value' => '規則',
                'created_at' => '2019-06-19 07:15:06',
                'updated_at' => '2019-06-19 07:15:06',
            ],

            [
                'id' => '512',
                'label_id' => '184',
                'lang_id' => '2',
                'value' => 'Vai Trò',
                'created_at' => '2019-06-19 07:17:03',
                'updated_at' => '2019-06-19 07:17:03',
            ],

            [
                'id' => '513',
                'label_id' => '184',
                'lang_id' => '3',
                'value' => 'Role',
                'created_at' => '2019-06-19 07:17:03',
                'updated_at' => '2019-06-19 07:17:03',
            ],

            [
                'id' => '514',
                'label_id' => '184',
                'lang_id' => '4',
                'value' => '役割',
                'created_at' => '2019-06-19 07:17:04',
                'updated_at' => '2019-06-19 07:17:04',
            ],

            [
                'id' => '515',
                'label_id' => '185',
                'lang_id' => '2',
                'value' => 'Quyền try cập của',
                'created_at' => '2019-06-19 07:20:15',
                'updated_at' => '2019-06-19 07:20:15',
            ],

            [
                'id' => '516',
                'label_id' => '185',
                'lang_id' => '3',
                'value' => 'Set rules for',
                'created_at' => '2019-06-19 07:20:15',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '517',
                'label_id' => '185',
                'lang_id' => '4',
                'value' => 'のルールを設定',
                'created_at' => '2019-06-19 07:20:15',
                'updated_at' => '2019-06-19 07:20:15',
            ],

            [
                'id' => '518',
                'label_id' => '186',
                'lang_id' => '2',
                'value' => 'Chức năng',
                'created_at' => '2019-06-19 07:21:36',
                'updated_at' => '2019-06-19 07:21:36',
            ],

            [
                'id' => '519',
                'label_id' => '186',
                'lang_id' => '3',
                'value' => 'Module',
                'created_at' => '2019-06-19 07:21:36',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '520',
                'label_id' => '186',
                'lang_id' => '4',
                'value' => 'モジュール',
                'created_at' => '2019-06-19 07:21:36',
                'updated_at' => '2019-06-19 07:21:36',
            ],

            [
                'id' => '521',
                'label_id' => '187',
                'lang_id' => '2',
                'value' => 'Cập nhật',
                'created_at' => '2019-06-19 07:27:54',
                'updated_at' => '2019-06-19 07:27:54',
            ],

            [
                'id' => '522',
                'label_id' => '187',
                'lang_id' => '3',
                'value' => 'Update',
                'created_at' => '2019-06-19 07:27:55',
                'updated_at' => '2019-06-19 07:27:55',
            ],

            [
                'id' => '523',
                'label_id' => '187',
                'lang_id' => '4',
                'value' => '更新',
                'created_at' => '2019-06-19 07:27:55',
                'updated_at' => '2019-06-19 07:27:55',
            ],

            [
                'id' => '524',
                'label_id' => '188',
                'lang_id' => '2',
                'value' => 'Trạng thái Cho phép',
                'created_at' => '2019-06-19 07:33:19',
                'updated_at' => '2019-06-19 07:33:19',
            ],

            [
                'id' => '525',
                'label_id' => '188',
                'lang_id' => '3',
                'value' => 'Allowable status',
                'created_at' => '2019-06-19 07:33:19',
                'updated_at' => '2019-06-19 07:33:19',
            ],

            [
                'id' => '526',
                'label_id' => '188',
                'lang_id' => '4',
                'value' => '許容ステータス',
                'created_at' => '2019-06-19 07:33:19',
                'updated_at' => '2019-06-19 07:33:19',
            ],

            [
                'id' => '527',
                'label_id' => '189',
                'lang_id' => '2',
                'value' => 'Tên trạng thái',
                'created_at' => '2019-06-19 07:34:11',
                'updated_at' => '2019-06-19 07:34:11',
            ],

            [
                'id' => '528',
                'label_id' => '189',
                'lang_id' => '3',
                'value' => 'Status name',
                'created_at' => '2019-06-19 07:34:11',
                'updated_at' => '2019-06-19 07:34:11',
            ],

            [
                'id' => '529',
                'label_id' => '189',
                'lang_id' => '4',
                'value' => 'ステータス名',
                'created_at' => '2019-06-19 07:34:11',
                'updated_at' => '2019-06-19 07:34:11',
            ],

            [
                'id' => '530',
                'label_id' => '190',
                'lang_id' => '2',
                'value' => 'Cho phép',
                'created_at' => '2019-06-19 07:34:46',
                'updated_at' => '2019-06-19 07:34:46',
            ],

            [
                'id' => '531',
                'label_id' => '190',
                'lang_id' => '3',
                'value' => 'Allow',
                'created_at' => '2019-06-19 07:34:46',
                'updated_at' => '2019-06-19 07:34:46',
            ],

            [
                'id' => '532',
                'label_id' => '190',
                'lang_id' => '4',
                'value' => '許可する',
                'created_at' => '2019-06-19 07:34:46',
                'updated_at' => '2019-06-19 07:34:46',
            ],

            [
                'id' => '533',
                'label_id' => '191',
                'lang_id' => '2',
                'value' => 'Quyền sử dụng trạng thái',
                'created_at' => '2019-06-19 07:36:51',
                'updated_at' => '2019-06-19 07:36:51',
            ],

            [
                'id' => '534',
                'label_id' => '191',
                'lang_id' => '3',
                'value' => 'Right to use status',
                'created_at' => '2019-06-19 07:36:51',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '535',
                'label_id' => '191',
                'lang_id' => '4',
                'value' => '使用権ステータス',
                'created_at' => '2019-06-19 07:36:51',
                'updated_at' => '2019-06-19 07:36:51',
            ],

            [
                'id' => '536',
                'label_id' => '192',
                'lang_id' => '2',
                'value' => 'Nhập dữ liệu',
                'created_at' => '2019-06-19 08:44:38',
                'updated_at' => '2019-06-19 08:44:38',
            ],

            [
                'id' => '537',
                'label_id' => '192',
                'lang_id' => '3',
                'value' => 'Import',
                'created_at' => '2019-06-19 08:44:38',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '538',
                'label_id' => '192',
                'lang_id' => '4',
                'value' => '輸入',
                'created_at' => '2019-06-19 08:44:38',
                'updated_at' => '2019-06-19 08:44:38',
            ],

            [
                'id' => '539',
                'label_id' => '193',
                'lang_id' => '2',
                'value' => 'Thêm lời nhắn',
                'created_at' => '2019-06-20 08:41:08',
                'updated_at' => '2019-06-20 09:13:17',
            ],

            [
                'id' => '540',
                'label_id' => '193',
                'lang_id' => '3',
                'value' => 'Add message',
                'created_at' => '2019-06-20 08:41:08',
                'updated_at' => '2019-06-20 09:13:17',
            ],

            [
                'id' => '541',
                'label_id' => '193',
                'lang_id' => '4',
                'value' => 'メッセージ',
                'created_at' => '2019-06-20 08:41:08',
                'updated_at' => '2019-06-20 09:13:17',
            ],

            [
                'id' => '542',
                'label_id' => '197',
                'lang_id' => '2',
                'value' => 'Lời nhắn',
                'created_at' => '2019-06-20 10:20:42',
                'updated_at' => '2019-06-20 10:20:42',
            ],

            [
                'id' => '543',
                'label_id' => '197',
                'lang_id' => '3',
                'value' => 'Message',
                'created_at' => '2019-06-20 10:20:42',
                'updated_at' => '2019-06-20 10:20:42',
            ],

            [
                'id' => '544',
                'label_id' => '197',
                'lang_id' => '4',
                'value' => 'メッセージ',
                'created_at' => '2019-06-20 10:20:43',
                'updated_at' => '2019-06-20 10:20:43',
            ],

            [
                'id' => '545',
                'label_id' => '198',
                'lang_id' => '2',
                'value' => 'Lưu nháp',
                'created_at' => '2019-06-21 02:38:47',
                'updated_at' => '2019-06-21 02:38:47',
            ],

            [
                'id' => '546',
                'label_id' => '198',
                'lang_id' => '3',
                'value' => 'Save draft',
                'created_at' => '2019-06-21 02:38:47',
                'updated_at' => '2019-06-21 02:38:47',
            ],

            [
                'id' => '547',
                'label_id' => '198',
                'lang_id' => '4',
                'value' => '下書きを保存',
                'created_at' => '2019-06-21 02:38:47',
                'updated_at' => '2019-06-21 02:38:47',
            ],

            [
                'id' => '548',
                'label_id' => '199',
                'lang_id' => '2',
                'value' => 'Gửi yêu cầu',
                'created_at' => '2019-06-21 02:42:32',
                'updated_at' => '2019-06-21 02:42:32',
            ],

            [
                'id' => '549',
                'label_id' => '199',
                'lang_id' => '3',
                'value' => 'Save & Submit',
                'created_at' => '2019-06-21 02:42:32',
                'updated_at' => '2019-06-21 04:09:24',
            ],

            [
                'id' => '550',
                'label_id' => '199',
                'lang_id' => '4',
                'value' => '提出する',
                'created_at' => '2019-06-21 02:42:32',
                'updated_at' => '2019-06-21 02:42:32',
            ],

            [
                'id' => '551',
                'label_id' => '200',
                'lang_id' => '2',
                'value' => 'Từ chối',
                'created_at' => '2019-06-21 02:43:55',
                'updated_at' => '2019-06-21 02:45:39',
            ],

            [
                'id' => '552',
                'label_id' => '200',
                'lang_id' => '3',
                'value' => 'Reject',
                'created_at' => '2019-06-21 02:43:55',
                'updated_at' => '2019-06-21 02:45:39',
            ],

            [
                'id' => '553',
                'label_id' => '200',
                'lang_id' => '4',
                'value' => '拒否する',
                'created_at' => '2019-06-21 02:43:55',
                'updated_at' => '2019-06-21 02:45:39',
            ],

            [
                'id' => '554',
                'label_id' => '201',
                'lang_id' => '2',
                'value' => 'Chập nhận',
                'created_at' => '2019-06-21 02:44:48',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '555',
                'label_id' => '201',
                'lang_id' => '3',
                'value' => 'Accept',
                'created_at' => '2019-06-21 02:44:48',
                'updated_at' => '2019-06-24 07:22:56',
            ],

            [
                'id' => '556',
                'label_id' => '201',
                'lang_id' => '4',
                'value' => '受け入れ済み',
                'created_at' => '2019-06-21 02:44:48',
                'updated_at' => '2019-06-21 02:44:48',
            ],

            [
                'id' => '557',
                'label_id' => '202',
                'lang_id' => '2',
                'value' => 'Mật khẩu hiện tại không đúng',
                'created_at' => '2019-06-21 07:29:00',
                'updated_at' => '2019-06-21 07:29:00',
            ],

            [
                'id' => '558',
                'label_id' => '202',
                'lang_id' => '3',
                'value' => 'The current password is not correct',
                'created_at' => '2019-06-21 07:29:00',
                'updated_at' => '2019-06-21 07:29:00',
            ],

            [
                'id' => '559',
                'label_id' => '202',
                'lang_id' => '4',
                'value' => '現在のパスワードが正しくありません',
                'created_at' => '2019-06-21 07:29:00',
                'updated_at' => '2019-06-21 07:29:00',
            ],

            [
                'id' => '560',
                'label_id' => '203',
                'lang_id' => '2',
                'value' => ':attribute phải được chọn',
                'created_at' => '2019-06-21 07:30:05',
                'updated_at' => '2019-06-21 07:33:00',
            ],

            [
                'id' => '561',
                'label_id' => '203',
                'lang_id' => '3',
                'value' => 'The :attribute must be accepted.',
                'created_at' => '2019-06-21 07:30:05',
                'updated_at' => '2019-06-21 07:30:05',
            ],

            [
                'id' => '562',
                'label_id' => '203',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:30:05',
                'updated_at' => '2019-06-21 07:30:05',
            ],

            [
                'id' => '563',
                'label_id' => '204',
                'lang_id' => '2',
                'value' => ':attribute Phải có định dạnh một URL',
                'created_at' => '2019-06-21 07:31:33',
                'updated_at' => '2019-06-21 07:31:33',
            ],

            [
                'id' => '564',
                'label_id' => '204',
                'lang_id' => '3',
                'value' => 'The :attribute is not a valid URL.',
                'created_at' => '2019-06-21 07:31:33',
                'updated_at' => '2019-06-21 07:31:33',
            ],

            [
                'id' => '565',
                'label_id' => '204',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:31:33',
                'updated_at' => '2019-06-21 07:31:33',
            ],

            [
                'id' => '566',
                'label_id' => '205',
                'lang_id' => '2',
                'value' => ':attribute phải là một ngày sau :date.',
                'created_at' => '2019-06-21 07:34:12',
                'updated_at' => '2019-06-21 07:34:12',
            ],

            [
                'id' => '567',
                'label_id' => '205',
                'lang_id' => '3',
                'value' => 'The :attribute must be a date after :date.',
                'created_at' => '2019-06-21 07:34:12',
                'updated_at' => '2019-06-21 07:34:12',
            ],

            [
                'id' => '568',
                'label_id' => '205',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:34:12',
                'updated_at' => '2019-06-21 07:34:12',
            ],

            [
                'id' => '569',
                'label_id' => '206',
                'lang_id' => '2',
                'value' => ':attribute  phải là một ngày sau hoặc bằng :date',
                'created_at' => '2019-06-21 07:35:35',
                'updated_at' => '2019-06-21 07:35:35',
            ],

            [
                'id' => '570',
                'label_id' => '206',
                'lang_id' => '3',
                'value' => 'The :attribute must be a date after or equal to :date.',
                'created_at' => '2019-06-21 07:35:35',
                'updated_at' => '2019-06-21 07:35:35',
            ],

            [
                'id' => '571',
                'label_id' => '206',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:35:35',
                'updated_at' => '2019-06-21 07:35:35',
            ],

            [
                'id' => '572',
                'label_id' => '207',
                'lang_id' => '2',
                'value' => ':attribute  chỉ có thể chứ các ký tự chữ cái',
                'created_at' => '2019-06-21 07:37:11',
                'updated_at' => '2019-06-21 07:37:11',
            ],

            [
                'id' => '573',
                'label_id' => '207',
                'lang_id' => '3',
                'value' => 'The :attribute may only contain letters.',
                'created_at' => '2019-06-21 07:37:11',
                'updated_at' => '2019-06-21 07:37:11',
            ],

            [
                'id' => '574',
                'label_id' => '207',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:37:11',
                'updated_at' => '2019-06-21 07:37:11',
            ],

            [
                'id' => '575',
                'label_id' => '208',
                'lang_id' => '2',
                'value' => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
                'created_at' => '2019-06-21 07:38:06',
                'updated_at' => '2019-06-21 07:38:06',
            ],

            [
                'id' => '576',
                'label_id' => '208',
                'lang_id' => '3',
                'value' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
                'created_at' => '2019-06-21 07:38:06',
                'updated_at' => '2019-06-21 07:38:06',
            ],

            [
                'id' => '577',
                'label_id' => '208',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:38:06',
                'updated_at' => '2019-06-21 07:38:06',
            ],

            [
                'id' => '578',
                'label_id' => '209',
                'lang_id' => '2',
                'value' => ':attribute chỉ có thể chứa các chữ cái và số.',
                'created_at' => '2019-06-21 07:38:46',
                'updated_at' => '2019-06-21 07:38:46',
            ],

            [
                'id' => '579',
                'label_id' => '209',
                'lang_id' => '3',
                'value' => 'The :attribute may only contain letters and numbers.',
                'created_at' => '2019-06-21 07:38:46',
                'updated_at' => '2019-06-21 07:38:46',
            ],

            [
                'id' => '580',
                'label_id' => '209',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:38:46',
                'updated_at' => '2019-06-21 07:38:46',
            ],

            [
                'id' => '581',
                'label_id' => '210',
                'lang_id' => '2',
                'value' => ':attribute phải là một mảng.',
                'created_at' => '2019-06-21 07:39:24',
                'updated_at' => '2019-06-21 07:39:24',
            ],

            [
                'id' => '582',
                'label_id' => '210',
                'lang_id' => '3',
                'value' => 'The :attribute must be an array.',
                'created_at' => '2019-06-21 07:39:24',
                'updated_at' => '2019-06-21 07:39:24',
            ],

            [
                'id' => '583',
                'label_id' => '210',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:39:24',
                'updated_at' => '2019-06-21 07:39:24',
            ],

            [
                'id' => '584',
                'label_id' => '211',
                'lang_id' => '2',
                'value' => ':attribute  phải là một ngày trước :date .',
                'created_at' => '2019-06-21 07:40:15',
                'updated_at' => '2019-06-21 07:40:15',
            ],

            [
                'id' => '585',
                'label_id' => '211',
                'lang_id' => '3',
                'value' => 'The :attribute must be a date before :date.',
                'created_at' => '2019-06-21 07:40:15',
                'updated_at' => '2019-06-21 07:40:15',
            ],

            [
                'id' => '586',
                'label_id' => '211',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:40:15',
                'updated_at' => '2019-06-21 07:40:15',
            ],

            [
                'id' => '587',
                'label_id' => '212',
                'lang_id' => '2',
                'value' => ':attribute phải là một ngày trước hoặc bằng :date.',
                'created_at' => '2019-06-21 07:41:10',
                'updated_at' => '2019-06-21 07:41:10',
            ],

            [
                'id' => '588',
                'label_id' => '212',
                'lang_id' => '3',
                'value' => 'The :attribute must be a date before or equal to :date.',
                'created_at' => '2019-06-21 07:41:10',
                'updated_at' => '2019-06-21 07:41:10',
            ],

            [
                'id' => '589',
                'label_id' => '212',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:41:10',
                'updated_at' => '2019-06-21 07:41:10',
            ],

            [
                'id' => '590',
                'label_id' => '213',
                'lang_id' => '2',
                'value' => '{ "numeric": ":attribute phải nằm giữa :min và :max.", "file": ":attribute phải nằm trong khoảng :min và :max kilobyte tối đa.", "string": ":attribute phải nằm giữa :min và :max kí tự", "array": ":attribute phải có giữa :min và :max item."}',
                'created_at' => '2019-06-21 07:46:59',
                'updated_at' => '2019-06-21 07:46:59',
            ],

            [
                'id' => '591',
                'label_id' => '213',
                'lang_id' => '3',
                'value' => '{ "numeric": "The :attribute must be between :min and :max.", "file": "The :attribute must be between :min and :max kilobytes.", "string": "The :attribute must be between :min and :max characters.", "array": "The :attribute must have between :min and :max items."}',
                'created_at' => '2019-06-21 07:46:59',
                'updated_at' => '2019-06-21 07:46:59',
            ],

            [
                'id' => '592',
                'label_id' => '213',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:46:59',
                'updated_at' => '2019-06-21 07:46:59',
            ],

            [
                'id' => '593',
                'label_id' => '214',
                'lang_id' => '2',
                'value' => ':attribute phải đúng hoặc sai.',
                'created_at' => '2019-06-21 07:48:32',
                'updated_at' => '2019-06-21 07:48:32',
            ],

            [
                'id' => '594',
                'label_id' => '214',
                'lang_id' => '3',
                'value' => 'The :attribute field must be true or false.',
                'created_at' => '2019-06-21 07:48:32',
                'updated_at' => '2019-06-21 07:48:32',
            ],

            [
                'id' => '595',
                'label_id' => '214',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:48:32',
                'updated_at' => '2019-06-21 07:48:32',
            ],

            [
                'id' => '596',
                'label_id' => '215',
                'lang_id' => '2',
                'value' => ':attribute  xác nhận không phù hợp với.',
                'created_at' => '2019-06-21 07:50:41',
                'updated_at' => '2019-06-21 07:50:41',
            ],

            [
                'id' => '597',
                'label_id' => '215',
                'lang_id' => '3',
                'value' => 'The :attribute confirmation does not match.',
                'created_at' => '2019-06-21 07:50:41',
                'updated_at' => '2019-06-21 07:50:41',
            ],

            [
                'id' => '598',
                'label_id' => '215',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:50:41',
                'updated_at' => '2019-06-21 07:50:41',
            ],

            [
                'id' => '599',
                'label_id' => '216',
                'lang_id' => '2',
                'value' => ':attribute không phải là một ngày hợp lệ.',
                'created_at' => '2019-06-21 07:51:16',
                'updated_at' => '2019-06-21 07:51:16',
            ],

            [
                'id' => '600',
                'label_id' => '216',
                'lang_id' => '3',
                'value' => 'The :attribute is not a valid date.',
                'created_at' => '2019-06-21 07:51:16',
                'updated_at' => '2019-06-21 07:51:16',
            ],

            [
                'id' => '601',
                'label_id' => '216',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:51:16',
                'updated_at' => '2019-06-21 07:51:16',
            ],

            [
                'id' => '602',
                'label_id' => '217',
                'lang_id' => '2',
                'value' => ':attribute  phải là một ngày bằng date.',
                'created_at' => '2019-06-21 07:51:53',
                'updated_at' => '2019-06-21 07:51:53',
            ],

            [
                'id' => '603',
                'label_id' => '217',
                'lang_id' => '3',
                'value' => 'The :attribute must be a date equal to :date.',
                'created_at' => '2019-06-21 07:51:53',
                'updated_at' => '2019-06-21 07:51:53',
            ],

            [
                'id' => '604',
                'label_id' => '217',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:51:53',
                'updated_at' => '2019-06-21 07:51:53',
            ],

            [
                'id' => '605',
                'label_id' => '218',
                'lang_id' => '2',
                'value' => ':attribute không khớp với định dạng :format.',
                'created_at' => '2019-06-21 07:52:36',
                'updated_at' => '2019-06-21 07:52:36',
            ],

            [
                'id' => '606',
                'label_id' => '218',
                'lang_id' => '3',
                'value' => 'The :attribute does not match the format :format.',
                'created_at' => '2019-06-21 07:52:36',
                'updated_at' => '2019-06-21 07:52:36',
            ],

            [
                'id' => '607',
                'label_id' => '218',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:52:36',
                'updated_at' => '2019-06-21 07:52:36',
            ],

            [
                'id' => '608',
                'label_id' => '219',
                'lang_id' => '2',
                'value' => ':attribute and :other must be different.',
                'created_at' => '2019-06-21 07:54:02',
                'updated_at' => '2019-06-21 07:54:02',
            ],

            [
                'id' => '609',
                'label_id' => '219',
                'lang_id' => '3',
                'value' => 'The :attribute and :other must be different.',
                'created_at' => '2019-06-21 07:54:02',
                'updated_at' => '2019-06-21 07:54:02',
            ],

            [
                'id' => '610',
                'label_id' => '219',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:54:02',
                'updated_at' => '2019-06-21 07:54:02',
            ],

            [
                'id' => '611',
                'label_id' => '220',
                'lang_id' => '2',
                'value' => ':attribute  phải là :digits  chữ số.',
                'created_at' => '2019-06-21 07:55:31',
                'updated_at' => '2019-06-21 07:55:31',
            ],

            [
                'id' => '612',
                'label_id' => '220',
                'lang_id' => '3',
                'value' => 'The :attribute must be :digits digits.',
                'created_at' => '2019-06-21 07:55:31',
                'updated_at' => '2019-06-21 07:55:31',
            ],

            [
                'id' => '613',
                'label_id' => '220',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:55:31',
                'updated_at' => '2019-06-21 07:55:31',
            ],

            [
                'id' => '614',
                'label_id' => '221',
                'lang_id' => '2',
                'value' => ':attribute phải nằm giữa :min và :max chữ số',
                'created_at' => '2019-06-21 07:56:47',
                'updated_at' => '2019-06-21 07:56:47',
            ],

            [
                'id' => '615',
                'label_id' => '221',
                'lang_id' => '3',
                'value' => 'The :attribute must be between :min and :max digits.',
                'created_at' => '2019-06-21 07:56:47',
                'updated_at' => '2019-06-21 07:56:47',
            ],

            [
                'id' => '616',
                'label_id' => '221',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:56:47',
                'updated_at' => '2019-06-21 07:56:47',
            ],

            [
                'id' => '617',
                'label_id' => '222',
                'lang_id' => '2',
                'value' => ':attribute có kích thước hình ảnh không hợp lệ.',
                'created_at' => '2019-06-21 07:58:24',
                'updated_at' => '2019-06-21 07:58:24',
            ],

            [
                'id' => '618',
                'label_id' => '222',
                'lang_id' => '3',
                'value' => 'The :attribute has invalid image dimensions.',
                'created_at' => '2019-06-21 07:58:24',
                'updated_at' => '2019-06-21 07:58:24',
            ],

            [
                'id' => '619',
                'label_id' => '222',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:58:24',
                'updated_at' => '2019-06-21 07:58:24',
            ],

            [
                'id' => '620',
                'label_id' => '223',
                'lang_id' => '2',
                'value' => ':attribute có một giá trị trùng lặp.',
                'created_at' => '2019-06-21 07:59:02',
                'updated_at' => '2019-06-21 07:59:02',
            ],

            [
                'id' => '621',
                'label_id' => '223',
                'lang_id' => '3',
                'value' => 'The :attribute field has a duplicate value.',
                'created_at' => '2019-06-21 07:59:02',
                'updated_at' => '2019-06-21 07:59:02',
            ],

            [
                'id' => '622',
                'label_id' => '223',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:59:02',
                'updated_at' => '2019-06-21 07:59:02',
            ],

            [
                'id' => '623',
                'label_id' => '224',
                'lang_id' => '2',
                'value' => ':attribute phải là một địa chỉ email hợp lệ.',
                'created_at' => '2019-06-21 07:59:41',
                'updated_at' => '2019-06-21 07:59:41',
            ],

            [
                'id' => '624',
                'label_id' => '224',
                'lang_id' => '3',
                'value' => 'The :attribute must be a valid email address.',
                'created_at' => '2019-06-21 07:59:41',
                'updated_at' => '2019-06-21 07:59:41',
            ],

            [
                'id' => '625',
                'label_id' => '224',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 07:59:42',
                'updated_at' => '2019-06-21 07:59:42',
            ],

            [
                'id' => '626',
                'label_id' => '225',
                'lang_id' => '2',
                'value' => ':attribute lựa chọn không hợp lệ.',
                'created_at' => '2019-06-21 08:00:42',
                'updated_at' => '2019-06-21 08:00:42',
            ],

            [
                'id' => '627',
                'label_id' => '225',
                'lang_id' => '3',
                'value' => 'The selected :attribute is invalid.',
                'created_at' => '2019-06-21 08:00:42',
                'updated_at' => '2019-06-21 08:00:42',
            ],

            [
                'id' => '628',
                'label_id' => '225',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:00:42',
                'updated_at' => '2019-06-21 08:00:42',
            ],

            [
                'id' => '629',
                'label_id' => '226',
                'lang_id' => '2',
                'value' => ':attribute phải là một tệp.',
                'created_at' => '2019-06-21 08:01:13',
                'updated_at' => '2019-06-21 08:01:13',
            ],

            [
                'id' => '630',
                'label_id' => '226',
                'lang_id' => '3',
                'value' => 'The :attribute must be a file.',
                'created_at' => '2019-06-21 08:01:13',
                'updated_at' => '2019-06-21 08:01:13',
            ],

            [
                'id' => '631',
                'label_id' => '226',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:01:13',
                'updated_at' => '2019-06-21 08:01:13',
            ],

            [
                'id' => '632',
                'label_id' => '227',
                'lang_id' => '2',
                'value' => ':attribute phải có giá trị.',
                'created_at' => '2019-06-21 08:01:46',
                'updated_at' => '2019-06-21 08:01:46',
            ],

            [
                'id' => '633',
                'label_id' => '227',
                'lang_id' => '3',
                'value' => 'The :attribute field must have a value.',
                'created_at' => '2019-06-21 08:01:46',
                'updated_at' => '2019-06-21 08:01:46',
            ],

            [
                'id' => '634',
                'label_id' => '227',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:01:46',
                'updated_at' => '2019-06-21 08:01:46',
            ],

            [
                'id' => '635',
                'label_id' => '228',
                'lang_id' => '2',
                'value' => '{ "numeric" : ":attribute phải lớn hơn :value.", "file" : ":attribute phải lớn hơn :value kilobyte.", "string" : ":attribute phải lớn hơn :value ký tự.", "array" : ":attribute phải có nhiều hơn :value số phần tử." }',
                'created_at' => '2019-06-21 08:05:19',
                'updated_at' => '2019-06-21 08:05:19',
            ],

            [
                'id' => '636',
                'label_id' => '228',
                'lang_id' => '3',
                'value' => '{ "numeric" : "The :attribute must be greater than :value.", "file" : "The :attribute must be greater than :value kilobytes.", "string" : "The :attribute must be greater than :value characters.", "array" : "The :attribute must have more than :value items." }',
                'created_at' => '2019-06-21 08:05:19',
                'updated_at' => '2019-06-21 08:05:19',
            ],

            [
                'id' => '637',
                'label_id' => '228',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:05:19',
                'updated_at' => '2019-06-21 08:05:19',
            ],

            [
                'id' => '638',
                'label_id' => '229',
                'lang_id' => '2',
                'value' => '{ "numeric": ":attribute phải lớn hơn hoặc bằng :value.", "file" : ":attribute phải lớn hơn hoặc bằng :value kilobyte.", "string" : ":attribute phải lớn hơn hoặc bằng :value kí tự.", "array" : ":attribute phải lớn hơn hoặc bằng :value phần tử." }',
                'created_at' => '2019-06-21 08:08:34',
                'updated_at' => '2019-06-21 08:08:34',
            ],

            [
                'id' => '639',
                'label_id' => '229',
                'lang_id' => '3',
                'value' => '{ "numeric": "The :attribute must be greater than or equal :value.", "file" : "The :attribute must be greater than or equal :value kilobytes.", "string" : "The :attribute must be greater than or equal :value characters.", "array" : "The :attribute must have :value items or more." }',
                'created_at' => '2019-06-21 08:08:34',
                'updated_at' => '2019-06-21 08:08:34',
            ],

            [
                'id' => '640',
                'label_id' => '229',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:08:34',
                'updated_at' => '2019-06-21 08:08:34',
            ],

            [
                'id' => '641',
                'label_id' => '230',
                'lang_id' => '2',
                'value' => ':attribute phải là một hình ảnh.',
                'created_at' => '2019-06-21 08:09:34',
                'updated_at' => '2019-06-21 08:09:34',
            ],

            [
                'id' => '642',
                'label_id' => '230',
                'lang_id' => '3',
                'value' => 'The :attribute must be an image.',
                'created_at' => '2019-06-21 08:09:34',
                'updated_at' => '2019-06-21 08:09:34',
            ],

            [
                'id' => '643',
                'label_id' => '230',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:09:34',
                'updated_at' => '2019-06-21 08:09:34',
            ],

            [
                'id' => '644',
                'label_id' => '231',
                'lang_id' => '2',
                'value' => ':attribute không hợp lệ',
                'created_at' => '2019-06-21 08:11:16',
                'updated_at' => '2019-06-21 08:11:16',
            ],

            [
                'id' => '645',
                'label_id' => '231',
                'lang_id' => '3',
                'value' => 'The selected :attribute is invalid.',
                'created_at' => '2019-06-21 08:11:16',
                'updated_at' => '2019-06-21 08:11:16',
            ],

            [
                'id' => '646',
                'label_id' => '231',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:11:16',
                'updated_at' => '2019-06-21 08:11:16',
            ],

            [
                'id' => '647',
                'label_id' => '232',
                'lang_id' => '2',
                'value' => ':attribute không tồn tại trong :other.',
                'created_at' => '2019-06-21 08:12:07',
                'updated_at' => '2019-06-21 08:12:07',
            ],

            [
                'id' => '648',
                'label_id' => '232',
                'lang_id' => '3',
                'value' => 'The :attribute field does not exist in :other.',
                'created_at' => '2019-06-21 08:12:07',
                'updated_at' => '2019-06-21 08:12:07',
            ],

            [
                'id' => '649',
                'label_id' => '232',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:12:07',
                'updated_at' => '2019-06-21 08:12:07',
            ],

            [
                'id' => '650',
                'label_id' => '233',
                'lang_id' => '2',
                'value' => ':attribute  phải là một địa chỉ IP hợp lệ.',
                'created_at' => '2019-06-21 08:12:56',
                'updated_at' => '2019-06-21 08:12:56',
            ],

            [
                'id' => '651',
                'label_id' => '233',
                'lang_id' => '3',
                'value' => 'The :attribute must be a valid IP address.',
                'created_at' => '2019-06-21 08:12:56',
                'updated_at' => '2019-06-21 08:12:56',
            ],

            [
                'id' => '652',
                'label_id' => '233',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:12:56',
                'updated_at' => '2019-06-21 08:12:56',
            ],

            [
                'id' => '653',
                'label_id' => '234',
                'lang_id' => '2',
                'value' => ':attribute phải là một số nguyên.',
                'created_at' => '2019-06-21 08:13:43',
                'updated_at' => '2019-06-21 08:13:43',
            ],

            [
                'id' => '654',
                'label_id' => '234',
                'lang_id' => '3',
                'value' => 'The :attribute must be an integer.',
                'created_at' => '2019-06-21 08:13:43',
                'updated_at' => '2019-06-21 08:13:43',
            ],

            [
                'id' => '655',
                'label_id' => '234',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:13:43',
                'updated_at' => '2019-06-21 08:13:43',
            ],

            [
                'id' => '656',
                'label_id' => '235',
                'lang_id' => '2',
                'value' => '{ "numeric" : ":attribute phải nhỏ hơn :max", "file" : "attribute phải nhỏ hơn :max kilobytes.", "string" : "attribute phải nhỏ hơn :max kí tự.", "array" : "attribute phải nhỏ hơn :max phần tử.", }',
                'created_at' => '2019-06-21 08:16:23',
                'updated_at' => '2019-06-21 08:16:23',
            ],

            [
                'id' => '657',
                'label_id' => '235',
                'lang_id' => '3',
                'value' => '{ "numeric" : "The :attribute may not be greater than :max.", "file" : "The :attribute may not be greater than :max kilobytes.", "string" : "The :attribute may not be greater than :max characters.", "array" : "The :attribute may not have more than :max items."}',
                'created_at' => '2019-06-21 08:16:23',
                'updated_at' => '2019-06-21 08:16:23',
            ],

            [
                'id' => '658',
                'label_id' => '235',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:16:23',
                'updated_at' => '2019-06-21 08:16:23',
            ],

            [
                'id' => '659',
                'label_id' => '236',
                'lang_id' => '2',
                'value' => ':attribute phải là một tệp có kiểu: :values.',
                'created_at' => '2019-06-21 08:17:39',
                'updated_at' => '2019-06-21 08:17:39',
            ],

            [
                'id' => '660',
                'label_id' => '236',
                'lang_id' => '3',
                'value' => 'The :attribute must be a file of type: :values.',
                'created_at' => '2019-06-21 08:17:39',
                'updated_at' => '2019-06-21 08:17:39',
            ],

            [
                'id' => '661',
                'label_id' => '236',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:17:39',
                'updated_at' => '2019-06-21 08:17:39',
            ],

            [
                'id' => '662',
                'label_id' => '237',
                'lang_id' => '2',
                'value' => ':attribute  phải là một tệp có kiểu:  :values.',
                'created_at' => '2019-06-21 08:18:43',
                'updated_at' => '2019-06-21 08:18:43',
            ],

            [
                'id' => '663',
                'label_id' => '237',
                'lang_id' => '3',
                'value' => 'The :attribute must be a file of type: :values.',
                'created_at' => '2019-06-21 08:18:44',
                'updated_at' => '2019-06-21 08:18:44',
            ],

            [
                'id' => '664',
                'label_id' => '237',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:18:44',
                'updated_at' => '2019-06-21 08:18:44',
            ],

            [
                'id' => '665',
                'label_id' => '238',
                'lang_id' => '2',
                'value' => '{ "numeric" : ":attribute phải lớn hơn :min.", "file" : ":attribute phải lớn hơn :min kilobytes.", "string" : ":attribute phải lớn hơn :min kí tự", "array" : ":attribute phải lớn hơn :min phần tử" }',
                'created_at' => '2019-06-21 08:20:20',
                'updated_at' => '2019-06-21 08:20:20',
            ],

            [
                'id' => '666',
                'label_id' => '238',
                'lang_id' => '3',
                'value' => '{ "numeric" : "The :attribute must be at least :min.", "file" : "The :attribute must be at least :min kilobytes.", "string" : "The :attribute must be at least :min characters.", "array" : "The :attribute must have at least :min items." }',
                'created_at' => '2019-06-21 08:20:20',
                'updated_at' => '2019-06-21 08:20:20',
            ],

            [
                'id' => '667',
                'label_id' => '238',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:20:20',
                'updated_at' => '2019-06-21 08:20:20',
            ],

            [
                'id' => '668',
                'label_id' => '239',
                'lang_id' => '2',
                'value' => 'Lựa chon :attribute  là không hợp lệ.',
                'created_at' => '2019-06-21 08:22:15',
                'updated_at' => '2019-06-21 08:22:15',
            ],

            [
                'id' => '669',
                'label_id' => '239',
                'lang_id' => '3',
                'value' => 'The selected :attribute is invalid.',
                'created_at' => '2019-06-21 08:22:15',
                'updated_at' => '2019-06-21 08:22:15',
            ],

            [
                'id' => '670',
                'label_id' => '239',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:22:15',
                'updated_at' => '2019-06-21 08:22:15',
            ],

            [
                'id' => '671',
                'label_id' => '240',
                'lang_id' => '2',
                'value' => ':attribute phải là một số',
                'created_at' => '2019-06-21 08:23:05',
                'updated_at' => '2019-06-21 08:23:05',
            ],

            [
                'id' => '672',
                'label_id' => '240',
                'lang_id' => '3',
                'value' => 'The :attribute must be a number.',
                'created_at' => '2019-06-21 08:23:05',
                'updated_at' => '2019-06-21 08:23:05',
            ],

            [
                'id' => '673',
                'label_id' => '240',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:23:05',
                'updated_at' => '2019-06-21 08:23:05',
            ],

            [
                'id' => '674',
                'label_id' => '241',
                'lang_id' => '2',
                'value' => ':attribute  là bắt buộc.',
                'created_at' => '2019-06-21 08:23:40',
                'updated_at' => '2019-06-21 08:23:40',
            ],

            [
                'id' => '675',
                'label_id' => '241',
                'lang_id' => '3',
                'value' => 'The :attribute field is required.',
                'created_at' => '2019-06-21 08:23:40',
                'updated_at' => '2019-06-21 08:23:40',
            ],

            [
                'id' => '676',
                'label_id' => '241',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:23:40',
                'updated_at' => '2019-06-21 08:23:40',
            ],

            [
                'id' => '677',
                'label_id' => '242',
                'lang_id' => '2',
                'value' => ':attribute và :other phải giống nhau',
                'created_at' => '2019-06-21 08:24:58',
                'updated_at' => '2019-06-21 08:24:58',
            ],

            [
                'id' => '678',
                'label_id' => '242',
                'lang_id' => '3',
                'value' => 'The :attribute and :other must match.',
                'created_at' => '2019-06-21 08:24:58',
                'updated_at' => '2019-06-21 08:24:58',
            ],

            [
                'id' => '679',
                'label_id' => '242',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:24:58',
                'updated_at' => '2019-06-21 08:24:58',
            ],

            [
                'id' => '680',
                'label_id' => '243',
                'lang_id' => '2',
                'value' => ':attribute  phải có định dạng của URL',
                'created_at' => '2019-06-21 08:26:22',
                'updated_at' => '2019-06-21 08:26:22',
            ],

            [
                'id' => '681',
                'label_id' => '243',
                'lang_id' => '3',
                'value' => 'The :attribute format is invalid.',
                'created_at' => '2019-06-21 08:26:22',
                'updated_at' => '2019-06-21 08:26:22',
            ],

            [
                'id' => '682',
                'label_id' => '243',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:26:22',
                'updated_at' => '2019-06-21 08:26:22',
            ],

            [
                'id' => '683',
                'label_id' => '244',
                'lang_id' => '2',
                'value' => ':attribute phải là UUID hợp lệ.',
                'created_at' => '2019-06-21 08:27:03',
                'updated_at' => '2019-06-21 08:27:03',
            ],

            [
                'id' => '684',
                'label_id' => '244',
                'lang_id' => '3',
                'value' => 'The :attribute must be a valid UUID.',
                'created_at' => '2019-06-21 08:27:03',
                'updated_at' => '2019-06-21 08:27:03',
            ],

            [
                'id' => '685',
                'label_id' => '244',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:27:03',
                'updated_at' => '2019-06-21 08:27:03',
            ],

            [
                'id' => '686',
                'label_id' => '245',
                'lang_id' => '2',
                'value' => ':attribute đã được sử dụng.',
                'created_at' => '2019-06-21 08:34:54',
                'updated_at' => '2019-06-21 08:34:54',
            ],

            [
                'id' => '687',
                'label_id' => '245',
                'lang_id' => '3',
                'value' => 'The :attribute has already been taken.',
                'created_at' => '2019-06-21 08:34:54',
                'updated_at' => '2019-06-21 08:34:54',
            ],

            [
                'id' => '688',
                'label_id' => '245',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:34:54',
                'updated_at' => '2019-06-21 08:34:54',
            ],

            [
                'id' => '689',
                'label_id' => '246',
                'lang_id' => '2',
                'value' => ':attribute không hợp lệ.',
                'created_at' => '2019-06-21 08:35:35',
                'updated_at' => '2019-06-21 08:35:35',
            ],

            [
                'id' => '690',
                'label_id' => '246',
                'lang_id' => '3',
                'value' => 'The :attribute format is invalid.',
                'created_at' => '2019-06-21 08:35:35',
                'updated_at' => '2019-06-21 08:35:35',
            ],

            [
                'id' => '691',
                'label_id' => '246',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-21 08:35:35',
                'updated_at' => '2019-06-21 08:35:35',
            ],

            [
                'id' => '692',
                'label_id' => '247',
                'lang_id' => '2',
                'value' => 'Trước',
                'created_at' => '2019-06-21 08:58:49',
                'updated_at' => '2019-06-21 08:58:49',
            ],

            [
                'id' => '693',
                'label_id' => '247',
                'lang_id' => '3',
                'value' => 'Previous',
                'created_at' => '2019-06-21 08:58:49',
                'updated_at' => '2019-06-21 08:58:49',
            ],

            [
                'id' => '694',
                'label_id' => '247',
                'lang_id' => '4',
                'value' => '前',
                'created_at' => '2019-06-21 08:58:49',
                'updated_at' => '2019-06-21 08:58:49',
            ],

            [
                'id' => '695',
                'label_id' => '248',
                'lang_id' => '2',
                'value' => 'Sau',
                'created_at' => '2019-06-21 08:59:10',
                'updated_at' => '2019-06-21 08:59:10',
            ],

            [
                'id' => '696',
                'label_id' => '248',
                'lang_id' => '3',
                'value' => 'Next',
                'created_at' => '2019-06-21 08:59:10',
                'updated_at' => '2019-06-21 08:59:10',
            ],

            [
                'id' => '697',
                'label_id' => '248',
                'lang_id' => '4',
                'value' => '次',
                'created_at' => '2019-06-21 08:59:10',
                'updated_at' => '2019-06-21 08:59:10',
            ],

            [
                'id' => '698',
                'label_id' => '249',
                'lang_id' => '2',
                'value' => 'Bảng điều khiển',
                'created_at' => '2019-06-21 09:08:23',
                'updated_at' => '2019-06-21 09:08:23',
            ],

            [
                'id' => '699',
                'label_id' => '249',
                'lang_id' => '3',
                'value' => 'Dashboard',
                'created_at' => '2019-06-21 09:08:23',
                'updated_at' => '2019-06-21 09:08:23',
            ],

            [
                'id' => '700',
                'label_id' => '249',
                'lang_id' => '4',
                'value' => 'ダッシュボード',
                'created_at' => '2019-06-21 09:08:23',
                'updated_at' => '2019-06-21 09:08:23',
            ],

            [
                'id' => '701',
                'label_id' => '250',
                'lang_id' => '2',
                'value' => 'Tất cả báo giá',
                'created_at' => '2019-06-21 09:11:29',
                'updated_at' => '2019-06-21 09:11:29',
            ],

            [
                'id' => '702',
                'label_id' => '250',
                'lang_id' => '3',
                'value' => 'All quotes',
                'created_at' => '2019-06-21 09:11:29',
                'updated_at' => '2019-06-21 09:11:29',
            ],

            [
                'id' => '703',
                'label_id' => '250',
                'lang_id' => '4',
                'value' => 'すべての引用',
                'created_at' => '2019-06-21 09:11:30',
                'updated_at' => '2019-06-21 09:11:30',
            ],

            [
                'id' => '704',
                'label_id' => '251',
                'lang_id' => '2',
                'value' => 'Thêm mới',
                'created_at' => '2019-06-21 09:12:58',
                'updated_at' => '2019-06-21 09:12:58',
            ],

            [
                'id' => '705',
                'label_id' => '251',
                'lang_id' => '3',
                'value' => 'Add new',
                'created_at' => '2019-06-21 09:12:59',
                'updated_at' => '2019-06-21 09:12:59',
            ],

            [
                'id' => '706',
                'label_id' => '251',
                'lang_id' => '4',
                'value' => '新規追加',
                'created_at' => '2019-06-21 09:12:59',
                'updated_at' => '2019-06-21 09:12:59',
            ],

            [
                'id' => '707',
                'label_id' => '252',
                'lang_id' => '2',
                'value' => 'Xem tất cả',
                'created_at' => '2019-06-21 09:16:51',
                'updated_at' => '2019-06-21 09:16:51',
            ],

            [
                'id' => '708',
                'label_id' => '252',
                'lang_id' => '3',
                'value' => 'View all',
                'created_at' => '2019-06-21 09:16:51',
                'updated_at' => '2019-06-21 09:16:51',
            ],

            [
                'id' => '709',
                'label_id' => '252',
                'lang_id' => '4',
                'value' => '全て見る',
                'created_at' => '2019-06-21 09:16:51',
                'updated_at' => '2019-06-21 09:16:51',
            ],

            [
                'id' => '710',
                'label_id' => '253',
                'lang_id' => '2',
                'value' => 'Hợp đồng',
                'created_at' => '2019-06-21 09:18:18',
                'updated_at' => '2019-06-21 09:18:18',
            ],

            [
                'id' => '711',
                'label_id' => '253',
                'lang_id' => '3',
                'value' => 'Contract',
                'created_at' => '2019-06-21 09:18:18',
                'updated_at' => '2019-06-21 09:18:18',
            ],

            [
                'id' => '712',
                'label_id' => '253',
                'lang_id' => '4',
                'value' => '契約',
                'created_at' => '2019-06-21 09:18:18',
                'updated_at' => '2019-06-21 09:18:18',
            ],

            [
                'id' => '713',
                'label_id' => '254',
                'lang_id' => '2',
                'value' => 'Khách hàng - Công trình',
                'created_at' => '2019-06-21 09:19:25',
                'updated_at' => '2019-06-26 04:44:44',
            ],

            [
                'id' => '714',
                'label_id' => '254',
                'lang_id' => '3',
                'value' => 'Customers - Constructions',
                'created_at' => '2019-06-21 09:19:25',
                'updated_at' => '2019-06-26 04:44:44',
            ],

            [
                'id' => '715',
                'label_id' => '254',
                'lang_id' => '4',
                'value' => '顧客 - コンストラクション',
                'created_at' => '2019-06-21 09:19:26',
                'updated_at' => '2019-06-26 04:44:44',
            ],

            [
                'id' => '716',
                'label_id' => '255',
                'lang_id' => '2',
                'value' => 'Khu vực',
                'created_at' => '2019-06-21 09:20:24',
                'updated_at' => '2019-06-21 09:20:24',
            ],

            [
                'id' => '717',
                'label_id' => '255',
                'lang_id' => '3',
                'value' => 'Area',
                'created_at' => '2019-06-21 09:20:25',
                'updated_at' => '2019-06-21 09:20:25',
            ],

            [
                'id' => '718',
                'label_id' => '255',
                'lang_id' => '4',
                'value' => '地域',
                'created_at' => '2019-06-21 09:20:25',
                'updated_at' => '2019-06-21 09:20:25',
            ],

            [
                'id' => '719',
                'label_id' => '256',
                'lang_id' => '2',
                'value' => 'Cài đặt',
                'created_at' => '2019-06-21 09:21:24',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '720',
                'label_id' => '256',
                'lang_id' => '3',
                'value' => 'Setting',
                'created_at' => '2019-06-21 09:21:24',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '721',
                'label_id' => '256',
                'lang_id' => '4',
                'value' => '設定',
                'created_at' => '2019-06-21 09:21:24',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '722',
                'label_id' => '257',
                'lang_id' => '2',
                'value' => 'Thực đơn',
                'created_at' => '2019-06-21 09:24:11',
                'updated_at' => '2019-06-21 09:24:11',
            ],

            [
                'id' => '723',
                'label_id' => '257',
                'lang_id' => '3',
                'value' => 'Menu',
                'created_at' => '2019-06-21 09:24:11',
                'updated_at' => '2019-06-21 09:24:11',
            ],

            [
                'id' => '724',
                'label_id' => '257',
                'lang_id' => '4',
                'value' => 'メニュー',
                'created_at' => '2019-06-21 09:24:11',
                'updated_at' => '2019-06-21 09:24:11',
            ],

            [
                'id' => '725',
                'label_id' => '258',
                'lang_id' => '2',
                'value' => 'Tải mẫu',
                'created_at' => '2019-06-24 05:10:16',
                'updated_at' => '2019-06-24 05:10:16',
            ],

            [
                'id' => '726',
                'label_id' => '258',
                'lang_id' => '3',
                'value' => 'Download Templates',
                'created_at' => '2019-06-24 05:10:16',
                'updated_at' => '2019-06-24 05:10:16',
            ],

            [
                'id' => '727',
                'label_id' => '258',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:10:16',
                'updated_at' => '2019-06-24 05:10:16',
            ],

            [
                'id' => '728',
                'label_id' => '259',
                'lang_id' => '2',
                'value' => 'Yêu cầu thiết kế',
                'created_at' => '2019-06-24 05:11:01',
                'updated_at' => '2019-06-24 05:11:01',
            ],

            [
                'id' => '729',
                'label_id' => '259',
                'lang_id' => '3',
                'value' => 'Design Request',
                'created_at' => '2019-06-24 05:11:01',
                'updated_at' => '2019-06-24 05:11:01',
            ],

            [
                'id' => '730',
                'label_id' => '259',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:11:01',
                'updated_at' => '2019-06-24 05:11:01',
            ],

            [
                'id' => '731',
                'label_id' => '260',
                'lang_id' => '2',
                'value' => 'Tải xuống',
                'created_at' => '2019-06-24 05:12:06',
                'updated_at' => '2019-06-24 05:12:06',
            ],

            [
                'id' => '732',
                'label_id' => '260',
                'lang_id' => '3',
                'value' => 'Dowload',
                'created_at' => '2019-06-24 05:12:06',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '733',
                'label_id' => '260',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:12:06',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '734',
                'label_id' => '261',
                'lang_id' => '2',
                'value' => 'Thời gian tải xuống',
                'created_at' => '2019-06-24 05:15:22',
                'updated_at' => '2019-06-24 05:15:22',
            ],

            [
                'id' => '735',
                'label_id' => '261',
                'lang_id' => '3',
                'value' => 'Download Time',
                'created_at' => '2019-06-24 05:15:22',
                'updated_at' => '2019-06-24 05:15:22',
            ],

            [
                'id' => '736',
                'label_id' => '261',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:15:24',
                'updated_at' => '2019-06-24 05:15:24',
            ],

            [
                'id' => '737',
                'label_id' => '262',
                'lang_id' => '2',
                'value' => 'Tải xuống mẫu yêu cầu thiết kế',
                'created_at' => '2019-06-24 05:16:14',
                'updated_at' => '2019-06-24 05:16:14',
            ],

            [
                'id' => '738',
                'label_id' => '262',
                'lang_id' => '3',
                'value' => 'Download Design Request Template',
                'created_at' => '2019-06-24 05:16:14',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '739',
                'label_id' => '262',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:16:14',
                'updated_at' => '2019-06-24 05:16:14',
            ],

            [
                'id' => '740',
                'label_id' => '263',
                'lang_id' => '2',
                'value' => 'Yêu cầu sản xuất',
                'created_at' => '2019-06-24 05:16:58',
                'updated_at' => '2019-06-24 05:16:58',
            ],

            [
                'id' => '741',
                'label_id' => '263',
                'lang_id' => '3',
                'value' => 'Production Request',
                'created_at' => '2019-06-24 05:16:58',
                'updated_at' => '2019-06-24 05:16:58',
            ],

            [
                'id' => '742',
                'label_id' => '263',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:16:58',
                'updated_at' => '2019-06-24 05:16:58',
            ],

            [
                'id' => '743',
                'label_id' => '264',
                'lang_id' => '2',
                'value' => 'Mục nhóm trong báo giá',
                'created_at' => '2019-06-24 05:20:46',
                'updated_at' => '2019-06-24 05:20:46',
            ],

            [
                'id' => '744',
                'label_id' => '264',
                'lang_id' => '3',
                'value' => 'Group Item in Quotaiton',
                'created_at' => '2019-06-24 05:20:46',
                'updated_at' => '2019-06-24 05:20:46',
            ],

            [
                'id' => '745',
                'label_id' => '264',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:20:46',
                'updated_at' => '2019-06-24 05:20:46',
            ],

            [
                'id' => '746',
                'label_id' => '265',
                'lang_id' => '2',
                'value' => 'Chưa tải xuống',
                'created_at' => '2019-06-24 05:22:04',
                'updated_at' => '2019-06-24 05:22:04',
            ],

            [
                'id' => '747',
                'label_id' => '265',
                'lang_id' => '3',
                'value' => 'Not download yet',
                'created_at' => '2019-06-24 05:22:04',
                'updated_at' => '2019-06-24 05:22:04',
            ],

            [
                'id' => '748',
                'label_id' => '265',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 05:22:04',
                'updated_at' => '2019-06-24 05:22:04',
            ],

            [
                'id' => '749',
                'label_id' => '266',
                'lang_id' => '2',
                'value' => 'Đơn xin mua vật tư',
                'created_at' => '2019-06-24 07:09:42',
                'updated_at' => '2019-06-24 07:09:42',
            ],

            [
                'id' => '750',
                'label_id' => '266',
                'lang_id' => '3',
                'value' => 'Application for purchasing supplies',
                'created_at' => '2019-06-24 07:09:42',
                'updated_at' => '2019-06-24 07:09:42',
            ],

            [
                'id' => '751',
                'label_id' => '266',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 07:09:43',
                'updated_at' => '2019-06-24 07:09:43',
            ],

            [
                'id' => '752',
                'label_id' => '267',
                'lang_id' => '2',
                'value' => 'Quản lý mua vật phẩm',
                'created_at' => '2019-06-24 07:10:33',
                'updated_at' => '2019-06-24 07:10:33',
            ],

            [
                'id' => '753',
                'label_id' => '267',
                'lang_id' => '3',
                'value' => 'Manage buying items',
                'created_at' => '2019-06-24 07:10:33',
                'updated_at' => '2019-06-24 07:10:33',
            ],

            [
                'id' => '754',
                'label_id' => '267',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 07:10:34',
                'updated_at' => '2019-06-24 07:10:34',
            ],

            [
                'id' => '755',
                'label_id' => '268',
                'lang_id' => '2',
                'value' => 'không có dữ liệu trong bảng',
                'created_at' => '2019-06-24 07:58:54',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '756',
                'label_id' => '268',
                'lang_id' => '3',
                'value' => 'No data available in table',
                'created_at' => '2019-06-24 07:58:54',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '757',
                'label_id' => '268',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-24 07:58:54',
                'updated_at' => '2019-06-24 07:58:54',
            ],

            [
                'id' => '758',
                'label_id' => '276',
                'lang_id' => '2',
                'value' => 'Tên khách hàng',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '759',
                'label_id' => '276',
                'lang_id' => '3',
                'value' => 'Customer Name',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '760',
                'label_id' => '276',
                'lang_id' => '4',
                'value' => '顧客名',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '761',
                'label_id' => '277',
                'lang_id' => '2',
                'value' => 'Tổng đơn hàng',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '762',
                'label_id' => '277',
                'lang_id' => '3',
                'value' => 'Total Order',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '763',
                'label_id' => '277',
                'lang_id' => '4',
                'value' => '合計注文数',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '764',
                'label_id' => '278',
                'lang_id' => '2',
                'value' => 'Bảng điều khiển',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '765',
                'label_id' => '278',
                'lang_id' => '3',
                'value' => 'Dashboard',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '766',
                'label_id' => '278',
                'lang_id' => '4',
                'value' => 'ダッシュボード',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '767',
                'label_id' => '279',
                'lang_id' => '2',
                'value' => 'Gửi yêu cầu',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-07-16 11:05:07',
            ],

            [
                'id' => '768',
                'label_id' => '279',
                'lang_id' => '3',
                'value' => 'Submit',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '769',
                'label_id' => '279',
                'lang_id' => '4',
                'value' => '提出する',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '770',
                'label_id' => '280',
                'lang_id' => '2',
                'value' => 'Bản đồ',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '771',
                'label_id' => '280',
                'lang_id' => '3',
                'value' => 'Map',
                'created_at' => '2019-06-26 03:43:35',
                'updated_at' => '2019-06-26 03:43:35',
            ],

            [
                'id' => '772',
                'label_id' => '280',
                'lang_id' => '4',
                'value' => '地図',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '773',
                'label_id' => '281',
                'lang_id' => '2',
                'value' => 'Tiêu đề',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '774',
                'label_id' => '281',
                'lang_id' => '3',
                'value' => 'Title',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '775',
                'label_id' => '281',
                'lang_id' => '4',
                'value' => 'タイトル',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '776',
                'label_id' => '282',
                'lang_id' => '2',
                'value' => 'Hoạt động',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '777',
                'label_id' => '282',
                'lang_id' => '3',
                'value' => 'Active',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '778',
                'label_id' => '282',
                'lang_id' => '4',
                'value' => 'アクティブ',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '779',
                'label_id' => '283',
                'lang_id' => '2',
                'value' => 'Ngưng hoạt động',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '780',
                'label_id' => '283',
                'lang_id' => '3',
                'value' => 'Deactive',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '781',
                'label_id' => '283',
                'lang_id' => '4',
                'value' => '非アクティブ',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '782',
                'label_id' => '284',
                'lang_id' => '2',
                'value' => 'Nội dung',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '783',
                'label_id' => '284',
                'lang_id' => '3',
                'value' => 'Content',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '784',
                'label_id' => '284',
                'lang_id' => '4',
                'value' => 'コンテンツ',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '785',
                'label_id' => '285',
                'lang_id' => '2',
                'value' => 'Hợp đồng',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '786',
                'label_id' => '285',
                'lang_id' => '3',
                'value' => 'Contract',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '787',
                'label_id' => '285',
                'lang_id' => '4',
                'value' => '8/5000 契約する',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '788',
                'label_id' => '286',
                'lang_id' => '2',
                'value' => 'Hợp đồng số',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '789',
                'label_id' => '286',
                'lang_id' => '3',
                'value' => 'Contract No.',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '790',
                'label_id' => '286',
                'lang_id' => '4',
                'value' => '契約番号',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '791',
                'label_id' => '287',
                'lang_id' => '2',
                'value' => 'Trả',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '792',
                'label_id' => '287',
                'lang_id' => '3',
                'value' => 'Pay',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '793',
                'label_id' => '287',
                'lang_id' => '4',
                'value' => '支払う',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '794',
                'label_id' => '288',
                'lang_id' => '2',
                'value' => 'Ngày ký',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '795',
                'label_id' => '288',
                'lang_id' => '3',
                'value' => 'Date Signed',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '796',
                'label_id' => '288',
                'lang_id' => '4',
                'value' => '署名日',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '797',
                'label_id' => '289',
                'lang_id' => '2',
                'value' => 'Số tiền',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '798',
                'label_id' => '289',
                'lang_id' => '3',
                'value' => 'Amount',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '799',
                'label_id' => '289',
                'lang_id' => '4',
                'value' => '量',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '800',
                'label_id' => '290',
                'lang_id' => '2',
                'value' => 'Ngày trúng thầu',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '801',
                'label_id' => '290',
                'lang_id' => '3',
                'value' => 'Bidding date',
                'created_at' => '2019-06-26 03:43:36',
                'updated_at' => '2019-06-26 03:43:36',
            ],

            [
                'id' => '802',
                'label_id' => '290',
                'lang_id' => '4',
                'value' => '入札日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '803',
                'label_id' => '291',
                'lang_id' => '2',
                'value' => 'Ngày trên hợp đồng',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '804',
                'label_id' => '291',
                'lang_id' => '3',
                'value' => 'Date on the contract',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '805',
                'label_id' => '291',
                'lang_id' => '4',
                'value' => '契約日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '806',
                'label_id' => '292',
                'lang_id' => '2',
                'value' => 'Ngày nhận hợp đồng',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '807',
                'label_id' => '292',
                'lang_id' => '3',
                'value' => 'Date of contract reception',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '808',
                'label_id' => '292',
                'lang_id' => '4',
                'value' => '契約受付日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '809',
                'label_id' => '293',
                'lang_id' => '2',
                'value' => 'Ngày nghiệm thu',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '810',
                'label_id' => '293',
                'lang_id' => '3',
                'value' => 'Date of acceptance',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '811',
                'label_id' => '293',
                'lang_id' => '4',
                'value' => '受付日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '812',
                'label_id' => '294',
                'lang_id' => '2',
                'value' => 'Giá trị hợp đồng chưa VAT',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '813',
                'label_id' => '294',
                'lang_id' => '3',
                'value' => 'Contract value is not VAT',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-07-26 09:02:03',
            ],

            [
                'id' => '814',
                'label_id' => '294',
                'lang_id' => '4',
                'value' => '契約額がVATではない',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '815',
                'label_id' => '295',
                'lang_id' => '2',
                'value' => 'Giá trị hợp đồng có VAT',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '816',
                'label_id' => '295',
                'lang_id' => '3',
                'value' => 'Contract value has VAT',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '817',
                'label_id' => '295',
                'lang_id' => '4',
                'value' => '契約額にVATがあります',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '818',
                'label_id' => '296',
                'lang_id' => '2',
                'value' => 'Bảo lãnh',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '819',
                'label_id' => '296',
                'lang_id' => '3',
                'value' => 'Guarantee',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '820',
                'label_id' => '296',
                'lang_id' => '4',
                'value' => '保証する',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '821',
                'label_id' => '297',
                'lang_id' => '2',
                'value' => 'Ngày thi công trên HĐ',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '822',
                'label_id' => '297',
                'lang_id' => '3',
                'value' => 'Construction date on the contract',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '823',
                'label_id' => '297',
                'lang_id' => '4',
                'value' => '契約の建設日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '824',
                'label_id' => '298',
                'lang_id' => '2',
                'value' => 'Ngày hoàn công trên HĐ',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '825',
                'label_id' => '298',
                'lang_id' => '3',
                'value' => 'Completion date on the contract',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '826',
                'label_id' => '298',
                'lang_id' => '4',
                'value' => '契約の完了日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '827',
                'label_id' => '299',
                'lang_id' => '2',
                'value' => 'Người phụ trách',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '828',
                'label_id' => '299',
                'lang_id' => '3',
                'value' => 'The person in charge',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '829',
                'label_id' => '299',
                'lang_id' => '4',
                'value' => '担当者',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '833',
                'label_id' => '301',
                'lang_id' => '2',
                'value' => 'Đã hoàn thành',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '834',
                'label_id' => '301',
                'lang_id' => '3',
                'value' => 'Completed',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '835',
                'label_id' => '301',
                'lang_id' => '4',
                'value' => '完了しました',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '836',
                'label_id' => '302',
                'lang_id' => '2',
                'value' => 'Đợt',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '837',
                'label_id' => '302',
                'lang_id' => '3',
                'value' => 'Batch',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-07-26 09:02:02',
            ],

            [
                'id' => '838',
                'label_id' => '302',
                'lang_id' => '4',
                'value' => 'バッチ',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '839',
                'label_id' => '303',
                'lang_id' => '2',
                'value' => 'Ngày bắt đầu',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '840',
                'label_id' => '303',
                'lang_id' => '3',
                'value' => 'Start Date',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '841',
                'label_id' => '303',
                'lang_id' => '4',
                'value' => '開始日',
                'created_at' => '2019-06-26 03:43:37',
                'updated_at' => '2019-06-26 03:43:37',
            ],

            [
                'id' => '842',
                'label_id' => '304',
                'lang_id' => '2',
                'value' => 'Ngày kết thúc',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '843',
                'label_id' => '304',
                'lang_id' => '3',
                'value' => 'End Date',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '844',
                'label_id' => '304',
                'lang_id' => '4',
                'value' => '終了日',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '845',
                'label_id' => '305',
                'lang_id' => '2',
                'value' => 'Phần trăm',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '846',
                'label_id' => '305',
                'lang_id' => '3',
                'value' => 'Percent',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '847',
                'label_id' => '305',
                'lang_id' => '4',
                'value' => 'パーセント',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '848',
                'label_id' => '306',
                'lang_id' => '2',
                'value' => 'Thời hạn hợp đồng',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '849',
                'label_id' => '306',
                'lang_id' => '3',
                'value' => 'Contract Period',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '850',
                'label_id' => '306',
                'lang_id' => '4',
                'value' => '契約期間',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '851',
                'label_id' => '307',
                'lang_id' => '2',
                'value' => 'Thanh toán hợp đồng',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '852',
                'label_id' => '307',
                'lang_id' => '3',
                'value' => 'Contract Payment',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '853',
                'label_id' => '307',
                'lang_id' => '4',
                'value' => '契約支払い',
                'created_at' => '2019-06-26 03:43:38',
                'updated_at' => '2019-06-26 03:43:38',
            ],

            [
                'id' => '854',
                'label_id' => '308',
                'lang_id' => '2',
                'value' => 'Từ',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '855',
                'label_id' => '308',
                'lang_id' => '3',
                'value' => 'From',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '856',
                'label_id' => '308',
                'lang_id' => '4',
                'value' => 'から',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '857',
                'label_id' => '309',
                'lang_id' => '2',
                'value' => 'Đến',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '858',
                'label_id' => '309',
                'lang_id' => '3',
                'value' => 'To',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '859',
                'label_id' => '309',
                'lang_id' => '4',
                'value' => 'に',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '860',
                'label_id' => '310',
                'lang_id' => '2',
                'value' => 'Biên lai',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '861',
                'label_id' => '310',
                'lang_id' => '3',
                'value' => 'Receipts',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '862',
                'label_id' => '310',
                'lang_id' => '4',
                'value' => '領収書',
                'created_at' => '2019-06-26 03:43:39',
                'updated_at' => '2019-06-26 03:43:39',
            ],

            [
                'id' => '863',
                'label_id' => '311',
                'lang_id' => '2',
                'value' => 'Khách hàng',
                'created_at' => '2019-06-26 04:50:14',
                'updated_at' => '2019-06-26 04:50:14',
            ],

            [
                'id' => '864',
                'label_id' => '311',
                'lang_id' => '3',
                'value' => 'Customer',
                'created_at' => '2019-06-26 04:50:14',
                'updated_at' => '2019-06-26 04:50:14',
            ],

            [
                'id' => '865',
                'label_id' => '311',
                'lang_id' => '4',
                'value' => '顧客',
                'created_at' => '2019-06-26 04:50:14',
                'updated_at' => '2019-06-26 04:50:14',
            ],

            [
                'id' => '866',
                'label_id' => '312',
                'lang_id' => '2',
                'value' => 'Tất cả khách hàng',
                'created_at' => '2019-06-26 04:53:33',
                'updated_at' => '2019-06-26 04:53:33',
            ],

            [
                'id' => '867',
                'label_id' => '312',
                'lang_id' => '3',
                'value' => 'View all Customer',
                'created_at' => '2019-06-26 04:53:33',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '868',
                'label_id' => '312',
                'lang_id' => '4',
                'value' => 'すべての顧客を見る',
                'created_at' => '2019-06-26 04:53:33',
                'updated_at' => '2019-06-26 04:53:33',
            ],

            [
                'id' => '869',
                'label_id' => '313',
                'lang_id' => '2',
                'value' => 'Thêm mới khách hàng',
                'created_at' => '2019-06-26 04:54:27',
                'updated_at' => '2019-06-26 04:54:27',
            ],

            [
                'id' => '870',
                'label_id' => '313',
                'lang_id' => '3',
                'value' => 'Add new Customer',
                'created_at' => '2019-06-26 04:54:27',
                'updated_at' => '2019-06-26 04:54:27',
            ],

            [
                'id' => '871',
                'label_id' => '313',
                'lang_id' => '4',
                'value' => '新しい顧客を追加',
                'created_at' => '2019-06-26 04:54:27',
                'updated_at' => '2019-06-26 04:54:27',
            ],

            [
                'id' => '872',
                'label_id' => '314',
                'lang_id' => '2',
                'value' => 'Tất cả công trình',
                'created_at' => '2019-06-26 04:58:54',
                'updated_at' => '2019-06-26 04:58:54',
            ],

            [
                'id' => '873',
                'label_id' => '314',
                'lang_id' => '3',
                'value' => 'View all Construction',
                'created_at' => '2019-06-26 04:58:54',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '874',
                'label_id' => '314',
                'lang_id' => '4',
                'value' => '全て見る',
                'created_at' => '2019-06-26 04:58:54',
                'updated_at' => '2019-06-26 04:58:54',
            ],

            [
                'id' => '875',
                'label_id' => '315',
                'lang_id' => '2',
                'value' => 'Thêm mới công trình',
                'created_at' => '2019-06-26 05:01:07',
                'updated_at' => '2019-06-26 05:01:07',
            ],

            [
                'id' => '876',
                'label_id' => '315',
                'lang_id' => '3',
                'value' => 'Add new Construction',
                'created_at' => '2019-06-26 05:01:07',
                'updated_at' => '2019-06-26 05:01:07',
            ],

            [
                'id' => '877',
                'label_id' => '315',
                'lang_id' => '4',
                'value' => '新しい建設を追加する',
                'created_at' => '2019-06-26 05:01:07',
                'updated_at' => '2019-06-26 05:01:07',
            ],

            [
                'id' => '878',
                'label_id' => '316',
                'lang_id' => '2',
                'value' => 'Báo cáo thi công',
                'created_at' => '2019-06-26 08:55:14',
                'updated_at' => '2019-06-26 08:55:14',
            ],

            [
                'id' => '879',
                'label_id' => '316',
                'lang_id' => '3',
                'value' => 'Construction Report',
                'created_at' => '2019-06-26 08:55:14',
                'updated_at' => '2019-06-26 08:55:14',
            ],

            [
                'id' => '880',
                'label_id' => '316',
                'lang_id' => '4',
                'value' => '建設報告',
                'created_at' => '2019-06-26 08:55:14',
                'updated_at' => '2019-06-26 08:55:14',
            ],

            [
                'id' => '881',
                'label_id' => '317',
                'lang_id' => '2',
                'value' => 'Báo giá mới',
                'created_at' => '2019-06-27 04:21:09',
                'updated_at' => '2019-06-27 04:21:09',
            ],

            [
                'id' => '882',
                'label_id' => '317',
                'lang_id' => '3',
                'value' => 'Top quotations',
                'created_at' => '2019-06-27 04:21:09',
                'updated_at' => '2019-06-27 04:21:09',
            ],

            [
                'id' => '883',
                'label_id' => '317',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 04:21:10',
                'updated_at' => '2019-06-27 04:21:10',
            ],

            [
                'id' => '884',
                'label_id' => '318',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập định dạng ngày.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:13:12',
            ],

            [
                'id' => '885',
                'label_id' => '318',
                'lang_id' => '3',
                'value' => 'Please enter format date.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-07-16 10:52:12',
            ],

            [
                'id' => '886',
                'label_id' => '318',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '887',
                'label_id' => '319',
                'lang_id' => '2',
                'value' => 'Email này không hợp lệ.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:12:23',
            ],

            [
                'id' => '888',
                'label_id' => '319',
                'lang_id' => '3',
                'value' => 'This email is not valid.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:12:23',
            ],

            [
                'id' => '889',
                'label_id' => '319',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '890',
                'label_id' => '320',
                'lang_id' => '2',
                'value' => 'Phải nhập giống như {0}.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:12:10',
            ],

            [
                'id' => '891',
                'label_id' => '320',
                'lang_id' => '3',
                'value' => 'Must enter the same as {0}.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:12:11',
            ],

            [
                'id' => '892',
                'label_id' => '320',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '893',
                'label_id' => '321',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập tối đa {0} ngày.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:11:55',
            ],

            [
                'id' => '894',
                'label_id' => '321',
                'lang_id' => '3',
                'value' => 'Please enter at maximum {0} date.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-07-16 10:51:48',
            ],

            [
                'id' => '895',
                'label_id' => '321',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '896',
                'label_id' => '322',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập một số nhỏ hơn {0}.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:11:38',
            ],

            [
                'id' => '897',
                'label_id' => '322',
                'lang_id' => '3',
                'value' => 'Please enter a number less than {0}.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:11:38',
            ],

            [
                'id' => '898',
                'label_id' => '322',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '899',
                'label_id' => '323',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập tối đa {0} ký tự.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 10:11:23',
            ],

            [
                'id' => '900',
                'label_id' => '323',
                'lang_id' => '3',
                'value' => 'Please enter maximum {0} characters.',
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-07-16 10:51:29',
            ],

            [
                'id' => '901',
                'label_id' => '323',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:14',
                'updated_at' => '2019-06-27 09:43:14',
            ],

            [
                'id' => '902',
                'label_id' => '324',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập ít nhất {0} ngày.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:11:04',
            ],

            [
                'id' => '903',
                'label_id' => '324',
                'lang_id' => '3',
                'value' => 'Please enter at least {0} date.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:11:04',
            ],

            [
                'id' => '904',
                'label_id' => '324',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '905',
                'label_id' => '325',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập số lượng lớn hơn {0}.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:51',
            ],

            [
                'id' => '906',
                'label_id' => '325',
                'lang_id' => '3',
                'value' => 'Please enter a number of greater than {0}.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:51',
            ],

            [
                'id' => '907',
                'label_id' => '325',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '908',
                'label_id' => '326',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập ít nhất {0} ký tự.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:35',
            ],

            [
                'id' => '909',
                'label_id' => '326',
                'lang_id' => '3',
                'value' => 'Please enter at least {0} characters.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:35',
            ],

            [
                'id' => '910',
                'label_id' => '326',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '911',
                'label_id' => '327',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập số.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:19',
            ],

            [
                'id' => '912',
                'label_id' => '327',
                'lang_id' => '3',
                'value' => 'Please enter the number.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:19',
            ],

            [
                'id' => '913',
                'label_id' => '327',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '914',
                'label_id' => '328',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập số điện thoại.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:05',
            ],

            [
                'id' => '915',
                'label_id' => '328',
                'lang_id' => '3',
                'value' => 'Please enter phone number.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:10:05',
            ],

            [
                'id' => '916',
                'label_id' => '328',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '917',
                'label_id' => '329',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập một giá hợp lệ.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:09:35',
            ],

            [
                'id' => '918',
                'label_id' => '329',
                'lang_id' => '3',
                'value' => 'Please enter a valid price.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '919',
                'label_id' => '329',
                'lang_id' => '4',
                'value' => 'Please enter a valid price.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '920',
                'label_id' => '330',
                'lang_id' => '2',
                'value' => 'Trường này không thể để trống.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:09:51',
            ],

            [
                'id' => '921',
                'label_id' => '330',
                'lang_id' => '3',
                'value' => 'This field cannot be empty.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:09:51',
            ],

            [
                'id' => '922',
                'label_id' => '330',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '923',
                'label_id' => '331',
                'lang_id' => '2',
                'value' => 'Phải nhập giống như {0}.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:09:45',
            ],

            [
                'id' => '924',
                'label_id' => '331',
                'lang_id' => '3',
                'value' => 'Must enter the same as {0}.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:09:45',
            ],

            [
                'id' => '925',
                'label_id' => '331',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '926',
                'label_id' => '332',
                'lang_id' => '2',
                'value' => 'Vui lòng nhập một URL hợp lệ.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 10:08:58',
            ],

            [
                'id' => '927',
                'label_id' => '332',
                'lang_id' => '3',
                'value' => 'Please enter a valid URL.',
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '928',
                'label_id' => '332',
                'lang_id' => '4',
                'value' => null,
                'created_at' => '2019-06-27 09:43:15',
                'updated_at' => '2019-06-27 09:43:15',
            ],

            [
                'id' => '929',
                'label_id' => '333',
                'lang_id' => '2',
                'value' => 'Quy trình Bunka',
                'created_at' => '2019-06-28 08:50:38',
                'updated_at' => '2019-07-16 10:49:51',
            ],

            [
                'id' => '930',
                'label_id' => '333',
                'lang_id' => '3',
                'value' => 'Bunka Process',
                'created_at' => '2019-06-28 08:50:38',
                'updated_at' => '2019-07-16 10:49:51',
            ],

            [
                'id' => '931',
                'label_id' => '333',
                'lang_id' => '4',
                'value' => 'プロセス BK',
                'created_at' => '2019-06-28 08:50:39',
                'updated_at' => '2019-06-28 08:50:39',
            ],

            [
                'id' => '932',
                'label_id' => '334',
                'lang_id' => '2',
                'value' => 'Loại báo giá',
                'created_at' => '2019-07-01 03:18:11',
                'updated_at' => '2019-07-01 03:18:11',
            ],

            [
                'id' => '933',
                'label_id' => '334',
                'lang_id' => '3',
                'value' => 'Quotation type',
                'created_at' => '2019-07-01 03:18:11',
                'updated_at' => '2019-07-01 03:18:11',
            ],

            [
                'id' => '934',
                'label_id' => '334',
                'lang_id' => '4',
                'value' => '見積タイプ',
                'created_at' => '2019-07-01 03:18:11',
                'updated_at' => '2019-07-01 03:18:11',
            ],

            [
                'id' => '935',
                'label_id' => '335',
                'lang_id' => '2',
                'value' => 'Thuế (VAT)',
                'created_at' => '2019-07-01 03:21:12',
                'updated_at' => '2019-07-17 11:10:51',
            ],

            [
                'id' => '936',
                'label_id' => '335',
                'lang_id' => '3',
                'value' => 'TAX',
                'created_at' => '2019-07-01 03:21:12',
                'updated_at' => '2019-07-17 11:10:51',
            ],

            [
                'id' => '937',
                'label_id' => '335',
                'lang_id' => '4',
                'value' => '税務の場所',
                'created_at' => '2019-07-01 03:21:12',
                'updated_at' => '2019-07-01 03:21:12',
            ],

            [
                'id' => '938',
                'label_id' => '336',
                'lang_id' => '2',
                'value' => 'Thuế nước ngoài (VAT)',
                'created_at' => '2019-07-01 03:21:55',
                'updated_at' => '2019-07-17 11:10:38',
            ],

            [
                'id' => '939',
                'label_id' => '336',
                'lang_id' => '3',
                'value' => 'Foreign TAX',
                'created_at' => '2019-07-01 03:21:55',
                'updated_at' => '2019-07-17 11:10:38',
            ],

            [
                'id' => '940',
                'label_id' => '336',
                'lang_id' => '4',
                'value' => '国外',
                'created_at' => '2019-07-01 03:21:55',
                'updated_at' => '2019-07-01 03:22:02',
            ],

            [
                'id' => '941',
                'label_id' => '337',
                'lang_id' => '2',
                'value' => 'Bạn có muốn nhân đôi mục này không?',
                'created_at' => '2019-07-03 01:43:51',
                'updated_at' => '2019-07-03 01:43:51',
            ],

            [
                'id' => '942',
                'label_id' => '337',
                'lang_id' => '3',
                'value' => 'Are you want to duplicate this item?',
                'created_at' => '2019-07-03 01:43:51',
                'updated_at' => '2019-07-16 10:49:03',
            ],

            [
                'id' => '943',
                'label_id' => '337',
                'lang_id' => '4',
                'value' => 'このアイテムを複製しますか',
                'created_at' => '2019-07-03 01:43:51',
                'updated_at' => '2019-07-03 01:43:51',
            ],

            [
                'id' => '944',
                'label_id' => '338',
                'lang_id' => '2',
                'value' => 'Mẫu Excel',
                'created_at' => '2019-07-03 05:00:53',
                'updated_at' => '2019-07-03 05:00:53',
            ],

            [
                'id' => '945',
                'label_id' => '338',
                'lang_id' => '3',
                'value' => 'Excel Template',
                'created_at' => '2019-07-03 05:00:53',
                'updated_at' => '2019-07-16 10:16:36',
            ],

            [
                'id' => '946',
                'label_id' => '338',
                'lang_id' => '4',
                'value' => 'Excelテンプレート',
                'created_at' => '2019-07-03 05:00:53',
                'updated_at' => '2019-07-03 05:00:53',
            ],

            [
                'id' => '947',
                'label_id' => '339',
                'lang_id' => '2',
                'value' => 'Thêm phiên bản',
                'created_at' => '2019-07-03 10:18:18',
                'updated_at' => '2019-07-03 10:18:18',
            ],

            [
                'id' => '948',
                'label_id' => '339',
                'lang_id' => '3',
                'value' => 'Revision',
                'created_at' => '2019-07-03 10:18:18',
                'updated_at' => '2019-07-16 10:16:18',
            ],

            [
                'id' => '949',
                'label_id' => '339',
                'lang_id' => '4',
                'value' => '復帰',
                'created_at' => '2019-07-03 10:18:18',
                'updated_at' => '2019-07-03 10:18:18',
            ],

            [
                'id' => '950',
                'label_id' => '340',
                'lang_id' => '2',
                'value' => 'Tải về Phiếu trúng thầu',
                'created_at' => '2019-07-05 09:34:31',
                'updated_at' => '2019-07-05 09:34:31',
            ],

            [
                'id' => '951',
                'label_id' => '340',
                'lang_id' => '3',
                'value' => 'Download order receipt',
                'created_at' => '2019-07-05 09:34:31',
                'updated_at' => '2019-07-16 10:15:45',
            ],

            [
                'id' => '952',
                'label_id' => '340',
                'lang_id' => '4',
                'value' => '勝利チケットをダウンロードする',
                'created_at' => '2019-07-05 09:34:31',
                'updated_at' => '2019-07-05 09:34:31',
            ],

            [
                'id' => '953',
                'label_id' => '341',
                'lang_id' => '2',
                'value' => 'Mô tả cài đặt',
                'created_at' => '2019-07-06 09:19:29',
                'updated_at' => '2019-07-06 09:19:29',
            ],

            [
                'id' => '954',
                'label_id' => '341',
                'lang_id' => '3',
                'value' => 'Description of installation',
                'created_at' => '2019-07-06 09:19:29',
                'updated_at' => '2019-07-06 09:19:29',
            ],

            [
                'id' => '955',
                'label_id' => '341',
                'lang_id' => '4',
                'value' => 'インストールの説明',
                'created_at' => '2019-07-06 09:19:29',
                'updated_at' => '2019-07-06 09:19:29',
            ],

            [
                'id' => '956',
                'label_id' => '342',
                'lang_id' => '2',
                'value' => 'cho',
                'created_at' => '2019-07-06 09:21:50',
                'updated_at' => '2019-07-06 09:21:50',
            ],

            [
                'id' => '957',
                'label_id' => '342',
                'lang_id' => '3',
                'value' => 'for',
                'created_at' => '2019-07-06 09:21:50',
                'updated_at' => '2019-07-06 09:21:50',
            ],

            [
                'id' => '958',
                'label_id' => '342',
                'lang_id' => '4',
                'value' => 'にとって',
                'created_at' => '2019-07-06 09:21:51',
                'updated_at' => '2019-07-06 09:21:51',
            ],

            [
                'id' => '959',
                'label_id' => '343',
                'lang_id' => '2',
                'value' => 'Chiều rộng',
                'created_at' => '2019-07-12 04:39:30',
                'updated_at' => '2019-07-12 04:39:30',
            ],

            [
                'id' => '960',
                'label_id' => '343',
                'lang_id' => '3',
                'value' => 'Width',
                'created_at' => '2019-07-12 04:39:31',
                'updated_at' => '2019-07-12 04:39:31',
            ],

            [
                'id' => '961',
                'label_id' => '343',
                'lang_id' => '4',
                'value' => '幅',
                'created_at' => '2019-07-12 04:39:31',
                'updated_at' => '2019-07-12 04:39:31',
            ],

            [
                'id' => '962',
                'label_id' => '344',
                'lang_id' => '2',
                'value' => 'Chiều cao',
                'created_at' => '2019-07-12 04:40:12',
                'updated_at' => '2019-07-12 04:40:12',
            ],

            [
                'id' => '963',
                'label_id' => '344',
                'lang_id' => '3',
                'value' => 'Height',
                'created_at' => '2019-07-12 04:40:12',
                'updated_at' => '2019-07-12 04:40:12',
            ],

            [
                'id' => '964',
                'label_id' => '344',
                'lang_id' => '4',
                'value' => '身長',
                'created_at' => '2019-07-12 04:40:12',
                'updated_at' => '2019-07-12 04:40:12',
            ],

            [
                'id' => '965',
                'label_id' => '345',
                'lang_id' => '2',
                'value' => 'Số lượng',
                'created_at' => '2019-07-12 04:40:50',
                'updated_at' => '2019-07-12 04:40:50',
            ],

            [
                'id' => '966',
                'label_id' => '345',
                'lang_id' => '3',
                'value' => 'Quantity',
                'created_at' => '2019-07-12 04:40:50',
                'updated_at' => '2019-07-16 10:15:18',
            ],

            [
                'id' => '967',
                'label_id' => '345',
                'lang_id' => '4',
                'value' => '数量',
                'created_at' => '2019-07-12 04:40:50',
                'updated_at' => '2019-07-12 04:40:50',
            ],

            [
                'id' => '968',
                'label_id' => '346',
                'lang_id' => '2',
                'value' => 'Giá hệ thống',
                'created_at' => '2019-07-12 04:41:38',
                'updated_at' => '2019-07-16 10:14:10',
            ],

            [
                'id' => '969',
                'label_id' => '346',
                'lang_id' => '3',
                'value' => 'Sale price',
                'created_at' => '2019-07-12 04:41:38',
                'updated_at' => '2019-07-12 04:41:38',
            ],

            [
                'id' => '970',
                'label_id' => '346',
                'lang_id' => '4',
                'value' => '販売価格',
                'created_at' => '2019-07-12 04:41:38',
                'updated_at' => '2019-07-12 04:41:38',
            ],

            [
                'id' => '971',
                'label_id' => '347',
                'lang_id' => '2',
                'value' => 'Giá bán',
                'created_at' => '2019-07-12 04:42:04',
                'updated_at' => '2019-07-12 04:42:04',
            ],

            [
                'id' => '972',
                'label_id' => '347',
                'lang_id' => '3',
                'value' => 'Price',
                'created_at' => '2019-07-12 04:42:05',
                'updated_at' => '2019-07-12 04:42:05',
            ],

            [
                'id' => '973',
                'label_id' => '347',
                'lang_id' => '4',
                'value' => '価格',
                'created_at' => '2019-07-12 04:42:05',
                'updated_at' => '2019-07-12 04:42:05',
            ],

            [
                'id' => '974',
                'label_id' => '348',
                'lang_id' => '2',
                'value' => 'Phiên bản hiện tại',
                'created_at' => '2019-07-13 03:39:13',
                'updated_at' => '2019-07-13 03:39:13',
            ],

            [
                'id' => '975',
                'label_id' => '348',
                'lang_id' => '3',
                'value' => 'Current version',
                'created_at' => '2019-07-13 03:39:13',
                'updated_at' => '2019-07-13 03:39:13',
            ],

            [
                'id' => '976',
                'label_id' => '348',
                'lang_id' => '4',
                'value' => '現行版',
                'created_at' => '2019-07-13 03:39:13',
                'updated_at' => '2019-07-13 03:39:13',
            ],

            [
                'id' => '977',
                'label_id' => '349',
                'lang_id' => '2',
                'value' => 'Phiên bản cũ',
                'created_at' => '2019-07-13 03:39:49',
                'updated_at' => '2019-07-13 03:39:49',
            ],

            [
                'id' => '978',
                'label_id' => '349',
                'lang_id' => '3',
                'value' => 'Old version',
                'created_at' => '2019-07-13 03:39:49',
                'updated_at' => '2019-07-16 10:00:21',
            ],

            [
                'id' => '979',
                'label_id' => '349',
                'lang_id' => '4',
                'value' => '旧バージョン',
                'created_at' => '2019-07-13 03:39:50',
                'updated_at' => '2019-07-13 03:39:50',
            ],

            [
                'id' => '980',
                'label_id' => '350',
                'lang_id' => '2',
                'value' => 'Tên mục',
                'created_at' => '2019-07-13 03:40:26',
                'updated_at' => '2019-07-13 03:40:26',
            ],

            [
                'id' => '981',
                'label_id' => '350',
                'lang_id' => '3',
                'value' => 'Item name',
                'created_at' => '2019-07-13 03:40:26',
                'updated_at' => '2019-07-13 03:40:26',
            ],

            [
                'id' => '982',
                'label_id' => '350',
                'lang_id' => '4',
                'value' => '項目名',
                'created_at' => '2019-07-13 03:40:26',
                'updated_at' => '2019-07-13 03:40:26',
            ],

            [
                'id' => '983',
                'label_id' => '351',
                'lang_id' => '2',
                'value' => 'Bắt đầu hợp đồng',
                'created_at' => '2019-07-15 02:36:48',
                'updated_at' => '2019-07-16 10:00:06',
            ],

            [
                'id' => '984',
                'label_id' => '351',
                'lang_id' => '3',
                'value' => 'Start the contract',
                'created_at' => '2019-07-15 02:36:48',
                'updated_at' => '2019-07-16 10:00:06',
            ],

            [
                'id' => '985',
                'label_id' => '351',
                'lang_id' => '4',
                'value' => '契約を実行する',
                'created_at' => '2019-07-15 02:36:49',
                'updated_at' => '2019-07-15 02:36:49',
            ],

            [
                'id' => '986',
                'label_id' => '352',
                'lang_id' => '2',
                'value' => 'Tên viết tắt',
                'created_at' => '2019-07-15 03:11:57',
                'updated_at' => '2019-07-15 03:11:57',
            ],

            [
                'id' => '987',
                'label_id' => '352',
                'lang_id' => '3',
                'value' => 'Abbreviations',
                'created_at' => '2019-07-15 03:11:57',
                'updated_at' => '2019-07-15 03:11:57',
            ],

            [
                'id' => '988',
                'label_id' => '352',
                'lang_id' => '4',
                'value' => '略称',
                'created_at' => '2019-07-15 03:11:57',
                'updated_at' => '2019-07-15 03:11:57',
            ],

            [
                'id' => '989',
                'label_id' => '353',
                'lang_id' => '2',
                'value' => 'Giá sản xuất thực tế',
                'created_at' => '2019-07-15 03:11:57',
                'updated_at' => '2019-07-15 03:11:57',
            ],

            [
                'id' => '990',
                'label_id' => '353',
                'lang_id' => '3',
                'value' => 'Actual production price',
                'created_at' => '2019-07-15 03:11:57',
                'updated_at' => '2019-07-15 03:11:57',
            ],

            [
                'id' => '991',
                'label_id' => '353',
                'lang_id' => '4',
                'value' => '実際の製造価格',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '992',
                'label_id' => '354',
                'lang_id' => '2',
                'value' => 'Mã công trình',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '993',
                'label_id' => '354',
                'lang_id' => '3',
                'value' => 'Code Works',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '994',
                'label_id' => '354',
                'lang_id' => '4',
                'value' => '建物コード',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '995',
                'label_id' => '355',
                'lang_id' => '2',
                'value' => 'Thời hạn hợp đồng phải là 100%',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '996',
                'label_id' => '355',
                'lang_id' => '3',
                'value' => 'Contract period  must be 100%',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '997',
                'label_id' => '355',
                'lang_id' => '4',
                'value' => '契約期間は100％でなければなりません',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '998',
                'label_id' => '356',
                'lang_id' => '2',
                'value' => 'Số dư có',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '999',
                'label_id' => '356',
                'lang_id' => '3',
                'value' => 'Credit',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1000',
                'label_id' => '356',
                'lang_id' => '4',
                'value' => '利用可能なバランス',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1001',
                'label_id' => '357',
                'lang_id' => '2',
                'value' => 'Mã khách hàng',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1002',
                'label_id' => '357',
                'lang_id' => '3',
                'value' => 'Customer code',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1003',
                'label_id' => '357',
                'lang_id' => '4',
                'value' => '顧客コード',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1004',
                'label_id' => '358',
                'lang_id' => '2',
                'value' => 'Ngày hoàn thành',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1005',
                'label_id' => '358',
                'lang_id' => '3',
                'value' => 'Finish day',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1006',
                'label_id' => '358',
                'lang_id' => '4',
                'value' => '完了日',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1007',
                'label_id' => '359',
                'lang_id' => '2',
                'value' => 'Ngày xuất',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1008',
                'label_id' => '359',
                'lang_id' => '3',
                'value' => 'Export date',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1009',
                'label_id' => '359',
                'lang_id' => '4',
                'value' => 'エクスポート日',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1010',
                'label_id' => '360',
                'lang_id' => '2',
                'value' => 'Ngày tháng ghi sổ',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1011',
                'label_id' => '360',
                'lang_id' => '3',
                'value' => 'Date of recording',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1012',
                'label_id' => '360',
                'lang_id' => '4',
                'value' => '記録日',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1013',
                'label_id' => '361',
                'lang_id' => '2',
                'value' => 'Ngày đăng ký sản xuất',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1014',
                'label_id' => '361',
                'lang_id' => '3',
                'value' => 'Production registration date',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1015',
                'label_id' => '361',
                'lang_id' => '4',
                'value' => '製造登録日',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1016',
                'label_id' => '362',
                'lang_id' => '2',
                'value' => 'Ngày đăng ký hoàn thành',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1017',
                'label_id' => '362',
                'lang_id' => '3',
                'value' => 'Registration date completed',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1018',
                'label_id' => '362',
                'lang_id' => '4',
                'value' => '登録日が完了しました',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1019',
                'label_id' => '363',
                'lang_id' => '2',
                'value' => 'Ngày đăng ký xuất',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1020',
                'label_id' => '363',
                'lang_id' => '3',
                'value' => 'Export registration date',
                'created_at' => '2019-07-15 03:11:58',
                'updated_at' => '2019-07-15 03:11:58',
            ],

            [
                'id' => '1021',
                'label_id' => '363',
                'lang_id' => '4',
                'value' => '輸出登録日',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1022',
                'label_id' => '364',
                'lang_id' => '2',
                'value' => 'Chứng từ - Ngày tháng',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1023',
                'label_id' => '364',
                'lang_id' => '3',
                'value' => 'Documents - Date',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1024',
                'label_id' => '364',
                'lang_id' => '4',
                'value' => 'ドキュメント - 日付',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1025',
                'label_id' => '365',
                'lang_id' => '2',
                'value' => 'Chứng từ - Số hiệu',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1026',
                'label_id' => '365',
                'lang_id' => '3',
                'value' => 'Voucher - Number',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1027',
                'label_id' => '365',
                'lang_id' => '4',
                'value' => 'バウチャー - 番号',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1028',
                'label_id' => '366',
                'lang_id' => '2',
                'value' => 'Diễn giải',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1029',
                'label_id' => '366',
                'lang_id' => '3',
                'value' => 'Explain',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1030',
                'label_id' => '366',
                'lang_id' => '4',
                'value' => '解釈',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1031',
                'label_id' => '367',
                'lang_id' => '2',
                'value' => 'Phí mua ngoài',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1032',
                'label_id' => '367',
                'lang_id' => '3',
                'value' => 'External',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1033',
                'label_id' => '367',
                'lang_id' => '4',
                'value' => '外で購入料',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1034',
                'label_id' => '368',
                'lang_id' => '2',
                'value' => 'Nhà máy',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1035',
                'label_id' => '368',
                'lang_id' => '3',
                'value' => 'Factory',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1036',
                'label_id' => '368',
                'lang_id' => '4',
                'value' => '工場',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1037',
                'label_id' => '369',
                'lang_id' => '2',
                'value' => 'Giá nhà máy',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1038',
                'label_id' => '369',
                'lang_id' => '3',
                'value' => 'Factory price',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1039',
                'label_id' => '369',
                'lang_id' => '4',
                'value' => '工場価格',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1040',
                'label_id' => '370',
                'lang_id' => '2',
                'value' => 'Sản phẩm từ nhà máy',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1041',
                'label_id' => '370',
                'lang_id' => '3',
                'value' => 'Factory Product',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1042',
                'label_id' => '370',
                'lang_id' => '4',
                'value' => '工場製品',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1043',
                'label_id' => '371',
                'lang_id' => '2',
                'value' => 'Nội bộ',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1044',
                'label_id' => '371',
                'lang_id' => '3',
                'value' => 'Internal',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1045',
                'label_id' => '371',
                'lang_id' => '4',
                'value' => '内部',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1046',
                'label_id' => '372',
                'lang_id' => '2',
                'value' => 'Số phát sinh nợ',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1047',
                'label_id' => '372',
                'lang_id' => '3',
                'value' => 'Number of debt incurred',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1048',
                'label_id' => '372',
                'lang_id' => '4',
                'value' => '発生した債務の数',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1049',
                'label_id' => '373',
                'lang_id' => '2',
                'value' => 'Số dư nợ',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1050',
                'label_id' => '373',
                'lang_id' => '3',
                'value' => 'Outstanding balance',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1051',
                'label_id' => '373',
                'lang_id' => '4',
                'value' => '借金残高',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1052',
                'label_id' => '374',
                'lang_id' => '2',
                'value' => 'Vị trí',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1053',
                'label_id' => '374',
                'lang_id' => '3',
                'value' => 'Position',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1054',
                'label_id' => '374',
                'lang_id' => '4',
                'value' => '位置',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1055',
                'label_id' => '375',
                'lang_id' => '2',
                'value' => 'Giá của phòng kinh doanh',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1056',
                'label_id' => '375',
                'lang_id' => '3',
                'value' => 'Price of sales department',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1057',
                'label_id' => '375',
                'lang_id' => '4',
                'value' => '販売部門の価格',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1058',
                'label_id' => '376',
                'lang_id' => '2',
                'value' => 'Giá chưa giảm giá',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1059',
                'label_id' => '376',
                'lang_id' => '3',
                'value' => 'Prices are not discounted',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1060',
                'label_id' => '376',
                'lang_id' => '4',
                'value' => '価格は割引されません',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1061',
                'label_id' => '377',
                'lang_id' => '2',
                'value' => 'Mã sản xuất',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1062',
                'label_id' => '377',
                'lang_id' => '3',
                'value' => 'Produce Code',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1063',
                'label_id' => '377',
                'lang_id' => '4',
                'value' => 'コードを生成する',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1064',
                'label_id' => '378',
                'lang_id' => '2',
                'value' => 'Ngày nhận',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1065',
                'label_id' => '378',
                'lang_id' => '3',
                'value' => 'Received date',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1066',
                'label_id' => '378',
                'lang_id' => '4',
                'value' => '受け取った日',
                'created_at' => '2019-07-15 03:11:59',
                'updated_at' => '2019-07-15 03:11:59',
            ],

            [
                'id' => '1067',
                'label_id' => '379',
                'lang_id' => '2',
                'value' => 'TK đối ứng',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1068',
                'label_id' => '379',
                'lang_id' => '3',
                'value' => 'Reciprocal account',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1069',
                'label_id' => '379',
                'lang_id' => '4',
                'value' => '相互アカウント',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1070',
                'label_id' => '380',
                'lang_id' => '2',
                'value' => 'Ngày đăng ký bốc tách',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1071',
                'label_id' => '380',
                'lang_id' => '3',
                'value' => 'Registration date of separation',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1072',
                'label_id' => '380',
                'lang_id' => '4',
                'value' => '分離登録日',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1073',
                'label_id' => '381',
                'lang_id' => '2',
                'value' => 'Còn lại',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1074',
                'label_id' => '381',
                'lang_id' => '3',
                'value' => 'Rest',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1075',
                'label_id' => '381',
                'lang_id' => '4',
                'value' => '左',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1076',
                'label_id' => '382',
                'lang_id' => '2',
                'value' => 'SS No',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1077',
                'label_id' => '382',
                'lang_id' => '3',
                'value' => 'SS No',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1078',
                'label_id' => '382',
                'lang_id' => '4',
                'value' => 'SS No',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1079',
                'label_id' => '383',
                'lang_id' => '2',
                'value' => 'Mã số thuế',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1080',
                'label_id' => '383',
                'lang_id' => '3',
                'value' => 'Tax Code',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1081',
                'label_id' => '383',
                'lang_id' => '4',
                'value' => '税コード',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1082',
                'label_id' => '384',
                'lang_id' => '2',
                'value' => 'Số phát sinh có',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1083',
                'label_id' => '384',
                'lang_id' => '3',
                'value' => 'The number arises there',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1084',
                'label_id' => '384',
                'lang_id' => '4',
                'value' => 'そこに数が生じる',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1085',
                'label_id' => '385',
                'lang_id' => '2',
                'value' => 'Loại hình doanh nghiệp',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1086',
                'label_id' => '385',
                'lang_id' => '3',
                'value' => 'Type of business',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1087',
                'label_id' => '385',
                'lang_id' => '4',
                'value' => '事業の種類',
                'created_at' => '2019-07-15 03:12:00',
                'updated_at' => '2019-07-15 03:12:00',
            ],

            [
                'id' => '1088',
                'label_id' => '386',
                'lang_id' => '2',
                'value' => 'Xin chào',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1089',
                'label_id' => '386',
                'lang_id' => '3',
                'value' => 'Hello',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1090',
                'label_id' => '386',
                'lang_id' => '4',
                'value' => 'こんにちは',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1091',
                'label_id' => '387',
                'lang_id' => '2',
                'value' => 'Bạn có {NUMBER} thông báo mới',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1092',
                'label_id' => '387',
                'lang_id' => '3',
                'value' => 'You have {NUMBER} new notifications',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1093',
                'label_id' => '387',
                'lang_id' => '4',
                'value' => '新しい通知が {NUMBER} 件あります',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1094',
                'label_id' => '388',
                'lang_id' => '2',
                'value' => 'Xem thêm',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1095',
                'label_id' => '388',
                'lang_id' => '3',
                'value' => 'More',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1096',
                'label_id' => '388',
                'lang_id' => '4',
                'value' => 'もっと',
                'created_at' => '2019-07-15 09:19:40',
                'updated_at' => '2019-07-15 09:19:40',
            ],

            [
                'id' => '1097',
                'label_id' => '389',
                'lang_id' => '2',
                'value' => 'Tiến độ dự án',
                'created_at' => '2019-07-16 09:35:40',
                'updated_at' => '2019-07-16 09:35:40',
            ],

            [
                'id' => '1098',
                'label_id' => '389',
                'lang_id' => '3',
                'value' => 'Project Progress',
                'created_at' => '2019-07-16 09:35:40',
                'updated_at' => '2019-07-16 09:35:40',
            ],

            [
                'id' => '1099',
                'label_id' => '389',
                'lang_id' => '4',
                'value' => 'プロジェクト進捗',
                'created_at' => '2019-07-16 09:35:40',
                'updated_at' => '2019-07-16 09:35:40',
            ],

            [
                'id' => '1100',
                'label_id' => '390',
                'lang_id' => '2',
                'value' => 'Bản Nghiệm Thu',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1101',
                'label_id' => '390',
                'lang_id' => '3',
                'value' => 'Of acceptance',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1102',
                'label_id' => '390',
                'lang_id' => '4',
                'value' => '受付バージョン',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1103',
                'label_id' => '391',
                'lang_id' => '2',
                'value' => 'Tải xuống',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1104',
                'label_id' => '391',
                'lang_id' => '3',
                'value' => 'Download',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1105',
                'label_id' => '391',
                'lang_id' => '4',
                'value' => 'ダウンロードする',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1106',
                'label_id' => '392',
                'lang_id' => '2',
                'value' => 'Yêu cầu thanh toán hợp đồng',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1107',
                'label_id' => '392',
                'lang_id' => '3',
                'value' => 'Request payment of contracts',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1108',
                'label_id' => '392',
                'lang_id' => '4',
                'value' => '契約の支払いを要求する',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1109',
                'label_id' => '393',
                'lang_id' => '2',
                'value' => 'Quyết toán khối lượng với thầu phụ',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1110',
                'label_id' => '393',
                'lang_id' => '3',
                'value' => 'Settlement of volume with subcontractors',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1111',
                'label_id' => '393',
                'lang_id' => '4',
                'value' => '外注先による数量の決済',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1112',
                'label_id' => '394',
                'lang_id' => '2',
                'value' => 'Tải lên',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1113',
                'label_id' => '394',
                'lang_id' => '3',
                'value' => 'Upload',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1114',
                'label_id' => '394',
                'lang_id' => '4',
                'value' => 'アップロードする',
                'created_at' => '2019-07-19 08:30:31',
                'updated_at' => '2019-07-19 08:30:31',
            ],

            [
                'id' => '1115',
                'label_id' => '395',
                'lang_id' => '2',
                'value' => 'Thông tin chính',
                'created_at' => '2019-07-20 01:42:13',
                'updated_at' => '2019-07-20 01:42:13',
            ],

            [
                'id' => '1116',
                'label_id' => '395',
                'lang_id' => '3',
                'value' => 'Master Info',
                'created_at' => '2019-07-20 01:42:13',
                'updated_at' => '2019-07-20 01:42:13',
            ],

            [
                'id' => '1117',
                'label_id' => '395',
                'lang_id' => '4',
                'value' => 'マスター情報',
                'created_at' => '2019-07-20 01:42:13',
                'updated_at' => '2019-07-20 01:42:13',
            ],

            [
                'id' => '1118',
                'label_id' => '396',
                'lang_id' => '2',
                'value' => 'Thêm mới khu vực',
                'created_at' => '2019-07-20 01:44:47',
                'updated_at' => '2019-07-20 01:44:47',
            ],

            [
                'id' => '1119',
                'label_id' => '396',
                'lang_id' => '3',
                'value' => 'Add Area',
                'created_at' => '2019-07-20 01:44:47',
                'updated_at' => '2019-07-20 01:44:47',
            ],

            [
                'id' => '1120',
                'label_id' => '396',
                'lang_id' => '4',
                'value' => 'エリアを追加',
                'created_at' => '2019-07-20 01:44:47',
                'updated_at' => '2019-07-20 01:44:47',
            ],

            [
                'id' => '1121',
                'label_id' => '397',
                'lang_id' => '2',
                'value' => 'Phiếu trúng thầu',
                'created_at' => '2019-07-22 02:04:52',
                'updated_at' => '2019-07-22 02:04:52',
            ],

            [
                'id' => '1122',
                'label_id' => '397',
                'lang_id' => '3',
                'value' => 'Winning bidding',
                'created_at' => '2019-07-22 02:04:52',
                'updated_at' => '2019-07-22 02:04:52',
            ],

            [
                'id' => '1123',
                'label_id' => '397',
                'lang_id' => '4',
                'value' => '勝利投票',
                'created_at' => '2019-07-22 02:04:52',
                'updated_at' => '2019-07-22 02:04:52',
            ],

            [
                'id' => '1124',
                'label_id' => '398',
                'lang_id' => '2',
                'value' => 'Vận chuyển hàng hóa nội địa',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1125',
                'label_id' => '398',
                'lang_id' => '3',
                'value' => 'Inland freight',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1126',
                'label_id' => '398',
                'lang_id' => '4',
                'value' => '内陸貨物',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1127',
                'label_id' => '399',
                'lang_id' => '2',
                'value' => 'Phí cài đặt',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1128',
                'label_id' => '399',
                'lang_id' => '3',
                'value' => 'Installation',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1129',
                'label_id' => '399',
                'lang_id' => '4',
                'value' => '設置料',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1130',
                'label_id' => '400',
                'lang_id' => '2',
                'value' => 'Tổng phụ',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1131',
                'label_id' => '400',
                'lang_id' => '3',
                'value' => 'Sub total',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1132',
                'label_id' => '400',
                'lang_id' => '4',
                'value' => '小計',
                'created_at' => '2019-07-22 10:29:55',
                'updated_at' => '2019-07-22 10:29:55',
            ],

            [
                'id' => '1133',
                'label_id' => '401',
                'lang_id' => '2',
                'value' => 'Tổng',
                'created_at' => '2019-07-22 10:29:56',
                'updated_at' => '2019-07-22 10:29:56',
            ],

            [
                'id' => '1134',
                'label_id' => '401',
                'lang_id' => '3',
                'value' => 'Total',
                'created_at' => '2019-07-22 10:29:56',
                'updated_at' => '2019-07-22 10:29:56',
            ],

            [
                'id' => '1135',
                'label_id' => '401',
                'lang_id' => '4',
                'value' => '合計',
                'created_at' => '2019-07-22 10:29:56',
                'updated_at' => '2019-07-22 10:29:56',
            ],

            [
                'id' => '1136',
                'label_id' => '402',
                'lang_id' => '2',
                'value' => 'Tỉ Giá',
                'created_at' => '2019-07-25 04:42:35',
                'updated_at' => '2019-07-25 04:42:35',
            ],

            [
                'id' => '1137',
                'label_id' => '402',
                'lang_id' => '3',
                'value' => 'Rate',
                'created_at' => '2019-07-25 04:42:35',
                'updated_at' => '2019-07-25 04:42:35',
            ],

            [
                'id' => '1138',
                'label_id' => '402',
                'lang_id' => '4',
                'value' => '評価する',
                'created_at' => '2019-07-25 04:42:35',
                'updated_at' => '2019-07-25 04:42:35',
            ],

            [
                'id' => '1139',
                'label_id' => '403',
                'lang_id' => '2',
                'value' => 'Xác nhận',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1140',
                'label_id' => '403',
                'lang_id' => '3',
                'value' => 'Approve',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1141',
                'label_id' => '403',
                'lang_id' => '4',
                'value' => '承認する',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1142',
                'label_id' => '404',
                'lang_id' => '2',
                'value' => 'Quay lại',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1143',
                'label_id' => '404',
                'lang_id' => '3',
                'value' => 'Back',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1144',
                'label_id' => '404',
                'lang_id' => '4',
                'value' => '戻ってくる',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1145',
                'label_id' => '405',
                'lang_id' => '2',
                'value' => 'Đặt hàng trở lại',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1146',
                'label_id' => '405',
                'lang_id' => '3',
                'value' => 'Back Order',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1147',
                'label_id' => '405',
                'lang_id' => '4',
                'value' => '受注残',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1148',
                'label_id' => '406',
                'lang_id' => '2',
                'value' => 'Chọn tháng',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1149',
                'label_id' => '406',
                'lang_id' => '3',
                'value' => 'Choose month',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1150',
                'label_id' => '406',
                'lang_id' => '4',
                'value' => '月を選択してください',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1151',
                'label_id' => '407',
                'lang_id' => '2',
                'value' => 'Thi công hoàn thành',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1152',
                'label_id' => '407',
                'lang_id' => '3',
                'value' => 'Construction Completion',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1153',
                'label_id' => '407',
                'lang_id' => '4',
                'value' => '工事完了',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1154',
                'label_id' => '408',
                'lang_id' => '2',
                'value' => 'Bên Nợ',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1155',
                'label_id' => '408',
                'lang_id' => '3',
                'value' => 'Debt Side',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1156',
                'label_id' => '408',
                'lang_id' => '4',
                'value' => '借金側',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1157',
                'label_id' => '409',
                'lang_id' => '2',
                'value' => 'Dự kiến',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1158',
                'label_id' => '409',
                'lang_id' => '3',
                'value' => 'Expected',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1159',
                'label_id' => '409',
                'lang_id' => '4',
                'value' => '期待される',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1160',
                'label_id' => '410',
                'lang_id' => '2',
                'value' => 'Bên có',
                'created_at' => '2019-07-26 09:02:04',
                'updated_at' => '2019-07-26 09:02:04',
            ],

            [
                'id' => '1161',
                'label_id' => '410',
                'lang_id' => '3',
                'value' => 'Have Side',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1162',
                'label_id' => '410',
                'lang_id' => '4',
                'value' => 'パーティーは',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1163',
                'label_id' => '411',
                'lang_id' => '2',
                'value' => 'Danh sách chính',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1164',
                'label_id' => '411',
                'lang_id' => '3',
                'value' => 'Main List',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1165',
                'label_id' => '411',
                'lang_id' => '4',
                'value' => 'メインリスト',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1166',
                'label_id' => '412',
                'lang_id' => '2',
                'value' => 'Dòng {{key}} mã công trình "{{building_code}}" không tồn tại.',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1167',
                'label_id' => '412',
                'lang_id' => '3',
                'value' => 'Dòng {{key}} mã công trình "{{building_code}}" không tồn tại.',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1168',
                'label_id' => '412',
                'lang_id' => '4',
                'value' => 'Dòng {{key}} mã công trình "{{building_code}}" không tồn tại.',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1169',
                'label_id' => '413',
                'lang_id' => '2',
                'value' => 'Tháng',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1170',
                'label_id' => '413',
                'lang_id' => '3',
                'value' => 'Month',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1171',
                'label_id' => '413',
                'lang_id' => '4',
                'value' => '月',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1172',
                'label_id' => '414',
                'lang_id' => '2',
                'value' => 'Doanh số',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1173',
                'label_id' => '414',
                'lang_id' => '3',
                'value' => 'Sales',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1174',
                'label_id' => '414',
                'lang_id' => '4',
                'value' => '売上高',
                'created_at' => '2019-07-26 09:02:05',
                'updated_at' => '2019-07-26 09:02:05',
            ],

            [
                'id' => '1175',
                'label_id' => '415',
                'lang_id' => '2',
                'value' => 'Hệ thống',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1176',
                'label_id' => '415',
                'lang_id' => '3',
                'value' => 'System',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1177',
                'label_id' => '415',
                'lang_id' => '4',
                'value' => 'システム',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1178',
                'label_id' => '416',
                'lang_id' => '2',
                'value' => 'Phần trăm hệ thống',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1179',
                'label_id' => '416',
                'lang_id' => '3',
                'value' => 'System percentage',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1180',
                'label_id' => '416',
                'lang_id' => '4',
                'value' => 'システムパーセンテージ',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1181',
                'label_id' => '417',
                'lang_id' => '2',
                'value' => 'Mục tiêu',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1182',
                'label_id' => '417',
                'lang_id' => '3',
                'value' => 'Target',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1183',
                'label_id' => '417',
                'lang_id' => '4',
                'value' => 'ターゲット',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1184',
                'label_id' => '418',
                'lang_id' => '2',
                'value' => 'Năm',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1185',
                'label_id' => '418',
                'lang_id' => '3',
                'value' => 'Year',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

            [
                'id' => '1186',
                'label_id' => '418',
                'lang_id' => '4',
                'value' => '年',
                'created_at' => '2019-07-26 09:02:06',
                'updated_at' => '2019-07-26 09:02:06',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("language_values", $item);
        }
    }

}