<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('vendor_id');
            $table->string('product_name');
            $table->bigInteger('product_price');
            $table->bigInteger('total');
            $table->enum('product_status', ['Active', 'Inactive']);
            $table->timestamps();
            
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
