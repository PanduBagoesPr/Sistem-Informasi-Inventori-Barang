<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totalstocks', function (Blueprint $table) {
            $table->bigIncrements('totalstock_id');
            $table->unsignedBigInteger('instock_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('trxtion_id');
            $table->string('total');
            $table->timestamps();

            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('instock_id')->references('instock_id')->on('instocks');
            $table->foreign('trxtion_id')->references('trxtion_id')->on('transactions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('totalstocks');
    }
}
