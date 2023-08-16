<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snack extends Model
{
    use HasFactory;
    protected $table = 'snack';
    protected $primaryKey = 'id_snack';
    protected $fillable = [
        'nama', 'harga', 'deskripsi','stok', 'gambar'
    ];
}
