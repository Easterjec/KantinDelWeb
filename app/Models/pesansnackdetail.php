<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesansnackdetail extends Model
{
    use HasFactory;
    protected $table = 'pesansnackdetail';
    protected $primaryKey = 'id_pesansnack_detail';

    protected $fillable = ['id_snack','id_pemesanan','kuantitas','total_harga'];

    public function pemesanan(){
        return $this->belongsTo(PesanSnack::class, "id_pemesanan", "id_pesan_snack");
    }

    public function snack(){
        return $this->belongsTo(Snack::class, "id_snack", "id_snack");
    }
}
