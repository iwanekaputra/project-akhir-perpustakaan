<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;
use App\Models\Keterangan;
use App\Models\Buku;
use App\Models\Denda;
use PDF;
use App\Exports\PeminjamExport;
use Maatwebsite\Excel\Facades\Excel;



class AdminPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::latest()->get();
        $keterangans = Keterangan::latest()->get();
        return view('admin.peminjam.index', compact('peminjaman', 'keterangans'));
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


        if ($request->keterangan_id) {
            // dd($request->buku_id);
            $idpeminjam = Peminjaman::find($id);
            Peminjaman::where('id', $id)->update(['keterangan_id' => $request->keterangan_id]);
            // dd($idpeminjam->keterangan_id);
            if ($idpeminjam->keterangan_id == 3 || $idpeminjam->keterangan_id == 6) {
                $updateStok = Buku::find($idpeminjam->buku_id);
                // dd($updateStok);

                $updateStok->stok = $updateStok->stok + $idpeminjam->jumlah;

                $updateStok->save();
            }


            if($request->keterangan_id == 5) {
                Denda::create([
                    'peminjaman_id' => $request->id,
                    'harga_denda' => 10000,
                    'keterangan_id' => 7
                ]);
            }

        }

        return redirect('admin/peminjam')->with('success', 'Konfirmasi diterima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function peminjamPDF()
    {
        $data = Peminjaman::all();
        $pdf = PDF::loadView('admin/peminjam/peminjamPDF', ['data' => $data]);
        return $pdf->download(date('d/m/y') . '_data_peminjam.pdf');
    }

    public function peminjamExcel()
    {
        return Excel::download(new PeminjamExport, date('d-m-y') . '_data_peminjam.xlsx');
    }
}
