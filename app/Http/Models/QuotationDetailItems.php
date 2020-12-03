<?php

namespace App\Http\Models;

class QuotationDetailItems extends BaseModel
{
    protected $table = 'quotation_detail_items';
    protected $hidden = ["created_at", "updated_at"];
}
