<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id('orders_id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('user_id')->on('tbl_users')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('note');
            $table->Integer('payment_method');
            $table->string('orders_subtotal');
            $table->string('taxes');
            $table->string('orders_total');
            $table->Integer('orders_status');
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
        Schema::dropIfExists('tbl_orders');
    }
}
