<?php

namespace App\Imports;

use App\Http\Models\Customers;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomersImport implements ToCollection
{
    private $customers;

    public function __construct()
    {
        $this->customers = Customers::orderby('id', 'asc')->get();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $index = 1;
        foreach ($collection as $k => $row)
        {
            try {
                if($k < 3) continue;
                $key  = trim(@$row[3]);
                $customer = Customers::where('authorized_code', '=', $key)->first();
                if (!$customer) {
                    $customer = new Customers();
                    $customer->authorized_code = $key;
                    $customer->code = $key;
                    $customer->status_id = 49;
                }
                $customer->authorized_name = trim(@$row[4]);
                $customer->abbreviations = trim(@$row[4]);
                $customer->owner = trim(@$row[4]);
                $customer->phone = trim(@$row[8]);
                $customer->email = trim(@$row[10]);
                $customer->address = trim(@$row[6]).', '.trim(@$row[7]);
                $customer->fax = trim(@$row[9]);
                $customer->tax_code = '';// isset($row[10]) ? trim($row[11]) : '' ;
                $customer->save();
                $index++;
            } catch (\Exception $exception) {
                dd($exception);
            }
        }
    }
}
