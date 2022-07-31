<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use PDF;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;


class AdminTransaksiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::get();

        return view("admin.transaksi.index", compact('peminjaman'));
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect('/buku-dipinjam')->with('success', 'Anda membatalkan pinjaman');
    }

public function transaksiPDF(){
        $data = Peminjaman::all();
        $pdf = PDF::loadView('admin/transaksi/transaksiPDF', ['data' => $data]);
        return $pdf -> download(date('d/m/y').'_data_transaksi.pdf');
    }

    public function transaksiExcel(){
    return Excel::download(new TransaksiExport, date('d-m-y').'_data_transaksi.xlsx');

    }
}
