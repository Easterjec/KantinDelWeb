<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanminumandetail extends Model
{
    use HasFactory;
    protected $table = 'pesanminumandetail';
    protected $primaryKey = 'id_pesanminuman_detail';

    protected $fillable = ['id_minuman','id_pemesanan','kuantitas','total_harga'];

    public function pemesanan(){
        return $this->belongsTo(PesanMinuman::class, "id_pemesanan", "id_pesan_minuman");
    }

    public function minuman(){
        return $this->belongsTo(minuman::class, "id_minuman", "id_minuman");
    }
}
