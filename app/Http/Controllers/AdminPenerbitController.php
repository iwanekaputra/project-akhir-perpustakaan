<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPenerbitController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::latest()->get();
        return view('admin.penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penerbit.create');
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
            'alamat' => 'required',
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
            Penerbit::create($input);

            //return redirect()->back()
            return redirect()->route('penerbit.index')
                ->with('success', 'Penerbit Created successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('penerbit.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        //
        $penerbit = Penerbit::findOrFail($penerbit->id);
        return view('admin.penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        //
        return view('admin.penerbit.edit',compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        //
            $validated = $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'email' => 'required',
                'hp' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input = $request->all();

        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('foto');
        if(!empty($image)) //kondisi akan upload foto baru
        {
            if(!empty($penerbit->foto)){ //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('admin/vendors/images/'.$penerbit->foto);
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
            $input['foto'] = $penerbit->foto; //nama file foto masih yg lama
        }    
      
        try {
            $penerbit->update($input);

            //return redirect()->back()
            return redirect()->route('penerbit.index')
                ->with('success', 'penerbit Edited successfully!');
        } catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('penerbit.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $penerbit =Penerbit::find($id);

        if(!empty($penerbit->foto)) unlink('admin/vendors/images/'.$penerbit->foto);
        //dd($Penerbit);

        $delete = Penerbit::where('id', $id)->delete();
        return redirect()->back();
    }
}
