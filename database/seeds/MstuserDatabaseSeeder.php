<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class MstuserDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'UserId' => 'admin',
                'Password' => '70a4507fafaa7b487aa71cc83dac86b7',
                'QuoSeqNo' => '01021',
                'Name' => 'Administrator',
                'ShortName' => 'admin',
                'LevelClassKey' => '1',
            ]

        ];

        foreach($data as $item) 
        {
            $this->saveData("mstuser", $item);
        }
    }

}