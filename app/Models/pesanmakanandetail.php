<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanmakanandetail extends Model
{
    use HasFactory;
    protected $table = 'pesanmakanandetail';
    protected $primaryKey = 'id_pesanmakanan_detail';

    protected $fillable = ['id_makanan','id_pemesanan','kuantitas','total_harga'];

    public function pemesanan(){
        return $this->belongsTo(PesanMakanan::class, "id_pemesanan", "id_pesan_makanan");
    }

    public function makanan(){
        return $this->belongsTo(makanan::class, "id_makanan", "id_makanan");
    }
}
