<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalstock extends Model
{
    protected $table = "totalstocks";
    protected $primaryKey = "totalstock_id";

    public function instock()
    {
        return $this->belongsTo('App\Instock', 'instock_id');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'trxtion_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function insert($data)
    {
        DB::table('totalstocks')->insert($data);
    }
}
