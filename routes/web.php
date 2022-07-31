<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\AdminRakController;
use App\Http\Controllers\AdminPenerbitController;
use App\Http\Controllers\AdminPengarangController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminDendaController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout.index');
// });
// Route::get('/', function () {
//     return view('admin.index');
// });


// halaman landing page
Route::get('/', function () {
	$favBooks = DB::table('peminjamen')->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
		->select(DB::raw('judul, sum(jumlah) as jumlah'))->groupBy('judul')->orderBy('jumlah', 'desc')->limit(4)->get();
	// dd($favBooks);
	return view('landingpage.partials.home', compact('favBooks'));
})->name('buku');


// menu halaman buku dan pinjam buku
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);

Route::get('/contact', [ContactController::class, 'index']);

// menu auth user
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// route login
Route::get('/login', function () {
	return view('login.login');
});


// page buku yang dipinjam siswa
Route::get('/buku-dipinjam', [PeminjamController::class, 'index']);
Route::post('batal/{id}', [PeminjamController::class, 'destroy']);



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
	Route::get('dashboard', function () {
		$chart = DB::table('peminjamen')->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
			->select(DB::raw('judul, sum(jumlah) as jumlah'))->groupBy('judul')->get();
		// dd($chart);
		return view('admin.dashboard', compact('chart'));
	})->name('dashboard');

	Route::resource('peminjam', AdminPeminjamanController::class);
	Route::resource('buku', AdminBukuController::class);
	Route::resource('kategori', AdminKategoriController::class);
	Route::resource('penerbit', AdminPenerbitController::class);
	Route::resource('pengarang', AdminPengarangController::class);
	Route::resource('rak', AdminRakController::class);
	Route::resource('denda', AdminDendaController::class);
	Route::resource('user', AdminUserController::class);

	Route::get('transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi');
});
Route::get('/buku-delete/{id}', [AdminBukuController::class, 'delete']);
Route::get('/rak-delete/{id}', [AdminRakController::class, 'delete']);
Route::get('/penerbit-delete/{id}', [AdminPenerbitController::class, 'delete']);
Route::get('/pengarang-delete/{id}', [AdminPengarangController::class, 'delete']);
Route::get('/kategori-delete/{id}', [AdminKategoriController::class, 'delete']);

Route::get('buku-pdf', [AdminBukuController::class, 'bukuPDF']);
Route::get('buku-excel', [AdminBukuController::class, 'bukuExcel']);
Route::get('peminjam-pdf', [AdminPeminjamanController::class, 'peminjamPDF']);
Route::get('peminjam-excel', [AdminPeminjamanController::class, 'peminjamExcel']);
Route::get('transaksi-pdf', [AdminTransaksiController::class, 'transaksiPDF']);
Route::get('transaksi-excel', [AdminTransaksiController::class, 'transaksiExcel']);

Route::get('/buku/cari', [BukuController::class, 'cari']);
