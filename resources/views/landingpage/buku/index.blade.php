@extends('landingpage.buku.main')
@section('content')
<div class="container">
	<div class="row mt-5">


		<form class="form-inline" action="{{ url('/buku/cari') }}" method="GET">
			<input class="form-control mr-sm-2" type="text" name="cari" placeholder="Cari Buku"
				value="{{ old('cari') }}">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
		</form>

		<div class="col-lg-3">
			<ul class="list-unstyled templatemo-accordion">
				<li class="pb-3"><br />
					<a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
						Kategori
					</a>
					<ul class="collapse show list-unstyled pl-3">
						@foreach ($kategoris as $kategori)
						<li><a class="text-decoration-none" href="{{ url('/buku?kategori= ' . $kategori->nama ) }}">{{
								$kategori->nama }}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-lg-9">
			<div class="row">
				@foreach ($bukus as $buku)
				<div class="col-md-6">
					<div class="blog-list"><br />
						<ul>
							<li>
								<div class="row no-gutters">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="blog-img">
											<img src="{{ asset('admin/vendors/images/' . $buku->cover) }}" alt=""
												class="bg_img">
										</div>
									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<div class="blog-caption">
											<h4><a href="#">{{ $buku->judul }}</a></h4>
											<div class="blog-by">
												<p>Isbn : {{ $buku->isbn }}</p>
												<p>Penerbit : {{ $buku->penerbit->nama }}</p>
												<p>Pengarang : {{ $buku->pengarang->nama }}</p>
												<p>Kategori : {{ $buku->kategori->nama }}</p>
												<div class="pt-10">
													<a href="#" class="btn btn-outline-primary" data-toggle="modal"
														data-target="#bd-example-modal-lg-{{ $buku->id }}"
														type="button">Detail</a>
													@auth
													<a href="#" class="btn btn-outline-primary" data-toggle="modal"
														data-target="#bd-example-modal-lg-{{ $buku->id }}-pinjam"
														type="button">Pinjam</a>
													@else
													<a href="#" class="btn btn-outline-primary" data-backdrop="static"
														data-toggle="modal" data-target="#login-modal"
														type="button">Pinjam</a>
													@endauth

												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>




<!-- Large modal -->
@foreach ($bukus as $detail)
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-{{ $detail->id }}" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">{{ $detail->judul }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('admin/vendors/images/' . $detail->cover) }}" alt="" class="bg_img">
					</div>
					<div class="col-md-6">
						<table class="table">
							<tbody>
								<tr>
									<th>Judul</th>
									<td>:</td>
									<td>{{$detail->judul}}</td>
								</tr>
								<tr>
									<th>Isbn</th>
									<td>:</td>
									<td>{{$detail->isbn}}</td>
								</tr>
								<tr>
									<th>Halaman</th>
									<td>:</td>
									<td>{{$detail->halaman}}</td>
								</tr>
								<tr>
									<th>Penerbit</th>
									<td>:</td>
									<td>{{$detail->penerbit->nama}}</td>
								</tr>
								<tr>
									<th>Pengarang</th>
									<td>:</td>
									<td>{{ $detail->pengarang->nama }}</td>
								</tr>
								<tr>
									<th>Kategori</th>
									<td>:</td>
									<td>{{ $detail->kategori->nama }}</td>
								</tr>
								<tr>
									<th>Rak</th>
									<td>:</td>
									<td>{{$detail->rak->nama}}</td>
								</tr>
								<tr>
									<th>Stok</th>
									<td>:</td>
									<td>{{$detail->stok}}</td>
								</tr>
								<tr>
									<th>Deskripsi</th>
									<td>:</td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<p align="justify">{!! $detail->deskripsi !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

@foreach ($bukus as $pinjam)
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-{{ $pinjam->id }}-pinjam" tabindex="-1"
	role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 align="" class="modal-title text-center" id="myLargeModalLabel">Silahkan Isi data terlebih dahulu
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form action="{{ url('/buku') }}" method="POST">
					@csrf
					<input type="hidden" value="{{ $pinjam->id }}" name="buku_id">
					<div class="form-group">
						<label>Nama Asli</label>
						<input class="form-control" type="text" placeholder="Nama" name="nama">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input class="form-control" type="text" placeholder="Jumlah" name="jumlah">
					</div>
					<div class="form-group">
						<label>Tanggal Pinjam</label>
						<input class="form-control" placeholder="Select Date" type="date" name="tgl_pinjam">
					</div>
					<div class="form-group">
						<label>Tanggal Pengembalian</label>
						<input class="form-control" placeholder="Select Date" type="date" name="tgl_kembali">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Pinjam</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endforeach

<!-- Login modal -->



@endsection