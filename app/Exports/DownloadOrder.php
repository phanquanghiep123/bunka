<?php

namespace App\Exports;
use App\Http\Models\Orders;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Writer;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Reader;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

use DB;

class DownloadOrder implements WithEvents
{
    /**
     * @return array
    */
    use Exportable;

    private $orders;
    private $file        = "";
    private $spreadsheet = null;

    public function __construct($orders)
    {
        $this->file   = public_path('/uploads/excels/main-list.xlsx');
        $this->orders = $orders;
    }

    public function registerEvents(): array
    {
        $seff = $this;
        return [
            BeforeExport::class => function (BeforeExport $event) use ($seff) {
                $spreadsheet       = IOFactory::load($seff->file);
                $seff->spreadsheet = $event->writer->setSpreadsheet($spreadsheet);
            },
            AfterSheet::class  => function (AfterSheet $event) use ($seff) {
                $iA    = 1;
                $sheet = $event->sheet->byIndex($seff->spreadsheet, 0);
                foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                    $sheet->getDelegate()->getRowDimension($iA);//->setRowHeight(30);
                    $iA++;
                }
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $sheet->getParent()->getDefaultStyle()->getFont()->setSize(12);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                

                if($this->orders != null){
                    $indexF = 7;
                    foreach($this->orders as $order) {
                        //Thứ tự xếp hạng
                        $sheet->setValue('A'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tình hình
                        $sheet->setValue('B'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Ngày trúng thầu
                        $sheet->setValue('C'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Ngày sửa đổi
                        $sheet->setValue('D'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Mã trúng thầu
                        $sheet->setValue('E'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tên khách hàng
                        $sheet->setValue('F'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tên công trình
                        $sheet->setValue('G'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Người quản lý
                        $sheet->setValue('H'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tiền trúng thầu (VND)
                        $sheet->setValue('I'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tên sản phẩm
                        $sheet->setValue('J'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Chi phí sản xuất
                        $sheet->setValue('K'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Chi phí sản xuất ko qua nhà máy
                        $sheet->setValue('L'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Lắp đặt
                        $sheet->setValue('M'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Chi phí lắp đặt sản phẩm mua ngoài
                        $sheet->setValue('N'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Vận chuyển
                        $sheet->setValue('O'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //CP khác
                        $sheet->setValue('P'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Lợi nhuận phòng kinh doanh VND
                        $sheet->setValue('Q'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Lợi nhuận phòng kinh doanh (%)
                        $sheet->setValue('R'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Tháng dự định hoàn công
                        $sheet->setValue('S'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Thi công hoàn thành
                        $sheet->setValue('T'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Hợp đồng
                        $sheet->setValue('U'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Không bao gồm thuế VAT
                        $sheet->setValue('V'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Bao gồm số thuế VAT
                        $sheet->setValue('W'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền ký gửi đến tháng trước
                        $sheet->setValue('X'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Ngày thanh toán
                        $sheet->setValue('Y'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền thanh toán tháng này
                        $sheet->setValue('Z'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền ký gửi đến tháng này
                        $sheet->setValue('AA'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //% Tỉ lệ nhận tiền
                        $sheet->setValue('AB'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền chưa thanh toán
                        $sheet->setValue('AC'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Ngày thanh toán
                        $sheet->setValue('AD'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền thanh toán
                        $sheet->setValue('AE'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //Số tiền chưa nhận
                        $sheet->setValue('AF'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        //
                        $sheet->setValue('AG'.$indexF,number_format($grand_sub_total, 0, ".", ",") . 'VND');
                        
                        $indexF++;
                    }
                }
            }
        ];
    }
}
