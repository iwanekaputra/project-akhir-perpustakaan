@extends('landingpage.buku.main')

@section('content')

<div class="container">
	<h2 class="text-center mt-5">Buku yang dipinjam</h2>
	<div class="row mt-5 mb-5">
		<div class="col-md">
			<table class="table table-bordered text-center">
				<thead class="table-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Buku</th>
						<th scope="col">Rak</th>
						<th scope="col">Jumlah Dipinjam</th>
						<th scope="col">Waktu Pinjam</th>
						<th scope="col">Waktu Pengembalian</th>
						<th scope="col">Keterangan</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($peminjaman as $peminjam)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<th scope="row">{{ $peminjam->buku->judul }}</th>
						<th scope="row">{{ $peminjam->buku->rak->nama }}</th>
						<th scope="row">{{ $peminjam->jumlah }}</th>
						<th scope="row">{{ $peminjam->created_at }}</th>
						<th scope="row">{{ $peminjam->tgl_kembali }}</th>
						<th scope="row"><button class="badge badge-danger border-0">{{ $peminjam->keterangan->status }}</button></th>
						@if ($peminjam->keterangan_id == 1 || $peminjam->keterangan_id == 3)
						<form action="{{ url('batal', $peminjam->id) }}" method="POST">
							@csrf
							<th scope="row">
								<input type="hidden" value="{{ $peminjam->id }}" name="id">
								<button class="badge badge-secondary border-0" type="submit">Batal</button>
							</th>
						</form>
								
						@else
						<th scope="row">-</th>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-6">
			<p><b>Catatan penting : </b></p>
			<table class="table table-bordered">
				<thead class="table-secondary text-center">
					<tr>
						<th scope="col">Keterangan</th>
						<th scope="col">Penjelasan</th>
					</tr>
				</thead>
					<tr>
						<td>Sedang Konfirmasi</td>
						<td>
							<ul>
								<li>Menunggu konfirmasi dari petugas perpustakaan</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Konfirmasi</td>
						<td>
							<ul>
								<li>Petugas sudah mengkonfirmasi/menyetujui peminjaman buku dan datang ke perpus untuk mengambil bukunya</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Gagal Konfirmasi</td>
						<td>
							<ul>
								<li>Buku yang dipinjam terlalu lama pengembalian</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Sedang dipinjam</td>
						<td>
							<ul>
								<li>Buku sedang dipinjam oleh siswa</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Denda</td>
						<td>
							<ul>
								<li>buku yang dikembalikan tidak sesuai dengan tanggal pengembalian dan akan dikenakan denda Rp. 10.000</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Sudah dikembalikan</td>
						<td>
							<ul>
								<li>Buku yang dipinjam oleh siswa sudah dikembalikan ke perpustakaan</li>
							</ul>
						</td>
					</tr>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection