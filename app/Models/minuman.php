<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minuman extends Model
{
    use HasFactory;
    protected $table = 'minuman';
    protected $primaryKey = 'id_minuman';
    protected $fillable = [
        'nama', 'harga', 'deskripsi', 'stok', 'gambar',
    ];
}
