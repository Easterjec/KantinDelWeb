<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['makanan'] = Makanan::orderBy('id_makanan','desc')->paginate(5);
    
        return view('makanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            
        ]);
        $path = $request->file('gambar')->store('public/gambars');
        $makanan = new Makanan;
        $makanan->nama = $request->nama;
        $makanan->harga = $request->harga;
        $makanan->deskripsi = $request->deskripsi;
        $makanan->stok = $request->stok;
        $makanan->gambar = $path;
        
        $makanan->save();
     
        return redirect()->route('makanan.index')
                        ->with('success','makanan has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_makanan)
    {
        return view('makanan.show',compact('makanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Makanan $makanan)
    {
        return view('makanan.edit',compact('makanan'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_makanan)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
        
        $makanan = Makanan::find($id_makanan);
        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('gambar')->store('public/gambars');
            $makanan->gambar = $path;
        }
        $makanan->nama = $request->nama;
        $makanan->harga = $request->harga;
        $makanan->deskripsi = $request->deskripsi;
        $makanan->stok = $request->stok;
        $makanan->save();
    
        return redirect()->route('makanan.index')
                        ->with('success','Makanan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
    
        return redirect()->route('makanan.index')
                        ->with('success','Makanan has been deleted successfully');
    }
}

