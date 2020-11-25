<?php
namespace App\Exports;

use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\Mstitemclass;
use App\Http\Models\Mstitemprice;
use App\Http\Models\Orders;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetailOtherItems;
use App\Http\Models\QuotationOtherDetails;
use App\Http\Models\QuotationDetails;
use App\Http\Models\Quotations;
use App\Http\Models\QuotationRates;
use App\Http\Models\WebConfigs;
use App\Http\Helper\Common;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class QuotationExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct($quotation, $langID)
    {
        $this->quotation = $quotation;
        $this->lang      = $langID;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
    	$tbl0     = QuotationOtherDetails::getTableName();
        $tbl1     = QuotationDetails::getTableName();
        $tbl2     = Quotations::getTableName();
        $tbl4     = Mstclass::getTableName();
        $tbl3     = Mstitem::getTableName();
        $tbl5     = QuotationDetailOtherItems::getTableName();
        $m        = WebConfigs::where('key', '=', 'ClassProduct')->first();
        $products = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
            ->join($tbl4, $tbl4 . ".ClassKey", "=", $tbl1 . ".product_id")
            ->where(
                [
                    [$tbl4 . ".Class", "=", $m->value],
                    [$tbl1 . ".quotation_id", "=", $this->quotation->id],
                ]
            )
            ->select([
                $tbl4 . ".*",
                $tbl1 . ".*",
                DB::Raw("SUM(" . $tbl1 . ".quantity) as QP,
                    SUM(" . $tbl1 . ".saleprice) as SP,
            		SUM(" . $tbl1 . ".productprice*" . $tbl1 . ".quantity) as P,
            		0 AS OP,
            		SUM(" . $tbl1 . ".plus_price*" . $tbl1 . ".quantity) as subtotal_each_price,
            		SUM(" . $tbl1 . ".price) as Price,
                    SUM(" . $tbl1 . ".total) as PP,
                    SUM(" . $tbl1 . ".discount) as DP,
                    SUM(" . $tbl1 . ".installfee) as IFP,
                    SUM(" . $tbl1 . ".inlandfreightfee) as IFFP,
                    SUM(" . $tbl1 . ".installationqsmini) as ISP,
                    SUM(" . $tbl1 . ".productprice) as PPP"
                ),
            ])
            ->orderby($tbl4 . ".Class", "ASC")
            ->groupby($tbl4 . ".ClassKey")
            ->get();
        
        $products_other = Quotations::join($tbl0, $tbl0 . ".quotation_id", "=", $tbl2 . ".id")
            ->where(
                [
                    [$tbl0 . ".quotation_id", "=", $this->quotation->id],
                ]
            )
            ->select([
                $tbl0 . ".*"
            ])
            ->get();

        $sheets = [
            new SheetReceiptExports($this->quotation,$this->lang),
            new SheetBefore($this->quotation, $products, $products_other, $this->lang),
        ];
        foreach ($products as $key => $value) {
            $sheets[] = new SheetDetail($this->quotation, $value->ClassKey, $this->lang);
        }
        return $sheets;
    }

}

class SheetBefore implements FromView, WithTitle, WithEvents
{
    public function __construct($quotation, $products, $products_other, $langID)
    {
        $this->quotation = $quotation;
        $this->products  = $products;
        $this->products_other  = $products_other;
        $this->lang      = $langID;
    }
    /**
     * @return Builder
     */

