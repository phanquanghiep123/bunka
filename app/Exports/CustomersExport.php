<?php
namespace App\Exports;
use App\Http\Models\Customers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class CustomersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $select = [
            'authorized_code',
            'authorized_name',
            'abbreviations',
            'owner',
            'address',
            'phone',
            'fax',
            'email',
            'tax_code',
            'type_of_business'
        ];
        $this->_MODEL = Customers::select($select);    
        return $this->_MODEL->get();
    }

    public function headings(): array
    {
    	return [
            'Customer code',
            'Customer Name',
            'Abbreviations',
            'Owner',
            'Address',
            'Phone',
            'Fax',
            'Email',
            'Tax Code',
            'Type of business'
        ];
        return $data;
    }
}