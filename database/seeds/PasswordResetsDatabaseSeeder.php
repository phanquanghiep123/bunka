<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class PasswordResetsDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'email' => 'devtestemail1234@gmail.com',
                'token' => '$2y$10$CEtB7CwOwSe.NJDGHp9C8ej3WKtACZ5rEOCvBIYPRt7O6PA6nkVSq',
                'created_at' => '2019-04-28 11:06:04',
            ]

        ];

        foreach($data as $item) 
        {
            $this->saveData("password_resets", $item);
        }
    }

}