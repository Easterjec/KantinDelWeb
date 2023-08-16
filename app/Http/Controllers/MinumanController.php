<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['minuman'] = minuman::orderBy('id_minuman','desc')->paginate(5);
    
        return view('minuman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('minuman.create');
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
        $minuman = new minuman;
        $minuman->nama = $request->nama;
        $minuman->harga = $request->harga;
        $minuman->deskripsi = $request->deskripsi;
        $minuman->stok = $request->stok;
        $minuman->gambar = $path;
        $minuman->save();
     
        return redirect()->route('minuman.index')
                        ->with('success','Minuman has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_minuman)
    {
        return view('minuman.show',compact('minuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(minuman $minuman)
    {
        return view('minuman.edit',compact('minuman'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_minuman)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
        
        $minuman = minuman::find($id_minuman);
        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('gambar')->store('public/gambars');
            $minuman->gambar = $path;
        }
        $minuman->nama = $request->nama;
        $minuman->harga = $request->harga;
        $minuman->deskripsi = $request->deskripsi;
        $minuman->stok = $request->stok;
        $minuman->save();
    
        return redirect()->route('minuman.index')
                        ->with('success','Minuman updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(minuman $minuman)
    {
        $minuman->delete();
    
        return redirect()->route('minuman.index')
                        ->with('success','Minuman has been deleted successfully');
    }
}
