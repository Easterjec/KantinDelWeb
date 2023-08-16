<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanpulsa extends Model
{
    use HasFactory;
    protected $table = 'pesanpulsa';
    protected $primaryKey = 'id_pesanpulsa';
    protected $fillable = [
        'kode_transaksi','tanggal_pemesanan_pulsa','total_item','total_pembayaran','status', 'id_user','nama_penerima','nomor_hp','catatan'
    ];
}
