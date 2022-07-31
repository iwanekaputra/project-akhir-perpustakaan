<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class BukuExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Buku::all();
        $buku = DB::table('bukus')
        ->join('penerbit', 'penerbit_id',  '=', 'bukus.penerbit_id')
        ->join('pengarang', 'pengarang_id', '=', 'bukus.pengarang_id')
        ->join('kategori', 'kategori_id', '=', 'bukus.kategori_id')
        ->join('rak', 'rak_id', '=', 'bukus.rak_id')
        ->select('bukus.isbn','bukus.judul','bukus.stok', 'penerbit.nama AS penerbit', 'pengarang.nama AS pengarang','kategori.nama AS kategori', 'rak.nama AS rak')
        ->get();

        return $buku;
    }

        //buat judul kolom di excel
    public function headings(): array{
        return["ISBN", "Judul Buku", "Stok", "Nama Penerbit", "Nama Pengarang","Kategori","Rak"];

    }
}
