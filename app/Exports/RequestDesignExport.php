<?php

namespace App\Exports;

use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\Orders;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetails;
use App\Http\Models\Quotations;
use App\Http\Models\WebConfigs;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class RequestDesignExport implements WithEvents
{
    /**
     * @return array
     */
    private $orders;

    public function __construct(Orders $Order)
    {
        $this->file        = public_path('/uploads/excels/design-request.xlsx');
        $this->order       = $Order;
        $this->spreadsheet = null;
        $MstclassTBL       = Mstclass::getTableName();
        $MstitemTBL        = Mstitem::getTableName();
        $tbl1              = QuotationDetails::getTableName();
        $tbl2              = Quotations::getTableName();
        $tbl3              = QuotationDetailItems::getTableName();
        $m                 = WebConfigs::where('key', '=', 'ClassProduct')->first();
        $this->products    = @\App\Http\Models\Mstclass::
            join($tbl1, $tbl1 . ".product_id", '=', $MstclassTBL . ".ClassKey")
            ->where(
                [
                    [$MstclassTBL . ".Class", "=", $m->value],
                    [$tbl1 . ".quotation_id", "=", $this->order->quotation_id],
                ]
            )
            ->join(DB::Raw("(select *,CONCAT(SUM(width) * SUM(height),'m2')/1000000 AS acreage from " . $tbl3 . " group by detail_id) as tbl2"), function ($q) use ($tbl1) {
                $q->on('tbl2.detail_id', '=', $tbl1 . ".id");
            })
            ->select([
                $MstclassTBL . ".*",
                DB::Raw("SUM(" . $tbl1 . ".quantity) as NUMQ"),
                'tbl2.acreage',
            ])

            ->orderby($MstclassTBL . ".Class", "ASC")
            ->groupby($MstclassTBL . ".ClassKey")
            ->get();
    }
    public function getFilename()
    {
        return $this->order->order_number;
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
                $quotation = $seff->order->quotation;
                $iA        = 1;
                $seff->spreadsheet->removeSheetByIndex(1);
                $sheet = $event->sheet->byIndex($seff->spreadsheet, 0);
                foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                    $sheet->getDelegate()->getRowDimension($iA)->setRowHeight(30);
                    $iA++;
                }
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $sheet->getParent()->getDefaultStyle()->getFont()->setSize(11);
                $sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $sheet->setValue('E4', $seff->order->order_number);
                $sheet->setValue('E5', $quotation->construction->name);
                $sheet->setValue('E9', $quotation->construction->name);
                $sheet->setValue('Y5', $quotation->customer->authorized_name);
                $sheet->setValue('Y9', $quotation->customer->owner);
                $indexF = 13;
                $sheet->insertNewRowBefore($indexF, ceil($seff->products->count() / 2));
                if ($seff->products):
                    foreach ($seff->products as $key => $value):
                        if (($key + 1) % 2 == 0) {
                            $sheet->mergeCells('Q' . $indexF . ':Z' . $indexF);
                            $sheet->setValue(('Q' . $indexF), $value->ClassFullName);
                            $sheet->mergeCells('AA' . $indexF . ':AC' . $indexF);
                            $sheet->setValue(('AA' . $indexF), $value->NUMQ);
                            $sheet->mergeCells('AD' . $indexF . ':AF' . $indexF);
                            $sheet->setValue(('AD' . $indexF), $value->acreage . " (m2)");
                        } else {
                            $sheet->mergeCells('A' . $indexF . ':J' . $indexF);
                            $sheet->setValue(('A' . $indexF), $value->ClassFullName);
                            $sheet->setValue(('K' . $indexF), $value->NUMQ);
                            $sheet->mergeCells('K' . $indexF . ':M' . $indexF);
                            $sheet->setValue(('N' . $indexF), $value->acreage . " (m2)");
                            $sheet->mergeCells('N' . $indexF . ':P' . $indexF);
                        }
                        $sheet->getRowDimension($indexF)->setRowHeight(20);
                        if (($key + 1) % 2 == 0) {
                            $indexF++;
                        }
                    endforeach;
                    if ($seff->products->count() % 2 != 0) {
                        $sheet->mergeCells('Q' . $indexF . ':Z' . $indexF);
                        $sheet->mergeCells('AA' . $indexF . ':AC' . $indexF);
                        $sheet->mergeCells('AD' . $indexF . ':AF' . $indexF);
                    }
                    $sheet->styleCells('A' . 13 . ':AF' . $indexF,
                        [
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                                'bottom'     => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                        ]
                    );
                endif;
                $indexF = ceil($seff->products->count() / 2) + 25;
                $price  = round($quotation->total / 100000) * 100000;
                $sheet->setValue(('G' . $indexF), number_format($price , 0, ".", ",") . 'VND');
            },
        ];
    }
}
