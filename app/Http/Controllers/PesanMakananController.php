<?php

namespace App\Http\Controllers;
use App\Models\pesanmakanan;
use Illuminate\Http\Request;

class PesanMakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pesanmakanan'] = pesanmakanan::orderBy('id_pesanmakanan','desc')->paginate(5);
    
        return view('pesan.makanan', $data);
    }

    public function destroy(pesanmakanan $pesanmakanan)
    {
        $pesanmakanan->delete();
    
        return redirect()->route('pesan.makanan')
                        ->with('success','pesanmakanan has been deleted successfully');
    }
}
