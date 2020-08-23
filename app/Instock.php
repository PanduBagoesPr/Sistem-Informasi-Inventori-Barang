<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    protected $table = "instocks";
    protected $primaryKey = "instock_id";

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function insert($data)
    {
        DB::table('instocks')->insert($data);
    }
}
