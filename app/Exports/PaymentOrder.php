<?php

namespace App\Exports;
use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\Mstitemclass;
use App\Http\Models\Mstitemprice;
use App\Http\Models\Orders;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetailOtherItems;
use App\Http\Models\QuotationDetails;
use App\Http\Models\Quotations;
use App\Http\Models\WebConfigs;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use DB;
class PaymentOrder implements WithEvents
{
    use Exportable;
    private $file        = "";
    private $spreadsheet = null;
    public function __construct($order)
    {
        $this->file      = public_path('/uploads/excels/payment-order.xlsx');
        $this->order     = $order;
        $this->quotation = $this->order->quotation;

    }
    public function registerEvents(): array
    {
        $seff = $this;
        return [
            BeforeExport::class => function (BeforeExport $event) use ($seff) {
                $spreadsheet       = IOFactory::load($seff->file);
                $seff->spreadsheet = $event->writer->setSpreadsheet($spreadsheet);
            },
            AfterSheet::class   => function (AfterSheet $event) use ($seff) {
                $construction   = $seff->quotation->construction;
                $seff->spreadsheet->removeSheetByIndex(1);
                $sheet = $event->sheet->byIndex($seff->spreadsheet,0);
                $sheet->setValue('D8', $construction->name);
                $sheet->setValue('D9', $seff->order->order_number);
                $sheet->setValue('D10', $seff->order->receiving_order_date);
                $sheet->setValue('D12', $seff->order->total);
                $sheet->getStyle('D12')->getNumberFormat()->setFormatCode('#,##0,00');
            },
            AfterExport::class => function (AfterExport $event) use ($seff) {
            },
        ];
    }

    
}
