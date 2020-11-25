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
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class ProductExport implements WithEvents, FromView
{
    /**
     * @return array
     */
    private $orders;
    private $productions;
    public function __construct($order, $product, $quotation)
    {
        $this->order     = $order;
        $this->product   = $product;
        $this->quotation = $quotation;
    }

    public function view(): View
    {
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
        $this->productions            = Orders:: as ('tbl1')->join($QuotationTBL . " as tbl2", "tbl1.quotation_id", "=", "tbl2.id")
            ->join($QuotationDetailsTBL . " as tbl3", "tbl3.quotation_id", "=", "tbl2.id")
            ->join(DB::Raw('(select ttbl1.* from quotation_detail_items AS ttbl1 group by ttbl1.item_id ,ttbl1.detail_id) as tbl4'), function ($q) {
                $q->on("tbl4.detail_id", "=", "tbl3.id");
            })
            ->join($MstitemTBL . " as tbl5", "tbl5.ItemId", "=", "tbl4.item_id")
            ->join($MstitempriceTBL . " as tbl6", "tbl6.ItemId", "=", "tbl5.ItemId")
            ->join($MstclassTBL . " as tbl7", "tbl7.ClassKey", "=", "tbl6.GroupClassKey")
            ->leftjoin($MstitemclassTBL . " as tbl8", "tbl8.ItemClassId", "=", "tbl5.ItemClassId")
            ->where([
                ["tbl1.id", "=", $this->order->id],
                ["tbl7.ClassKey", "=", $this->product->ClassKey],
                ["tbl7.Class", "=", $m->value],
            ])
            ->select(DB::Raw('tbl8.*,SUM(tbl4.width) as W,SUM(tbl4.height) as H, SUM(tbl4.quantity) as Q , tbl5.ItemName'))
            ->groupby('tbl8.ItemClassId')
            ->orderby('tbl8.DispOrder')
            ->orderby('tbl8.ItemClassId')
            ->get();
        $data["QuotationDetails"] = $this->productions;
        return view('orders.product-download', $data);
    }
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class   => function (AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $event->sheet->getParent()->getDefaultStyle()->getFont()->setSize(12);
                $event->sheet->getParent()->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $columnFix = 43 + $this->productions->count() * 2;
                for ($i = 1; $i <= $columnFix; $i++) {
                    $event->sheet->styleCells(
                        'A' . $i . ':R' . $i . '',
                        [
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                        ]
                    );
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(30);

                }
            },
        ];
    }
}
