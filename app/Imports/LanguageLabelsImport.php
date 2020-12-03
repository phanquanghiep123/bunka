<?php

namespace App\Imports;

use App\Http\Models\LanguageLabels;
use App\Http\Models\Languages;
use App\Http\Models\LanguageValues;
use App\Http\Models\Status;
use App\Http\Models\WebConfigs;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
class LanguageLabelsImport implements ToModel,ToCollection
{
    private $langs;
    private $status_id = 0;
    public function __construct()
    {
        $this->langs = Languages::orderby('id', 'asc')->get();
        $c           = WebConfigs::where('key', '=', 'languagelabelsID')->first();
        if ($c) {
            $status = $this->getListStatusByModels($c->value)->where("options", "=", 1)->first();
            if ($status) {
                $this->status_id = $status->id;
            }
        }
    }
    public function model(array $row)
    {
        
    }
    public function getListStatusByModels($module_id = null)
    {
        if ($module_id == null) {
            $module_id = $this->_MODULE->id;
        }
        $statusARG = Status::
            where("module_id", "=", $module_id)
            ->select(["status.*"])
            ->orderby("status.sort", "DESC");
        return $statusARG;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $keyrow => $row) 
        {
        	if($keyrow == 0) continue;
            $key  = $row[0];
	        $LanguageLabel = LanguageLabels::where('key_id',"=",$key)->first();
	        if (!$LanguageLabel) {
	            $LanguageLabel            = new LanguageLabels();
	            $LanguageLabel->key_id    = $key;
	            $LanguageLabel->status_id = $this->status_id;
	            $LanguageLabel->save();
	        }
	        $index = 1;
	        foreach ($this->langs as $key => $value) {
	            $check = LanguageValues::where([
	                "label_id" => $LanguageLabel->id,
	                "lang_id"  => $value->id,
	            ])->first();
	            if (!$check) {
	                $check = new LanguageValues();
	            }
	            $check->label_id = $LanguageLabel->id;
	            $check->lang_id  = $value->id;
	            $check->value    = @$row[$index];
	            $check->save();
	            $index++;
	        }
        }
    }
    public function headingRow(): int
    {
        return 0;
    }
}