    public function view(): View
    {

        $data['html']  = "";
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", '002')->first();
        if ($ExcelTemplate) {
            $data['html'] = $ExcelTemplate->language($this->lang)->content;
            $argT         = explode('<!--[GetData]-->', $data['html']);
            if (@$argT[1]) {
                $argT         = explode('<!--[/GetData]-->', $argT[1]);
                $replaceKEY   = '<!--[GetData]-->' . $argT[0] . '<!--[/GetData]-->';
                $data['html'] = str_replace($replaceKEY, '', $data['html']);
            }
        }
        return view('quotations.beforeexport', $data);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return "Quotation";
    }
    public function registerEvents(): array
    {
        $products  = $this->products;
        $products_other = $this->products_other;
        $quotation = $this->quotation;
        return [
            BeforeExport::class => function (BeforeExport $event) use ($products) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class   => function (AfterSheet $event) use ($products, $products_other, $quotation) {
            	$round_number = 1;
		    	$rates = QuotationRates::where("quotation_id" ,"=", $quotation->id)->where("is_default" ,"=", "1")->first();
		    	if (@$rates->name == "VND") {
		        	$round_number = -3;
		        }
            	
                $iA = 1;
                foreach (range('A', $event->sheet->getHighestDataColumn()) as $col) {
                    $event->sheet->getDelegate()->getRowDimension($iA)->setRowHeight(20);
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                    $iA++;
                }
                $indexF = 1;
                $event->sheet->setValue(('B' . $indexF), $quotation->quotation_number);
                $indexF++;
                $event->sheet->setValue(('B' . $indexF), $quotation->customer->authorized_name . ' - ' . $quotation->customer->code);
                $indexF++;
                $event->sheet->setValue(('B' . $indexF), $quotation->project);
                $indexF++;
                $event->sheet->setValue(('B' . $indexF), date('d/m/Y', strtotime($quotation->date_start)));
                $indexF++;
                if(@$quotation->construction){
                    $event->sheet->setValue(('F' . $indexF), $quotation->construction->address);
                    $indexF++;
                    $event->sheet->setValue(('F' . $indexF), $quotation->construction->phone);
                    $indexF++;
                    $event->sheet->setValue(('F' . $indexF), $quotation->construction->fax);
                }
                $event->sheet->styleCells('A10:S10',
                    [
                        'font'      => [
                            'bold' => true,
                            'size' => 24,
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],

                    ]
                );
                $event->sheet->styleCells('A16:H16',
                    [

                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],

                    ]
                );
                $event->sheet->getDelegate()->getRowDimension(16)->setRowHeight(30);
                $indexF = 17;
				
				// Tính lại do chuối
				$sub_total = 0;
				
                $row_index = 0;
                $other_price_each_products = 0;
                foreach ($products as $key => $value) {
                	$row_index++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue(('A' . $indexF), ($row_index));
                    $event->sheet->setValue(('B' . $indexF), $value->ClassFullName);
                    
                    // Tinh gia ngoai he thong
                    $production_other_detail = 0;
                    if ($value->OP != null && $value->OP != '') {
                    	$production_other_detail = $value->OP;
                    }
                    // Gia san pham
                    $production_price = $value->P + $production_other_detail;
                    // Tổng giá tiền của sản phẩm ngoài của chủng loại sản phẩm do bunka sản xuất
                    $other_price_each_products += $production_other_detail;
                    
                    $productprice     = $value->PPP;
                    $installfee       = $value->IFP;
                    $inlandfreightfee = $value->IFFP;
                    $saleprice        = $value->SP;
                    $price        	  = $value->Price;
                    
                    // $production_price = $value->Price - $value->IFP - $value->IFFP;
                    
                    // $price            = $value->PP;
                    // Total
                    $sub_row_price = $production_price + $installfee + $inlandfreightfee - $value->DP;
                    $sub_total += $sub_row_price;
                    
                    // $event->sheet->setValue(('C' . $indexF), $production_price);subtotal_each_price
                    $event->sheet->setValue(('C' . $indexF), Common::round_number($value->subtotal_each_price,$round_number));
                    	
                    $event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('D' . $indexF), Common::round_number($installfee,$round_number) );
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    
                    $event->sheet->setValue(('E' . $indexF),Common::round_number($value->IFFP,$round_number));
                    
                    $event->sheet->setValue(('F' . $indexF), Common::round_number($value->DP,$round_number) );
                    if ($value->DP != null && trim($value->DP) != '' && $value->DP > 0) {
                    	$event->sheet->getStyle('F'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    } 
                    
                    $event->sheet->setValue(('G' . $indexF), $value->QP);
                    $event->sheet->getStyle('G'.$indexF)->getNumberFormat()->setFormatCode('0');
                    
                    $event->sheet->setValue(('H' . $indexF), Common::round_number($value->PP,$round_number)); //$sub_row_price Total each row
                    $event->sheet->getStyle('H'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    
                    $event->sheet->getStyle('A' . $indexF . ':H' . $indexF)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
                    $event->sheet->setValue(('E' . $indexF),Common::round_number($inlandfreightfee,$round_number));
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                        [
                            'font'    => [
                                'bold' => false,
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                            'alignment' => [
	                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
	                        ]
                        ]
                    );
                    $event->sheet->styleCells('A' . $indexF . ':H' . $indexF,
                        [
                            'font'    => [
                                'bold' => false,
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('B' . $indexF ,
                        [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
	                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
	                        ]
                        ]
                    );

                    $indexF++;
                }
                
                // 2019.09.15: Other products
                foreach ($products_other as $key => $value) {
                	$row_index++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue(('A' . $indexF), ($row_index));
                    $event->sheet->setValue(('B' . $indexF), $value->name);
                    $productprice     = $value->price;
                    $price            = $value->total;
                    
                    $sub_total += $price;
                    
                    $event->sheet->setValue(('C' . $indexF), Common::round_number($productprice,$round_number));
                    $event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('D' . $indexF), "" );
                    //$event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('0');
                    $event->sheet->setValue(('F' . $indexF), "");
                    $event->sheet->setValue(('G' . $indexF), "");
                    // $event->sheet->getStyle('F'.$indexF)->getNumberFormat()->setFormatCode('0');
                    $event->sheet->setValue(('H' . $indexF), Common::round_number($price,$round_number));
                    $event->sheet->getStyle('H'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->getStyle('A' . $indexF . ':H' . $indexF)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
                    $event->sheet->setValue(('E' . $indexF),"");
                    //$event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('0');

                    $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                        [
                            'font'    => [
                                'bold' => false,
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                            'alignment' => [
	                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
	                        ]
                        ]
                    );
                    $event->sheet->styleCells('A' . $indexF . ':H' . $indexF,
                        [
                            'font'    => [
                                'bold' => false,
                            ],
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('B' . $indexF ,
                        [
                            'font' => [
                                'bold' => true,
                            ],
                            'alignment' => [
	                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
	                        ]
                        ]
                    );

                    $indexF++;
                }
                
                // Tính toán subtotal
                // Thuế VAT
                // Tính GRAND TOTAL
                // Tính discount
                // Tính TOTAL
                // $sub_total = $quotation->sub_total;// + $other_price_each_products - $quotation->other_price;
                $discount = $quotation->discount;
                $sub_total = $quotation->sub_total;
                $grand_total = $quotation->grand_sub_total;
                $tax_price = $quotation->tax_price;
                $total = $quotation->total;

                $oldindexF = $indexF;
                $row_index++;
                $event->sheet->setValue(('A' . $indexF), $row_index);
                $event->sheet->getDelegate()->getRowDimension($indexF)->setRowHeight(30);
                $event->sheet->setValue('C' . $indexF,Common::round_number($sub_total,$round_number));
                $event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->styleCells('A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );

                $event->sheet->styleCells('B' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );

                $indexF++;
                $row_index++;
                $event->sheet->setValue(('A' . $indexF), $row_index);
                $event->sheet->getDelegate()->getRowDimension($indexF)->setRowHeight(30);
                $event->sheet->setValue('C' . $indexF,Common::round_number($discount,$round_number) );
                if ($quotation->discount > 0)
					$event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');

				$event->sheet->styleCells('A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('B' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ]

                    ]
                );
                $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],
                    ]
                );

                $indexF++;
                $row_index++;
                $event->sheet->setValue(('A' . $indexF), $row_index);
                $event->sheet->getDelegate()->getRowDimension($indexF)->setRowHeight(30);
                // 2019.09.16
                $event->sheet->setValue('C' . $indexF, Common::round_number($grand_total,$round_number));
                $event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->styleCells('A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('B' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],

                    ]
                );

                $indexF++;
                $row_index++;
                $event->sheet->setValue(('A' . $indexF), $row_index);
                $event->sheet->getDelegate()->getRowDimension($indexF)->setRowHeight(30);
                
                $event->sheet->setValue('C' . $indexF, Common::round_number($tax_price,$round_number) );
                if ($quotation->tax_price > 0)
                	$event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->styleCells('A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('B' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );

                $indexF++;
                $row_index++;
                $event->sheet->setValue(('A' . $indexF), $row_index);
                $event->sheet->getDelegate()->getRowDimension($indexF)->setRowHeight(30);
                // 
                $event->sheet->setValue('C' . $indexF, Common::round_number($total,$round_number));
                $event->sheet->getStyle('C'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->styleCells('A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('B' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('C' . $indexF . ':H' . $indexF,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                                'width'       => 2,
                            ],
                        ],

                    ]
                );
                $indexF++;

                $event->sheet->getStyle('A16:H'.($indexF - 1))->applyFromArray(
                [
                   'borders'   => [
                        'outline'=>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color'       => ['argb' => '00000000'],
                        ],
                    ],
                ]);

                // Alignment for order number column
                $event->sheet->styleCells('A' .$oldindexF. ':A' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                // !===
				
				$event->sheet->styleCells('B' .$oldindexF. ':B' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );

                $event->sheet->styleCells('C' .$oldindexF. ':H' . $indexF,
                    [
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ],
                    ]
                );

            },
        ];
    }

}
class SheetDetail implements FromView, WithTitle, WithEvents
{

