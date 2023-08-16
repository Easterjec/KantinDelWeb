<?php

namespace App\Http\Controllers;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
       
        return view('pesan.index');
    }
}
