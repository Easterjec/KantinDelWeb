<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\minuman;

class MinumanController extends Controller
{
    public function index(){
        $minuman = minuman::all();
        return response()->json([
        'success' => 1,
        'message' => 'Get Minuman Berhasil',
        'minuman' => $minuman
                ]);  
            }
}

