<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class MstfactoryitemDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'FactoryCode' => '01',
                'FactoryName' => 'SS(0.8t)',
            ],

            [
                'FactoryCode' => '02',
                'FactoryName' => 'SS(1.2t)',
            ],

            [
                'FactoryCode' => '03',
                'FactoryName' => 'DMJ(MINI)',
            ],

            [
                'FactoryCode' => '04',
                'FactoryName' => 'DMJ(M2)',
            ],

            [
                'FactoryCode' => '05',
                'FactoryName' => 'SD',
            ],

            [
                'FactoryCode' => '06',
                'FactoryName' => 'SD(FIRE)',
            ],

            [
                'FactoryCode' => '07',
                'FactoryName' => 'LSD',
            ],

            [
                'FactoryCode' => '08',
                'FactoryName' => 'HANGER DOOR',
            ],

            [
                'FactoryCode' => '09',
                'FactoryName' => 'WD',
            ],

            [
                'FactoryCode' => '10',
                'FactoryName' => 'FRONT ',
            ],

            [
                'FactoryCode' => '13',
                'FactoryName' => 'DMJ(BEAD)',
            ],

            [
                'FactoryCode' => '14',
                'FactoryName' => 'DMJ(D310)',
            ],

            [
                'FactoryCode' => '21',
                'FactoryName' => 'SS(0.8t)',
            ],

            [
                'FactoryCode' => '22',
                'FactoryName' => 'SS(0.8t)',
            ],

            [
                'FactoryCode' => '23',
                'FactoryName' => 'SS(Alumium)',
            ],

            [
                'FactoryCode' => '27',
                'FactoryName' => 'LSD(WOOD)',
            ],

            [
                'FactoryCode' => '28',
                'FactoryName' => 'LSD(BVMS WOOD)',
            ],

            [
                'FactoryCode' => '72',
                'FactoryName' => 'CSL(0.6t)',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("mstfactoryitem", $item);
        }
    }

}