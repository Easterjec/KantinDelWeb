<?php

namespace App\Http\Controllers;
use App\Models\PesanMinuman;
use Illuminate\Http\Request;

class PesanMinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pesanminuman'] = pesanminuman::orderBy('id_pesanminuman','desc')->paginate(5);
    
        return view('pesan.minuman', $data);
    }

    public function destroy(pesanminuman $pesanminuman)
    {
        $pesanminuman->delete();
    
        return redirect()->route('pesan.minuman')
                        ->with('success','pesanminuman has been deleted successfully');
    }
}
