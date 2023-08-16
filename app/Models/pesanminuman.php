<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanminuman extends Model
{
    use HasFactory;
    protected $table = 'pesanminuman';
    protected $primaryKey = 'id_pesanminuman';
    protected $fillable = [
        'kode_transaksi','tanggal_pemesanan_minuman','total_item','total_pembayaran','status', 'id_user','nama_penerima','nomor_hp','catatan'
    ];
    public function details(){
        return $this->hasMany(PesanMinumanDetail::class, "id_pemesanan", "id_pesanminuman");
    }

    public function user(){
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
