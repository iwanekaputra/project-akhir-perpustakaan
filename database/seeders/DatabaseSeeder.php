<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Keterangan;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Buku::create([
            'isbn' => '210-103-2-21-32',
            'judul' => 'Jejak Petualangan',
            'cover' => '1.jpg',
            'stok' => 20,
            'deskripsi' => 'Desa Eliasa, desa muda di Kepulauan Selaru, Maluku Tenggara Barat. Desa ini merupakan desa terluar dan desa terdepan Indonesia yang langsung menghadap ke perbatasan Australia. Letaknya yang strategis, membuatnya sempat dijadikan posko pengintaian pada masa perang dunia kedua oleh Jepang. Eliasa surga perairan di ujung Pulau Selaru. Laut yang luas terbentang di Selaru di manfaatkan oleh masyarakatnya mencari gurita.',
            'halaman' => 90,
            'harga' => '70000',
            'pengarang_id' => 1,
            'penerbit_id' => 1,
            'kategori_id' => 1,
            'rak_id' => 1, 
        ]);

        Buku::create([
            'isbn' => '21123-092-103',
            'judul' => 'Masa depan pesantren',
            'cover' => '2.jpg',
            'stok' => 21,
            'deskripsi' => 'Kedua pesantren salafiyah yang dikaji dalam buku ini bukan hanya mempertahankan eksistensinya sebagai lembaga tafaqquh fiddin (pendalaman ilmu-ilmu keagamaan), melainkan juga mampu mengkreasi peran-peran baru yang sangat strategis dan dibutuhkan masyarakat terkini. Penulis berhasil menunjukkan bahwa kedua pesantren tersebut tetap istiqomah mengembangkan peran utamanya, yaitu sebagai: pertama, transmisi ilmu-ilmu dan pengetahuan Islam (transmission of Islamic knowledge); kedua, pemeliharaan tradisi Islam (maintenance of Islamics tradition); dan ketiga, reproduksi (mencetak calon-calon) ulama (reproduction of ulama). Semua itu didukung oleh faktor manajemen dan kepemimpinan kedua pengasuh dari kedua pesantren tersebut.',
            'halaman' => 120,
            'harga' => '90000',
            'pengarang_id' => 1,
            'penerbit_id' => 1,
            'kategori_id' => 1,
            'rak_id' => 1, 
        ]);

        Buku::create([
            'isbn' => '2112-8781-238-123',
            'judul' => 'Pendidikan kewarganegaraan untuk perguruan tinggi',
            'cover' => '3.jpg',
            'stok' => 50,
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, quos dolore laudantium maiores, nam unde fugiat veritatis fuga ullam ad eum ut ex, perferendis facere iusto esse delectus. At, architecto voluptatum sequi odio impedit, rerum consectetur dolorum, earum incidunt quaerat similique? Quis, suscipit voluptatem, quasi sed eius tempore? Dolorem fugiat consequatur repudiandae eum, necessitatibus odio dignissimos hic magnam quidem cupiditate quos? Tenetur perspiciatis error mollitia quas itaque magni natus voluptate ipsa odit fuga, enim ut sed officia, atque harum numquam maxime, optio nesciunt asperiores sapiente nemo, reiciendis eos eius esse vitae. Voluptatibus tenetur vitae alias sunt, nemo excepturi, dolore soluta!',
            'halaman' => 128,
            'harga' => '54000',
            'pengarang_id' => 2,
            'penerbit_id' => 2,
            'kategori_id' => 5,
            'rak_id' => 2, 
        ]);
        Pengarang::create([
            'nama' => 'marko',
            'email' => 'marko@gmail.com',
            'hp' => '089318291029',
            'foto' => 'jpg.jpg',
        ]);
        Pengarang::create([
            'nama' => 'buyung',
            'email' => 'buyung@gmail.com',
            'hp' => '08193281923',
            'foto' => 'jpg.jpg',
        ]);
        Penerbit::create([
            'nama' => 'mrinit',
            'alamat' => 'Jl.lontong',
            'email' => 'mrinit@gmail.com',
            'hp' => '08928593012',
            'foto' => '12.jpg',
        ]);
        Penerbit::create([
            'nama' => 'munir',
            'alamat' => 'Jl.umpia',
            'email' => 'munit@gmail.com',
            'hp' => '0895092103',
            'foto' => '12.jpg',
        ]);
        Rak::create([
            'nama' => 'Rak 1',
        ]);
        Rak::create([
            'nama' => 'Rak 2',
        ]);
        Rak::create([
            'nama' => 'Rak 3',
        ]);
        Rak::create([
            'nama' => 'Rak 4',
        ]);
        Rak::create([
            'nama' => 'Rak 5',
        ]);
        Rak::create([
            'nama' => 'Rak 6',
        ]);
        Rak::create([
            'nama' => 'Rak 7',
        ]);
        Rak::create([
            'nama' => 'Rak 8',
        ]);
        Rak::create([
            'nama' => 'Rak 9',
        ]);
        Rak::create([
            'nama' => 'Rak 10',
        ]);
        Kategori::create([
            'nama' => 'Petualangan',
        ]);
        Kategori::create([
            'nama' => 'Romantis',
        ]);
        Kategori::create([
            'nama' => 'Islami',
        ]);
        Kategori::create([
            'nama' => 'Drama',
        ]);
        Kategori::create([
            'nama' => 'Pendidikan',
        ]);

        User::create([
            'fullname' => 'Muhammad Taufik',
            'email' => 'muhammadtaufik@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'taufik.jpg',
            'is_admin' => 1
        ]);
        User::create([
            'fullname' => 'Iwan Eka Putra',
            'email' => 'iwanekaputra@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'iwan.jpg',
            'is_admin' => 1
        ]);
        User::create([
            'fullname' => 'Suryani',
            'email' => 'suryani@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'suryani.jpg',
            'is_admin' => 1
        ]);
        User::create([
            'fullname' => 'Nining Suprasmanto',
            'email' => 'niningsuprasmanto@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'nining.jpg',
            'is_admin' => 1
        ]);
        User::create([
            'fullname' => 'Muhammad Arifin',
            'email' => 'muhammadarifin@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'arifin.jpg',
            'is_admin' => 1
        ]);

        Keterangan::create([
            'status' => 'Sedang Dikonfirmasi'
        ]);
        Keterangan::create([
            'status' => 'Konfirmasi'
        ]);
        Keterangan::create([
            'status' => 'Gagal Konfirmasi'
        ]);
        Keterangan::create([
            'status' => 'Sedang Dipinjam'
        ]);
        Keterangan::create([
            'status' => 'Denda'
        ]);
        Keterangan::create([
            'status' => 'Sudah Dikembalikan'
        ]);

        Keterangan::create([
            'status' => 'Belum Lunas'
        ]);

        Keterangan::create([
            'status' => 'Lunas'
        ]);
    }


}

