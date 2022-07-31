<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;



class AdminBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::latest()->get();
        $kategoris = Kategori::latest()->get();
        $penerbit = Penerbit::latest()->get();
        $rak = Rak::latest()->get();
        $pengarang = Pengarang::latest()->get();
        return view('admin.buku.index', compact('bukus', 'kategoris', 'penerbit', 'rak', 'pengarang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bukus = Buku::latest()->get();
        $kategoris = Kategori::latest()->get();
        $penerbit = Penerbit::latest()->get();
        $pengarang = Pengarang::latest()->get();
        $rak = Rak::latest()->get();
        return view('admin.buku.create', compact('bukus', 'kategoris', 'penerbit', 'pengarang', 'rak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Buku $buku)
    {
        //dd($request);
        $validated = $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
            'deskripsi' => 'nullable',
            'halaman' => 'required',
            'harga' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'kategori_id' => 'required',
            'rak_id' => 'required',
        ]);
        // dd($validated);

        if ($image = $request->file('cover')) {
            $destinationPath = 'admin/vendors/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['cover'] = "$profileImage";
        }


        try {
            Buku::create($validated);

            //return redirect()->back()
            return redirect()->route('buku.index')
                ->with('success', 'Buku Created successfully!');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('buku.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        $buku = Buku::findOrFail($buku->id);
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
        $kategoris = Kategori::latest()->get();
        $penerbit = Penerbit::latest()->get();
        $pengarang = Pengarang::latest()->get();
        $rak = Rak::latest()->get();
        return view('admin.buku.edit', compact('buku', 'kategoris', 'penerbit', 'pengarang', 'rak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //dd($request);
        $validated = $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
            'deskripsi' => 'required',
            'halaman' => 'required',
            'harga' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'kategori_id' => 'required',
            'rak_id' => 'required',
        ]);


        //$input = $request->all();

        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('cover');
        if (!empty($image)) //kondisi akan upload foto baru
        {
            if (!empty($buku->cover)) { //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('admin/vendors/images/' . $buku->cover);
            }
            //proses upload foto baru
            $destinationPath = 'admin/vendors/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //print_r($profileImage); die();
            $image->move($destinationPath, $profileImage);
            $validated['cover'] = "$profileImage";
        } else //kondisi user hanya update data saja, bukan ganti foto
        {
            $validated['cover'] = $buku->cover; //nama file foto masih yg lama
        }

        try {
            $buku->update($validated);

            //return redirect()->back()
            return redirect()->route('buku.index')
                ->with('success', 'buku Edited successfully!');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('buku.index')
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $buku = Buku::find($id);

        if (!empty($buku->cover)) unlink('admin/vendors/images/' . $buku->cover);
        //dd($buku);

        $delete = Buku::where('id', $id)->delete();
        return redirect()->back();
    }

    public function bukuPDF()
    {
        $data = Buku::all();
        $pdf = PDF::loadView('admin/buku/bukuPDF', ['data' => $data]);
        return $pdf->download(date('d/m/y') . '_data_buku.pdf');
    }

    public function bukuExcel()
    {
        return Excel::download(new BukuExport, date('d-m-y') . '_data_buku.xlsx');
    }
}
