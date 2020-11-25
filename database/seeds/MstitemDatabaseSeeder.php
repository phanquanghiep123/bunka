<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class MstitemDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'ItemId' => '12',
                'ItemName' => 'Swing Door (SGL), Steel, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '27',
                'ItemNameVN' => 'Cửa thép đơn (Loại nặng) (ST)',
                'ItemNameJP' => 'スチールドア　シングル　スイング (ST)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '13',
                'ItemName' => 'Swing Door (DBL), Steel, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '28',
                'ItemNameVN' => 'Cửa thép đôi (Loại nặng) (ST)',
                'ItemNameJP' => 'スチールドア　ダブル　スイング (ST)  ',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '14',
                'ItemName' => 'Swing Door (SGL), Light Steel, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '1',
                'ItemNameVN' => 'Cửa thép đơn (Loại nhẹ) (ST)',
                'ItemNameJP' => '化粧スチールドア　シングル　スイング (ST) ',
                'FactoryCode' => '07',
            ],

            [
                'ItemId' => '15',
                'ItemName' => 'Swing Door (DBL), Light Steel, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '2',
                'ItemNameVN' => 'Cửa thép đôi (Loại nhẹ) (ST)',
                'ItemNameJP' => '化粧スチールドア　ダブル　スイング (ST)  ',
                'FactoryCode' => '07',
            ],

            [
                'ItemId' => '29',
                'ItemName' => 'Integral Lock UC-1Q',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tròn UC-1Q',
                'ItemNameJP' => '本締付モノロックUC-1Q',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '30',
                'ItemName' => 'Integral Lock UC-3Q',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tròn UC-3Q',
                'ItemNameJP' => '本締付モノロックUC-3Q',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '31',
                'ItemName' => 'Integral Lock UC-5Q',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tròn UC-5Q',
                'ItemNameJP' => '本締付モノロックUC-5Q',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '32',
                'ItemName' => 'Integral Lock UC-7Q',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tròn UC-7Q',
                'ItemNameJP' => '本締付モノロックUC-7Q',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '33',
                'ItemName' => 'Lever Handle Lock LX - 1X .KNU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 1X .KNU11S',
                'ItemNameJP' => 'レバーハンドル 錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '34',
                'ItemName' => 'Lever Handle Lock LX - 3X .KNU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 3X .KNU11S',
                'ItemNameJP' => 'レバーハンドル 錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '35',
                'ItemName' => 'Lever Handle Lock LX - 5X .KNU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 5X .KNU11S',
                'ItemNameJP' => 'レバーハンドル 錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '36',
                'ItemName' => 'Lever Handle Lock LX - 6X .KNU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 6X .KNU11S',
                'ItemNameJP' => 'レバーハンドル 錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '37',
                'ItemName' => 'Lever Handle Lock LX - 7X .KNU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 7X .KNU11S',
                'ItemNameJP' => 'レバーハンドル 錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '38',
                'ItemName' => 'Dead Lock HD-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa Dead Lock HD-5',
                'ItemNameJP' => '本締錠 HD-5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '39',
                'ItemName' => 'VNS-42',
                'ItemClassId' => '22',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VNS-42',
                'ItemNameJP' => 'VNS-42',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '40',
                'ItemName' => 'Installation',
                'ItemClassId' => '23',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '41',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '24',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '42',
                'ItemName' => 'YES',
                'ItemClassId' => '25',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Có',
                'ItemNameJP' => 'はい',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '43',
                'ItemName' => '100',
                'ItemClassId' => '26',
                'PricePatternKey' => null,
                'ItemNameVN' => '100',
                'ItemNameJP' => '100',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '44',
                'ItemName' => '200',
                'ItemClassId' => '26',
                'PricePatternKey' => null,
                'ItemNameVN' => '200',
                'ItemNameJP' => '200',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '45',
                'ItemName' => '300',
                'ItemClassId' => '26',
                'PricePatternKey' => null,
                'ItemNameVN' => '300',
                'ItemNameJP' => '300',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '46',
                'ItemName' => 'Fire Rated',
                'ItemClassId' => '27',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chống cháy',
                'ItemNameJP' => '防火',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '47',
                'ItemName' => 'Under Frame Type N',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: Bình thường',
                'ItemNameJP' => '沓摺:normal',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '48',
                'ItemName' => 'Under Frame Type AT',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: AT',
                'ItemNameJP' => '沓摺:AT',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '49',
                'ItemName' => 'Under Frame Type SAT',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: SAT',
                'ItemNameJP' => '沓摺:SAT',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '50',
                'ItemName' => 'Steel Window',
                'ItemClassId' => '30',
                'PricePatternKey' => '5',
                'ItemNameVN' => 'Cửa sổ thép',
                'ItemNameJP' => 'スチール窓',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '51',
                'ItemName' => 'Frost Glass 4mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính mờ 4mm',
                'ItemNameJP' => 'スモクガラス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '52',
                'ItemName' => 'Clear Glass 5mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính trong 5mm',
                'ItemNameJP' => 'クリアガラス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '53',
                'ItemName' => 'Wired Glass 6,8mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính chống cháy 6.8mm',
                'ItemNameJP' => '防火ガラス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '54',
                'ItemName' => 'Tempered Glass 8mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính cường lực 8mm',
                'ItemNameJP' => 'テンブルガラス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '55',
                'ItemName' => 'Steel Louver',
                'ItemClassId' => '32',
                'PricePatternKey' => '6',
                'ItemNameVN' => 'Lam thép',
                'ItemNameJP' => 'スチール　ルーバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '56',
                'ItemName' => 'Insect net',
                'ItemClassId' => '33',
                'PricePatternKey' => '13',
                'ItemNameVN' => 'Lưới côn trùng',
                'ItemNameJP' => 'インセクトネット',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '57',
                'ItemName' => 'Glasswool Fitting  80Kg/M3',
                'ItemClassId' => '34',
                'PricePatternKey' => '12',
                'ItemNameVN' => 'Bông thủy tinh 80Kg/M3',
                'ItemNameJP' => 'グラスウールフィッティング80Kg/M3',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '58',
                'ItemName' => 'Rail Cover',
                'ItemClassId' => '35',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ốp ray',
                'ItemNameJP' => 'レールカーバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '59',
                'ItemName' => 'Order Color',
                'ItemClassId' => '36',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Màu cửa',
                'ItemNameJP' => 'カラ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '60',
                'ItemName' => 'MK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'MK',
                'ItemNameJP' => 'MK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '61',
                'ItemName' => 'GMK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GMK',
                'ItemNameJP' => 'GMK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '62',
                'ItemName' => 'MK+CNK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'MK+CNK',
                'ItemNameJP' => 'MK+CNK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '63',
                'ItemName' => 'GMK+CNK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GMK+CNK',
                'ItemNameJP' => 'GMK+CNK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '64',
                'ItemName' => 'Single Swing (BX-SD-5)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đơn (BX-SD-5)',
                'ItemNameJP' => '丁番 (BX-SD-5)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '65',
                'ItemName' => 'Double Swing (BX-SD-5)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đôi (BX-SD-5)',
                'ItemNameJP' => '丁番(BX-SD-5)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '66',
                'ItemName' => 'Single Swing (SD-639B)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đơn (SD-639B)',
                'ItemNameJP' => '丁番(SD-639B)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '67',
                'ItemName' => 'Double Swing (SD-639B)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đôi (SD-639B)',
                'ItemNameJP' => '丁番(SD-639B)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '68',
                'ItemName' => 'Single Swing (SD-751)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đơn (SD-751)',
                'ItemNameJP' => '丁番(SD-751)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '69',
                'ItemName' => 'Double Swing (SD-751)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa đôi (SD-751)',
                'ItemNameJP' => '丁番(SD-751)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '70',
                'ItemName' => 'Push-Pull Handle(GMT-G923PS)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Tay Nắm-Đẩy (GMT-G923PS)',
                'ItemNameJP' => 'プッシュプルハンドル',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '71',
                'ItemName' => 'Door Handle(BU-01-001)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Tay Nắm cửa (BU-01-001)',
                'ItemNameJP' => 'ドアハンドル',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '72',
                'ItemName' => 'Push-Pull Hamdle(Shibutani- ST103TW)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Tay Nắm-Đẩy(Shibutani- ST103TW)',
                'ItemNameJP' => 'プッシュプルハンドル',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '73',
                'ItemName' => 'VANI 324',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 324',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '74',
                'ItemName' => 'VANI 324S',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 324S',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '75',
                'ItemName' => 'Electric conductor(Piping in a door)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây dẫn điện (Đường ống bên trong cửa)',
                'ItemNameJP' => '扉内配管',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '76',
                'ItemName' => 'Door coordinators(SF-250F)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh đóng cửa tuần tự (SF-250F)',
                'ItemNameJP' => '順位調整器(SF-250F)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '77',
                'ItemName' => 'Shutter, Steel 0.8t (Economy)',
                'ItemClassId' => '42',
                'PricePatternKey' => '65',
                'ItemNameVN' => 'Cửa cuốn thép 0.8t (economy)',
                'ItemNameJP' => 'スチールシャッター0,8t (エコノミ)',
                'FactoryCode' => '21',
            ],

            [
                'ItemId' => '78',
                'ItemName' => 'Shutter, Steel 0.8t (Internal Use)',
                'ItemClassId' => '42',
                'PricePatternKey' => '66',
                'ItemNameVN' => 'Cửa cuốn thép 0.8t  (trong nhà)',
                'ItemNameJP' => 'シャッター0.8t (内部用)',
                'FactoryCode' => '01',
            ],

            [
                'ItemId' => '79',
                'ItemName' => 'Motor EGR30X',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR30X',
                'ItemNameJP' => '開閉機egr30x',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '80',
                'ItemName' => 'Motor EGR50X',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR50X',
                'ItemNameJP' => '開閉機egr50x',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '81',
                'ItemName' => 'Motor EGR70X',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR70X',
                'ItemNameJP' => '開閉機egr70x',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '82',
                'ItemName' => 'SS Order Color',
                'ItemClassId' => '49',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Màu cửa cuốn',
                'ItemNameJP' => 'スチールシャッターのカラ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '83',
                'ItemName' => 'Automatic Closing Device',
                'ItemClassId' => '52',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị đóng tự động',
                'ItemNameJP' => '自動閉鎖設備',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '84',
                'ItemName' => 'Installation 0.8',
                'ItemClassId' => '53',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt cửa thép 0.8',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '85',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '54',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '86',
                'ItemName' => 'Installation 1.2',
                'ItemClassId' => '53',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt cửa thép 1.2',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '87',
                'ItemName' => 'PBS',
                'ItemClassId' => '44',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Hộp công tắc ',
                'ItemNameJP' => '押しボタン',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '88',
                'ItemName' => 'Case 550mm',
                'ItemClassId' => '45',
                'PricePatternKey' => '7',
                'ItemNameVN' => 'Hộp cửa thép 550mm',
                'ItemNameJP' => 'ブクス550mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '89',
                'ItemName' => 'Case 610mm',
                'ItemClassId' => '45',
                'PricePatternKey' => '8',
                'ItemNameVN' => 'Hộp cửa thép 610mm',
                'ItemNameJP' => 'ブクス610mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '90',
                'ItemName' => 'Wind Proof',
                'ItemClassId' => '46',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray chống bão',
                'ItemNameJP' => '対風型レール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '91',
                'ItemName' => '200',
                'ItemClassId' => '48',
                'PricePatternKey' => null,
                'ItemNameVN' => '200',
                'ItemNameJP' => '200',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '92',
                'ItemName' => 'SUS Recessed Rail',
                'ItemClassId' => '50',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray inox âm',
                'ItemNameJP' => '標準埋込型ステンレスレール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '93',
                'ItemName' => 'SUS Bottom Bar 0.8t',
                'ItemClassId' => '51',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh chặn dưới inox 0.8t',
                'ItemNameJP' => 'ステレス　ボトム 0.8t',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '94',
                'ItemName' => 'Bottom Rubber',
                'ItemClassId' => '55',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh đáy cao su',
                'ItemNameJP' => 'ボトムゴム',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '98',
                'ItemName' => 'M2',
                'ItemClassId' => '59',
                'PricePatternKey' => '12',
                'ItemNameVN' => 'M2',
                'ItemNameJP' => 'M2',
                'FactoryCode' => '04',
            ],

            [
                'ItemId' => '100',
                'ItemName' => 'OA203C',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'OA203C',
                'ItemNameJP' => 'インテリジェント203',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '101',
                'ItemName' => 'OA4700S',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'OA4700S',
                'ItemNameJP' => 'インテリジェント4700',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '102',
                'ItemName' => 'OA6000S',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'OA6000S',
                'ItemNameJP' => 'インテリジェント6000',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '103',
                'ItemName' => 'Pull Switch',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Công tắc dây kéo',
                'ItemNameJP' => 'プル　スイッチ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '104',
                'ItemName' => 'Push Switch (3P)',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Công tắc ấn (3 nút)',
                'ItemNameJP' => '３点　押しボタン',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '105',
                'ItemName' => 'Falcon',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cảm ứng rada FALCON',
                'ItemNameJP' => 'ファルコン',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '106',
                'ItemName' => 'Vision Panel Square',
                'ItemClassId' => '62',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa lấy sáng: Loại ô vuông',
                'ItemNameJP' => '明かり窓／角窓',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '107',
                'ItemName' => 'Vision Panel Wide',
                'ItemClassId' => '62',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Cửa lấy sáng: Loại rộng',
                'ItemNameJP' => '明かり窓／ワイド窓',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '108',
                'ItemName' => 'SUS Rail Cover',
                'ItemClassId' => '63',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Hộp ray I-nox',
                'ItemNameJP' => 'ステレス　レールカバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '109',
                'ItemName' => '200',
                'ItemClassId' => '64',
                'PricePatternKey' => null,
                'ItemNameVN' => '200',
                'ItemNameJP' => '200',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '110',
                'ItemName' => '1φ220VAC-1φ100VAC',
                'ItemClassId' => '65',
                'PricePatternKey' => null,
                'ItemNameVN' => '1 pha 220VAC - 1 pha 100VAC',
                'ItemNameJP' => '単相　1¢220V AC,100V AC',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '111',
                'ItemName' => 'Installation',
                'ItemClassId' => '66',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '112',
                'ItemName' => 'Installation',
                'ItemClassId' => '68',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '113',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '67',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '114',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '69',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '115',
                'ItemName' => 'Clemon Bolt Single V55G-H83 2300≦Ｈ',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chốt cửa đơn Clemon V55G-H83 H≤2300',
                'ItemNameJP' => 'シングルフランス落しClemom V55G-H83 H≤2300',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '116',
                'ItemName' => 'Clemon Bolt Single V55G-H83 2300＜H≦3000',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chốt cửa đơn Clemon V55G-H83 2300<H≤3000',
                'ItemNameJP' => 'シングルフランス落しClemom V55G-H83 2300<H≤3000',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '117',
                'ItemName' => 'Glass Sealing',
                'ItemClassId' => '70',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Silicon',
                'ItemNameJP' => 'ガラス　シラント',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '118',
                'ItemName' => 'Fire Rated Swing Door (SGL), ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '55',
                'ItemNameVN' => 'Cửa chống cháy đơn (ST)',
                'ItemNameJP' => '防火ドアシングル (ST)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '119',
                'ItemName' => 'Fire Rated Swing Door (DBL), ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '56',
                'ItemNameVN' => 'Cửa chống cháy đôi (ST)',
                'ItemNameJP' => '防火ドア　ダブル (ST)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '120',
                'ItemName' => 'Sliding Door (SGL), CS',
                'ItemClassId' => '16',
                'PricePatternKey' => '33',
                'ItemNameVN' => 'Cửa trượt Calm đơn',
                'ItemNameJP' => 'カーム　スライダ　シングル',
                'FactoryCode' => '72',
            ],

            [
                'ItemId' => '121',
                'ItemName' => 'Sliding Door (DBL), CS',
                'ItemClassId' => '16',
                'PricePatternKey' => '34',
                'ItemNameVN' => 'Cửa trượt Calm đôi',
                'ItemNameJP' => 'カーム　スライダ　ダブル',
                'FactoryCode' => '72',
            ],

            [
                'ItemId' => '122',
                'ItemName' => 'Hanger (Sliding) Door (SGL), #3',
                'ItemClassId' => '16',
                'PricePatternKey' => '35',
                'ItemNameVN' => 'Cửa trượt Hanger đơn (#3)',
                'ItemNameJP' => 'ハンガーシングル（#3)',
                'FactoryCode' => '08',
            ],

            [
                'ItemId' => '123',
                'ItemName' => 'Hanger (Sliding) Door (DBL), #3',
                'ItemClassId' => '16',
                'PricePatternKey' => '36',
                'ItemNameVN' => 'Cửa trượt Hanger đôi (#3)',
                'ItemNameJP' => 'ハンガーダブル　(#3)',
                'FactoryCode' => '08',
            ],

            [
                'ItemId' => '124',
                'ItemName' => 'Hanger (Sliding) Door (SGL), #4',
                'ItemClassId' => '16',
                'PricePatternKey' => '37',
                'ItemNameVN' => 'Cửa trượt Hanger đơn (#4)',
                'ItemNameJP' => 'ハンガーシングル（#4)',
                'FactoryCode' => '08',
            ],

            [
                'ItemId' => '125',
                'ItemName' => 'Hanger (Sliding) Door (DBL), #4',
                'ItemClassId' => '16',
                'PricePatternKey' => '38',
                'ItemNameVN' => 'Cửa trượt Hanger đôi (#4)',
                'ItemNameJP' => 'ハンガーダブル　(#4)',
                'FactoryCode' => '08',
            ],

            [
                'ItemId' => '126',
                'ItemName' => 'Louver, Fixed, Steel',
                'ItemClassId' => '16',
                'PricePatternKey' => '54',
                'ItemNameVN' => 'Khung cửa sổ thép',
                'ItemNameJP' => 'スチール窓　枠',
                'FactoryCode' => '10',
            ],

            [
                'ItemId' => '127',
                'ItemName' => 'Louver, Steel',
                'ItemClassId' => '16',
                'PricePatternKey' => '53',
                'ItemNameVN' => 'Khung lam thép',
                'ItemNameJP' => 'スチール　ルーバ　枠',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '128',
                'ItemName' => 'Swing Frame Door (SGL), ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '61',
                'ItemNameVN' => 'Khung cửa thép đơn (ST)',
                'ItemNameJP' => 'スチールドア　枠　片開 (ST)',
                'FactoryCode' => '09',
            ],

            [
                'ItemId' => '129',
                'ItemName' => 'Clemon Bolt Double V55GG-H83 2300≦Ｈ',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chốt cửa đôi Clemon V55GG-H83 H≤2300',
                'ItemNameJP' => 'ダブルフランス落しClemom V55G-H83 H≤2300',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '130',
                'ItemName' => 'Clemon Bolt Double V55GG-H83 2300＜Ｈ≦3000',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chốt cửa đôi Clemon V55GG-H83 2300<H≤3000',
                'ItemNameJP' => 'ダブルフランス落しClemom V55G-H83 2300<H≤3000',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '131',
                'ItemName' => 'Single Swing Panic Handle (Neo 500S)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đơn (NEO 500S)',
                'ItemNameJP' => 'パニックハンドル (NEO 500S)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '132',
                'ItemName' => 'VANI 3525',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 3525',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '133',
                'ItemName' => 'VANI 3525S',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 3525S',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '134',
                'ItemName' => 'Auto Hinge(244T)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động (244T)',
                'ItemNameJP' => 'オート丁番',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '135',
                'ItemName' => 'Auto Hinge AFD-12HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-12HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-12HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '136',
                'ItemName' => 'Folding door hinge+Door catch(N2B18+N-51C)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề xếp + Chốt cửa (N2B18+N-51C)',
                'ItemNameJP' => '折りたたみドアヒンジ+ドアキャッチ(N2B18+N-51C)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '137',
                'ItemName' => 'Under Sliding Guide Rail',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh ray dẫn hướng',
                'ItemNameJP' => 'ガイドレール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '138',
                'ItemName' => 'VB-1232',
                'ItemClassId' => '22',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VB-1233',
                'ItemNameJP' => 'VB-1232',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '139',
                'ItemName' => 'sealing',
                'ItemClassId' => '72',
                'PricePatternKey' => null,
                'ItemNameVN' => 'silicon',
                'ItemNameJP' => 'シラント',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '140',
                'ItemName' => 'SUS Case',
                'ItemClassId' => '73',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Hộp I-nox',
                'ItemNameJP' => 'ステンレスボックス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '141',
                'ItemName' => 'SUS Kick-Plate',
                'ItemClassId' => '75',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Tấm bảo vệ I-nox',
                'ItemNameJP' => 'ステンレス　プレット',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '142',
                'ItemName' => '200',
                'ItemClassId' => '74',
                'PricePatternKey' => null,
                'ItemNameVN' => '200',
                'ItemNameJP' => '200',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '143',
                'ItemName' => 'Case Handle Lock ASC-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa ASC-5',
                'ItemNameJP' => 'ロックAsc5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '144',
                'ItemName' => 'Wire stopper (SO-140)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây chặn cửa (SO-140)',
                'ItemNameJP' => 'ワイヤーストパー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '145',
                'ItemName' => 'Sliding Door Lock SX-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa trượt SX-5',
                'ItemNameJP' => 'スライディング　ドアロック',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '146',
                'ItemName' => 'Electromagnetic release(N-78B)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị ngắt điện (N-78B)',
                'ItemNameJP' => '電磁リリース',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '147',
                'ItemName' => 'Wire Glass 6.8mm+Cross Grid',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính chống cháy 6.8mm + Lưới chữ thập',
                'ItemNameJP' => '防火ガラス　十字アミ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '148',
                'ItemName' => 'Under Frame Type N (Special)',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: N(Đặc biệt)',
                'ItemNameJP' => '沓擅　タイプN',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '149',
                'ItemName' => 'Under Frame Type SAT(Special)',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: SAT (Đặc biệt)',
                'ItemNameJP' => '沓擅　タイプ SAT',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '150',
                'ItemName' => 'Auto Door Bottom(DB-410) ≦ 1m',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh cao su kín khí tự động (DB-410) ≦ 1m',
                'ItemNameJP' => 'オートドア　ボトム ≦ 1m',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '151',
                'ItemName' => 'Sliding Door Lock ADP-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa trượt ADP-5',
                'ItemNameJP' => 'スライディング　ドアロックADP5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '152',
                'ItemName' => 'Under Frame Type AT(Special)',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: AT (Đặc biệt)',
                'ItemNameJP' => '沓擅　タイプ AT',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '153',
                'ItemName' => 'Auxiliary function box',
                'ItemClassId' => '76',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Hộp chức năng phụ trợ',
                'ItemNameJP' => '補助関数ボックス',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '154',
                'ItemName' => 'Rotating beacon(RKB-220)',
                'ItemClassId' => '77',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đèn soi (RKB-220)',
                'ItemNameJP' => '回転ビーコン(RKB-220)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '155',
                'ItemName' => 'VANI 3536',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 3536',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '156',
                'ItemName' => 'VANI 3536S',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 3536S',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '157',
                'ItemName' => 'Sensor OA-203C',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị cảm biến OA-203C',
                'ItemNameJP' => 'インテリジェント　203',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '158',
                'ItemName' => 'Touch switch OW-502',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị cảm ứng OW-502',
                'ItemNameJP' => 'タッチスイッチOW-502',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '159',
                'ItemName' => 'OS-15/20',
                'ItemClassId' => '78',
                'PricePatternKey' => null,
                'ItemNameVN' => 'OS-15/20',
                'ItemNameJP' => 'OS-15/20',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '160',
                'ItemName' => 'BSS-1',
                'ItemClassId' => '78',
                'PricePatternKey' => null,
                'ItemNameVN' => 'BSS-1',
                'ItemNameJP' => '光電 bss1',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '161',
                'ItemName' => 'Clear Glass 6mm+Shatterproof Film',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính trong 6mm + Dán phim',
                'ItemNameJP' => 'クリアガラス 6mm +フィルム',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '162',
                'ItemName' => 'Mahair Brush',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chổi chắn côn trùng',
                'ItemNameJP' => 'モヘアブラシ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '163',
                'ItemName' => 'NEW STAR P-182',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'NEW STAR P-182',
                'ItemNameJP' => 'ドアクローザー',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '164',
                'ItemName' => 'Clear Glass 5mm+Smoke Film',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Kính trong 5mm + Dán phim khói',
                'ItemNameJP' => 'クリアガラス 5mm +フィルム',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '167',
                'ItemName' => 'Mortise Lever Handle Lock HLT-5NU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thân khóa tay gạt HLT-5NU11S',
                'ItemNameJP' => 'バックセットレバーハンドルHLT-5NU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '168',
                'ItemName' => 'VANI 653 (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'VANI 653 (Bản kề sàn)',
                'ItemNameJP' => 'VANI 653 （フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '169',
                'ItemName' => '400',
                'ItemClassId' => '26',
                'PricePatternKey' => null,
                'ItemNameVN' => '400',
                'ItemNameJP' => '400',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '175',
                'ItemName' => 'Motor EGL120G',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGL120G',
                'ItemNameJP' => '開閉機EGL 120G',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '177',
                'ItemName' => 'Aluminum Window',
                'ItemClassId' => '30',
                'PricePatternKey' => '17',
                'ItemNameVN' => 'Cửa sổ nhôm',
                'ItemNameJP' => 'アルミ窓',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '178',
                'ItemName' => 'Aluminum Louver',
                'ItemClassId' => '32',
                'PricePatternKey' => '6',
                'ItemNameVN' => 'Lam nhôm',
                'ItemNameJP' => 'アルミ　ルーバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '181',
                'ItemName' => '400',
                'ItemClassId' => '74',
                'PricePatternKey' => null,
                'ItemNameVN' => '400',
                'ItemNameJP' => '400',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '182',
                'ItemName' => '300',
                'ItemClassId' => '64',
                'PricePatternKey' => null,
                'ItemNameVN' => '300',
                'ItemNameJP' => '300',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '183',
                'ItemName' => '400',
                'ItemClassId' => '64',
                'PricePatternKey' => null,
                'ItemNameVN' => '400',
                'ItemNameJP' => '400',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '184',
                'ItemName' => '3φ380VAC-3φ200VAC',
                'ItemClassId' => '65',
                'PricePatternKey' => null,
                'ItemNameVN' => '3 pha 380VAC - 3 pha 200VAC',
                'ItemNameJP' => '3ﾏ・380VAC-3ﾏ・200VAC',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '185',
                'ItemName' => 'Push Switch (1P)',
                'ItemClassId' => '61',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Công tắc ấn (1 nút)',
                'ItemNameJP' => '一点押しボタン',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '186',
                'ItemName' => 'Pull Switch Frame',
                'ItemClassId' => '76',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung trợ lực của dây kéo',
                'ItemNameJP' => 'プレスイッチ　プレム',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '187',
                'ItemName' => 'Falcom Sencer Remote Control',
                'ItemClassId' => '76',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Điều khiển  cảm ứng rada',
                'ItemNameJP' => 'falcon リモコン　コントロール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '188',
                'ItemName' => '300',
                'ItemClassId' => '48',
                'PricePatternKey' => null,
                'ItemNameVN' => '300',
                'ItemNameJP' => '300',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '189',
                'ItemName' => '400',
                'ItemClassId' => '48',
                'PricePatternKey' => null,
                'ItemNameVN' => '400',
                'ItemNameJP' => '400',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '190',
                'ItemName' => 'DIAMOND DT-21N (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'DIAMOND DT-21N (Bản lề sàn)',
                'ItemNameJP' => 'ダイアモンド DT-21N（フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '191',
                'ItemName' => 'DIAMOND DT-22N (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'DIAMOND DT-22N (Bản lề sàn)',
                'ItemNameJP' => 'ダイアモンド DT-22N（フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '192',
                'ItemName' => 'Slide Closer (NSC-C)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt bán tự động (NSC-C)',
                'ItemNameJP' => 'スライド　クローザー(NSC-C)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '193',
                'ItemName' => 'Slide Closer (NSC-C2525-49)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt bán tự động (NSC-C2525-49)',
                'ItemNameJP' => 'スライド　クローザーNSC-C2525-49)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '194',
                'ItemName' => 'Single Slide Door Operator',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt tự động cho cửa đơn',
                'ItemNameJP' => 'シングルスライドドアオペレーター',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '195',
                'ItemName' => 'Double Slide Door Operator',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt tự động cho cửa đôi',
                'ItemNameJP' => 'ダブルスライドドアオペレーター',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '196',
                'ItemName' => 'Auto Hinge AFD-22HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-22HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-22HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '197',
                'ItemName' => 'Electric Lever Handle Lock EUR-5NU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa điện tay gạt EUR-5NU11S',
                'ItemNameJP' => '電気レバーハンドル　ロック',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '198',
                'ItemName' => 'Electric Sliding Door Lock SKE-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa điện cho cửa trượt SKE-5',
                'ItemNameJP' => '電気スライディング　ドアロックske?5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '199',
                'ItemName' => 'Pull Bar+Rim Cilynder (Panic Bar Type)',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Pull Bar+Rim Cilynder (Loại Thanh thoát hiểm)',
                'ItemNameJP' => 'プルバー+リムシリンダー（パニックバータイプ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '200',
                'ItemName' => 'Double Swing Panic Handle (Neo 500P-P)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đôi (NEO 500P-P)',
                'ItemNameJP' => 'ダブルスイングパニックハンドル（NEO500P-P）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '201',
                'ItemName' => 'Double Swing Panic Handle (Neo 500S-S)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đôi (NEO 500S-S)',
                'ItemNameJP' => 'ダブルスイングパニックハンドル（NEO500P-S）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '202',
                'ItemName' => 'Case Handle (SO-111-3)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Case Handle (SO-111-3)',
                'ItemNameJP' => 'ケースハンドル（SO-111-3）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '203',
                'ItemName' => 'Dummy Lever Handle (LX-NU)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Tay nắm gạt (LX-NU)',
                'ItemNameJP' => 'ダミーレバーハンドル（LX-NU）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '204',
                'ItemName' => 'Digging Handle (SD246)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Digging Handle (SD246)',
                'ItemNameJP' => '堀込ハンドル（SD246）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '205',
                'ItemName' => 'Lever Handle Lock LX - 1X .KDU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 1X .KDU11S',
                'ItemNameJP' => 'レバーハンドル LX - 1X .KDU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '206',
                'ItemName' => 'Lever Handle Lock LX - 3X .KDU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 3X .KDU11S',
                'ItemNameJP' => 'レバーハンドル LX - 3X .KDU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '207',
                'ItemName' => 'Lever Handle Lock LX - 5X .KDU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 5X .KDU11S',
                'ItemNameJP' => 'レバーハンドル LX - 5X .KDU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '208',
                'ItemName' => 'Lever Handle Lock LX - 6X .KDU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 6X .KDU11S',
                'ItemNameJP' => 'レバーハンドル LX - 6X .KDU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '209',
                'ItemName' => 'Lever Handle Lock LX - 7X .KDU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 7X .KDU11S',
                'ItemNameJP' => 'レバーハンドル LX - 7X .KDU11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '210',
                'ItemName' => 'BEAD',
                'ItemClassId' => '84',
                'PricePatternKey' => '18',
                'ItemNameVN' => 'BEAD',
                'ItemNameJP' => 'BEAD',
                'FactoryCode' => '13',
            ],

            [
                'ItemId' => '211',
                'ItemName' => 'Installation',
                'ItemClassId' => '85',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '212',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '86',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '213',
                'ItemName' => 'Motor EGR30XG',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR30XG',
                'ItemNameJP' => '開閉機egr30xg',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '214',
                'ItemName' => 'Motor EGR30XTG',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR30XTG',
                'ItemNameJP' => '開閉機egr30xtg',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '215',
                'ItemName' => 'Motor EGR50XG',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR50XG',
                'ItemNameJP' => '開閉機egr50xg',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '216',
                'ItemName' => 'Motor EGR50XTG',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR50XTG',
                'ItemNameJP' => '開閉機egr50xtg',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '217',
                'ItemName' => 'Motor EGR70XG',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGR70XG',
                'ItemNameJP' => '開閉機egr70xg',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '218',
                'ItemName' => 'Motor EGL-120G',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ EGL-120G',
                'ItemNameJP' => '開閉機egl-120g',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '219',
                'ItemName' => 'Motor YH-A-235',
                'ItemClassId' => '43',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Động cơ YH-A-235',
                'ItemNameJP' => '開閉機yh-a-235',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '220',
                'ItemName' => 'D310',
                'ItemClassId' => '87',
                'PricePatternKey' => '19',
                'ItemNameVN' => 'D310',
                'ItemNameJP' => 'D310',
                'FactoryCode' => '14',
            ],

            [
                'ItemId' => '221',
                'ItemName' => 'Single Swing Door, Steel, Wooden Print, Japan',
                'ItemClassId' => '16',
                'PricePatternKey' => '41',
                'ItemNameVN' => 'Cửa căn hộ dán vân gỗ - thép Nhật - 1 cánh',
                'ItemNameJP' => '日本製木目マンションドア-片開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '222',
                'ItemName' => 'Double Swing Door, Steel, Wooden Print, Japan',
                'ItemClassId' => '16',
                'PricePatternKey' => '42',
                'ItemNameVN' => 'Cửa căn hộ dán vân gỗ - thép Nhật - 2 cánh',
                'ItemNameJP' => '日本製木目マンションドア-両開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '224',
                'ItemName' => 'FLATPIT(blue)',
                'ItemClassId' => '90',
                'PricePatternKey' => '21',
                'ItemNameVN' => 'Flatpit ( Màu xanh )',
                'ItemNameJP' => 'フラットピット(アルミ電解着色)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '225',
                'ItemName' => 'FLATPIT(wooden)',
                'ItemClassId' => '90',
                'PricePatternKey' => '22',
                'ItemNameVN' => 'Flatpit ( Gỗ)',
                'ItemNameJP' => 'フラットピット(木目塗装)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '226',
                'ItemName' => 'PANEL-M(blue)',
                'ItemClassId' => '90',
                'PricePatternKey' => '23',
                'ItemNameVN' => 'Panel - M ( Màu xanh )',
                'ItemNameJP' => 'パネル-M(アルミ電解着色)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '227',
                'ItemName' => 'PANEL-M(wooden)',
                'ItemClassId' => '90',
                'PricePatternKey' => '24',
                'ItemNameVN' => 'Panel - M ( Gỗ )',
                'ItemNameJP' => 'パネル-M(木目塗装)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '228',
                'ItemName' => 'Installation',
                'ItemClassId' => '88',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '229',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '89',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '231',
                'ItemName' => 'Steel Door Lourver',
                'ItemClassId' => '92',
                'PricePatternKey' => '25',
                'ItemNameVN' => 'Cửa lam thép',
                'ItemNameJP' => 'スチール　ルーバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '232',
                'ItemName' => 'Aluminum Door Lourver',
                'ItemClassId' => '92',
                'PricePatternKey' => '25',
                'ItemNameVN' => 'Cửa lam nhôm',
                'ItemNameJP' => 'アルミ　ルーバ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '233',
                'ItemName' => 'Installation',
                'ItemClassId' => '93',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Lắp đặt',
                'ItemNameJP' => '取付',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '234',
                'ItemName' => 'Inland Freight',
                'ItemClassId' => '94',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Vận chuyển nội địa',
                'ItemNameJP' => '運送',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '235',
                'ItemName' => 'Automatic Closing Device EM-40E',
                'ItemClassId' => '52',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị đóng tự động EM-40E',
                'ItemNameJP' => '自動閉鎖設備 EM-40E',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '236',
                'ItemName' => 'Automatic Closing Device EM-60E',
                'ItemClassId' => '52',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị đóng tự động EM-60E',
                'ItemNameJP' => '自動閉鎖設備 EM-60E',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '237',
                'ItemName' => 'Case 675mm',
                'ItemClassId' => '45',
                'PricePatternKey' => '9',
                'ItemNameVN' => 'Hộp cửa thép 675mm',
                'ItemNameJP' => 'ブクス675mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '238',
                'ItemName' => 'Case 735mm',
                'ItemClassId' => '45',
                'PricePatternKey' => '10',
                'ItemNameVN' => 'Hộp cửa thép 735mm',
                'ItemNameJP' => 'ブクス735mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '239',
                'ItemName' => 'Shutter, Steel 0.8t (Roll Inward)',
                'ItemClassId' => '42',
                'PricePatternKey' => '67',
                'ItemNameVN' => 'Cửa cuốn thép 0.8t (ngoài nhà - cuộn trong)',
                'ItemNameJP' => 'シャッター0.8t (外部用―内巻)',
                'FactoryCode' => '01',
            ],

            [
                'ItemId' => '240',
                'ItemName' => 'Shutter, Steel 0.8t (Roll Outward)',
                'ItemClassId' => '42',
                'PricePatternKey' => '68',
                'ItemNameVN' => 'Cửa cuốn thép 0.8t (ngoài nhà - cuộn ngoài)',
                'ItemNameJP' => 'シャッター0.8t (外部用―外巻)',
                'FactoryCode' => '01',
            ],

            [
                'ItemId' => '241',
                'ItemName' => 'Shutter, Steel 1.2t (Internal Use)',
                'ItemClassId' => '42',
                'PricePatternKey' => '69',
                'ItemNameVN' => 'Cửa cuốn thép 1.2t  (trong nhà)',
                'ItemNameJP' => 'シャッター1.2t (内部用)',
                'FactoryCode' => '02',
            ],

            [
                'ItemId' => '242',
                'ItemName' => 'Shutter, Steel 1.2t (Outer Use)',
                'ItemClassId' => '42',
                'PricePatternKey' => '70',
                'ItemNameVN' => 'Cửa cuốn thép 1.2t  (ngoài nhà)',
                'ItemNameJP' => 'シャッター1.2t (外部用)',
                'FactoryCode' => '02',
            ],

            [
                'ItemId' => '243',
                'ItemName' => 'Shutter, Steel 1.2t (Wind Resistant)',
                'ItemClassId' => '42',
                'PricePatternKey' => '71',
                'ItemNameVN' => 'Cửa cuốn thép 1.2t  (chống gió)',
                'ItemNameJP' => 'シャッター1.2t (耐風用)',
                'FactoryCode' => '02',
            ],

            [
                'ItemId' => '244',
                'ItemName' => 'Grille Shutter (16Φ）',
                'ItemClassId' => '42',
                'PricePatternKey' => '72',
                'ItemNameVN' => 'Cửa cuốn ống (G-16)',
                'ItemNameJP' => 'グリルシャッター (G-16)',
                'FactoryCode' => '22',
            ],

            [
                'ItemId' => '245',
                'ItemName' => 'Swing Door (SGL), Light Steel, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '3',
                'ItemNameVN' => 'Cửa thép đơn (Loại nhẹ) (SAT)',
                'ItemNameJP' => '化粧スチールドア　シングル　スイング (SAT) ',
                'FactoryCode' => '07',
            ],

            [
                'ItemId' => '246',
                'ItemName' => 'Swing Door (DBL), Light Steel, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '4',
                'ItemNameVN' => 'Cửa thép đôi (Loại nhẹ) (SAT)',
                'ItemNameJP' => '化粧スチールドア　ダブル　スイング (SAT)  ',
                'FactoryCode' => '07',
            ],

            [
                'ItemId' => '247',
                'ItemName' => 'Swing Door (SGL), Steel, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '29',
                'ItemNameVN' => 'Cửa thép đơn (Loại nặng) (SAT)',
                'ItemNameJP' => 'スチールドア　シングル　スイング (SAT)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '248',
                'ItemName' => 'Swing Door (DBL), Steel, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '30',
                'ItemNameVN' => 'Cửa thép đôi (Loại nặng) (SAT)',
                'ItemNameJP' => 'スチールドア　ダブル　スイング (SAT)  ',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '249',
                'ItemName' => 'Swing Door (SGL), Steel, PAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '31',
                'ItemNameVN' => 'Cửa thép đơn (Loại nặng) (PAT)',
                'ItemNameJP' => 'スチールドア　シングル　スイング (PAT)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '250',
                'ItemName' => 'Swing Door (DBL), Steel, PAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '32',
                'ItemNameVN' => 'Cửa thép đôi (Loại nặng) (PAT)',
                'ItemNameJP' => 'スチールドア　ダブル　スイング (PAT)  ',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '251',
                'ItemName' => 'Fire Rated Swing Door (SGL), Steel, Automatic',
                'ItemClassId' => '16',
                'PricePatternKey' => '39',
                'ItemNameVN' => 'Cửa luôn mở đơn',
                'ItemNameJP' => '常開・フロアヒンジ用-片開',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '252',
                'ItemName' => 'Fire Rated Swing Door (DBL), Steel, Automatic',
                'ItemClassId' => '16',
                'PricePatternKey' => '40',
                'ItemNameVN' => 'Cửa luôn mở đôi',
                'ItemNameJP' => '常開・フロアヒンジ用-両開',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '253',
                'ItemName' => 'Single Swing Residence Entrance Door, Steel, Wooden Print, Japan',
                'ItemClassId' => '16',
                'PricePatternKey' => '43',
                'ItemNameVN' => 'Cửa đi dán vân gỗ- thép nhật - 1 cánh',
                'ItemNameJP' => '日本製木目ドア-片開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '254',
                'ItemName' => 'Double Swing Residence Entrance Door, Steel, Wooden Print, Japan',
                'ItemClassId' => '16',
                'PricePatternKey' => '44',
                'ItemNameVN' => 'cửa đi dán vân gỗ -  thép nhật - 2 cánh',
                'ItemNameJP' => '日本製木目ドア-両開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '255',
                'ItemName' => 'Single Swing Door, Steel, Wooden Print, Korea',
                'ItemClassId' => '16',
                'PricePatternKey' => '45',
                'ItemNameVN' => 'Cửa căn hộ dán vân gỗ - thép Hàn quốc - 1 cánh',
                'ItemNameJP' => '韓国製木目マンションドア-片開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '256',
                'ItemName' => 'Double Swing Door, Steel, Wooden Print, Korea',
                'ItemClassId' => '16',
                'PricePatternKey' => '46',
                'ItemNameVN' => 'Cửa căn hộ dán vân gỗ- thép hàn quốc- 2 cánh',
                'ItemNameJP' => '韓国製木目マンションドア-両開 ',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '257',
                'ItemName' => 'Single Swing Residence Entrance Door, Steel, Wooden Print, Korea',
                'ItemClassId' => '16',
                'PricePatternKey' => '47',
                'ItemNameVN' => 'Cửa dán vân gỗ- thép hàn quốc - 1 cánh',
                'ItemNameJP' => '韓国製木目ドア-片開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '258',
                'ItemName' => 'Double Swing Residence Entrance Door, Steel, Wooden Print, Korea',
                'ItemClassId' => '16',
                'PricePatternKey' => '48',
                'ItemNameVN' => 'Cửa dán vân gỗ- thép hàn quốc- 2 cánh',
                'ItemNameJP' => '韓国製木目ドア-両開',
                'FactoryCode' => '27',
            ],

            [
                'ItemId' => '259',
                'ItemName' => 'Swing Door (SGL), Flush, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '49',
                'ItemNameVN' => 'Cửa Flash door - 1 cánh (ST)',
                'ItemNameJP' => '点検口ー片開 (ST)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '260',
                'ItemName' => 'Swing Door (DBL), Flush, ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '50',
                'ItemNameVN' => 'Cửa Flash door - 2 cánh (ST)',
                'ItemNameJP' => '点検口ー両開 (ST)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '261',
                'ItemName' => 'Swing Door (SGL), Flush, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '51',
                'ItemNameVN' => 'Cửa Flash door - 1 cánh (SAT)',
                'ItemNameJP' => '点検口ー片開 (SAT)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '262',
                'ItemName' => 'Swing Door (DBL), Flush, SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '52',
                'ItemNameVN' => 'Cửa Flash door - 2 cánh (SAT)',
                'ItemNameJP' => '点検口ー両開 (SAT)',
                'FactoryCode' => '05',
            ],

            [
                'ItemId' => '263',
                'ItemName' => 'Fire Rated Swing Door (SGL), SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '57',
                'ItemNameVN' => 'Cửa chống cháy đơn (SAT)',
                'ItemNameJP' => '防火ドアシングル (SAT)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '264',
                'ItemName' => 'Fire Rated Swing Door (DBL), SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '58',
                'ItemNameVN' => 'Cửa chống cháy đôi (SAT)',
                'ItemNameJP' => '防火ドア　ダブル (SAT)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '265',
                'ItemName' => 'Fire Rated Swing Door (SGL), PAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '59',
                'ItemNameVN' => 'Cửa chống cháy đơn (PAT)',
                'ItemNameJP' => '防火ドアシングル (PAT)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '266',
                'ItemName' => 'Fire Rated Swing Door (DBL), PAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '60',
                'ItemNameVN' => 'Cửa chống cháy đôi (PAT)',
                'ItemNameJP' => '防火ドア　ダブル (PAT)',
                'FactoryCode' => '06',
            ],

            [
                'ItemId' => '267',
                'ItemName' => 'Swing Frame Door (DBL), ST',
                'ItemClassId' => '16',
                'PricePatternKey' => '62',
                'ItemNameVN' => 'Khung cửa thép đôi (ST)',
                'ItemNameJP' => 'スチールドア　枠　両開 (ST)',
                'FactoryCode' => '09',
            ],

            [
                'ItemId' => '268',
                'ItemName' => 'Swing Frame Door (SGL), SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '63',
                'ItemNameVN' => 'Khung cửa thép đơn (SAT)',
                'ItemNameJP' => 'スチールドア　枠　片開 (SAT)',
                'FactoryCode' => '09',
            ],

            [
                'ItemId' => '269',
                'ItemName' => 'Swing Frame Door (DBL), SAT',
                'ItemClassId' => '16',
                'PricePatternKey' => '64',
                'ItemNameVN' => 'Khung cửa thép đôi (SAT)',
                'ItemNameJP' => 'スチールドア　枠　両開 (SAT)',
                'FactoryCode' => '09',
            ],

            [
                'ItemId' => '270',
                'ItemName' => 'Roller Chain #40用',
                'ItemClassId' => '95',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây xích truyền động #40用',
                'ItemNameJP' => 'ローラーチｴーン #40用',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '271',
                'ItemName' => 'Roller Chain #50用',
                'ItemClassId' => '95',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây xích truyền động #50用',
                'ItemNameJP' => 'ローラーチｴーン #50用',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '272',
                'ItemName' => 'Roller Chain #60用',
                'ItemClassId' => '95',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây xích truyền động #60用',
                'ItemNameJP' => 'ローラーチｴーン #60用',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '273',
                'ItemName' => 'Roller Chain #80用',
                'ItemClassId' => '95',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây xích truyền động #80用',
                'ItemNameJP' => 'ローラーチｴーン #80用',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '274',
                'ItemName' => 'Sprocket R-30 XF',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-30 XF',
                'ItemNameJP' => 'スプロケット梱包 R-30 XF',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '275',
                'ItemName' => 'Sprocket R-30X ABCDE',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-30X ABCDE',
                'ItemNameJP' => 'スプロケット梱包 R-30X ABCDE',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '276',
                'ItemName' => 'Sprocket R-50X DEFGH',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-50X DEFGH',
                'ItemNameJP' => 'スプロケット梱包 R-50X DEFGH',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '277',
                'ItemName' => 'Sprocket R-50X ABC',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-50X ABC',
                'ItemNameJP' => 'スプロケット梱包 R-50X ABC',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '278',
                'ItemName' => 'Sprocket R-70X ABCD',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-70X ABCD',
                'ItemNameJP' => 'スプロケット梱包 R-70X ABCD',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '279',
                'ItemName' => 'Sprocket R-70X EFG',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-70X EFG',
                'ItemNameJP' => 'スプロケット梱包 R-70X EFG',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '280',
                'ItemName' => 'Sprocket R-100XG',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-100XG',
                'ItemNameJP' => 'スプロケット梱包 R-100XG',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '281',
                'ItemName' => 'Sprocket R-100XF',
                'ItemClassId' => '96',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Đĩa xích R-100XF',
                'ItemNameJP' => 'スプロケット梱包 R-100XF',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '282',
                'ItemName' => 'Chain option E-2B',
                'ItemClassId' => '97',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây xích kéo E-2B',
                'ItemNameJP' => 'チｴーンオプション梱包  E-2B',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '283',
                'ItemName' => 'Special Rail 300㎜',
                'ItemClassId' => '98',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray đặc biệt 300㎜',
                'ItemNameJP' => '特殊レール 300㎜',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '284',
                'ItemName' => 'Special Rail 400㎜',
                'ItemClassId' => '98',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray đặc biệt 400㎜',
                'ItemNameJP' => '特殊レール 400㎜',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '285',
                'ItemName' => 'Special Wind Resistant Rail 300㎜',
                'ItemClassId' => '98',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray đặc biệt  chống bão 300㎜',
                'ItemNameJP' => '特殊耐風レール 300㎜',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '286',
                'ItemName' => 'Special Wind Resistant Rail 400㎜',
                'ItemClassId' => '98',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray đặc biệt  chống bão 400㎜',
                'ItemNameJP' => '特殊耐風レール 400㎜',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '287',
                'ItemName' => 'SUS Bottom Bar 1,5t',
                'ItemClassId' => '51',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh chặn dưới inox 1.5t',
                'ItemNameJP' => 'ステレス　ボトム 1,5t',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '288',
                'ItemName' => 'SUS Embossed Rail',
                'ItemClassId' => '50',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray inox nổi',
                'ItemNameJP' => '標準露出型ステンレスレール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '289',
                'ItemName' => 'SUS  Wind-proof exposed recessed rail 1.5t',
                'ItemClassId' => '50',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray âm chống bão inox 1.5t',
                'ItemNameJP' => '耐風埋込型ステンレスレール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '290',
                'ItemName' => 'SUS Wind-proof exposed Embossed rail 1.5t',
                'ItemClassId' => '50',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray nổi chống bão inox 1.5t',
                'ItemNameJP' => '耐風露出型ステンレスレール',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '291',
                'ItemName' => 'SUS  guide rail 0.8t',
                'ItemClassId' => '50',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Ray dẫn hướng inox 0.8t',
                'ItemNameJP' => 'ステンレスガイドレール増金',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '292',
                'ItemName' => 'Slide Closer(NSC-C1215-31)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt bán tự động (NSC-C1215-31)',
                'ItemNameJP' => 'スライド　クローザー(NSC-C1215-31)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '293',
                'ItemName' => 'Slide Closer(NSC-C1215-22)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thiết bị trượt bán tự động (NSC-C1215-22)',
                'ItemNameJP' => 'スライド　クローザー(NSC-C1215-31)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '294',
                'ItemName' => 'RYOBI S-401N (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI S-401N (Bản lề sàn)',
                'ItemNameJP' => 'リョービS-401N（フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '295',
                'ItemName' => 'RYOBI S-201N (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI S-201N (Bản lề sàn)',
                'ItemNameJP' => 'リョービS-201N（フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '296',
                'ItemName' => 'RYOBI 8802',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI 8802',
                'ItemNameJP' => 'リョービ 8802',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '297',
                'ItemName' => 'RYOBI 8803',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI 8803',
                'ItemNameJP' => 'リョービ 8803',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '298',
                'ItemName' => 'RYOBI S-8802',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI S-8802',
                'ItemNameJP' => 'リョービ S-8802',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '299',
                'ItemName' => 'RYOBI S-8803',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI S-8803',
                'ItemNameJP' => 'リョービ S-8803',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '300',
                'ItemName' => 'GMT N-222 (Floor Hinges)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GMT N-222 (Bản lề sàn)',
                'ItemNameJP' => 'GMT N-222（フロアヒンジ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '301',
                'ItemName' => 'Lever Handle Lock U9LA50-1(MIWA)',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt U9LA50-1(MIWA)',
                'ItemNameJP' => 'レバーハンドル U9LA50-1(ミワ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '302',
                'ItemName' => 'Lever Handle Lock U9LA52-1(MIWA)',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt U9LA52-1(MIWA)',
                'ItemNameJP' => 'レバーハンドル U9LA52-1(ミワ）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '303',
                'ItemName' => 'Dead Lock HDT-3B',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa Dead Lock HDT-3',
                'ItemNameJP' => '本締錠 HDT-5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '304',
                'ItemName' => 'Dead Lock HDT-5B',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa Dead Lock HDT-5',
                'ItemNameJP' => '本締錠 HDT-5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '305',
                'ItemName' => 'Auto Hinge AFD-14HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-14HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-14HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '306',
                'ItemName' => 'Door Scope(SO-938-1)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'SO-938-1',
                'ItemNameJP' => 'ドアスコープ（SO-938-1)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '307',
                'ItemName' => 'Door Guard(SD-141)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'SD-141',
                'ItemNameJP' => 'ドアガード（SD-141）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '308',
                'ItemName' => 'Door coordinators(SF-350F)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh đóng cửa tuần tự (SF-350F)',
                'ItemNameJP' => '順位調整器(SF-350F)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '309',
                'ItemName' => 'Door Chain(AD-144B)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'AD-144B',
                'ItemNameJP' => 'ドアチェーンAD-144B)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '310',
                'ItemName' => 'Case Handle (SO-111-2)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Case Handle (SO-111-2)',
                'ItemNameJP' => 'ケースハンドル（SO-111-2）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '311',
                'ItemName' => 'Case Handle (SO-200)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Case Handle (SO-200)',
                'ItemNameJP' => '点検口錠（SO-200）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '312',
                'ItemName' => 'Chain+Eye Bolt',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chain+Eye Bolt',
                'ItemNameJP' => 'チェーン＋アイボルト',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '313',
                'ItemName' => 'GGMK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GGMK',
                'ItemNameJP' => 'GGMK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '314',
                'ItemName' => 'GGMK+CNK',
                'ItemClassId' => '37',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GGMK+CNK',
                'ItemNameJP' => 'GGMK+CNK',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '315',
                'ItemName' => 'Firerated Glass 8mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'kinh chong chay 8mm',
                'ItemNameJP' => '耐熱ガラス　8mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '316',
                'ItemName' => 'Firerated Glass 10mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'kinh chong chay 10mm',
                'ItemNameJP' => '耐熱ガラス　10mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '317',
                'ItemName' => 'Firerated Glass 12mm',
                'ItemClassId' => '31',
                'PricePatternKey' => null,
                'ItemNameVN' => 'kinh chong chay 12mm',
                'ItemNameJP' => '耐熱ガラス　12mm',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '318',
                'ItemName' => 'G978-US32D',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'G978-US32D',
                'ItemNameJP' => 'G978-US32D',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '319',
                'ItemName' => 'UL291-002S+LX-5',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'UL291-002S+LX-5',
                'ItemNameJP' => 'UL291-002S+LX-5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '320',
                'ItemName' => 'Lever Handle Lock LX-5JUPU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX-5JUPU11S',
                'ItemNameJP' => 'レバーハンドル LX5JUPU 11S',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '321',
                'ItemName' => 'KH-241B-3(2sets)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'KH-241B-3(2sets)',
                'ItemNameJP' => 'KH-241B-3(2sets)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '322',
                'ItemName' => 'SD-241B-3',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'SD-241B-3',
                'ItemNameJP' => 'SD-241B-3',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '323',
                'ItemName' => 'SO-309A',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'SO-309A',
                'ItemNameJP' => 'SO-309A',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '324',
                'ItemName' => 'Order Color(2Color)',
                'ItemClassId' => '36',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Màu cửa-2',
                'ItemNameJP' => 'カラ2色',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '325',
                'ItemName' => 'G500-01-001(L=452)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'G500-01-001(L=452)',
                'ItemNameJP' => 'G500-01-001(L=452)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '326',
                'ItemName' => 'Case Handle UCH-1110',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Case Handle UCH-1110',
                'ItemNameJP' => 'Case Handle UCH-1110',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '327',
                'ItemName' => 'MSS-4 (Control panel & Harness 3 types)',
                'ItemClassId' => '78',
                'PricePatternKey' => null,
                'ItemNameVN' => 'MSS-4( 3 loại Dây điện kết nối với hộp điều khiển)',
                'ItemNameJP' => 'MSS-4(制御盤&ハーネス3種類)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '328',
                'ItemName' => 'Cere Card Transmitter',
                'ItemClassId' => '100',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bộ phát tín hiệu',
                'ItemNameJP' => 'セレカード送信機',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '329',
                'ItemName' => 'Cere Card Receiver',
                'ItemClassId' => '101',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bộ nhận tín hiệu',
                'ItemNameJP' => 'セレカード受信機',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '330',
                'ItemName' => 'Aluminum Bottom Bar',
                'ItemClassId' => '99',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Chặn dưới bằng nhôm',
                'ItemNameJP' => 'アルミ座板',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '331',
                'ItemName' => 'Hinges BU-5',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'bản lề BU-5',
                'ItemNameJP' => '面付丁番',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '332',
                'ItemName' => 'Pivot hinge 208F3TL ( R )',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề trục xoay 208F3TL ( R )',
                'ItemNameJP' => 'ピポットヒンジ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '333',
                'ItemName' => 'Pivot hinge 1C-5①T- L ( R )',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề trục xoay 1C-5①T- L ( R )',
                'ItemNameJP' => 'ピポットヒンジ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '334',
                'ItemName' => 'Access hinges SD-300',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề cửa kỹ thuật SD-300',
                'ItemNameJP' => '面付丁番',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '335',
                'ItemName' => 'Door coordinators(DS-250)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'thanh Đóng mở tuần tự (DS-250)',
                'ItemNameJP' => '順位調整器',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '336',
                'ItemName' => 'Door coordinators(DS-350)',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'thanh Đóng mở tuần tự (DS-350)',
                'ItemNameJP' => '順位調整器',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '337',
                'ItemName' => 'Electric lock - connecting wire RCL - 27 ',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Dây kết nối khóa điện RCL-27',
                'ItemNameJP' => '通電金具',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '338',
                'ItemName' => 'Glasswool Fitting  150Kg/M3',
                'ItemClassId' => '34',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bông thủy tinh 150Kg/M3',
                'ItemNameJP' => 'グラスウールフィッティング150Kg/M3',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '339',
                'ItemName' => 'Single Swing Panic Handle (Neo 500P)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đơn (NEO 500P)',
                'ItemNameJP' => 'パニックハンドル (NEO 500P)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '341',
                'ItemName' => 'Access Lock SO-111-2',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa kỹ thuật SO-111-2',
                'ItemNameJP' => '点検口錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '342',
                'ItemName' => 'Access Lock SO-111-3',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa kỹ thuật SO-111-3',
                'ItemNameJP' => '点検口錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '343',
                'ItemName' => 'handle case both sides UCC D/T40',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'khóa móc hình khoen UCC D/T40',
                'ItemNameJP' => '両面ケースﾊﾝﾄﾞﾙ',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '344',
                'ItemName' => 'Sliding door lock P TSA 5FP B/S51 D/T40',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa trượt P TSA 5FP B/S51 D/T40',
                'ItemNameJP' => '錠前',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '345',
                'ItemName' => 'Sliding door lock P TSA 3FP B/S51 D/T40',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa cửa trượt P TSA 3FP B/S51 D/T40',
                'ItemNameJP' => '錠前',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '346',
                'ItemName' => 'Lever Handle Lock LX - 5X .KZU11S',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt LX - 5X .KZU11S',
                'ItemNameJP' => 'レバーハンドル錠前',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '347',
                'ItemName' => 'Single swing Hinges  BX-LD5',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'bản lề BX-LD5 (cửa đơn)',
                'ItemNameJP' => '面付丁番(BX-LD5)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '348',
                'ItemName' => 'Double swing Hinges  BX-LD5',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'bản lề BX-LD5 (cửa đôi)',
                'ItemNameJP' => '面付丁番(BX-LD5)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '349',
                'ItemName' => 'Single swing Hinges SD-536',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'bản lề SD-536 (cửa đơn)',
                'ItemNameJP' => '面付丁番(SD-536)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '350',
                'ItemName' => 'Double swing Hinges SD-536',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'bản lề SD-536 (cửa đôi)',
                'ItemNameJP' => '面付丁番(SD-536)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '351',
                'ItemName' => 'Case Handle Auto Lock HSTC-5',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa HSTC-5',
                'ItemNameJP' => 'ケースハンドル自動施錠　HSTC-5',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '352',
                'ItemName' => 'Under Frame Type FB-5×20',
                'ItemClassId' => '29',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khung dưới: FB-5×20',
                'ItemNameJP' => '沓摺:　FB-5×20',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '353',
                'ItemName' => 'GMT G978-US32D L=1200',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'GMT G978-US32D L=1200',
                'ItemNameJP' => 'GMT G978-US32D  L=1200',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '354',
                'ItemName' => 'Auto Door Bottom(DB-410) > 1m',
                'ItemClassId' => '41',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh cao su kín khí tự động (DB-410) > 1m',
                'ItemNameJP' => 'オートドア　ボトム > 1m',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '355',
                'ItemName' => 'Auto Hinge AFD-8HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-8HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-8HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '356',
                'ItemName' => 'Auto Hinge AFD-16HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-16HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-16HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '357',
                'ItemName' => 'Auto Hinge AFD-30HL(R)',
                'ItemClassId' => '38',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Bản lề tự động AFD-30HL(R)',
                'ItemNameJP' => 'オートヒンジ AFD-30HL(R)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '358',
                'ItemName' => 'Aluminum Shutter',
                'ItemClassId' => '42',
                'PricePatternKey' => '74',
                'ItemNameVN' => 'Cửa cuốn nhôm',
                'ItemNameJP' => 'アルミシャッター',
                'FactoryCode' => '23',
            ],

            [
                'ItemId' => '359',
                'ItemName' => 'Mansion Door',
                'ItemClassId' => '16',
                'PricePatternKey' => '73',
                'ItemNameVN' => 'Cửa căn hộ',
                'ItemNameJP' => 'マンションドア',
                'FactoryCode' => '28',
            ],

            [
                'ItemId' => '360',
                'ItemName' => 'TK Panicbar  Leverhandle Lock ',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Khóa tay gạt TK',
                'ItemNameJP' => 'TKパニック用レバーハンドル錠',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '361',
                'ItemName' => 'Single Swing Panic Handle (TK-F5000S)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đơn (TK-F5000S)',
                'ItemNameJP' => 'パニックハンドル (TK-F5000S)',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '362',
                'ItemName' => 'Double Swing Panic Handle (TK-F5600S)',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Thanh thoát hiểm cho cửa đôi (TK-F5600S)',
                'ItemNameJP' => 'ダブルスイングパニックハンドル（TK-F5600S）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '363',
                'ItemName' => 'Electric Clemon Bolt Double C-ER-55GG',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Electric Clemon Bolt Double C-ER-55GG',
                'ItemNameJP' => 'Electric Clemon Bolt Double C-ER-55GG',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '364',
                'ItemName' => 'Electric Clemon Bolt Single C-ER-55G',
                'ItemClassId' => '39',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Electric Clemon Bolt Single C-ER-55G',
                'ItemNameJP' => 'Electric Clemon Bolt Single C-ER-55G',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '365',
                'ItemName' => 'RYOBI COU-53 (Concealed DC)',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'RYOBI COU-53 (Concealed DC)',
                'ItemNameJP' => 'リョービ　COU-53 (コンシールド）',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '366',
                'ItemName' => 'Hotlel Lock U9ALV2 USHD478-1',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'Hotlel Lock U9ALV2 USHD478-1',
                'ItemNameJP' => 'ホテル錠　U9ALV2 USHD478-1',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '367',
                'ItemName' => 'TK-3',
                'ItemClassId' => '40',
                'PricePatternKey' => null,
                'ItemNameVN' => 'TK-3',
                'ItemNameJP' => 'TK-3',
                'FactoryCode' => null,
            ],

            [
                'ItemId' => '368',
                'ItemName' => 'CAM LOCK PCL (MIWA)',
                'ItemClassId' => '21',
                'PricePatternKey' => null,
                'ItemNameVN' => 'CAM LOCK PCL (MIWA)',
                'ItemNameJP' => 'カムロック　ＰＣＬ（ミワ）',
                'FactoryCode' => null,
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("mstitem", $item);
        }
    }

}