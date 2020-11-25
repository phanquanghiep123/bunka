<?php

namespace App\Exports;

use App\Http\Models\Quotations;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Concerns\Exportable;
class DownloadSpecialQuotation implements WithEvents
{
    /**
     * @return array
     */
    use Exportable;
    public function __construct(Quotations $quotation)
    {
        $this->file        = public_path('/uploads/excels/download-special-quotation.xlsx');
        $this->quotation   = $quotation;
        $this->spreadsheet = null;
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
                $iA    = 1;
                $sheet1 = $event->sheet->byIndex($seff->spreadsheet, 0);
                $sheet2 = $event->sheet->byIndex($seff->spreadsheet,1);
                $sheet3 = $event->sheet->byIndex($seff->spreadsheet,2);
                foreach (range('A', $sheet1->getHighestDataColumn()) as $col) {
                    $sheet1->getDelegate()->getRowDimension($iA)->setRowHeight(30);
                    $iA++;
                }
                $iA = 1;
                foreach (range('A', $sheet2->getHighestDataColumn()) as $col) {
                    $sheet2->getDelegate()->getRowDimension($iA)->setRowHeight(30);
                    $iA++;
                }
                $sheet1->getParent()->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet1->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet1->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet1->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $sheet1->getParent()->getDefaultStyle()->getFont()->setSize(11);
                $sheet1->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                
                $sheet1->setValue('B3', $seff->quotation->customer->date_start);
                if(@$seff->quotation->construction)
                	$sheet1->setValue('B4', $seff->quotation->construction->name);
                $sheet1->setValue('B5', $seff->quotation->customer->authorized_name);
                $sheet1->setValue('C12', $seff->quotation->total);
                $sheet1->setValue('C16', $seff->quotation->details->sum('installfee'));
                $sheet1->setValue('C19', $seff->quotation->details->sum('inlandfreightfee'));

                $sheet1->getStyle('C16')->getNumberFormat()->setFormatCode('#,##0,00');
                $sheet1->getStyle('C19')->getNumberFormat()->setFormatCode('#,##0,00');

                $sheet2->getParent()->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet2->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet2->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet2->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $sheet2->getParent()->getDefaultStyle()->getFont()->setSize(11);
                $sheet2->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                
                $sheet2->setValue('B3', $seff->quotation->customer->date_start);
                if(@$seff->quotation->construction)
                	$sheet2->setValue('B4', $seff->quotation->construction->name);
                $sheet2->setValue('B5', $seff->quotation->customer->authorized_name);
                $sheet2->setValue('C12', $seff->quotation->total);
                $sheet2->setValue('C17', $seff->quotation->details->sum('installfee'));
                $sheet2->setValue('C20', $seff->quotation->details->sum('inlandfreightfee'));
                $sheet2->getStyle('C17')->getNumberFormat()->setFormatCode('#,##0,00');
                $sheet2->getStyle('C20')->getNumberFormat()->setFormatCode('#,##0,00');
                $sheet2->getStyle('C16')->getNumberFormat()->setFormatCode('#,##0,00');
                $sheet2->getStyle('C19')->getNumberFormat()->setFormatCode('#,##0,00');
                $seff->spreadsheet->removeSheetByIndex(3);
            },  
        ];
    }
    
}
