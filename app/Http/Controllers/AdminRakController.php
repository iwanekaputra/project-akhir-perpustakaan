<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use RealRashid\SweetAlert\Facades\Alert;


class AdminRakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak = Rak::latest()->get();
        return view('admin.rak.index', compact('rak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required'
        ]);

       Rak::create($validated);
        return redirect()->route('rak.index')
                        ->with('success','rak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        //
        return view('admin.rak.edit',compact('rak'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rak $rak)
    {
        //
          
        $validated = $request->validate([
            'nama' => 'required',
        ]);


    
        $input = $request->all();
        try {
            $rak->update($input);

            //return redirect()->back()
            return redirect()->route('rak.index')
                ->with('success', 'rak Edited successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('rak.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        //dd($buku);
        $delete = Rak::where('id', $id)->delete();
        return redirect()->back();
    }
}
