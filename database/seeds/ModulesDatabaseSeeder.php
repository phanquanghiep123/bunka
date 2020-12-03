<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ModulesDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'name' => 'Management Modules',
                'controller' => 'Modules',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:20:45',
                'updated_at' => '2019-05-08 09:44:50',
            ],

            [
                'id' => '2',
                'name' => 'Home',
                'controller' => 'Home',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '1',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:20:45',
                'updated_at' => '2019-06-27 09:15:04',
            ],

            [
                'id' => '3',
                'name' => 'Accounts',
                'controller' => 'Accounts',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '1',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:20:45',
                'updated_at' => '2019-05-04 09:19:19',
            ],

            [
                'id' => '5',
                'name' => 'Management Roles',
                'controller' => 'Roles',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:20:45',
                'updated_at' => '2019-05-04 09:19:30',
            ],

            [
                'id' => '6',
                'name' => 'Management Languages',
                'controller' => 'Languages',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:21:16',
                'updated_at' => '2019-05-04 09:19:47',
            ],

            [
                'id' => '7',
                'name' => 'Management Menus',
                'controller' => 'Menus',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-11 02:21:43',
                'updated_at' => '2019-05-04 09:19:57',
            ],

            [
                'id' => '9',
                'name' => 'Management Languages Labels',
                'controller' => 'LanguageLabels',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-12 08:31:22',
                'updated_at' => '2019-05-04 09:20:28',
            ],

            [
                'id' => '10',
                'name' => 'Profile',
                'controller' => 'Profile',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '1',
                'is_menu' => '1',
                'created_at' => '2019-04-20 08:28:44',
                'updated_at' => '2019-05-04 09:20:39',
            ],

            [
                'id' => '11',
                'name' => 'Management Users',
                'controller' => 'Users',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-20 08:52:47',
                'updated_at' => '2019-05-04 09:20:53',
            ],

            [
                'id' => '12',
                'name' => 'Management Customers',
                'controller' => 'Customers',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-22 11:12:40',
                'updated_at' => '2019-05-04 09:21:02',
            ],

            [
                'id' => '13',
                'name' => 'Management Contracts',
                'controller' => 'Contracts',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-22 11:38:32',
                'updated_at' => '2019-05-04 09:21:12',
            ],

            [
                'id' => '14',
                'name' => 'Management Orders',
                'controller' => 'Orders',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-22 11:38:52',
                'updated_at' => '2019-05-04 09:21:22',
            ],

            [
                'id' => '16',
                'name' => 'Management Settings',
                'controller' => 'Settings',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-23 08:21:53',
                'updated_at' => '2019-05-04 09:21:43',
            ],

            [
                'id' => '17',
                'name' => 'Management Quotations',
                'controller' => 'Quotations',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-04-23 09:16:45',
                'updated_at' => '2019-05-04 09:21:51',
            ],

            [
                'id' => '18',
                'name' => 'Management Status',
                'controller' => 'Status',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-05-02 08:00:31',
                'updated_at' => '2019-05-04 09:22:00',
            ],

            [
                'id' => '20',
                'name' => 'Management Request Design',
                'controller' => 'RequestDesign',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-05-09 11:23:47',
                'updated_at' => '2019-05-09 11:23:47',
            ],

            [
                'id' => '30',
                'name' => 'WedConfigs',
                'controller' => 'Webconfigs',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-05-21 08:47:28',
                'updated_at' => '2019-05-21 09:19:51',
            ],

            [
                'id' => '40',
                'name' => 'Areas Management',
                'controller' => 'Areas',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-06-18 10:11:27',
                'updated_at' => '2019-06-19 04:56:43',
            ],

            [
                'id' => '50',
                'name' => 'Item Class Management',
                'controller' => 'ItemClass',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '51',
                'name' => 'Item Price Management',
                'controller' => 'ItemPrice',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '52',
                'name' => 'Items Management',
                'controller' => 'Items',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '53',
                'name' => 'Matrix Type Management',
                'controller' => 'MatrixType',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '54',
                'name' => 'Matrix Value Management',
                'controller' => 'MatrixValue',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '55',
                'name' => 'Price Pattern Management',
                'controller' => 'PricePattern',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '56',
                'name' => 'Product Class Management',
                'controller' => 'ProductClass',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '57',
                'name' => 'Tax Class Management',
                'controller' => 'Tax',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '58',
                'name' => 'Email Template Management',
                'controller' => 'EmailTemplate',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-06-22 02:36:23',
                'updated_at' => '2019-06-22 02:36:23',
            ],

            [
                'id' => '59',
                'name' => 'Construction Management',
                'controller' => 'Construction',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-06-26 04:57:09',
                'updated_at' => '2019-06-26 04:57:34',
            ],

            [
                'id' => '60',
                'name' => 'Factory Management',
                'controller' => 'FactoryProduct',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-06-28 11:00:16',
                'updated_at' => '2019-07-16 03:14:59',
            ],

            [
                'id' => '61',
                'name' => 'Excel Templates Management',
                'controller' => 'ExcelTemplates',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-07-03 03:25:08',
                'updated_at' => '2019-07-03 03:25:08',
            ],

            [
                'id' => '62',
                'name' => 'Currency Management',
                'controller' => 'Currency',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => null,
                'updated_at' => null,
            ],

            [
                'id' => '63',
                'name' => 'Main List',
                'controller' => 'MainList',
                'status_id' => '25',
                'sort' => '0',
                'is_common' => '2',
                'is_menu' => '1',
                'created_at' => '2019-07-26 08:56:21',
                'updated_at' => '2019-07-26 08:56:21',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("modules", $item);
        }
    }

}