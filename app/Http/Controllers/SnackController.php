<?php

namespace App\Http\Controllers;

use App\Models\snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['snack'] = snack::orderBy('id_snack','desc')->paginate(5);
    
        return view('snack.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snack.create');
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
        $snack = new snack;
        $snack->nama = $request->nama;
        $snack->harga = $request->harga;
        $snack->deskripsi = $request->deskripsi;
        $snack->stok = $request->stok;
        $snack->gambar = $path;
        $snack->save();
     
        return redirect()->route('snack.index')
                        ->with('success','Snack has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_snack)
    {
        return view('snack.show',compact('snack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(snack $snack)
    {
        return view('snack.edit',compact('snack'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_snack)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
        
        $snack = snack::find($id_snack);
        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('gambar')->store('public/gambars');
            $snack->gambar = $path;
        }
        $snack->nama = $request->nama;
        $snack->harga = $request->harga;
        $snack->deskripsi = $request->deskripsi;
        $snack->stok = $request->stok;
        $snack->save();
    
        return redirect()->route('snack.index')
                        ->with('success','Snack updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(snack $snack)
    {
        $snack->delete();
    
        return redirect()->route('snack.index')
                        ->with('success','Snack has been deleted successfully');
    }
}
