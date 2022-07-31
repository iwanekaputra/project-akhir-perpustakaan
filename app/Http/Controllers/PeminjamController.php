<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Buku;


class PeminjamController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)->get();

        return view("siswa.index", compact('peminjaman'));
    }

    public function destroy($id)
    {

        $idpeminjam = Peminjaman::find($id);
        // dd($idpeminjam);

        $updateStok = Buku::find($idpeminjam->buku_id);
        // dd($updateStok);

        $updateStok->stok = $updateStok->stok + $idpeminjam->jumlah;

        $updateStok->save();

        Peminjaman::destroy($id);

        return redirect('/buku-dipinjam')->with('success', 'Anda membatalkan pinjaman');
    }
}
