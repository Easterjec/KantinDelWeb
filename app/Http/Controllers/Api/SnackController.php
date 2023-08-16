<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\snack;

class SnackController extends Controller
{
    public function index(){
        $snack = snack::all();
        return response()->json([
        'success' => 1,
        'message' => 'Get Snack Berhasil',
        'snack' => $snack
                ]);  
            }

    public function updatestok(Request $request, $id_snack)
    {
        $update = snack::find($id_snack);
        $update->stok = $request->stok;
        $update->save();
        return redirect('daftarsnack')->with('success', "Produk berhasil diubah!");
    }
}

