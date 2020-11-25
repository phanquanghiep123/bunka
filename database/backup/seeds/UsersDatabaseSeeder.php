<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class UsersDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$sReMRb0r6oLPSXIyMCHkxeEl3kDn3cAHKBuzQcoUc/cdh4N1NW/oi',
                'contact_number' => null,
                'photo' => 'uploads\5d075072b9758-il_794xN.1712074526_qx7v.jpg',
                'is_sys' => '1',
                'status_id' => '25',
                'role_module_id' => '1',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => '2019-06-30 00:58:51',
                'is_default' => '0',
            ],

            [
                'id' => '3',
                'first_name' => 'saler',
                'last_name' => 'dev',
                'email' => 'phanquanghiep123@gmail.com',
                'password' => '$2y$10$6fWS6AcseMIeRWXDD/NvHeXLOa2AfPdrK9i69xjnwBxfua26EldVq',
                'contact_number' => null,
                'photo' => 'uploads/5d143f34e2329-co-signup.png',
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '3',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-09 11:56:21',
                'updated_at' => '2019-07-16 10:48:59',
                'is_default' => '0',
            ],

            [
                'id' => '4',
                'first_name' => 'manager',
                'last_name' => 'dev',
                'email' => 'phanquanghiep1234@gmail.com',
                'password' => '$2y$10$5iinbdojVyGBgcsTFKS8yOXNrjHrJyrRmZidT4zci0Km.29/WbuuG',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '2',
                'branch_id' => '1',
                'lang_id' => '2',
                'remember_token' => null,
                'created_at' => '2019-06-09 11:57:20',
                'updated_at' => '2019-07-15 10:25:38',
                'is_default' => '0',
            ],

            [
                'id' => '5',
                'first_name' => 'System',
                'last_name' => 'Admin',
                'email' => 'SystemAdmin@gmail.com',
                'password' => '$2y$10$qoS53liasEbWhyzKabAxVeiy8GwGB.Et5uK/3uZEZ/.Z/1C33Ltla',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '8',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-18 11:56:44',
                'updated_at' => '2019-06-18 11:56:44',
                'is_default' => '0',
            ],

            [
                'id' => '6',
                'first_name' => 'dev',
                'last_name' => 'test',
                'email' => 'devtestemail1234@gmail.com',
                'password' => '$2y$10$XSyMs4SXJ039brzKeAsl.eONkF8PFSanshTHpNaeFZSroJWun.IDy',
                'contact_number' => null,
                'photo' => 'uploads/5d143b77eed7b-cake-pops.jpg',
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '4',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-22 02:41:21',
                'updated_at' => '2019-06-27 05:04:15',
                'is_default' => '0',
            ],

            [
                'id' => '7',
                'first_name' => 'sale',
                'last_name' => 'ha noi',
                'email' => 'hn_sale@bunka.vn',
                'password' => '$2y$10$5CJ2crS/TQ8Xl56HMSJpjO6yZx3oIgpty0Y4rnJi9n9SYc3AvrdrW',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '3',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:00:04',
                'updated_at' => '2019-06-30 01:00:04',
                'is_default' => '0',
            ],

            [
                'id' => '8',
                'first_name' => 'manager',
                'last_name' => 'ha noi',
                'email' => 'hn_manager@bunka.vn',
                'password' => '$2y$10$XiD0.gEToWQm7/BKawgbqecjjdpp6hxC0U6xBcKEdl0uw8JUyukD.',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '2',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:00:33',
                'updated_at' => '2019-06-30 01:00:33',
                'is_default' => '0',
            ],

            [
                'id' => '9',
                'first_name' => 'factory',
                'last_name' => 'ha noi',
                'email' => 'hn_factory@bunka.vn',
                'password' => '$2y$10$lkis6IqDnWZ9XokncpxoIeQdwgKW8cLVhfsP8viWNdwS8/fbKWk0e',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '7',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:03:22',
                'updated_at' => '2019-06-30 01:03:23',
                'is_default' => '0',
            ],

            [
                'id' => '10',
                'first_name' => 'accountant',
                'last_name' => 'ha noi',
                'email' => 'hn_accountant@bunka.vn',
                'password' => '$2y$10$ahBfj5W28T/1nGhFqRJLOOlkE0pOIfhCi2KWqcAzfFj6WDYDt6a9e',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '4',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:04:02',
                'updated_at' => '2019-06-30 01:04:02',
                'is_default' => '0',
            ],

            [
                'id' => '11',
                'first_name' => 'sale',
                'last_name' => 'hcm',
                'email' => 'hcm_sale@bunka.vn',
                'password' => '$2y$10$CA7Osn8ER.A2Q.zJFeDD9Og2d9TNmlKGPb7YcBwQS6W6Rts7UCBou',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '3',
                'branch_id' => '2',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:04:32',
                'updated_at' => '2019-06-30 01:04:32',
                'is_default' => '0',
            ],

            [
                'id' => '12',
                'first_name' => 'manager',
                'last_name' => 'hcm',
                'email' => 'hcm_manager@bunka.vn',
                'password' => '$2y$10$5IjmpoOvHWYPWUB0dqsTBuRcox336UrmhY6bq0vJtBoU8dfqxnfqy',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '2',
                'branch_id' => '2',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:05:13',
                'updated_at' => '2019-06-30 01:05:13',
                'is_default' => '0',
            ],

            [
                'id' => '13',
                'first_name' => 'factory',
                'last_name' => 'hcm',
                'email' => 'hcm_factory@bunka.vn',
                'password' => '$2y$10$W1FMj1vj9JoNXQ54x./Bf.QwRUSEm5ate2KL0rp49XNrkTnR2KdH2',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '7',
                'branch_id' => '2',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:05:46',
                'updated_at' => '2019-06-30 01:05:46',
                'is_default' => '0',
            ],

            [
                'id' => '14',
                'first_name' => 'accountant',
                'last_name' => 'hcm',
                'email' => 'hcm_accountant@bunka.vn',
                'password' => '$2y$10$fQMMMCrAh5uBnH/d1bDp5eficTYbXhHngJI16c/l6zW8KHYMqu59u',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '4',
                'branch_id' => '2',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:06:23',
                'updated_at' => '2019-06-30 01:06:23',
                'is_default' => '0',
            ],

            [
                'id' => '15',
                'first_name' => 'sale',
                'last_name' => 'japan',
                'email' => 'j_sale@bunka.vn',
                'password' => '$2y$10$9nkLLtsVhaIP00wE5/wyAueT5wtdhJkXSezbFNcR8FbFA4Pk75u9S',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '3',
                'branch_id' => '3',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:06:59',
                'updated_at' => '2019-06-30 01:06:59',
                'is_default' => '0',
            ],

            [
                'id' => '16',
                'first_name' => 'manager',
                'last_name' => 'japan',
                'email' => 'j_manager@bunka.vn',
                'password' => '$2y$10$HDknj8RFbStXxVaX7Gr7buxDzj/hnRG2Ol1UCEtl38Odc8Pl8.mMO',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '2',
                'branch_id' => '3',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:07:40',
                'updated_at' => '2019-06-30 01:07:41',
                'is_default' => '0',
            ],

            [
                'id' => '17',
                'first_name' => 'factory',
                'last_name' => 'japan',
                'email' => 'j_factory@bunka.vn',
                'password' => '$2y$10$VhM.4vLZkcap/wmbTpTode5OsM3IPPNO1bYfBAa65Mhj2cE0HV4ym',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '7',
                'branch_id' => '3',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:08:09',
                'updated_at' => '2019-06-30 01:08:09',
                'is_default' => '0',
            ],

            [
                'id' => '18',
                'first_name' => 'accountant',
                'last_name' => 'japan',
                'email' => 'j_accountant@bunka.vn',
                'password' => '$2y$10$TgDHsmL.AN6UiWakSn06We.E16FqMND1aoknemNpf8X4lvy.fptrK',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '4',
                'branch_id' => '3',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:08:44',
                'updated_at' => '2019-06-30 01:08:44',
                'is_default' => '0',
            ],

            [
                'id' => '19',
                'first_name' => 'director',
                'last_name' => 'name',
                'email' => 'director@bunka.vn',
                'password' => '$2y$10$1jO749NeSuo.PGWQIJCKj.O6Et/UUHPGk/JIA5kLwlsvpgvD5VaQu',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '5',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-06-30 01:09:21',
                'updated_at' => '2019-06-30 01:09:21',
                'is_default' => '0',
            ],

            [
                'id' => '20',
                'first_name' => 'Tuyen',
                'last_name' => 'Hoang',
                'email' => 'hoangtuyen333@gmail.com',
                'password' => '$2y$10$jLky.AMeRWdmd7IH49F.yeYB2RI/kA7TXy7mlxoiJmsZrfcim1WeS',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '8',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-07-01 02:26:01',
                'updated_at' => '2019-07-01 02:26:01',
                'is_default' => '0',
            ],

            [
                'id' => '21',
                'first_name' => 'Tuyen',
                'last_name' => 'Hoang',
                'email' => 'hoangtuyen333+1@gmail.com',
                'password' => '$2y$10$Z99zKs9vCnucaLpWfIWV0ujYOkOt5RTkGLDeXnzY/c8fdFCTQIDoi',
                'contact_number' => null,
                'photo' => null,
                'is_sys' => '0',
                'status_id' => '25',
                'role_module_id' => '7',
                'branch_id' => '1',
                'lang_id' => '3',
                'remember_token' => null,
                'created_at' => '2019-07-01 03:04:36',
                'updated_at' => '2019-07-01 03:04:36',
                'is_default' => '0',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("users", $item);
        }
    }

}