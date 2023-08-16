<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanpulsaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanpulsa', function (Blueprint $table) {
            $table->increments('id_pesanpulsa');
            $table->string('kode_transaksi');
            $table->date('tanggal_pemesanan_pulsa');
            $table->integer('total_item');
            $table->integer('total_pembayaran');
            $table->string('status');
            $table->integer('id_user')->unsigned();
            $table->string('nama_penerima')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('pesanpulsa');
    }
}
