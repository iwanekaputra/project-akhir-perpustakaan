<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarang = Pengarang::latest()->get();
        return view('admin.Pengarang.index', compact('pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengarang.create');
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
            'nama' => 'required',
            'email' => 'required|email:dns',
            'hp' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $input = $request->all();
  
        if ($image = $request->file('foto')) {
            $destinationPath = 'admin/vendors/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
    
        try {
            Pengarang::create($input);

            //return redirect()->back()
            return redirect()->route('pengarang.index')
                ->with('success', 'Pengarang Created successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('pengarang.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengarang  $Pengarang
     * @return \Illuminate\Http\Response
     */
    public function show(Pengarang $pengarang)
    {
        $pengarang = Pengarang::findOrFail($pengarang->id);
        return view('admin.pengarang.show', compact('pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengarang  $Pengarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengarang $pengarang)
    {
        //
        return view('admin.pengarang.edit',compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengarang  $Pengarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengarang $pengarang)
    {
        
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);


        $input = $request->all();

        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('foto');
        if(!empty($image)) //kondisi akan upload foto baru
        {
            if(!empty($pengarang->foto)){ //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('admin/vendors/images/'.$pengarang->foto);
            }
            //proses upload foto baru
            $destinationPath = 'admin/vendors/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //print_r($profileImage); die();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        else //kondisi user hanya update data saja, bukan ganti foto
        {
            $input['foto'] = $pengarang->foto; //nama file foto masih yg lama
        }    
      
        try {
            $pengarang->update($input);

            //return redirect()->back()
            return redirect()->route('pengarang.index')
                ->with('success', 'Pengarang Edited successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('pengarang.index')
                ->with('error', 'Error during the creation!');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengarang  $Pengarang
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $pengarang =Pengarang::find($id);

        if(!empty($pengarang->foto)) unlink('admin/vendors/images/'.$pengarang->foto);
        //dd($Pengarang);

        $delete = Pengarang::where('id', $id)->delete();
        return redirect()->back();
    }
}
