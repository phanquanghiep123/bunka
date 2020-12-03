<?php

namespace App\Exports;

use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetails;
use App\Http\Models\Quotations;
use App\Http\Models\WebConfigs;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;

class OrderReceiptExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct($quotation,$langID)
    {
        $this->quotation = $quotation;
        $this->lang      = $langID;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets   = [];
        $sheets[] = new SheetReceiptExports($this->quotation, $this->lang);
        return $sheets;
    }
}
 
