<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Keterangan;
use App\Models\Denda;


class AdminDendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dendas = Denda::get();
        $keterangans = Keterangan::latest()->get();


        return view('admin.denda.index', compact('dendas', 'keterangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->keterangan_id == 8 || $request->keterangan_id == 7) {
            $data = Denda::find($id);
            Denda::where('id', $id)->update(['keterangan_id' => $request->keterangan_id]);
            Peminjaman::where('id', $data->peminjaman_id)->update(['keterangan_id' => $request->keterangan_id]);
        } else {
            $data = Denda::find($id);
            Denda::where('id', $id)->update(['keterangan_id' => $request->keterangan_id]);
            Peminjaman::where('id', $data->peminjaman_id)->update(['keterangan_id' => $request->keterangan_id]);
        }

                return redirect('admin/peminjam')->with('success', 'Konfirmasi diterima');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
