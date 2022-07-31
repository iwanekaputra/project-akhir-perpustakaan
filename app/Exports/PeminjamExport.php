<?php

namespace App\Exports;
use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class PeminjamExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Buku::all();
        $peminjam = DB::table('peminjamen')
        ->join('bukus', 'buku_id', '=', 'peminjamen.buku_id')
        ->join('keterangans', 'keterangan_id', '=', 'peminjamen.keterangan_id')
        ->select('peminjamen.nama','peminjamen.jumlah','peminjamen.tgl_pinjam','peminjamen.tgl_kembali','bukus.judul AS judul', 'keterangans.status AS keterangan')
        ->get();

        return $peminjam;
    }

        //buat judul kolom di excel
    public function headings(): array{
        return["Nama Peminjam","Jumlah", "Tanggal Pinjam", "Tanggal Kembali","Judul Buku", "Status"];

    }
}
