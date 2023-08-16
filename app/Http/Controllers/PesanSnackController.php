<?php

namespace App\Http\Controllers;
use App\Models\Pesansnack;
use Illuminate\Http\Request;

class PesanSnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pesansnack'] = pesansnack::orderBy('id_pesansnack','desc')->paginate(5);
    
        return view('pesan.snack', $data);
    }

    public function destroy(pesansnack $pesansnack)
    {
        $pesannack->delete();
    
        return redirect()->route('pesan.snack')
                        ->with('success','Snack has been deleted successfully');
    }
}
