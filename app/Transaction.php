<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "trxtion_id";

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }
}
