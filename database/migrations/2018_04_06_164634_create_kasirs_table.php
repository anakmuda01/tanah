<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasirs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pembeli_id')->unsigned();
            $table->integer('kredit_id')->unsigned();
            $table->string('tanggal_bayar', 50);
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')
            ->on('pembelis')->onDelete('cascade');
            $table->foreign('kredit_id')->references('id')
            ->on('kredits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasirs');
    }
}
