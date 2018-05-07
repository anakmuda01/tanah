<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_tanah', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('tanah_id')->unsigned();
          $table->integer('tag_id')->unsigned();
          $table->timestamps();

          $table->foreign('tanah_id')->references('id')
          ->on('tanahs')->onDelete('cascade');
          $table->foreign('tag_id')->references('id')
          ->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_tanah');
    }
}
