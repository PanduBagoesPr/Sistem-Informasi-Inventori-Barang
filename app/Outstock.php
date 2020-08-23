<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outstock extends Model
{
    protected $table = "outstocks";
    protected $primaryKey = "outstock_id";

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'trxtion_id');
    }

    public function insert($data)
    {
        DB::table('outstocks')->insert($data);
    }
}
