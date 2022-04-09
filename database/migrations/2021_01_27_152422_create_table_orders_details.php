<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orders_id')->unsigned()->index();
            $table->foreign('orders_id')->references('orders_id')->on('tbl_orders')->onDelete('cascade');
            $table->Integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('product_id')->on('tbl_product')->onDelete('cascade');
            $table->Integer('quantity');
            $table->Integer('unit_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_orders_details');
    }
}
