<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanruanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanruangan', function (Blueprint $table) {
            $table->increments('id_pesanruangan');
            $table->string('kode_transaksi');
            $table->date('tanggal_pemesanan_ruangan');
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
        Schema::dropIfExists('pesanruangan');
    }
}
