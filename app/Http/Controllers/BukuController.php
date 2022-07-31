<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Kategori;



class BukuController extends Controller
{

    public function index()
    {

        $title = 'Semua buku';

        if (request('kategori')) {
            $kategori = Kategori::firstWhere('nama', request('kategori'));
            $title = ' Kategori ' . $kategori->nama;
        }


        $bukus = Buku::latest()->filter(request(['kategori']))->paginate(10)->withQueryString();

        $kategoris = Kategori::latest()->get();
        return view('landingpage.buku.index', compact('bukus', 'kategoris'), [
            'title' => $title
        ]);
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['buku_id'] = $request->buku_id;
        $validated['keterangan_id'] = 1;

        $updateStok = Buku::find($validated['buku_id']);
        // dd($updateStok);

        $updateStok->stok = $updateStok->stok - $validated['jumlah'];

        $updateStok->save();

        Peminjaman::create($validated);
        return redirect('/buku')->with('success', 'Buku berhasil dipinjam!');
    }

    public function cari(Request $request)
    {
        // $bukus = Buku::table('bukus')->paginate(10);
        $title = 'Semua buku';

        if (request('kategori')) {
            $kategori = Kategori::firstWhere('nama', request('kategori'));
            $title = ' Kategori ' . $kategori->nama;
        }

        $cari = $request->cari;

        $bukus = Buku::latest()
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate();
        // dd($bukus);
        // return view('landingpage.buku.index', ['bukus' => $bukus]);
        $kategoris = Kategori::latest()->get();
        return view('landingpage.buku.index', compact('bukus', 'kategoris'), [
            'title' => $title
        ]);
    }
}