    public function __construct($quotation, $ClassKey, $langID)
    {
        $this->quotation = $quotation;
        $this->m         = WebConfigs::where('key', '=', 'ClassProduct')->first();
        $this->Class     = Mstclass::where("ClassKey", "=", $ClassKey)->where('Class', '=', $this->m->value)->first();
        $this->lang      = $langID;
    }
    /**
     * @return Builder
     */
    public static function FormatPattern($WInputFlg, $HInputFlg, $QInputFlg, $string, $w, $h, $q,$name)
    {

        $input = "";
        if ($WInputFlg == 1) {
            $input = str_replace("{W}", $w, $string);
        }
        if ($HInputFlg == 1) {
            $input = str_replace("{H}", $h, $input);
        }
        if ($QInputFlg == 1) {
            $input = str_replace("{Q}", $q, $input);
        }
        $input = str_replace("{I}", $name, $input);
        return $input;
    }
    public function view(): View
    {

        $data['html']  = "";
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", '003')->first();
        $description   = \App\Http\Models\MstclassLanguage::where([
            ["bind_key", "=", $this->Class->ClassKey],
            ["lang_id", "=", $this->lang],
        ])->first();
        if ($ExcelTemplate) {
            $data['html'] = $ExcelTemplate->language($this->lang)->content;
            $argT         = explode('<!--[GetData]-->', $data['html']);
            if (@$argT[1]) {
                $argT         = explode('<!--[/GetData]-->', $argT[1]);
                $replaceKEY   = '<!--[GetData]-->' . $argT[0] . '<!--[/GetData]-->';
                $data['html'] = str_replace($replaceKEY, '', $data['html']);
            }
        }
        if($description != null){
           $data['html'] .= @$description->content;
        }
        return view('quotations.detailexport', $data);
    }
    public function registerEvents(): array
    {
    	$quotation = $this->quotation;
        $class     = $this->Class;
        $seff      = $this;
        $details   = $quotation->details()->where('product_id','=',$class->ClassKey)->get();
        $folders   = [];
        foreach ($details as $key => $value) {
            $items               = $value->items;
            $items_other         = $value->items_other;
            $Sinlandfreightfee   = $value->items()->where('is_inlandfreightfee','=',1)->sum("saleprice");
            $Sinstallfee         = $value->items()->where('is_installfee','=',1)->sum("saleprice");
            // Đoạn này bổ sung phần other (sản phẩm ngoài hệ thống): 2019.09.15
            $Ssaleprice          = $value->items()->sum("saleprice") + $value->items_other()->sum("saleprice");
            $Sprice              = $value->items()->sum("price") + $value->items_other()->sum("price");
            //
            $product        = $value->product->toArray();
            $value          = $value->toArray();
            $value          = array_merge($product, $value);
            $value["Sinlandfreightfee"] = $Sinlandfreightfee;
            $value["Sinstallfee"]       = $Sinstallfee;
            $value["Ssaleprice"]        = $Ssaleprice;
            $value["Sprice"]            = $Sprice;
            $value['items'] = $items;
            // Đoạn này bổ sung phần other (sản phẩm ngoài hệ thống): 2019.09.15
            $value['items_other'] = $items_other;
            //
            $folders[]      = $value;
        }

        $quotation->discount         = $details->sum('discount');
        $quotation->price            = $details->sum('price');
        $quotation->saleprice        = $details->sum('saleprice');
        
        $quotation->inlandfreightfee = $details->sum('inlandfreightfee');
        $quotation->installfee       = $details->sum('installfee');
        
        $quotation->inlandfreightfee_sale = $details->sum('inlandfreightfee_sale');
        $quotation->installfee_sale       = $details->sum('installfee_sale');
        
        $quotation->quantity         = $details->sum('quantity');
        $quotation->total            = $details->sum('total');
        $quotation->folders          = $folders;
        return [
            BeforeExport::class => function (BeforeExport $event) {

                $event->writer->setCreator('Patrick');
                $event->writer->setPreCalculateFormulas(true);
            },
            AfterSheet::class   => function (AfterSheet $event) use ($quotation, $class,$seff) {
            	$round_number = 1;
		    	$rates = QuotationRates::where("quotation_id" ,"=", $quotation->id)->where("is_default" ,"=", "1")->first();
		    	if (@$rates->name == "VND") {
		        	$round_number = -3;
		        }
        
        
                $description = \App\Http\Models\MstclassLanguage::where([
                    ["bind_key", "=", $this->Class->ClassKey],
                ])->first();
                $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", '003')->first();
                $name          = $ExcelTemplate->language()->name;
                $iA            = 1;
                foreach (range('A', $event->sheet->getHighestDataColumn()) as $col) {
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                    $iA++;
                }

                $indexF = 1;
                $event->sheet->styleCells('A1:D1',
                    [
                        'font'      => [
                            'size' => 12,
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],


                    ]
                );
                $event->sheet->getRowDimension('1')->setRowHeight(30);
                $event->sheet->setValue('B' . $indexF, $quotation->project);
                $indexF++;
                $indexF++;
                $event->sheet->getRowDimension('3')->setRowHeight(50);
                $event->sheet->getRowDimension('5')->setRowHeight(20);
                $event->sheet->setValue('A3', @$description->name ? @$description->name : $class->ClassFullName);
                $event->sheet->styleCells('A3:D3',
                    [
                        'font'      => [
                            'bold' => true,
                            'size' => 24,
                            'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLE
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],


                    ]
                );

                $indexF++;
                $indexF++;
                $event->sheet->styleCells('A' . $indexF . ':D' . $indexF,
                    [
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->styleCells('E' . $indexF . ':E' . $indexF,
                    [
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                    ]
                );
                $indexF     = 6;
                $quantityA  = 0;
                $salepriceA = 0;
                $priceA     = 0;
                $quantityA  = 0;
                $recipeTT   = [];
                $recipeDC   = [];
                $recipeSBTT = [];
                $recipeITT  = [];
                $recipeIFTT = [];
                foreach ($quotation->folders as $key => $value) {
                    $rowspan = count($value['items']) + 7;
                    $numFix = 7;
                    $node = $indexF;
                    foreach (@$value['items'] as $key1 => $value1) {
                       if($value1->is_inlandfreightfee == 0 && $value1->is_installfee == 0 && $value1->is_installationqs == 0){
                            $event->sheet->insertNewRowBefore($indexF, 1);
                            $price = $value1->price;
                            $saleprice = $value1->saleprice;
                            if($key1 == 0)
                            	$event->sheet->setValue('B'.$indexF,$value1->ItemName);
                            else
                            	$event->sheet->setValue('B'.$indexF,$value1->ItemClassName);
                            $event->sheet->setValue('C'.$indexF,$seff->FormatPattern(1,1,1,$value1->FormatPattern,$value1->width,$value1->height,$value1->quantity,$value1->ItemName));
                            $event->sheet->setValue('D'.$indexF,Common::round_number($price,$round_number));
                            $event->sheet->setValue('E'.$indexF,Common::round_number($saleprice,$round_number));
                            $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                            $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                            $indexF++;
                       }else{
                         $rowspan--;
                       }

                    }

                    // Đoạn này bổ sung phần other (sản phẩm ngoài hệ thống): 2019.09.15
                    foreach (@$value['items_other'] as $key1 => $value1) {
                        $event->sheet->insertNewRowBefore($indexF, 1);
                        $price = $value1->price;
                        $saleprice = $value1->saleprice;
                        $event->sheet->setValue('B'.$indexF,$value1->name);
                        $event->sheet->setValue('C'.$indexF,$value1->remarks);
                        $event->sheet->setValue('D'.$indexF,Common::round_number($price,$round_number));
                        $event->sheet->setValue('E'.$indexF,Common::round_number($saleprice,$round_number));
                        $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                        $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                        $indexF++;
                    }
                    //

                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue('B'.$indexF,"Unit Price");
                    $st = "";
                    // set Unit Price
                    $recipeUP = '=SUM(D'.$node.':D'.($indexF-1).')';
                    $event->sheet->setValue('D'.$indexF,$recipeUP);
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $stringPrice = '=D'.($indexF);
                    // !set Unit Price

                    $event->sheet->setValue('E'.$indexF,'=D'.$indexF.'/'.$quotation->keisu);
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');

                    $indexF++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue('B'.$indexF,"Quantity");
                    // set quantity
                    $stringPrice .= '*C' .$indexF;
                    // !set quantity
                    $event->sheet->setValue('C'.$indexF,$value['quantity']);
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('0');
                    $indexF++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue('B'.$indexF,"Price");
                    //set price
                    $event->sheet->setValue('D'.$indexF,$stringPrice);
                    $strSubTotal ='=SUM(D'.$indexF.':D'.($indexF+2).')';
                    $strSubTotal_Sale ='=SUM(E'.$indexF.':E'.($indexF+2).')';
                    //set price
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    // add tổng giá.
                    $recipeTT [] = 'D'.$indexF;
                    
                    $recipeTT_Sale [] = 'E'.$indexF;
                    
                    // ! addtổng giá.
                    $event->sheet->setValue('E'.$indexF,'=D'.$indexF.'/'.$quotation->keisu);
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');

                    $indexF++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue('B'.$indexF,"Installation");
                    $installfee = $value['installfee'] > 0 ? $value['installfee'] : 0;
                    $installfee_sale = $value['installfee_sale'] > 0 ? $value['installfee_sale'] : 0;
                    $event->sheet->setValue('D'.$indexF,Common::round_number($installfee,$round_number));
                    $recipeITT [] = 'D'.$indexF;
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');

					$recipeITT_Sale [] = 'E'.$indexF;
                    //$event->sheet->setValue('E'.$indexF,'=D'.$indexF.'/'.$quotation->keisu);
                    $event->sheet->setValue('E'.$indexF,Common::round_number($installfee_sale,$round_number));
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');


                    $indexF++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    $event->sheet->setValue('B'.$indexF,"Inland Freight");
                    $inlandfreightfee = $value['inlandfreightfee'] > 0 ? $value['inlandfreightfee']: 0;
                    $inlandfreightfee_sale = $value['inlandfreightfee_sale'] > 0 ? $value['inlandfreightfee_sale']: 0;
                    $event->sheet->setValue('D'.$indexF,Common::round_number($inlandfreightfee,$round_number));
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $recipeIFTT [] = 'D'.$indexF;

                    // $event->sheet->setValue('F'.$indexF,'=D'.$indexF.'/'.$quotation->keisu);
                    $event->sheet->setValue('E'.$indexF,Common::round_number($inlandfreightfee_sale,$round_number));
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    $recipeIFTT_Sale [] = 'E'.$indexF;

                    $discount = $value['discount'] > 0 ? $value['discount'] : 0;

                    if($discount > 0){
                        $indexF++;
                        $event->sheet->insertNewRowBefore($indexF, 1);
                        $event->sheet->setValue('B'.$indexF,"Discount");
                        $event->sheet->setValue('D'.$indexF,- Common::round_number($discount,$round_number));
                        $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    	$strSubTotal .= '+D'.$indexF;
                    	$recipeDC [] = 'D'.$indexF;
                    }else{
                        $rowspan = $rowspan - 1;
                        $numFix--;
                    }

                    $indexF++;
                    $event->sheet->insertNewRowBefore($indexF, 1);
                    // Sub - Total
                    $event->sheet->setValue('B'.$indexF,"Sub - Total");
                    $event->sheet->setValue('D'.$indexF,$strSubTotal);
                    $recipeSBTT[]= 'D'.$indexF;
                    // !Sub - Total
                    $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                    
                    $recipeSBTT_Sale[]= 'E'.$indexF;
                    $event->sheet->setValue('E'.$indexF,$strSubTotal_Sale); //'=D'.$indexF.'/'.$quotation->keisu
                    $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');


                    $indexF++;

                    $event->sheet->getStyle('A'.$node.':D'.($indexF - 1))->applyFromArray(
                    [
                            'borders'   => [
                                'allBorders'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->getStyle('E'.$node.':E'.($indexF - 1))->applyFromArray(
                    [
                            'borders'   => [
                                'allBorders'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->getStyle('B'.( $indexF - $numFix+1 ).':D'.( $indexF - $numFix+1 ) )->applyFromArray(
                    [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->getStyle('E'.( $indexF - 7 ).':E'.( $indexF - 7 ) )->applyFromArray(
                    [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->getStyle('A'.$node.':D'.($indexF - 1))->applyFromArray(
                    [
                            'borders'   => [
                                'outline'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            ]

                        ]
                    );
                    $event->sheet->getStyle('E'.$node.':E'.($indexF - 1))->applyFromArray(
                    [
                            'borders'   => [
                                'outline'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            ]

                        ]
                    );
                    $event->sheet->getStyle('D'.$node.':F'.($indexF - 1))->applyFromArray(
                    [

                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                            ]

                        ]
                    );
                    $event->sheet->setValue('A'.($indexF - ($rowspan)),$value['code']);
                    $event->sheet->mergeCells('A'.($indexF - ($rowspan)).':A'.($indexF - 1));
                    $event->sheet->getStyle('A'.$node.':D'.($indexF - 1))->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF');
                    $event->sheet->getStyle('A'.$node.':D'.($indexF - 1))->applyFromArray(
                        [
                            'font'  => [
                                'bold'  => false,
                                'size'  => 10,
                                'name'  => 'Arial'
                            ]

                        ]
                    );
                }
                $node = $indexF;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Quantity");
                $event->sheet->setValue('C'.$indexF,$quotation->quantity .'');
                $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('0');
                $indexF++;
                $price = $quotation->price ;
                $price = $price > 0 ? $price : 0;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Price");
                // tạo ra công thức tổng price
                if($recipeTT)
                	$strReceipt = '='.implode('+',$recipeTT) ;
            	else
            		$strReceipt = 0;
            	
            	if($recipeTT_Sale)
                	$strReceipt_Sale = '='.implode('+',$recipeTT_Sale) ;
            	else
            		$strReceipt_Sale = 0;
            	
            	
                $event->sheet->setValue('D'.$indexF,$strReceipt);
                // !tạo ra công thức tổng price

                $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                
                $event->sheet->setValue('E'.$indexF,$strReceipt_Sale); // $price/$quotation->keisu
                $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $indexF++;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Installation");
                $strrecipeITT = $recipeITT ? '='.implode('+', $recipeITT) : 0;
                $event->sheet->setValue('D'.$indexF,$strrecipeITT);
                $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                
                $strrecipeITT_Sale = $recipeITT_Sale ? '='.implode('+', $recipeITT_Sale) : 0;
                $event->sheet->setValue('E'.$indexF,$strrecipeITT_Sale);
                $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $indexF++;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Inland Freight");

                //Inland Freight
                $strrecipeIFTT = $recipeIFTT ? '='.implode('+', $recipeIFTT) : 0;
                $event->sheet->setValue('D'.$indexF,$strrecipeIFTT);
                $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                //!Inland Freight
				$strrecipeIFTT_Sale = $recipeIFTT_Sale ? '='.implode('+', $recipeIFTT_Sale) : 0;
                $event->sheet->setValue('E'.$indexF,$strrecipeIFTT_Sale); // $quotation->inlandfreightfee_sale
                $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');

                $indexF++;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Discount");
               	// check discount
                $discount = $quotation->discount > 0 ? $quotation->discount : 0;
                if($discount)
                	$discount = -$discount;
                else
                {
                	if($recipeDC){
                		$discount = implode('+', $recipeDC);
                	}else{
                		$recipeDC = 0;
                	}
                }
                // !check discount
                $event->sheet->setValue('D'.$indexF,Common::round_number($discount,$round_number));
                if ($discount != 0)
                	$event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $indexF++;
                $event->sheet->insertNewRowBefore($indexF, 1);
                $event->sheet->setValue('B'.$indexF,"Sub - Total");
                $strrecipeSBTT  = $recipeSBTT ? '='.implode('+',  $recipeSBTT) : 0;
                $event->sheet->setValue('D'.$indexF,$strrecipeSBTT);
                $event->sheet->getStyle('D'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                
                $strrecipeSBTT_Sale  = $recipeSBTT_Sale ? '='.implode('+',  $recipeSBTT_Sale) : 0;
                $event->sheet->setValue('E'.$indexF,$strrecipeSBTT_Sale);
                $event->sheet->getStyle('E'.$indexF)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(300);
                $event->sheet->getStyle('A'.$node.':D'.($indexF ))->applyFromArray(
                [
                        'borders'   => [
                            'allBorders'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('E'.$node.':E'.($indexF ))->applyFromArray(
                [
                        'borders'   => [
                            'allBorders'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('A'.$node.':D'.($indexF ))->applyFromArray(
                [
                        'borders'   => [
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('E'.$node.':E'.($indexF ))->applyFromArray(
                [
                        'borders'   => [
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('A'.$node.':D'.($indexF ))->applyFromArray(
                    [
                        'font'  => [
                            'bold'  => false,
                            'size'  => 10,
                            'name'  => 'Arial'
                        ]

                    ]
                );
                $event->sheet->mergeCells('A'.($node).':A'.($indexF ));
                $event->sheet->setValue('A'.$node,"Total");
            },
        ];

    }

    /**
     * @return string
     */
    public function title(): string
    {
        return trim($this->Class->ClassName . '_' . 'Quotation');
    }

}
