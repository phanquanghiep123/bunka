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
class ProductionRequirements implements WithEvents
{
    use Exportable;
    private $file        = "";
    private $spreadsheet = null;
    public function __construct($order, $product, $quotation)
    {
        $this->file      = public_path('/uploads/excels/productionrequirements.xlsx');
        $this->quotation = $quotation;
        $this->order     = $order;
        $this->product   = $product; 
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
                $m                            = \App\Http\Models\WebConfigs::where('key', '=', 'ClassProduct')->first();
                $tbl2                         = Quotations::getTableName();
                $MstclassTBL                  = Mstclass::getTableName();
                $MstitemclassTBL              = Mstitemclass::getTableName();
                $MstitemTBL                   = Mstitem::getTableName();
                $MstitempriceTBL              = Mstitemprice::getTableName();
                $QuotationDetailsTBL          = QuotationDetails::getTableName();
                $QuotationDetailItemsTBL      = QuotationDetailItems::getTableName();
                $QuotationTBL                 = Quotations::getTableName();
                $QuotationDetailOtherItemsTBL = QuotationDetailOtherItems::getTableName();
                $OrdersTBL                    = Orders::getTableName();
                $productions            = Orders:: as ('tbl1')->join($QuotationTBL . " as tbl2", "tbl1.quotation_id", "=", "tbl2.id")
                    ->join($QuotationDetailsTBL . " as tbl3", "tbl3.quotation_id", "=", "tbl2.id")
                    ->join(DB::Raw('(select ttbl1.* from quotation_detail_items AS ttbl1 group by ttbl1.item_id ,ttbl1.detail_id) as tbl4'), function ($q) {
                        $q->on("tbl4.detail_id", "=", "tbl3.id");
                    })
                    ->join($MstitemTBL . " as tbl5", "tbl5.ItemId", "=", "tbl4.item_id")
                    ->join($MstitempriceTBL . " as tbl6", "tbl6.ItemId", "=", "tbl5.ItemId")
                    ->join($MstclassTBL . " as tbl7", "tbl7.ClassKey", "=", "tbl6.GroupClassKey")
                    ->leftjoin($MstitemclassTBL . " as tbl8", "tbl8.ItemClassId", "=", "tbl5.ItemClassId")
                    ->where([
                        ["tbl1.id", "=", @$seff->order->id],
                        ["tbl7.ClassKey", "=", $seff->product->ClassKey],
                        ["tbl7.Class", "=", $m->value],
                    ])
                    ->select(DB::Raw('
                        tbl8.*,SUM(tbl4.width) as W,
                        SUM(tbl4.height) as H, 
                        SUM(tbl4.quantity) as Q , 
                        tbl5.ItemName,
                        tbl3.code'
                    ))
                    ->groupby('tbl5.ItemId')
                    ->groupby('tbl8.ItemClassId')
                    ->orderby('tbl8.DispOrder')
                    ->orderby('tbl8.ItemClassId')
                    ->get();
                $seff->spreadsheet->removeSheetByIndex(1);
                $sheet = $event->sheet->byIndex($seff->spreadsheet,0);
                $sheet->setValue('I8', @$seff->order->order_number);
                $sheet->setValue('E9', @$seff->order->receiving_order_date);
                $sheet->setValue('E10','?');
                $sheet->setValue('V9', @$seff->order->planned_delivery_date);
                $sheet->setValue('AG9', @$seff->order->planned_installation_date);
                $sheet->setValue('AG10', $seff->quotation->customer->owner);
                $sheet->setValue('E11','?');
                $sheet->setValue('V10', $seff->quotation->customer->authorized_name);
                $sheet->setValue('E11', $seff->quotation->construction->name);
                $sheet->setValue('E12', $seff->quotation->construction->address);
                $indexF = 17;
                $sheet->insertNewRowBefore($indexF,$productions->count() * 2);
                $indexF = 17;
                foreach($productions as $key => $value){
                    $sheet->mergeCells('A'.$indexF.':C'.($indexF + 1).'');

                    $sheet->setValue('A'.$indexF,$value->code);
                    $sheet->mergeCells('D'.$indexF.':F'.($indexF + 1).'');

                    $sheet->setValue('D'.$indexF,$value->W);
                    $sheet->mergeCells('G'.$indexF.':I'.($indexF + 1).'');

                    $sheet->setValue('G'.$indexF,$value->H);

                    $sheet->mergeCells('J'.$indexF.':L'.($indexF + 1).'');

                    $sheet->setValue('J'.$indexF,$value->Q);

                    $sheet->mergeCells('M'.$indexF.':O'.($indexF + 1).'');

                    $sheet->setValue('M'.$indexF,$value->ItemClassName);

                    $sheet->mergeCells('P'.$indexF.':P'.($indexF + 1).'');

                    $sheet->setValue('P'.$indexF,'?');

                    $sheet->mergeCells('Q'.$indexF.':Q'.($indexF + 1).'');

                    $sheet->setValue('Q'.$indexF,'?');

                    $sheet->mergeCells('R'.$indexF.':R'.($indexF + 1).'');

                    $sheet->setValue('R'.$indexF,'?');

                    $sheet->mergeCells('S'.$indexF.':S'.($indexF + 1).'');

                    $sheet->setValue('S'.$indexF,'?');

                    $sheet->mergeCells('T'.$indexF.':T'.($indexF + 1).'');

                    $sheet->setValue('T'.$indexF,'?');

                    $sheet->mergeCells('U'.$indexF.':U'.($indexF + 1).'');

                    $sheet->setValue('U'.$indexF,'?');

                    $sheet->mergeCells('V'.$indexF.':V'.($indexF + 1).'');

                    $sheet->setValue('V'.$indexF,'?');

                    $sheet->mergeCells('W'.$indexF.':W'.($indexF + 1).'');

                    $sheet->setValue('W'.$indexF,'?');

                    $sheet->mergeCells('X'.$indexF.':X'.($indexF + 1).'');

                    $sheet->setValue('X'.$indexF,'?');

                    $sheet->mergeCells('Y'.$indexF.':Y'.($indexF + 1).'');

                    $sheet->setValue('Y'.$indexF,'?');

                    $sheet->mergeCells('Z'.$indexF.':Z'.($indexF + 1).'');

                    $sheet->setValue('Z'.$indexF,'?');

                    $sheet->mergeCells('AA'.$indexF.':AA'.($indexF + 1).'');

                    $sheet->setValue('AA'.$indexF,'?');

                    $sheet->mergeCells('AB'.$indexF.':AB'.($indexF + 1).'');

                    $sheet->setValue('AB'.$indexF,'?');

                    $sheet->mergeCells('AC'.$indexF.':AG'.($indexF + 1).'');

                    $sheet->setValue('AC'.$indexF,'?');
                    $sheet->mergeCells('AH'.$indexF.':AJ'.($indexF + 1).'');

                    $sheet->setValue('AH'.$indexF,'?');

                    $sheet->mergeCells('AK'.$indexF.':AN'.($indexF + 1).'');

                    $sheet->setValue('AK'.$indexF,'?');

                    $sheet->getRowDimension($indexF)->setRowHeight(20);
                    $sheet->getRowDimension($indexF + 1)->setRowHeight(20);
                    $indexF+= 2;
                }
                $sheet->styleCells('A' . 17 . ':AN' . $indexF,
                   [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $sheet->setValue('A1',$seff->product->ClassFullName);
                $sheet->setTitle($seff->product->ClassFullName);
            },
        ];
    }

    
}
