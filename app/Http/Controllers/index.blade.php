@extends('admin.main')

@section('section')


<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Peminjam</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Peminjam</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>


		<!-- Export Datatable start -->
		<div class="card-box mb-30">
			<div class="pd-20">
				<h4 class="text-blue h4">Peminjam</h4>
			</div>
			<div class="pb-20">
				<table class="table multiple-select-row data-table-export" cellpadding="10" cellspacing="20">
					<thead>
						<tr>
							<th scope="col">NO</th>
							<th scope="col">Nama</th>
							<th scope="col">Judul Buku</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Opsi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($peminjaman as $peminjam)
							<tr>
								<td scope="row">{{ $loop->iteration }}</td>
								<td scope="row">{{ $peminjam->nama }}</td>
								<td scope="row">{{ $peminjam->buku->judul }}</td>
								<td scope="row">{{ $peminjam->keterangan->status }}</td>
								<td scope="row">
										<a href="#" class="badge badge-info" data-toggle="modal" data-target="#bd-example-modal-lg-{{ $peminjam->id }}" type="button">Detail</a>
										<a href="#" class="badge badge-primary" data-toggle="modal" data-target="#small-modal-{{ $peminjam->id }}" type="button">Aksi</a>
										
									</form>
								</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- Export Datatable End -->
	</div>
</div>	


{{-- detail --}}
@foreach ($peminjaman as $detail)
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Detail Peminjam</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-5">
						<img src="{{ asset('admin/vendors/images/' . $detail->buku->cover) }}" alt="" class="bg_img">					
					</div>
					<div class="col-md-7">
					<table class="table">
						<tbody>
							<tr>
								<th>Nama Peminjam</th>
								<td>:</td>
								<td>{{ $detail->nama }}</td>
							</tr>
							<tr>
								<th>Judul Buku</th>
								<td>:</td>
								<td>{{ $detail->buku->judul }}</td>
							</tr>
							<tr>
								<th>Jumlah</th>
								<td>:</td>
								<td>{{ $detail->jumlah }}</td>
							</tr>
							<tr>
								<th>Waktu Dipinjam</th>
								<td>:</td>
								<td>{{ $detail->tgl_pinjam }}</td>
							</tr>
							<tr>
								<th>Waktu Pengembalian</th>
								<td>:</td>
								<td>{{ $detail->tgl_kembali }}</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach


@foreach ($peminjaman as $detail)
<div class="modal fade" id="small-modal-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form action="{{ route('peminjam.update', $detail->id) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Keterangan :</label>
						<select class="custom-select form-control" name="keterangan_id">
							@foreach ($keterangans as $keterangan)
								@if (old('keterangan_id', $detail->keterangan->id) == $keterangan->id)
							  		<option value="{{ $keterangan->id }}" selected>{{ $keterangan->status }}</option>
							  	@else
								  <option value="{{ $keterangan->id }}">{{ $keterangan->status }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection
							
										
										
							