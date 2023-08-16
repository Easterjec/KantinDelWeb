<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pulsa;

class PulsaController extends Controller
{
    public function index(){
        $pulsa = pulsa::all();
        return response()->json([
        'success' => 1,
        'message' => 'Get pulsa Berhasil',
        'pulsa' => $pulsa
                ]);  
            }
}

