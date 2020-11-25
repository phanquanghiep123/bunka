<?php

namespace App\Exports;

use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetails;
use App\Http\Models\QuotationOtherDetails;
use App\Http\Models\QuotationRates;
use App\Http\Models\Quotations;
use App\Http\Models\WebConfigs;
use App\Http\Helper\Common;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
class SheetReceiptExports implements FromView, WithTitle, WithEvents
{
    public function __construct($quotation, $langID)
    {
        $this->quotation = $quotation;
        $this->lang      = $langID;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        $data['html']  = "";
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", 'revenue-slip')->first();
        if ($ExcelTemplate) {
            $data['html'] = $ExcelTemplate->language($this->lang)->content;
            $argT         = explode('<!--[GetData]-->', $data['html']);
            if (@$argT[1]) {
                $argT         = explode('<!--[/GetData]-->', $argT[1]);
                $replaceKEY   = '<!--[GetData]-->' . $argT[0] . '<!--[/GetData]-->';
                $data['html'] = str_replace($replaceKEY, '', $data['html']);
            }
        }

        return view('quotations.exportreceipt', $data);
    }

    public function title(): string
    {
        return 'OP';
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", '001')->first();
        if ($ExcelTemplate) {
            return $ExcelTemplate->language($this->lang)->name;
        } else {
            
        }

    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $quotation = $this->quotation;
        return [
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class   => function (AfterSheet $event) use ($quotation) {
            	$round_number = 1;
		    	$rates = QuotationRates::where("quotation_id" ,"=", $quotation->id)->where("is_default" ,"=", "1")->first();
		    	if (@$rates->name == "VND") {
		        	$round_number = -3;
		        }
            	
                $event->sheet->getParent()->getDefaultStyle()->getFont()->setName('Arial');
                $event->sheet->getParent()->getDefaultStyle()->getFont()->setSize(10);
                $event->sheet->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $event->sheet->getSheetView()->setZoomScale(59);
                $tbl0  = QuotationOtherDetails::getTableName();
                $tbl1  = QuotationDetails::getTableName();
                $tbl2  = Quotations::getTableName();
                $tbl4  = Mstclass::getTableName();
                $tbl3  = Mstitem::getTableName();
                $tbl5  = QuotationDetailItems::getTableName();
                $m     = WebConfigs::where('key', '=', 'ClassProduct')->first();
                $index = 1;
                $iA    = 1;
                foreach (range('A', $event->sheet->getHighestDataColumn()) as $col) {
                    $event->sheet->getDelegate()->getRowDimension($iA)->setRowHeight(30);
                    $iA++;
                }
               
                $index++;
                
                $event->sheet->styleCells('L5',
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],

                    ]
                );
                $index += 2;
                for ($i = $index; $i <= 12; $i++) {
                    $event->sheet->styleCells('A' . $i . ':D' . $i,
                        [

                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            ],
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    if ($i <= 6) {
                        if ($i <= 5) {
                            $event->sheet->styleCells('P' . $i . ':S' . $i,
                                [

                                    'alignment' => [
                                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                                    ],
                                    'borders'   => [
                                        'allBorders' => [
                                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                            'color'       => ['argb' => '00000000'],
                                        ],
                                    ],

                                ]
                            );
                        }
                    } else if ($i < 12) {
                        if ($i == 7) {
                            $event->sheet->styleCells('P' . $i . ':S' . $i,
                                [

                                    'alignment' => [
                                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                                    ],
                                    'borders'   => [
                                        'allBorders' => [
                                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                            'color'       => ['argb' => '00000000'],
                                        ],
                                    ],

                                ]
                            );
                        } else if ($i > 7) {
                            $event->sheet->styleCells('O' . $i . ':S' . $i,
                                [

                                    'alignment' => [
                                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                                    ],
                                    'borders'   => [
                                        'allBorders' => [
                                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                            'color'       => ['argb' => '00000000'],
                                        ],
                                    ],

                                ]
                            );
                        } else {
                            $event->sheet->styleCells('O' . $i . ':S' . $i,
                                [

                                    'alignment' => [
                                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                                    ],

                                ]
                            );
                        }
                    }
                    $index++;
                }
                $index++;
                $event->sheet->styleCells('B' . $index . ':S' . $index,
                    [

                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'fill'      => [
                            'type'  => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => array('rgb' => '00FFFF'),
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $index++;
                $event->sheet->styleCells('A' . $index . ':S' . $index,
                    [
                        'font'      => [
                            'bold' => true,
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],

                    ]
                );
                $order = @$quotation->order;
                $products = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
                    ->join($tbl4, $tbl4 . ".ClassKey", "=", $tbl1 . ".product_id")
                    ->join($tbl5, $tbl5 . ".detail_id", "=", $tbl1 . ".id")
                    ->join($tbl3, $tbl3 . ".ItemId", "=", $tbl5 . ".item_id")
                    ->leftjoin("mstfactoryitem", "mstfactoryitem.FactoryCode", "=", $tbl3 . ".FactoryCode")
                    ->leftjoin("order_revenues",function($join) use($tbl4,$tbl1,$m,$quotation,$order){
                        $join->on('order_revenues.quotation_id', '=', 'quotations.id')
                        ->on("order_revenues.quotation_id","=",$tbl1.".quotation_id")
                        ->on("order_revenues.product_id","=",$tbl1.".product_id")
                        ->where([
                            ["order_revenues.order_id","=",@$order->id]
                        ]);
                    })
                    ->where(
                        [
                            [$tbl4 . ".Class", "=", $m->value],
                            [$tbl1 . ".quotation_id", "=", $quotation->id],
                            [$tbl5 . ".is_product", "=", 1],
                        ]
                    )
                    ->select([
                        'order_revenues.*',
                        'mstfactoryitem.FactoryName',
                        $tbl3 . '.ItemName',
                        $tbl5 . '.not_round_price as price',
                        $tbl1 . '.installfee',
                        $tbl1 . '.inlandfreightfee',
                        $tbl1 . '.installfee_sale',
                        $tbl1 . '.inlandfreightfee_sale',
                        $tbl1 . '.productprice',
                        $tbl1 . '.code',
                        $tbl2 . '.keisu',
                        $tbl4 . ".*",
                        DB::Raw("SUM(" . $tbl1 . ".quantity) as QP,
                            SUM(" . $tbl1 . ".saleprice) as SP,
                            SUM(" . $tbl1 . ".price) as PP,
                        	SUM(" . $tbl1 . ".plus_price*" . $tbl1 . ".quantity) as subtotal_each_price,
                            SUM(" . $tbl1 . ".discount) as DP,
                            SUM(" . $tbl1 . ".installfee) as IFP,
                            SUM(" . $tbl1 . ".inlandfreightfee) as IFFP,
                        	SUM(" . $tbl1 . ".installfee_sale) as IFP_Sale,
                            SUM(" . $tbl1 . ".inlandfreightfee_sale) as IFFP_Sale,
                            SUM(" . $tbl1 . ".installationqsmini) as ISP,
                            SUM(" . $tbl1 . ".productprice) as PPP,
                            SUM(" . $tbl1 . ".total) as TTP,
                            (" . $tbl5 . ".width * " . $tbl5 . ".height)/1000000 AS Acreage"
                        ),
                    ])
                    ->orderby($tbl4 . ".Class", "ASC")
                    ->groupby($tbl4 . ".ClassKey")
                    ->get();
                
                // San pham mua ngoai
                $products_other = Quotations::join($tbl0, $tbl0 . ".quotation_id", "=", $tbl2 . ".id")
		            ->where(
		                [
		                    [$tbl0 . ".quotation_id", "=", $quotation->id],
		                ]
		            )
		            ->select([
		                $tbl0 . ".*"
		            ])
		            ->get();
            	
                    
                $event->sheet->styleCells('A' . $index . ':S' . $index . '',
                    [
                        'font'    => [
                            'bold' => true,
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],
                    ]
                );
                $event->sheet->setValue(('B2'),$quotation->quotation_number);
                
                $index++;
                $indexF = $index + 1;
                $look   = 0;
                $SUMQ   = $SUMA   = $SUMPR   = $TGTT = $GTSP  = $CPLD = "";
                $argCC = [
                    'C',
                    'D',
                    'E',
                    'F',
                    'G',
                    'H',
                    'I',
                    'J',
                    'K',
                    'L',
                    'M',
                    'N',
                    'O',
                    'P',
                    'Q',
                    'R',
                    'S'
                ];
                foreach ($argCC as $key => $value) {
                    ${'COL_'.$value} = "";
                }
                foreach ($products as $key => $value) {
                    $event->sheet->insertNewRowBefore($indexF, 2);
                    $event->sheet->styleCells('A' . $indexF . ':S' . $indexF,
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . $indexF . ':S' . $indexF,
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'bottom' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'top' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],

                        ]
                    );
                    $look++;
                    
                    $totalP           = Common::round_number($value->TTP,$round_number);
                    $productcost      = Common::round_number($value->PPP,$round_number);
                    $installfee       = Common::round_number($value->IFP,$round_number);
                    $inlandfreightfee = Common::round_number($value->IFFP,$round_number);
                    
                    $installfee_sale       = Common::round_number($value->IFP_Sale,$round_number);
                    $inlandfreightfee_sale = Common::round_number($value->IFFP_Sale,$round_number);
                    
                    $discount         = Common::round_number(($value->DP ? $value->DP : 0),$round_number);
                    $price = Common::round_number($value->PP - $discount,$round_number);
                    
                    $saleprice = Common::round_number($value->SP,$round_number);
                    
                    // Tính toán lại giá sản xuất, giá cài đặt, giá vận chuyển
                    $keisu = $value->keisu;
                    $saleprice = Common::round_number($price/$keisu,$round_number);
                    // Added giá sale install
                    /*$installfee = Common::round_number($installfee/$keisu,$round_number);
                    $inlandfreightfee = Common::round_number($inlandfreightfee/$keisu,$round_number);*/
                    $installfee = $installfee_sale;
                    $inlandfreightfee = $inlandfreightfee_sale;
                    
                    $event->sheet->setValue(('A' . $indexF), $look);
                    $event->sheet->setValue(('B' . $indexF), $value->FactoryName);
                    $event->sheet->setValue(('C' . $indexF), $value->QP);
                    $event->sheet->setValue(('D' . $indexF), $value->Acreage);
                    $event->sheet->setValue(('E' . $indexF), $price);
                    $event->sheet->getStyle(('E' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('E' . ($indexF + 1)), "=IF(ISERROR(F" . $indexF . "/E" . $indexF . "),\"\",F" . $indexF . "/E" . $indexF . ")");
                    $event->sheet->getStyle( 'E' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    
                    // $event->sheet->setValue(('F' . $indexF), $value->accepted_amount);
                    $event->sheet->setValue(('F' . $indexF), $price);
                    // $event->sheet->setValue(('F' . ($indexF + 1)), "=IF(ISERROR(F" . $indexF . "/E" . $indexF . "),\"\",F" . $indexF . "/E" . $indexF . ")");
                    $event->sheet->getStyle(('F' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    
                    $event->sheet->setValue(('G' . $indexF), $saleprice);// $productcost
                    $event->sheet->getStyle(('G' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('G' . ($indexF + 1)), "=IF(ISERROR(G" . $indexF . "/F" . $indexF . "),\"\",G" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'G' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->setValue(('H' . $indexF), $installfee);
                    $event->sheet->getStyle(('H' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('H' . ($indexF + 1)), "=IF(ISERROR(H" . $indexF . "/F" . $indexF . "),\"\",H" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'H' . ($indexF + 1) )->getNumberFormat()->setFormatCode('#,##0.000');
                    $event->sheet->getStyle( 'H' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');

                    $event->sheet->setValue(('I' . $indexF), @$value->paint_cost);
                    $event->sheet->getStyle(('I' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('J' . $indexF), @$value->container_rental_costs);
                    $event->sheet->getStyle(('J' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('K' . $indexF), @$value->monitoring_cost);
                    $event->sheet->getStyle(('K' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('L' . $indexF), @$value->working_fee);
                    $event->sheet->getStyle(('L' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('M' . $indexF), @$value->design_costs);
                    $event->sheet->getStyle(('M' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('N' . $indexF), $inlandfreightfee);
                    $event->sheet->getStyle(('N' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('N' . ($indexF + 1)), "=IF(ISERROR(N" . $indexF . "/F" . $indexF . "),\"\",N" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'N' . ($indexF + 1) )->getNumberFormat()->setFormatCode('#,##0.000');
                    $event->sheet->getStyle( 'N' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    
                    $event->sheet->setValue(('O' . $indexF), @$value->import_export_costs);
                    $event->sheet->getStyle(('O' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('P' . $indexF), @$value->tax);
                    $event->sheet->getStyle(('P' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');


                    $event->sheet->setValue(('Q' . $indexF), @$value->agency_costs);
                    $event->sheet->getStyle(('Q' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');

                    $event->sheet->setValue(('R' . ($indexF)), "=+F" . $indexF . "-SUM(G" . $indexF . ":Q" . $indexF . ")");
                    $event->sheet->getStyle(('R' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('R' . ($indexF + 1)), "=IF(ISERROR(R" . $indexF . "/F" . $indexF . "),\"\",R" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'R' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->setValue(('S' . ($indexF)), "=SUM(G" . $indexF . ":Q" . $indexF . ")");
                    $event->sheet->getStyle(('S' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('S' . ($indexF + 1)), "=IF(ISERROR(S" . $indexF . "/F" . $indexF . "),\"\",S" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'S' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->mergeCells('A' . $indexF . ':A' . ($indexF + 1) . '');
                    
                    $event->sheet->getStyle('R'.$indexF.':S'.($indexF + 1).'')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ccffcc');

                    foreach ($argCC as $key => $value) {
                        ${'COL_'.$value} .= "+" . $value . $indexF;
                    }
                    $indexF = $indexF + 2;
                }
                
                // ADDED: 2019.09.21
                // Other products
                foreach ($products_other as $key => $value) {
                    $event->sheet->insertNewRowBefore($indexF, 2);
                    $event->sheet->styleCells('A' . $indexF . ':S' . $indexF,
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . $indexF . ':S' . $indexF,
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'bottom' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],
                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],
                            'borders'   => [
                                'top' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('A' . ($indexF + 1) . ':S' . ($indexF + 1),
                        [
                            'font'      => [
                                'bold' => false,
                            ],
                            'alignment' => [
                                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            ],

                        ]
                    );
                    $look++;
                    
                    
                    $productprice     = $value->price;
                    $saleprice     	  = $value->saleprice;
                    $price            = $value->total;
                    
                    $event->sheet->setValue(('A' . $indexF), $look);
                    $event->sheet->setValue(('B' . $indexF), $value->name);
                    $event->sheet->setValue(('C' . $indexF), 1);
                    $event->sheet->setValue(('D' . $indexF), 0);
                    $event->sheet->setValue(('E' . $indexF), $price);
                    $event->sheet->getStyle(('E' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('E' . ($indexF + 1)), "=IF(ISERROR(F" . $indexF . "/E" . $indexF . "),\"\",F" . $indexF . "/E" . $indexF . ")");
                    $event->sheet->getStyle( 'E' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    
                    // $event->sheet->setValue(('F' . $indexF), $value->accepted_amount);
                    $event->sheet->setValue(('F' . $indexF), $price);
                    // $event->sheet->setValue(('F' . ($indexF + 1)), "=IF(ISERROR(F" . $indexF . "/E" . $indexF . "),\"\",F" . $indexF . "/E" . $indexF . ")");
                    $event->sheet->getStyle(('F' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    
                    $event->sheet->setValue(('G' . $indexF), $saleprice);// $productcost
                    $event->sheet->getStyle(('G' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('G' . ($indexF + 1)), "=IF(ISERROR(G" . $indexF . "/F" . $indexF . "),\"\",G" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'G' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->setValue(('H' . $indexF), 0);
                    // $event->sheet->setValue(('H' . ($indexF + 1)), "=IF(ISERROR(H" . $indexF . "/F" . $indexF . "),\"\",H" . $indexF . "/F" . $indexF . ")");

                    $event->sheet->setValue(('I' . $indexF), "");
                    $event->sheet->setValue(('J' . $indexF), "");
                    $event->sheet->setValue(('K' . $indexF), "");
                    $event->sheet->setValue(('L' . $indexF), "");
                    $event->sheet->setValue(('M' . $indexF), "");
                    $event->sheet->setValue(('N' . $indexF), "");
                    $event->sheet->setValue(('O' . $indexF), "");
                    $event->sheet->setValue(('P' . $indexF), "");
                    $event->sheet->setValue(('Q' . $indexF), "");
                    $event->sheet->setValue(('R' . ($indexF)), "=+F" . $indexF . "-SUM(G" . $indexF . ":Q" . $indexF . ")");
                    $event->sheet->getStyle(('R' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('R' . ($indexF + 1)), "=IF(ISERROR(R" . $indexF . "/F" . $indexF . "),\"\",R" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'R' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->setValue(('S' . ($indexF)), "=SUM(G" . $indexF . ":Q" . $indexF . ")");
                    $event->sheet->getStyle(('S' . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    $event->sheet->setValue(('S' . ($indexF + 1)), "=IF(ISERROR(S" . $indexF . "/F" . $indexF . "),\"\",S" . $indexF . "/F" . $indexF . ")");
                    $event->sheet->getStyle( 'S' . ($indexF + 1) )->getNumberFormat()->setFormatCode('0%');
                    $event->sheet->mergeCells('A' . $indexF . ':A' . ($indexF + 1) . '');
                    
                    $event->sheet->getStyle('R'.$indexF.':S'.($indexF + 1).'')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ccffcc');

                    foreach ($argCC as $key => $value) {
                        ${'COL_'.$value} .= "+" . $value . $indexF;
                    }
                    $indexF = $indexF + 2;
                }

                $event->sheet->setValue(('C6'), $quotation->customer->authorized_name);
                $event->sheet->setValue(('C7'), $quotation->customer->owner);
                if ($quotation->order) {
                    $event->sheet->setValue(('B3'),$quotation->order->order_number);
                    $event->sheet->setValue(('C4'), $quotation->order->receiving_order_date);
                    $event->sheet->setValue(('C5'), $quotation->order->userchange->first_name . ' ' . $quotation->order->userchange->last_name);
                    $event->sheet->setValue(('C12'), $quotation->order->planned_installation_date);
                    $event->sheet->setValue(('C13'), $quotation->order->planned_completion_date);
                } else {
                	if ($quotation->date_start != null) {
                		$event->sheet->setValue(('C4'), date('m/d/Y', strtotime($quotation->date_start)));
                	}
                	$event->sheet->setValue(('C5'), $quotation->created_by->first_name . ' ' . $quotation->created_by->last_name);
                }
                //if(@$quotation->construction){
                    $event->sheet->setValue(('C10'), @$quotation->project);//$quotation->construction->name
                    $event->sheet->setValue(('C11'), @$quotation->construction_address);
                //}
                
                foreach ($argCC as $key => $value) {
                    $event->sheet->setValue(($value . $indexF), "=" . ${'COL_'.$value});
                    if($key >= 2) {
                        $event->sheet->getStyle(($value . $indexF))->getNumberFormat()->setFormatCode('#,##0,00');
                    }
                }
                $event->sheet->styleCells('A' . ($indexF) . ':S' . ($indexF),
                    [
                        'font'      => [
                            'size'  => 12,
                            'bold'  => false,
                            'name'  =>  'Arial',
                            'color' => ['argb' => '00000000']
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                                'borderSize'  => 2,
                            ],

                        ],

                    ]
                );
                $event->sheet->styleCells('A2:B3',[
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],

                    ],
                ]) ;
                $event->sheet->styleCells('A1',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  10,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                 $event->sheet->styleCells('A2',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  14,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                $event->sheet->styleCells('A4:B13',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  16,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );

                $event->sheet->styleCells('C3:S3',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  14,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                $event->sheet->styleCells('B2:B3',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  24,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                $event->sheet->styleCells('C4:H7',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  16,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                 $event->sheet->styleCells('C6:H9',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  20,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                 $event->sheet->styleCells('J7:M8',[
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],

                    ],
                ]) ;
                $event->sheet->styleCells('C10:H13',
                    [
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  16,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                $event->sheet->mergeCells('C4:F4');               
                $event->sheet->mergeCells('C5:F5');
                $event->sheet->mergeCells('C6:F6');
                $event->sheet->styleCells('C4:F6',[
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],

                    ],
                ]) ;

                $event->sheet->getStyle('C4:F6')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffffe1');

                $event->sheet->mergeCells('C7:H7');
                $event->sheet->mergeCells('C8:H8');
                $event->sheet->mergeCells('C9:H9');
                $event->sheet->mergeCells('C10:H10');
                $event->sheet->mergeCells('C11:H11');
                $event->sheet->styleCells('C7:H11',[
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],

                    ],
                ]) ;
                $event->sheet->getStyle('C7:H11')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffffe1');
                $event->sheet->mergeCells('C12:F12');
                $event->sheet->mergeCells('C13:F13');
                $event->sheet->styleCells('C12:F13',[
                    'borders'   => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'       => ['argb' => '00000000'],
                        ],

                    ],
                ]) ;
                $event->sheet->getStyle('C12:F13')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffffe1');

                $event->sheet->getColumnDimension('A')->setAutoSize(false);
                $event->sheet->getColumnDimension('A')->setWidth(14);
                $event->sheet->getColumnDimension('B')->setWidth(25);
                $event->sheet->getColumnDimension('C')->setWidth(14);
                $event->sheet->getColumnDimension('D')->setWidth(14);
                $event->sheet->getColumnDimension('E')->setWidth(14);
                $event->sheet->getColumnDimension('F')->setWidth(14);
                $event->sheet->getColumnDimension('G')->setWidth(14);
                $event->sheet->getColumnDimension('H')->setWidth(14);
                $event->sheet->getColumnDimension('I')->setWidth(14);
                $event->sheet->getColumnDimension('J')->setWidth(14);
                $event->sheet->getColumnDimension('K')->setWidth(14);
                $event->sheet->getColumnDimension('L')->setWidth(14);
                $event->sheet->getColumnDimension('M')->setWidth(14);
                $event->sheet->getColumnDimension('N')->setWidth(14);
                $event->sheet->getColumnDimension('O')->setWidth(14);
                $event->sheet->getColumnDimension('P')->setWidth(14);
                $event->sheet->getColumnDimension('Q')->setWidth(14);
                $event->sheet->getColumnDimension('R')->setWidth(14);
                $event->sheet->getColumnDimension('S')->setWidth(14);
                $event->sheet->getRowDimension('1')->setRowHeight(80);
                $event->sheet->getRowDimension('16')->setRowHeight(80);
                $event->sheet->styleCells('O8:S12',
                    [
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                            ],

                        ]
                    ]
                );
                $event->sheet->styleCells('A14:S16',
                    [
                        
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'borders'   => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color'       => ['argb' => '00000000'],
                            ],

                        ],
                        'font' => array(
                            'name'      =>  'Arial',
                            'size'      =>  12,
                            'bold'      =>  true,
                            'color' => ['argb' => '000000'],
                        )
                    ]
                );
                $event->sheet->getStyle('A1:S'.$event->sheet->getHighestRow())
                ->getAlignment()->setWrapText(true);

                $event->sheet->styleCells('A14:S14',
                    [
                        'font' => [   
                            'color' => ['argb' => '0000cc'],
                        ]
                    ]
                );
                $event->sheet->getStyle('A15:S15')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ccecff');
                 $event->sheet->styleCells('A1:S1',
                    [
                        'font'      => [
                            'name' =>  'Arial',
                            'size' => 26,
                            'bold' => true,
                        ],
                        'alignment' => [
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ]
                
                    ]
                );
            },
        ];
    }
}
