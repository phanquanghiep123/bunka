<?php
namespace App\Exports;

use App\Http\Models\LanguageLabels;
use App\Http\Models\Languages;
use App\Http\Models\LanguageValues;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class LanguageLabelsExport implements FromCollection, WithHeadings
{
	private $fileName = 'LanguageLabels.xlsx';
    public function collection()
    {
    	$langs        = Languages::orderby('id','asc')->get();
        $this->_MODEL = LanguageLabels::select(LanguageLabels::getTableName() . '.*');
        $selects      = [LanguageLabels::getTableName() . ".key_id"];
        $tableValue   = [];
        if ($langs) {
            foreach ($langs as $key => $value) {
                $table        = "tbl" . $value["id"];
                $tableValue[] = $table;
                $selects[]    = $table . ".value AS value_" . $value["id"];
                $this->_MODEL->leftJoin(LanguageValues::getTableName() . " as " . $table . "", function ($join) use ($table, $value) {
                    $join->on($table . "." . "label_id", "=", LanguageLabels::getTableName() . ".id")
                        ->on($table . "." . "lang_id", '=', DB::Raw($value["id"]));
                });
            }
        }
        $this->_MODEL->select($selects);      
        return $this->_MODEL->get();
    }
    public function headings(): array
    {
    	$data = [
    		"KEY"
    	];
    	$langs = Languages::orderby('id','asc')->get();
    	foreach ($langs as $key => $value) {
    		$data[] = $value->name;
    	}
        return $data;
    }
}