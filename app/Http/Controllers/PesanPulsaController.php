<?php

namespace App\Http\Controllers;
use App\Models\PesanPulsa;
use Illuminate\Http\Request;

class PesanPulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pesanpulsa'] = pesanpulsa::orderBy('id_pesanpulsa','desc')->paginate(5);
    
        return view('pesan.pulsa', $data);
    }

    public function destroy(pesanpulsa $pesanpulsa)
    {
        $pesanpulsa->delete();
    
        return redirect()->route('pesan.pulsa')
                        ->with('success','pesanpulsa has been deleted successfully');
    }
}
