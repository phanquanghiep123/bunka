<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use DB;
class AcceptanceContract implements WithEvents
{
    use Exportable;
    private $file        = "";
    private $spreadsheet = null;
    public function __construct($order)
    {
        $this->file      = public_path('/uploads/excels/download-acceptance.xlsx');
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
                $sheet->setValue('D6',$seff->order->order_number );
                $sheet->setValue('D7',$construction->name);
            },
            AfterExport::class => function (AfterExport $event) use ($seff) {
            },
        ];
    }

    
}