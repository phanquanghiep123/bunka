<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use  App\Http\Models\QuotationMerges;
class QuotationMerge implements FromView,WithEvents
{
    /**
     * @return array
     */
    public function __construct(QuotationMerges $QuotationMerge)
    {
        $this->QuotationMerge = $QuotationMerge;
    }
    public function view(): View
    {
        $folder1 = json_decode($this->QuotationMerge->folder1,true);
        $folder2 = json_decode($this->QuotationMerge->folder2,true);
        $data['folder1'] = $folder1 ;
        $data['folder2'] = $folder2 ;
        return view('quotations.merge', $data);
    }
    public function registerEvents(): array
    {
        $QuotationMerge = $this->QuotationMerge;
        $folder1 = json_decode($this->QuotationMerge->folder1,true);
        return [
            AfterSheet::class => function (AfterSheet $event) use ($folder1) {
                $sheet = $event->sheet;
                $iA = 1;
                $arrayCheck1 = [
                    'quantityCheck',
                    'priceCheck',
                    'installfeeCheck',
                    'inlandfreightfeeCheck',
                    'totalCheck'
                ];
                $event->sheet->getColumnDimension('A')->setWidth(40);
                $event->sheet->getColumnDimension('B')->setWidth(80);
                $event->sheet->getColumnDimension('C')->setWidth(80);
                $event->sheet->getColumnDimension('D')->setWidth(40);
                $event->sheet->getColumnDimension('G')->setWidth(40);
                $event->sheet->getColumnDimension('H')->setWidth(80);
                $event->sheet->getColumnDimension('I')->setWidth(80);
                $event->sheet->getColumnDimension('J')->setWidth(40);
                foreach (range('A', $event->sheet->getHighestDataColumn()) as $col) {
                    $event->sheet->getDelegate()->getRowDimension($iA)->setRowHeight(20);
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                    $event->sheet->getStyle('A'.$iA)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getStyle('A'.$iA)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $event->sheet->getStyle('G'.$iA)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getStyle('G'.$iA)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                    $iA++; 
                }
                $countData = 2;
                $quotation = $folder1['quotation'];
                foreach ($folder1['folders'] as $key => $value) {
                    foreach (@$value['items'] as $key1 => $value1) {
                        if($value1['warning'] === false){
                            $event->sheet->getStyle('B'.($countData + ($key1 + 1)).':D'.($countData + ($key1 + 1)))->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('CCCCCC');
                            $event->sheet->getStyle('H'.($countData + ($key1 + 1)).':J'.($countData + ($key1 + 1)))->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('CCCCCC');
                        }
                          
                    }
                    for ($i = $countData ; $i < ($countData + count($value['items'])) ;$i++ ){
                        $event->sheet->styleCells('B'.($i) .':D'.($i),
                            [
                                'borders'   => [
                                    'bottom'=>[
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                        'color'       => ['argb' => '00000000'],
                                    ],
                                ],

                            ]
                        );
                        $event->sheet->styleCells('H'.($i) .':J'.($i),
                            [
                                'borders'   => [
                                    'bottom'=>[
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                        'color'       => ['argb' => '00000000'],
                                    ],
                                ],

                            ]
                        );
                    }
                    $countData += count($value['items']);
                    $event->sheet->styleCells('B'.($countData + 1) .':D'.($countData + 1),
                        [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('H'.($countData + 1) .':J'.($countData + 1),
                        [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    foreach ($arrayCheck1 as $key1 => $value1) {
                        $event->sheet->styleCells('B'.($countData + ($key1 + 1)) .':D'.($countData + ($key1 + 1)),
                            [
                                'borders'   => [
                                    'bottom'=>[
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                        'color'       => ['argb' => '00000000'],
                                    ],
                                ],

                            ]
                        );
                        $event->sheet->styleCells('H'.($countData + ($key1 + 1)) .':K'.($countData + ($key1 + 1)),
                            [
                                'borders'   => [
                                    'bottom'=>[
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                        'color'       => ['argb' => '00000000'],
                                    ],
                                ],

                            ]
                        );
                        if($value[$value1] == false){
                            $event->sheet->getStyle('B'.($countData + ($key1 + 1)).':D'.($countData + ($key1 + 1)))->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('CCCCCC');
                            $event->sheet->getStyle('H'.($countData + ($key1 + 1)).':J'.($countData + ($key1 + 1)))->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('CCCCCC');
                        }
                    }  
                    $countData += 5;
                    $event->sheet->styleCells('A'.($countData + 1) .':D'.($countData + 1),
                        [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('G'.($countData + 1) .':K'.($countData + 1),
                        [
                            'borders'   => [
                                'top'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                }  
                foreach ($arrayCheck1 as $key1 => $value2) {
                    $event->sheet->styleCells('B'.($countData + ($key1 + 1)) .':D'.($countData + ($key1 + 1)),
                        [
                            'borders'   => [
                                'bottom'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );
                    $event->sheet->styleCells('H'.($countData + ($key1 + 1)) .':J'.($countData + ($key1 + 1)),
                        [
                            'borders'   => [
                                'bottom'=>[
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                                    'color'       => ['argb' => '00000000'],
                                ],
                            ],

                        ]
                    );

                    if($quotation[$value2] == false){
                        $event->sheet->getStyle('B'.($countData + ($key1 + 1)).':D'.($countData + ($key1 + 1)))->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('CCCCCC');
                        $event->sheet->getStyle('H'.($countData + ($key1 + 1)).':J'.($countData + ($key1 + 1)))->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('CCCCCC');
                    }
                    
                } 
                $countData += 5;
                $event->sheet->getStyle('D2:D'.$countData)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->getStyle('J2:J'.$countData)->getNumberFormat()->setFormatCode('#,##0,00');
                $event->sheet->styleCells('A1:D'.$countData,
                    [
                        'borders'   => [
                             
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('G1:K'.$countData,
                    [
                        'borders'   => [
                             
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('G1:J'.$countData,
                    [
                        'borders'   => [
                            'top'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('A2:D2',
                    [
                        'borders'   => [
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->styleCells('G2:K2',
                    [
                        'borders'   => [
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('K2:K'.$countData)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('CCECFF');
                $event->sheet->styleCells('K2:K'.$countData,
                    [
                        'borders'   => [
                            'outline'=>[
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color'       => ['argb' => '00000000'],
                            ],
                        ],

                    ]
                );
                $event->sheet->getStyle('K2:K'.$countData)->getNumberFormat()->setFormatCode('#,##0,00');
            }
        ];
    }
    
}
