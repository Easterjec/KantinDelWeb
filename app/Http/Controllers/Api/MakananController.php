<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\makanan;

class MakananController extends Controller
{
    public function index(){
        $makanan = makanan::all();
        return response()->json([
        'success' => 1,
        'message' => 'Get Makanan Berhasil',
        'makanan' => $makanan
                ]);  
            }
}

