<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $primaryKey = "shipment_id";

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'trxtion_id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function insert($data)
    {
        DB::table('shipments')->insert($data);
    }
}
