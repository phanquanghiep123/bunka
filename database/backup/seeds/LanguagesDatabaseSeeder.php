<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class LanguagesDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '2',
                'name' => 'Việt nam',
                'slug' => 'viet-nam',
                'icon' => 'uploads\5cb041c8ec933-5c837e525d817.png',
                'price_label' => null,
                'price_facion' => null,
                'is_default' => '0',
                'status_id' => '25',
                'rate' => null,
                'created_at' => '2019-04-12 05:07:57',
                'updated_at' => '2019-04-12 07:44:08',
                'locale' => null,
            ],

            [
                'id' => '3',
                'name' => 'English',
                'slug' => 'english',
                'icon' => 'uploads\5cb041f143555-5c837e7532652.png',
                'price_label' => null,
                'price_facion' => null,
                'is_default' => '1',
                'status_id' => '25',
                'rate' => null,
                'created_at' => '2019-04-12 07:44:49',
                'updated_at' => '2019-04-12 07:44:49',
                'locale' => null,
            ],

            [
                'id' => '4',
                'name' => 'Japan',
                'slug' => 'japan',
                'icon' => 'uploads\5cb04409b5de9-tieng-nhat-can-tho-new-windows-quoc-ky-nhat2.jpg',
                'price_label' => null,
                'price_facion' => null,
                'is_default' => '0',
                'status_id' => '25',
                'rate' => null,
                'created_at' => '2019-04-12 07:53:45',
                'updated_at' => '2019-04-12 07:53:45',
                'locale' => null,
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("languages", $item);
        }
    }

}