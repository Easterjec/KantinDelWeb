<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanMinumanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanminumandetail', function (Blueprint $table) {
            $table->increments('id_pesanminuman_detail');
            $table->integer('id_minuman')->unsigned();
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
        Schema::dropIfExists('pesanminumandetail');
    }
};
