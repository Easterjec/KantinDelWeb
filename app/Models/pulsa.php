<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pulsa extends Model
{
    use HasFactory;
    protected $table = 'pulsa';
    protected $primaryKey = 'id_pulsa';
    protected $fillable = [
        'nominal' ,'harga',
    ];
}
