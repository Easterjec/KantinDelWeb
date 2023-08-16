<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanMakananDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanmakanandetail', function (Blueprint $table) {
            $table->increments('id_pesanmakanan_detail');
            $table->integer('id_makanan')->unsigned();
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
        Schema::dropIfExists('pesanmakanandetail');
    }
};
