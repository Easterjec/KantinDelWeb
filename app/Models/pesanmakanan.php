<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanmakanan extends Model
{
    use HasFactory;
    protected $table = 'pesanmakanan';
    protected $primaryKey = 'id_pesanmakanan';
    protected $fillable = [
        'kode_transaksi','tanggal_pemesanan_makanan','total_item','total_pembayaran','status', 'id_user','nama_penerima','nomor_hp','catatan'
    ];
    public function details(){
        return $this->hasMany(PesanMakananDetail::class, "id_pemesanan", "id_pesanmakanan");
    }

    public function user(){
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
