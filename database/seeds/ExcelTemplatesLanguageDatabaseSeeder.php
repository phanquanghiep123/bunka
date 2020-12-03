<?php

use Illuminate\Database\Seeder;
use Elimuswift\DbExporter\SeederHelper;

class ExcelTemplatesLanguageDatabaseSeeder extends Seeder 
{

	use SeederHelper;
	
    public function run()
    {
        
        $data = [
            
            [
                'id' => '1',
                'lang_id' => '2',
                'bind_key' => '1',
                'name' => 'Phiếu trúng thầu',
                'content' => '<table border="0" width="1583" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;" colspan="19"><span style="font-size: 30px;"><strong>PHIẾU TR&Uacute;NG THẦU</strong></span></td>
</tr>
<tr>
<td style="text-align: center;" colspan="19"><em>( D&ugrave;ng cho c&aacute;c Dự &aacute;n đ&atilde; tr&uacute;ng thầu hoặc c&oacute; khả năng tr&uacute;ng thầu)</em></td>
</tr>
<tr>
<td colspan="2">Ng&agrave;y tr&uacute;ng thầu</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">Số phiếu tr&uacute;ng thầu</td>
<td>0</td>
<td>R0</td>
</tr>
<tr>
<td colspan="2">Người phụ tr&aacute;ch hợp đồng</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">Ng&agrave;y ghi nhận doanh thu</td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td colspan="2">M&atilde; Đơn vị k&yacute; HĐ</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong>NON-EPE</strong></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">Số tiền ghi nhận doanh thu</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">T&ecirc;n ch&iacute;nh thức</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">Chủ đầu tư</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Người phụ tr&aacute;ch</td>
<td>Trưởng ph&ograve;ng KD</td>
<td>Trưởng ph&ograve;ng HC</td>
<td>Kế to&aacute;n</td>
</tr>
<tr>
<td colspan="2">M&atilde; quản l&yacute;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">X&aacute;c nhận tr&uacute;ng thầu</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">T&ecirc;n C&ocirc;ng trường</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">Địa chỉ c&ocirc;ng trường</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">Ghi nhận Doanh thu</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">Ng&agrave;y thi c&ocirc;ng dự kiến</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2">Ng&agrave;y ho&agrave;n th&agrave;nh dự kiến</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Check List</td>
<td>Hợp đồng</td>
<td>BBNT</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000;">&nbsp;</td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(1)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(2)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(3)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(4)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(5)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(6)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(7)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(8)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(9)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(10)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(11)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(12)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(13)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(14)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(15)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(16)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(17)</span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;">(18)</span></td>
</tr>
<tr>
<td style="border: 1px solid #000000;">Số</td>
<td style="border: 1px solid #000000;">T&ecirc;n sản phẩm</td>
<td style="border: 1px solid #000000;">Số lượng</td>
<td style="border: 1px solid #000000;">Diện t&iacute;ch (m&sup2;)</td>
<td style="border: 1px solid #000000;">Tổng gi&aacute; trị theo B&aacute;o gi&aacute;</td>
<td style="border: 1px solid #000000;">Tổng gi&aacute; trị tr&uacute;ng thầu</td>
<td style="border: 1px solid #000000;">Gi&aacute; th&agrave;nh sản xuất</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; lắp đặt</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; sơn</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; gi&aacute;m s&aacute;t</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; thu&ecirc; Container</td>
<td style="border: 1px solid #000000;">C&ocirc;ng t&aacute;c ph&iacute;+CP đi lại</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; thiết kế</td>
<td style="border: 1px solid #000000;">Vận chuyển trong nước VN</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; nhập xuất - nhập khẩu</td>
<td style="border: 1px solid #000000;">Thuế</td>
<td style="border: 1px solid #000000;">Chi ph&iacute; đại l&yacute;</td>
<td style="border: 1px solid #000000;">Lợi nhuận</td>
<td style="border: 1px solid #000000;">Tổng gi&aacute; th&agrave;nh</td>
</tr>
<!--[GetData]-->
<tr>
<td rowspan="2">01</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<!--[/GetData]-->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border: 1px solid #000000;" colspan="2">＊＊ TỔNG ＊＊</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
</tr>
<tr>
<td colspan="4">GHI CH&Uacute; CỦA PH&Ograve;NG KINH DOANH</td>
<td colspan="6">&nbsp;</td>
<td colspan="4">GHI CH&Uacute; TRONG QU&Aacute; TR&Igrave;NH K&Yacute; KẾT HỢP ĐỒNG</td>
<td colspan="5">&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-04 04:16:42',
                'updated_at' => '2019-07-11 03:53:52',
            ],

            [
                'id' => '2',
                'lang_id' => '3',
                'bind_key' => '1',
                'name' => 'Order receipt',
                'content' => '<table border="0" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;" colspan="19"><span style="font-size: 30px;"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">WINNING BIDDING</span></span></strong></span></td>
</tr>
<tr>
<td style="text-align: center;" colspan="19"><em><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(For projects that have won bids or are able to win bids)</span></span></em></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Bidding date</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Number of winning votes</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">0</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">R0</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">The person in charge of the contract</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Revenue recognition date</span></span></td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&hellip;&hellip;. / &hellip;&hellip;&hellip;. / &hellip;&hellip;&hellip;&hellip;&hellip;</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Code Unit signed contract</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NON-EPE</span></span></strong></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Amount of revenue recognition</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">The official name</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Investor</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">The person in charge</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Business Manager</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Head of HC Department</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Accountant</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Management code</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Confirm winning bid</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Site name</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Site address</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Revenue recognition</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Expected construction date</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Expected completion date</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Check List</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Contract</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">BBNT</span></span></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000;">&nbsp;</td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(first)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(2)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(3)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(4)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(5)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(6)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(7)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(8)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(9)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(ten)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(11)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(twelfth)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(13)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(14)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(15)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(16)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(17)</span></span></span></td>
<td style="text-align: center; background-color: #ccecff; border: 1px solid #000000;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">(18)</span></span></span></td>
</tr>
<tr>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Number</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Product\'s name</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Amount</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Area (m&sup2;)</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Total value according to Quotations</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Total winning value</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Production cost</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Non-production costs</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Installation fee</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Cost of installation outside the company often</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Shipping costs from the factory</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Other Cont + shipping costs</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Buy on site, other CP</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Fire protection certificate</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Design costs</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Construction costs</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Agency costs</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Profit</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Total price</span></span></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border: 1px solid #000000;" colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">** TOTAL **</span></span></td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
</tr>
<tr>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NOTES OF THE BUSINESS ROOM</span></span></td>
<td colspan="6">&nbsp;</td>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NOTES IN THE CONTRACT PROCESS OF THE CONTRACT</span></span></td>
<td colspan="5">&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-04 04:16:42',
                'updated_at' => '2019-07-11 03:55:36',
            ],

            [
                'id' => '3',
                'lang_id' => '4',
                'bind_key' => '1',
                'name' => '注文書',
                'content' => '<table border="0" width="1583" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;" colspan="19"><span style="font-size: 30px;"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">勝ち入札</span></span></strong></span></td>
</tr>
<tr>
<td style="text-align: center;" colspan="19"><em><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（入札を獲得した、または入札を獲得できるプロジェクトの場合）</span></span></em></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">入札日</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">勝利投票数</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">0</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">R0</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">契約担当者</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">収益認識日</span></span></td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">&hellip;&hellip;。/&hellip;&hellip;&hellip;。/&hellip;&hellip;&hellip;&hellip;&hellip;</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">コードユニット署名契約</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ノンエップ</span></span></strong></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">収益認識額</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">正式名称</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">投資家</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">担当者</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ビジネスマネージャー</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">HC部長</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">経理</span></span></td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">管理コード</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">落札を確認する</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">サイト名</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">サイトアドレス</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">収益の認識</span></span></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">建設予定日</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">完成予定日</span></span></td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">チェックリスト</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">契約</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">BBNT</span></span></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000;">&nbsp;</td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（1）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（2）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（3）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（4）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（5）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（6）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（7）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（8）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（9）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（10）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（11）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（12）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（13）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（14）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（15）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（16）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（17）</span></span></span></td>
<td style="border: 1px solid #000000; text-align: center; background-color: #ccecff;"><span style="color: #0000ff;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">（18）</span></span></span></td>
</tr>
<tr>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">番号</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">商品名</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">数量</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">面積（㎡）</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">見積による合計値</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">合計勝利額</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">製造コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">設置コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">塗装コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">監視コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">コンテナレンタル費用</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">作業料+ CP旅行</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">設計コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ベトナム国内発送</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">輸出入コスト</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">税金</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">代理店の費用</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">利益</span></span></td>
<td style="border: 1px solid #000000;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">合計金額</span></span></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="border: 1px solid #000000;" colspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">＊＊合計＊＊</span></span></td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
<td style="border: 1px solid #000000;">&nbsp;</td>
</tr>
<tr>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ビジネスルームについて</span></span></td>
<td colspan="6">&nbsp;</td>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">契約の契約プロセスにおける注意</span></span></td>
<td colspan="5">&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-04 04:16:42',
                'updated_at' => '2019-07-11 03:54:35',
            ],

            [
                'id' => '4',
                'lang_id' => '2',
                'bind_key' => '2',
                'name' => 'Báo giá',
                'content' => '<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><strong>Số:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2" rowspan="4"><img src="images/bunka-logo.png" alt="" width="346" height="91" /></td>
</tr>
<tr>
<td><strong>Kh&aacute;ch h&agrave;ng:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Dự &aacute;n:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Ng&agrave;y:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Địa chỉ:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>SĐT:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Fax:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="7"><span style="font-size: 24px;"><span style="font-size: 24px;"><strong>BẢNG B&Aacute;O GI&Aacute;</strong></span></span><strong><br /></strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="vertical-align: middle; text-align: left;" colspan="7">Ch&uacute;ng t&ocirc;i xin gửi đến Qu&yacute; C&ocirc;ng ty Bảng b&aacute;o gi&aacute; như sau:</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Charge:</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>STT</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Sản Phẩm</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Gi&aacute; sản phẩm</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Ph&iacute; c&agrave;i đặt</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Ph&iacute; vận chuyển nội địa</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Số lượng</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px groove #000000;"><strong>Gi&aacute;</strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<!--[/GetData]-->
<tr>
<td style="text-align: center; border: 1px solid #000000;"><strong>Tổng số phụ:</strong></td>
<td style="border: 1px solid #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px solid #000000;"><strong>Giảm gi&aacute;:</strong></td>
<td style="border: 1px solid #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px solid #000000;"><span style="font-size: 15px;"><strong>Tổng phụ:</strong></span></td>
<td style="border: 1px solid #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px solid #000000;"><strong>Thuế:</strong></td>
<td style="border: 1px solid #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px solid #000000;"><span style="font-size: 15px;"><strong>Tổng cộng:</strong></span></td>
<td style="border: 1px solid #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="background-color: #edd602;" colspan="7"><strong>Điều kiện</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: left;">1</td>
<td colspan="6">Ch&uacute;ng t&ocirc;i sẽ t&iacute;nh lại gi&aacute; khi c&oacute; th&ecirc;m c&aacute;c th&ocirc;ng tin sau:</td>
</tr>
<tr>
<td style="text-align: center;">1-1</td>
<td colspan="6">Kế hoạch lắp đặt</td>
</tr>
<tr>
<td style="text-align: center;">1-2</td>
<td colspan="6">Khi nhận được đầy đủ c&aacute;c bản vẽ cửa, bản vẽ mặt bằng, bản vẽ chi tiết bằng tiếng anh hoặc tiếng nhật</td>
</tr>
<tr>
<td style="text-align: left;">2</td>
<td colspan="6">B&aacute;o gi&aacute; tr&ecirc;n c&oacute; thể thay đổi v&agrave; c&oacute; gi&aacute; trị thay thế c&aacute;c b&aacute;o gi&aacute; trước đ&oacute;.</td>
</tr>
<tr>
<td style="text-align: left;">3</td>
<td colspan="6">Điều kiện thương mại quốc tế: theo nguy&ecirc;n tắc thương mại quốc tế 2000.</td>
</tr>
<tr>
<td style="text-align: left;">4</td>
<td colspan="6">Điều kiện thanh to&aacute;n:</td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
<td colspan="6">- Thanh to&aacute;n lần 1 ( 100% ) : Sau khi giao h&agrave;ng đến c&ocirc;ng trường</td>
</tr>
<tr>
<td style="text-align: left;">5</td>
<td colspan="6">Giao h&agrave;ng: Giao h&agrave;ng đến c&ocirc;ng tr&igrave;nh</td>
</tr>
<tr>
<td style="text-align: left;">6</td>
<td colspan="6">B&aacute;o gi&aacute; kh&ocirc;ng bao gồm:</td>
</tr>
<tr>
<td style="text-align: center;">6-1</td>
<td colspan="6">Gi&agrave;n gi&aacute;o phục vụ cho việc lắp đặt</td>
</tr>
<tr>
<td style="text-align: center;">6-2</td>
<td colspan="6">Bảo dưỡng sau khi lắp đặt</td>
</tr>
<tr>
<td style="text-align: center;">6-3</td>
<td colspan="6">Nguồn điện ch&iacute;nh cung cấp gần m&ocirc; tơ</td>
</tr>
<tr>
<td style="text-align: left;">7</td>
<td colspan="6">Gi&aacute; trị b&aacute;o gi&aacute;: trong v&ograve;ng 30 ng&agrave;y</td>
</tr>
<tr>
<td style="text-align: left;">8</td>
<td colspan="6">Thời gian giao h&agrave;ng: 60 ng&agrave;y kể từ khi duyệt thiết kế</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong>Ng&agrave;y:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="2" rowspan="4">BUNKA-VIETNAM CO., LTD.</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><strong>T&ecirc;n c&ocirc;ng ty:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2"><strong>T&ecirc;n:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td><strong>Ng&agrave;y</strong><strong>:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
<td>&nbsp;</td>
<td><strong>Ng&agrave;y</strong><strong>:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-05 10:28:32',
                'updated_at' => '2019-07-08 11:29:52',
            ],

            [
                'id' => '5',
                'lang_id' => '3',
                'bind_key' => '2',
                'name' => 'Design requirements',
                'content' => '<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><strong>№</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2" rowspan="4"><img src="images/bunka-logo.png" alt="" width="346" height="91" /></td>
</tr>
<tr>
<td><strong>Client:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Project:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Date：</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Adress:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Tel:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Fax:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="7"><span style="font-size: 24px;"><strong>QUOTATION</strong></span><strong><br /></strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: left; vertical-align: middle;" colspan="7">We would like to quote prices as per the following details.</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Charge:</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>No.</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Production</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Product Price</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Installation Fee</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Inland Freight Fee</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Quantity</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Price</strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<!--[/GetData]-->
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><span style="color: #000000;"><strong><span style="font-family: Quicksand, sans-serif; font-size: 14px; white-space: nowrap;">Sub Total:</span></strong></span></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Discount:<span style="color: #212529; font-family: Quicksand, sans-serif; font-size: 14px; white-space: nowrap;"><br /></span></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Grand Sub Total:<br /></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Tax:<br /></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong><span style="box-sizing: border-box; color: #000000; font-family: Quicksand, sans-serif; font-size: 14px; text-align: left; white-space: nowrap;">Total:</span><br /></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="background-color: #edd602;" colspan="7"><strong>Conditions</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: left;">1</td>
<td colspan="6">In case we have additional information as below, we will quote this again.</td>
</tr>
<tr>
<td style="text-align: center;">1-1</td>
<td colspan="6">Project schedule</td>
</tr>
<tr>
<td style="text-align: center;">1-2</td>
<td colspan="6">Whole drawings including door schedule, key plan and detailed sectional drawings in Japanese or in English.</td>
</tr>
<tr>
<td style="text-align: left;">2</td>
<td colspan="6">Prices are subject to alternation without notice and supersede all previous prices advised.</td>
</tr>
<tr>
<td style="text-align: left;">3</td>
<td colspan="6">Trade terms: Subject to Incoterms 2010.</td>
</tr>
<tr>
<td style="text-align: left;">4</td>
<td colspan="6">Payment:</td>
</tr>
<tr>
<td style="text-align: center;">4-1</td>
<td colspan="6">- 1st payment : 40% After signing contract agreement.</td>
</tr>
<tr>
<td style="text-align: center;">4-2</td>
<td colspan="6">- 2nd payment : 40% After completing delivery all the material at the Site</td>
</tr>
<tr>
<td style="text-align: center;">4-3</td>
<td colspan="6" rowspan="2">- 3rd payment : 20% After completing installation work<br />Bank bond charge is not included into this offer. Additional charge will be beared in care required.</td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: left;">5</td>
<td colspan="6">Delivery: Free on truck at construction site.</td>
</tr>
<tr>
<td style="text-align: left;">6</td>
<td colspan="6">The below prices shall not be included.</td>
</tr>
<tr>
<td style="text-align: center;">6-1</td>
<td colspan="6">Scaffolding for installation work</td>
</tr>
<tr>
<td style="text-align: center;">6-2</td>
<td colspan="6">Electric consumption on installing process</td>
</tr>
<tr>
<td style="text-align: center;">6-3</td>
<td colspan="6">Grouting works (All cement &amp; plaster work are to be done by others); Silicon works (Between Door Frame &amp;wall by others)</td>
</tr>
<tr>
<td style="text-align: center;">6-4</td>
<td colspan="6">Sealing &amp; Chipping works</td>
</tr>
<tr>
<td style="text-align: center;">6-5</td>
<td colspan="6">All of works concerning to electrical items such as main power connected to the motor</td>
</tr>
<tr>
<td style="text-align: center;">6-6</td>
<td colspan="6">All of expense for door protection after installation (if any).</td>
</tr>
<tr>
<td style="text-align: center;">6-7</td>
<td colspan="6">Steel Structure support for install (If need)</td>
</tr>
<tr>
<td style="text-align: center;">6-8</td>
<td colspan="6">Fee for transportation to high lever floor (from over 3rd Floor).</td>
</tr>
<tr>
<td style="text-align: center;">6-9</td>
<td colspan="6">Fee and Certificate for Door Test (as: Fire-rated Rooler Shutter, Steel Door, Acountic Door, material for All Door</td>
</tr>
<tr>
<td style="text-align: center;">6-10</td>
<td colspan="6">Other construction works</td>
</tr>
<tr>
<td style="text-align: left;">7</td>
<td colspan="6">Validity of quotation: 30 days from today. After validity; subject to our final confirmation.</td>
</tr>
<tr>
<td style="text-align: left;">8</td>
<td colspan="6">Delivery period: 60 days from the date of approved drawings (minimum)</td>
</tr>
<tr>
<td style="text-align: left;">9</td>
<td colspan="6">Warranty: 01 year.</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="2" rowspan="4">BUNKA-VIETNAM CO., LTD.</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;" rowspan="2"><strong>Company :</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;" rowspan="2"><strong>Name:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-05 10:28:32',
                'updated_at' => '2019-07-08 11:29:52',
            ],

            [
                'id' => '6',
                'lang_id' => '4',
                'bind_key' => '2',
                'name' => '設計要件',
                'content' => '<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><strong>№</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2" rowspan="4"><img src="images/bunka-logo.png" alt="" width="346" height="91" /></td>
</tr>
<tr>
<td><strong>Client:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Project:</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><strong>Date：</strong></td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Adress:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Tel:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center;"><strong>Fax:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="7"><span style="font-size: 24px;"><strong>QUOTATION</strong></span><strong><br /></strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: left; vertical-align: middle;" colspan="7">We would like to quote prices as per the following details.</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Charge:</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>No.</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Production</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Product Price</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Installation Fee</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Inland Freight Fee</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Quantity</strong></td>
<td style="text-align: center; vertical-align: middle; background-color: #ccffcc; border: 1px solid #000000;"><strong>Price</strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
<td style="border: 1px dotted #000000;">&nbsp;</td>
</tr>
<!--[/GetData]-->
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><span style="color: #000000;"><strong><span style="font-family: Quicksand, sans-serif; font-size: 14px; white-space: nowrap;">Sub Total:</span></strong></span></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Discount:<span style="color: #212529; font-family: Quicksand, sans-serif; font-size: 14px; white-space: nowrap;"><br /></span></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Grand Sub Total:<br /></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong>Tax:<br /></strong></td>
<td style="border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; border: 1px dotted #000000;"><strong><span style="box-sizing: border-box; color: #000000; font-family: Quicksand, sans-serif; font-size: 14px; text-align: left; white-space: nowrap;">Total:</span><br /></strong></td>
<td style="text-align: right; border: 1px dotted #000000;" colspan="6">&nbsp;</td>
</tr>
<tr>
<td style="text-align: right;">&nbsp;</td>
<td style="text-align: right;">&nbsp;</td>
<td style="text-align: right;">&nbsp;</td>
<td style="text-align: right;">&nbsp;</td>
<td style="text-align: right;">&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="background-color: #edd602;" colspan="7"><strong>Conditions</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="text-align: left;">1</td>
<td colspan="6">In case we have additional information as below, we will quote this again.</td>
</tr>
<tr>
<td style="text-align: center;">1-1</td>
<td colspan="6">Project schedule</td>
</tr>
<tr>
<td style="text-align: center;">1-2</td>
<td colspan="6">Whole drawings including door schedule, key plan and detailed sectional drawings in Japanese or in English.</td>
</tr>
<tr>
<td style="text-align: left;">2</td>
<td colspan="6">Prices are subject to alternation without notice and supersede all previous prices advised.</td>
</tr>
<tr>
<td style="text-align: left;">3</td>
<td colspan="6">Trade terms: Subject to Incoterms 2010.</td>
</tr>
<tr>
<td style="text-align: left;">4</td>
<td colspan="6">Payment:</td>
</tr>
<tr>
<td style="text-align: center;">4-1</td>
<td colspan="6">- 1st payment : 40% After signing contract agreement.</td>
</tr>
<tr>
<td style="text-align: center;">4-2</td>
<td colspan="6">- 2nd payment : 40% After completing delivery all the material at the Site</td>
</tr>
<tr>
<td style="text-align: center;">4-3</td>
<td colspan="6" rowspan="2">- 3rd payment : 20% After completing installation work<br />Bank bond charge is not included into this offer. Additional charge will be beared in care required.</td>
</tr>
<tr>
<td style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: left;">5</td>
<td colspan="6">Delivery: Free on truck at construction site.</td>
</tr>
<tr>
<td style="text-align: left;">6</td>
<td colspan="6">The below prices shall not be included.</td>
</tr>
<tr>
<td style="text-align: center;">6-1</td>
<td colspan="6">Scaffolding for installation work</td>
</tr>
<tr>
<td style="text-align: center;">6-2</td>
<td colspan="6">Electric consumption on installing process</td>
</tr>
<tr>
<td style="text-align: center;">6-3</td>
<td colspan="6">Grouting works (All cement &amp; plaster work are to be done by others); Silicon works (Between Door Frame &amp;wall by others)</td>
</tr>
<tr>
<td style="text-align: center;">6-4</td>
<td colspan="6">Sealing &amp; Chipping works</td>
</tr>
<tr>
<td style="text-align: center;">6-5</td>
<td colspan="6">All of works concerning to electrical items such as main power connected to the motor</td>
</tr>
<tr>
<td style="text-align: center;">6-6</td>
<td colspan="6">All of expense for door protection after installation (if any).</td>
</tr>
<tr>
<td style="text-align: center;">6-7</td>
<td colspan="6">Steel Structure support for install (If need)</td>
</tr>
<tr>
<td style="text-align: center;">6-8</td>
<td colspan="6">Fee for transportation to high lever floor (from over 3rd Floor).</td>
</tr>
<tr>
<td style="text-align: center;">6-9</td>
<td colspan="6">Fee and Certificate for Door Test (as: Fire-rated Rooler Shutter, Steel Door, Acountic Door, material for All Door</td>
</tr>
<tr>
<td style="text-align: center;">6-10</td>
<td colspan="6">Other construction works</td>
</tr>
<tr>
<td style="text-align: left;">7</td>
<td colspan="6">Validity of quotation: 30 days from today. After validity; subject to our final confirmation.</td>
</tr>
<tr>
<td style="text-align: left;">8</td>
<td colspan="6">Delivery period: 60 days from the date of approved drawings (minimum)</td>
</tr>
<tr>
<td style="text-align: left;">9</td>
<td colspan="6">Warranty: 01 year.</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="2" rowspan="4">BUNKA-VIETNAM CO., LTD.</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;" rowspan="2"><strong>Company :</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;" rowspan="2"><strong>Name:</strong></td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
<td>&nbsp;</td>
<td style="text-align: center; vertical-align: middle;"><strong>Date:</strong></td>
<td colspan="2">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-05 10:28:32',
                'updated_at' => '2019-07-08 11:29:52',
            ],

            [
                'id' => '7',
                'lang_id' => '2',
                'bind_key' => '3',
                'name' => 'Chi tiết báo giá',
                'content' => '<table border="0" width="1176" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;"><strong>Project:</strong></td>
<td colspan="4">ARTNATURE FACTORY PROJECT</td>
</tr>
<tr>
<td height="21">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong>&nbsp;</strong></td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="5" height="34"><strong><em><u>DOOR DETAIL QUOTATION</u></em></strong></td>
</tr>
<tr>
<td height="22">Charge</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>23,000VND</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Code</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Items</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Remarks</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Sale Price </strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong> Price </strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<!--[/GetData]--></tbody>
</table>',
                'created_at' => '2019-07-06 04:56:06',
                'updated_at' => '2019-07-08 02:36:55',
            ],

            [
                'id' => '8',
                'lang_id' => '3',
                'bind_key' => '3',
                'name' => 'Quotation Details',
                'content' => '<table border="0" width="1176" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;"><strong>Project:</strong></td>
<td colspan="4">ARTNATURE FACTORY PROJECT</td>
</tr>
<tr>
<td height="21">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong>&nbsp;</strong></td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="5" height="34"><strong><em><u>DOOR DETAIL QUOTATION</u></em></strong></td>
</tr>
<tr>
<td height="22">Charge</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>23,000VND</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Code</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Items</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Remarks</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Sale Price </strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong> Price </strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<!--[/GetData]--></tbody>
</table>',
                'created_at' => '2019-07-06 04:56:07',
                'updated_at' => '2019-07-08 02:36:55',
            ],

            [
                'id' => '9',
                'lang_id' => '4',
                'bind_key' => '3',
                'name' => '商品の詳細',
                'content' => '<table border="0" width="1176" cellspacing="0">
<tbody>
<tr>
<td style="text-align: center;"><strong>Project:</strong></td>
<td colspan="4">ARTNATURE FACTORY PROJECT</td>
</tr>
<tr>
<td height="21">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong>&nbsp;</strong></td>
</tr>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="5" height="34"><strong><em><u>DOOR DETAIL QUOTATION</u></em></strong></td>
</tr>
<tr>
<td height="22">Charge</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="text-align: right;">1USD =</td>
<td>23,000VND</td>
</tr>
<tr>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Code</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Items</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Remarks</strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong>Sale Price </strong></td>
<td style="border-style: solid; border-color: #000000; text-align: center; vertical-align: middle; background-color: #ccffcc;"><strong> Price </strong></td>
</tr>
<!--[GetData]-->
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<tr>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
<td style="border-style: dotted; border-color: #000000;">&nbsp;</td>
</tr>
<!--[/GetData]--></tbody>
</table>',
                'created_at' => '2019-07-06 04:56:07',
                'updated_at' => '2019-07-08 02:36:56',
            ],

            [
                'id' => '10',
                'lang_id' => '2',
                'bind_key' => '4',
                'name' => 'Yêu cầu thiết kế',
                'content' => '<table border="0" width="1461">
<tbody>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="12">
<h1>Y&ecirc;u cầu thiết kế</h1>
</td>
<td colspan="3">Người x&aacute;c nhận</td>
<td colspan="3">Người phụ tr&aacute;ch</td>
</tr>
<tr>
<td colspan="4">M&atilde; số đơn h&agrave;ng</td>
<td colspan="8">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="4" rowspan="3">
<p>T&ecirc;n c&ocirc;ng trường</p>
<p><br />Địa chỉ c&ocirc;ng trường</p>
</td>
<td colspan="8">&nbsp;</td>
<td colspan="3">Nh&agrave; thầu ch&iacute;nh</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3">Đơn vị k&yacute; kết</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3">Quản l&yacute; thiết kế</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>T&ecirc;n sản phẩm</strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>Số lượng</strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>Tổng diện t&iacute;ch</strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>T&ecirc;n sản phẩm</strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>Số lượng</strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong>Tổng diện t&iacute;ch</strong></td>
</tr>
<!--[GetData]-->
<tr>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<!--[/GetData]-->
<tr>
<td colspan="7" rowspan="11">Bản vẽ k&egrave;m theo với y&ecirc;u cầu thiết kế</td>
<td>✔</td>
<td colspan="4">Bản vẽ mặt bằng</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2">Bản vẽ ngoại cảnh</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2">Bản vẽ chi tiết cấu tạo nh&agrave;</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">✔</td>
<td colspan="4" rowspan="2">Bản vẽ ngoại cảnh của cửa</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2">Bản vẽ tham khảo</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2">Những bản vẽ kh&aacute;c</td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Tiền b&aacute;o gi&aacute;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Ng&agrave;y gửi bản vẽ</td>
<td colspan="5" rowspan="2">Năm Th&aacute;ng Ng&agrave;y</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Ng&agrave;y lắp đặt</td>
<td colspan="5" rowspan="2">Năm Th&aacute;ng Ng&agrave;y</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Ng&agrave;y ho&agrave;n c&ocirc;ng</td>
<td colspan="5" rowspan="2">Năm Th&aacute;ng Ng&agrave;y</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Phụ tr&aacute;ch c&ocirc;ng trường</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Phụ tr&aacute;ch cửa</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">Quản l&yacute; thiết kế</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="2">Ng&agrave;y tiếp nhận</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">TEL C&ocirc;ng trường</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2">FAX C&ocirc;ng trường</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
                'created_at' => '2019-07-08 08:48:30',
                'updated_at' => '2019-07-09 09:17:14',
            ],

            [
                'id' => '11',
                'lang_id' => '3',
                'bind_key' => '4',
                'name' => 'Design requirements',
                'content' => '<table border="0" width="1461">
<tbody>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="12">
<h1><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Design requirements</span></span></h1>
</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">The person confirmed</span></span></td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">The person in charge</span></span></td>
</tr>
<tr>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Order number</span></span></td>
<td colspan="8">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="4" rowspan="3">
<p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Site name</span></span></p>
<p><br /><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Site address</span></span></p>
</td>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Contractors</span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Contracting unit</span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Design management</span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Product\'s name</span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Amount</span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">total area</span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Product\'s name</span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Amount</span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">total area</span></span></strong></td>
</tr>
<tr>
<td colspan="7" rowspan="11"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Drawings are accompanied by design requirements</span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">✔</span></span></td>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Site drawing</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Exterior drawing</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Detailed drawings of house structures</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">✔</span></span></td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Exterior drawing of the door</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Reference drawing</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Other drawings</span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Price quote</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Date sent drawings</span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Year month day</span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Installation date</span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Year month day</span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Completion date</span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Year month day</span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">In charge of the construction site</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Door charge</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Design management</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Day reception</span></span></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">TEL Site</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">FAX Site</span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-08 08:48:30',
                'updated_at' => '2019-07-09 09:31:00',
            ],

            [
                'id' => '12',
                'lang_id' => '4',
                'bind_key' => '4',
                'name' => 'あなたの名前を入力してください',
                'content' => '<table border="0" width="1461">
<tbody>
<tr>
<td style="text-align: center; vertical-align: middle;" colspan="12">
<h1><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">設計要件</span></span></span></span></h1>
</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">確認した人</span></span></span></span></td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">担当者</span></span></span></span></td>
</tr>
<tr>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">注文番号</span></span></span></span></td>
<td colspan="8">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="4" rowspan="3">
<p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">サイト名</span></span></span></span></p>
<p><br /><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">サイトアドレス</span></span></span></span></p>
</td>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">請負業者</span></span></span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">契約単位</span></span></span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
<td colspan="3"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">デザイン管理</span></span></span></span></td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">商品の名前</span></span></span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">量</span></span></span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">総面積</span></span></span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">商品の名前</span></span></span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">量</span></span></span></span></strong></td>
<td style="vertical-align: middle; text-align: center;" colspan="3"><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">総面積</span></span></span></span></strong></td>
</tr>
<tr>
<td colspan="7" rowspan="11"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">図面はデザイン要件を伴います</span></span></span></span></td>
<td><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">✔</span></span></span></span></td>
<td colspan="4"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">サイト図</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">外観図</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">住宅構造の詳細図</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">✔</span></span></span></span></td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ドアの外形図</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">参考図</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td rowspan="2">&nbsp;</td>
<td colspan="4" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">その他の図面</span></span></span></span></td>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">価格見積り</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">図面送信日</span></span></span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">年月日</span></span></span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">設置日</span></span></span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">年月日</span></span></span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">完了日</span></span></span></span></td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">年月日</span></span></span></span></td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">工事現場担当</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">ドアチャージ</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">デザイン管理</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">デイレセプション</span></span></span></span></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">TELサイト</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="5" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="5" rowspan="2"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">FAXサイト</span></span></span></span></td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-07-08 08:48:30',
                'updated_at' => '2019-07-09 09:31:24',
            ],

            [
                'id' => '13',
                'lang_id' => '2',
                'bind_key' => '5',
                'name' => 'Yêu cầu sản xuất',
                'content' => '<table border="1" cellspacing="0">
<tbody>
<tr>
<td>&nbsp;</td>
<td>QUICK SHUTTER</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>CỬA CUỐN NHANH</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">EPE</td>
<td colspan="4" rowspan="2">契約済 <br />Tr&uacute;ng thầu</td>
<td colspan="4" rowspan="2">支店長 <br />Gi&aacute;m đốc chi nh&aacute;nh</td>
<td colspan="4" rowspan="2">マネジャー <br />Trưởng ph&ograve;ng</td>
<td colspan="4" rowspan="2">担当 <br />Người phụ tr&aacute;ch</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">R</td>
<td colspan="2">B</td>
<td>&nbsp;</td>
<td>製作依頼書</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>PHIẾU Y&Ecirc;U CẦU SẢN XUẤT</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="3">&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="8">No.　　　　　／　　　　　</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　受注№ <br />M&atilde; số đơn h&agrave;ng</td>
<td colspan="3">BVH</td>
<td>-</td>
<td colspan="9">&nbsp;</td>
<td>-</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　発注日 <br />Ng&agrave;y đặt h&agrave;ng</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">搬入予定日 <br />Ng&agrave;y dự kiến giao h&agrave;ng</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">工事日 <br />Ng&agrave;y thi c&ocirc;ng</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　契約先 <br />Đơn vị k&yacute; kết</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">ゼネコン <br />Nh&agrave; thầu ch&iacute;nh</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">ゼネコン担当者 <br />Người quản lý (nhà th&acirc;̀u)</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場名 <br />T&ecirc;n c&ocirc;ng tr&igrave;nh</td>
<td colspan="22">&nbsp;</td>
<td colspan="6">EPE企業担当者 <br />Người phụ tr&aacute;ch cty chế xuất</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場住所 <br />Địa chỉ c&ocirc;ng trường</td>
<td colspan="36">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">必要書類 <br />T&agrave;i liệu cần thiết</td>
<td colspan="36">出荷証明書　 要　 不要　　 　 　製品検査書　　 要　　 不要　　 工程写真　 　　 要　　 不要 <br />Chứng nhận xuất xưởng 　 Cần 　Kh&ocirc;ng cần Phiếu kiểm tra sản phẩm Cần Kh&ocirc;ng cần Ảnh tại c&ocirc;ng đoạn 　　Cần Kh&ocirc;ng cần</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">QSS　Ｎｏ．</td>
<td colspan="3" rowspan="2">Ｗ</td>
<td colspan="3" rowspan="2">Ｈ</td>
<td colspan="3" rowspan="2">連数 <br />Số bộ</td>
<td colspan="3" rowspan="2">Type</td>
<td colspan="5">シート色 M&agrave;u bạt</td>
<td colspan="4">窓 Cửa sổ</td>
<td colspan="4">OP</td>
<td colspan="5" rowspan="2">搬入予定日 <br />Dự kiến giao h&agrave;ng</td>
<td colspan="7" rowspan="2">モーター <br />制御盤位置 <br />Vị tr&iacute; motor / Hướng cuốn</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>オレンジ</td>
<td>クリーム（Ｍ２のみ）</td>
<td>グリーン（Ｍ２のみ）</td>
<td>バグバスター</td>
<td>BUG-BUSTER</td>
<td>トーメイ</td>
<td>オレンジ</td>
<td>角</td>
<td>ワイド（ミニのみ）</td>
<td>３点ＰＢＳ（防雨型）</td>
<td>プルスイッチ</td>
<td>ＯＡ－２０３Ｃ</td>
<td>ＯＡ－４５００Ｓ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="5">配線 <br />ケーブル</td>
<td>1点PBS、プルスイッチ、ＢＢＳ－１、ＨＰ１００投光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 2芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>ＨＰ100受光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 3芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>インテリセンサーＯＡ－４５００Ｓ，3点ＰＢＳ、小間口用センサ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 4芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>リミットスイッチ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 5芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>開閉器用延長ケーブル（モータケーブル）</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>2.0mm2 MVVS 3芯 (5ｍ 10m 15m 20m 25m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>その他/ Kh&aacute;c</td>
<td>&nbsp;</td>
<td colspan="20" rowspan="4">B&Oacute;C T&Aacute;CH V&Agrave; XUẤT H&Agrave;NG: ỐNG GEN, D&Acirc;Y ĐIỆN D&Agrave;I HƠN TI&Ecirc;U CHUẨN 1M MỖI LOẠI ĐỂ LẮP ĐẶT</td>
<td colspan="3" rowspan="8">（標準） <br />ＰＦ管 <br />呼ぶ径２８</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>パナフレキエース</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>ｍ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>速結コネクタ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="3">カーテン <br />Bạt</td>
<td colspan="3">フラップ</td>
<td colspan="6">有/C&oacute;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">防認シール</td>
<td colspan="6">無/Kh&ocirc;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">明かり窓 <br />Cửa sổ</td>
<td colspan="3">単位/vị tr&iacute;</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>ＰＦ管用サドル</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">バラスト数</td>
<td colspan="6">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">個数/Số lượng</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="12">製作合計連数 <br />Tổng số</td>
<td colspan="4">&nbsp;</td>
<td colspan="3">連 <br />Bộ</td>
<td colspan="21">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">工場受付確認 <br />Đ&atilde; nhận phiếu</td>
<td colspan="6">受付日 <br />Ng&agrave;y nhận</td>
<td colspan="10">サイン/ K&yacute; t&ecirc;n</td>
<td colspan="7">発送予定日 <br />Ng&agrave;y dự kiến gửi đi</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">月 <br />Th&aacute;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">日 <br />Ng&agrave;y</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4" rowspan="4">&nbsp;</td>
<td colspan="6" rowspan="4">&nbsp;</td>
<td colspan="10" rowspan="4">&nbsp;</td>
<td colspan="20" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーＭ２はエアセンサはつきません。障害物感知装置として光電管センサを標準装備。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー半透明クリアおよびバグバスターはＷ４ｍ&times;Ｈ４ｍまでです。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーケース色は、特に指定がない場合「シルキーホワイト　焼付塗装？」になります。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー明かり窓が標準以外の場合は製作依頼書に「特殊(custom)」と明記し、図面を必ず添付してください。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
                'created_at' => '2019-07-09 10:24:54',
                'updated_at' => '2019-07-09 10:24:54',
            ],

            [
                'id' => '14',
                'lang_id' => '3',
                'bind_key' => '5',
                'name' => 'Production requirements',
                'content' => '<table border="1" cellspacing="0">
<tbody>
<tr>
<td>&nbsp;</td>
<td>QUICK SHUTTER</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>CỬA CUỐN NHANH</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">EPE</td>
<td colspan="4" rowspan="2">契約済 <br />Tr&uacute;ng thầu</td>
<td colspan="4" rowspan="2">支店長 <br />Gi&aacute;m đốc chi nh&aacute;nh</td>
<td colspan="4" rowspan="2">マネジャー <br />Trưởng ph&ograve;ng</td>
<td colspan="4" rowspan="2">担当 <br />Người phụ tr&aacute;ch</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">R</td>
<td colspan="2">B</td>
<td>&nbsp;</td>
<td>製作依頼書</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>PHIẾU Y&Ecirc;U CẦU SẢN XUẤT</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="3">&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="8">No.　　　　　／　　　　　</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　受注№ <br />M&atilde; số đơn h&agrave;ng</td>
<td colspan="3">BVH</td>
<td>-</td>
<td colspan="9">&nbsp;</td>
<td>-</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　発注日 <br />Ng&agrave;y đặt h&agrave;ng</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">搬入予定日 <br />Ng&agrave;y dự kiến giao h&agrave;ng</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">工事日 <br />Ng&agrave;y thi c&ocirc;ng</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　契約先 <br />Đơn vị k&yacute; kết</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">ゼネコン <br />Nh&agrave; thầu ch&iacute;nh</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">ゼネコン担当者 <br />Người quản lý (nhà th&acirc;̀u)</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場名 <br />T&ecirc;n c&ocirc;ng tr&igrave;nh</td>
<td colspan="22">&nbsp;</td>
<td colspan="6">EPE企業担当者 <br />Người phụ tr&aacute;ch cty chế xuất</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場住所 <br />Địa chỉ c&ocirc;ng trường</td>
<td colspan="36">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">必要書類 <br />T&agrave;i liệu cần thiết</td>
<td colspan="36">出荷証明書　 要　 不要　　 　 　製品検査書　　 要　　 不要　　 工程写真　 　　 要　　 不要 <br />Chứng nhận xuất xưởng 　 Cần 　Kh&ocirc;ng cần Phiếu kiểm tra sản phẩm Cần Kh&ocirc;ng cần Ảnh tại c&ocirc;ng đoạn 　　Cần Kh&ocirc;ng cần</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">QSS　Ｎｏ．</td>
<td colspan="3" rowspan="2">Ｗ</td>
<td colspan="3" rowspan="2">Ｈ</td>
<td colspan="3" rowspan="2">連数 <br />Số bộ</td>
<td colspan="3" rowspan="2">Type</td>
<td colspan="5">シート色 M&agrave;u bạt</td>
<td colspan="4">窓 Cửa sổ</td>
<td colspan="4">OP</td>
<td colspan="5" rowspan="2">搬入予定日 <br />Dự kiến giao h&agrave;ng</td>
<td colspan="7" rowspan="2">モーター <br />制御盤位置 <br />Vị tr&iacute; motor / Hướng cuốn</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>オレンジ</td>
<td>クリーム（Ｍ２のみ）</td>
<td>グリーン（Ｍ２のみ）</td>
<td>バグバスター</td>
<td>BUG-BUSTER</td>
<td>トーメイ</td>
<td>オレンジ</td>
<td>角</td>
<td>ワイド（ミニのみ）</td>
<td>３点ＰＢＳ（防雨型）</td>
<td>プルスイッチ</td>
<td>ＯＡ－２０３Ｃ</td>
<td>ＯＡ－４５００Ｓ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="5">配線 <br />ケーブル</td>
<td>1点PBS、プルスイッチ、ＢＢＳ－１、ＨＰ１００投光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 2芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>ＨＰ100受光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 3芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>インテリセンサーＯＡ－４５００Ｓ，3点ＰＢＳ、小間口用センサ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 4芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>リミットスイッチ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 5芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>開閉器用延長ケーブル（モータケーブル）</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>2.0mm2 MVVS 3芯 (5ｍ 10m 15m 20m 25m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>その他/ Kh&aacute;c</td>
<td>&nbsp;</td>
<td colspan="20" rowspan="4">B&Oacute;C T&Aacute;CH V&Agrave; XUẤT H&Agrave;NG: ỐNG GEN, D&Acirc;Y ĐIỆN D&Agrave;I HƠN TI&Ecirc;U CHUẨN 1M MỖI LOẠI ĐỂ LẮP ĐẶT</td>
<td colspan="3" rowspan="8">（標準） <br />ＰＦ管 <br />呼ぶ径２８</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>パナフレキエース</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>ｍ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>速結コネクタ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="3">カーテン <br />Bạt</td>
<td colspan="3">フラップ</td>
<td colspan="6">有/C&oacute;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">防認シール</td>
<td colspan="6">無/Kh&ocirc;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">明かり窓 <br />Cửa sổ</td>
<td colspan="3">単位/vị tr&iacute;</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>ＰＦ管用サドル</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">バラスト数</td>
<td colspan="6">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">個数/Số lượng</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="12">製作合計連数 <br />Tổng số</td>
<td colspan="4">&nbsp;</td>
<td colspan="3">連 <br />Bộ</td>
<td colspan="21">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">工場受付確認 <br />Đ&atilde; nhận phiếu</td>
<td colspan="6">受付日 <br />Ng&agrave;y nhận</td>
<td colspan="10">サイン/ K&yacute; t&ecirc;n</td>
<td colspan="7">発送予定日 <br />Ng&agrave;y dự kiến gửi đi</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">月 <br />Th&aacute;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">日 <br />Ng&agrave;y</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4" rowspan="4">&nbsp;</td>
<td colspan="6" rowspan="4">&nbsp;</td>
<td colspan="10" rowspan="4">&nbsp;</td>
<td colspan="20" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーＭ２はエアセンサはつきません。障害物感知装置として光電管センサを標準装備。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー半透明クリアおよびバグバスターはＷ４ｍ&times;Ｈ４ｍまでです。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーケース色は、特に指定がない場合「シルキーホワイト　焼付塗装？」になります。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー明かり窓が標準以外の場合は製作依頼書に「特殊(custom)」と明記し、図面を必ず添付してください。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
                'created_at' => '2019-07-09 10:24:54',
                'updated_at' => '2019-07-09 10:24:54',
            ],

            [
                'id' => '15',
                'lang_id' => '4',
                'bind_key' => '5',
                'name' => '生産要件',
                'content' => '<table border="1" cellspacing="0">
<tbody>
<tr>
<td>&nbsp;</td>
<td>QUICK SHUTTER</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>CỬA CUỐN NHANH</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">EPE</td>
<td colspan="4" rowspan="2">契約済 <br />Tr&uacute;ng thầu</td>
<td colspan="4" rowspan="2">支店長 <br />Gi&aacute;m đốc chi nh&aacute;nh</td>
<td colspan="4" rowspan="2">マネジャー <br />Trưởng ph&ograve;ng</td>
<td colspan="4" rowspan="2">担当 <br />Người phụ tr&aacute;ch</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">R</td>
<td colspan="2">B</td>
<td>&nbsp;</td>
<td>製作依頼書</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>PHIẾU Y&Ecirc;U CẦU SẢN XUẤT</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="3">&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="4" rowspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="8">No.　　　　　／　　　　　</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　受注№ <br />M&atilde; số đơn h&agrave;ng</td>
<td colspan="3">BVH</td>
<td>-</td>
<td colspan="9">&nbsp;</td>
<td>-</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　発注日 <br />Ng&agrave;y đặt h&agrave;ng</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">搬入予定日 <br />Ng&agrave;y dự kiến giao h&agrave;ng</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">工事日 <br />Ng&agrave;y thi c&ocirc;ng</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　契約先 <br />Đơn vị k&yacute; kết</td>
<td colspan="10">&nbsp;</td>
<td colspan="7">ゼネコン <br />Nh&agrave; thầu ch&iacute;nh</td>
<td colspan="7">&nbsp;</td>
<td colspan="4">ゼネコン担当者 <br />Người quản lý (nhà th&acirc;̀u)</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場名 <br />T&ecirc;n c&ocirc;ng tr&igrave;nh</td>
<td colspan="22">&nbsp;</td>
<td colspan="6">EPE企業担当者 <br />Người phụ tr&aacute;ch cty chế xuất</td>
<td colspan="8">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">　現場住所 <br />Địa chỉ c&ocirc;ng trường</td>
<td colspan="36">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">必要書類 <br />T&agrave;i liệu cần thiết</td>
<td colspan="36">出荷証明書　 要　 不要　　 　 　製品検査書　　 要　　 不要　　 工程写真　 　　 要　　 不要 <br />Chứng nhận xuất xưởng 　 Cần 　Kh&ocirc;ng cần Phiếu kiểm tra sản phẩm Cần Kh&ocirc;ng cần Ảnh tại c&ocirc;ng đoạn 　　Cần Kh&ocirc;ng cần</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">QSS　Ｎｏ．</td>
<td colspan="3" rowspan="2">Ｗ</td>
<td colspan="3" rowspan="2">Ｈ</td>
<td colspan="3" rowspan="2">連数 <br />Số bộ</td>
<td colspan="3" rowspan="2">Type</td>
<td colspan="5">シート色 M&agrave;u bạt</td>
<td colspan="4">窓 Cửa sổ</td>
<td colspan="4">OP</td>
<td colspan="5" rowspan="2">搬入予定日 <br />Dự kiến giao h&agrave;ng</td>
<td colspan="7" rowspan="2">モーター <br />制御盤位置 <br />Vị tr&iacute; motor / Hướng cuốn</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>オレンジ</td>
<td>クリーム（Ｍ２のみ）</td>
<td>グリーン（Ｍ２のみ）</td>
<td>バグバスター</td>
<td>BUG-BUSTER</td>
<td>トーメイ</td>
<td>オレンジ</td>
<td>角</td>
<td>ワイド（ミニのみ）</td>
<td>３点ＰＢＳ（防雨型）</td>
<td>プルスイッチ</td>
<td>ＯＡ－２０３Ｃ</td>
<td>ＯＡ－４５００Ｓ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td colspan="5" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td colspan="3" rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td rowspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">右　左 <br />Phải Tr&aacute;i</td>
<td colspan="4" rowspan="2">内　外 <br />Trong Ngo&agrave;i</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="5">配線 <br />ケーブル</td>
<td>1点PBS、プルスイッチ、ＢＢＳ－１、ＨＰ１００投光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 2芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>ＨＰ100受光器</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 3芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>インテリセンサーＯＡ－４５００Ｓ，3点ＰＢＳ、小間口用センサ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 4芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>リミットスイッチ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>0.75mm2 VCTF 5芯 (5ｍ 10m 20m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>開閉器用延長ケーブル（モータケーブル）</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>2.0mm2 MVVS 3芯 (5ｍ 10m 15m 20m 25m)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>本</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>その他/ Kh&aacute;c</td>
<td>&nbsp;</td>
<td colspan="20" rowspan="4">B&Oacute;C T&Aacute;CH V&Agrave; XUẤT H&Agrave;NG: ỐNG GEN, D&Acirc;Y ĐIỆN D&Agrave;I HƠN TI&Ecirc;U CHUẨN 1M MỖI LOẠI ĐỂ LẮP ĐẶT</td>
<td colspan="3" rowspan="8">（標準） <br />ＰＦ管 <br />呼ぶ径２８</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>パナフレキエース</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>ｍ</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>速結コネクタ</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2" rowspan="3">カーテン <br />Bạt</td>
<td colspan="3">フラップ</td>
<td colspan="6">有/C&oacute;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">防認シール</td>
<td colspan="6">無/Kh&ocirc;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3" rowspan="2">明かり窓 <br />Cửa sổ</td>
<td colspan="3">単位/vị tr&iacute;</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>ＰＦ管用サドル</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>個</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3">バラスト数</td>
<td colspan="6">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">個数/Số lượng</td>
<td colspan="3">標準/ti&ecirc;u chuẩn</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="12">製作合計連数 <br />Tổng số</td>
<td colspan="4">&nbsp;</td>
<td colspan="3">連 <br />Bộ</td>
<td colspan="21">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4">工場受付確認 <br />Đ&atilde; nhận phiếu</td>
<td colspan="6">受付日 <br />Ng&agrave;y nhận</td>
<td colspan="10">サイン/ K&yacute; t&ecirc;n</td>
<td colspan="7">発送予定日 <br />Ng&agrave;y dự kiến gửi đi</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">月 <br />Th&aacute;ng</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">日 <br />Ng&agrave;y</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4" rowspan="4">&nbsp;</td>
<td colspan="6" rowspan="4">&nbsp;</td>
<td colspan="10" rowspan="4">&nbsp;</td>
<td colspan="20" rowspan="4">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーＭ２はエアセンサはつきません。障害物感知装置として光電管センサを標準装備。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー半透明クリアおよびバグバスターはＷ４ｍ&times;Ｈ４ｍまでです。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ーケース色は、特に指定がない場合「シルキーホワイト　焼付塗装？」になります。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>※注意ー明かり窓が標準以外の場合は製作依頼書に「特殊(custom)」と明記し、図面を必ず添付してください。</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>',
                'created_at' => '2019-07-09 10:24:54',
                'updated_at' => '2019-07-09 10:24:54',
            ],

        ];

        foreach($data as $item) 
        {
            $this->saveData("excel_templates_language", $item);
        }
    }

}