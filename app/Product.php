<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id');
    }

    public function insert($data)
    {
        DB::table('products')->insert($data);
    }
}
