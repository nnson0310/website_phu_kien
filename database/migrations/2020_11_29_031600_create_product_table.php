<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->string('product_name')->unique();
            $table->text('product_desc');
            $table->text('product_content');
            $table->string('product_image');
            $table->string('product_video')->nullable();
            $table->string('product_price');
            $table->integer('product_quantity');
            $table->integer('product_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
