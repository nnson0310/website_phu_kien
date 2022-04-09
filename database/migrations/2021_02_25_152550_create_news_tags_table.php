<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->unsigned()->index();
            $table->foreign('news_id')->references('id')->on('tbl_news')->onDelete('cascade');
            $table->bigInteger('tags_id')->unsigned()->index();
            $table->foreign('tags_id')->references('id')->on('tbl_tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_news_tags');
    }
}
