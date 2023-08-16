<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanSnackDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesansnackdetail', function (Blueprint $table) {
            $table->increments('id_pesansnack_detail');
            $table->integer('id_snack')->unsigned();
            $table->integer('id_pemesanan')->unsigned();
            $table->integer('kuantitas');
            $table->integer('total_harga');
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
        Schema::dropIfExists('pesansnackdetail');
    }
};
