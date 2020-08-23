<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('shipment_id');
            $table->unsignedBigInteger('trxtion_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('product_id');
            $table->string('shipment_customer');
            $table->string('shipment_address');
            $table->string('shipment_phone');
            $table->date('shipment_date');
            $table->timestamps();

            $table->foreign('trxtion_id')->references('trxtion_id')->on('transactions');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('employee_id')->references('employee_id')->on('employees');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
