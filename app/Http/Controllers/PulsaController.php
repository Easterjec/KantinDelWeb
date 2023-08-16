<?php

namespace App\Http\Controllers;

use App\Models\Pulsa;
use Illuminate\Http\Request;

class PulsaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pulsa'] = Pulsa::orderBy('id_pulsa','desc')->paginate(5);
    
        return view('pulsa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pulsa.create');
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
            'nominal' => 'required',
            'harga' => 'required',
        ]);
        $pulsa = new Pulsa;
        $pulsa->nominal = $request->nominal;
        $pulsa->harga = $request->harga;
        $pulsa->save();
     
        return redirect()->route('pulsa.index')
                        ->with('success','Pulsa has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pulsa)
    {
        return view('pulsa.show',compact('pulsa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pulsa $pulsa)
    {
        return view('pulsa.edit',compact('pulsa'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pulsa)
    {
        $request->validate([
            'nominal' => 'required',
            'harga' => 'required',
        ]);
        
        $pulsa = Pulsa::find($id_pulsa);
        $pulsa->nominal = $request->nominal;
        $pulsa->harga = $request->harga;
        $pulsa->save();
    
        return redirect()->route('pulsa.index')
                        ->with('success','Pulsa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pulsa $pulsa)
    {
        $pulsa->delete();
    
        return redirect()->route('pulsa.index')
                        ->with('success','Pulsa has been deleted successfully');
    }
}
