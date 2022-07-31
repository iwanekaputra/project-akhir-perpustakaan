@extends('admin.main')

@section('section')


<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page"> Data Transaksi</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<a href="{{url('transaksi-pdf')}}" type="button" class="btn btn-outline-primary">
							<i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"> PDF</i>
						</a>
						<a href="{{url('transaksi-excel')}}" class="btn btn-outline-primary">
							<i class="icon-copy fa fa-file-excel-o" aria-hidden="true"> Excel</i>
						</a>
					</div>
				</div>
			</div>
		</div>


		<!-- Export Datatable start -->
		<div class="card-box mb-30">
			<div class="pd-20">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<h4 class="text-blue h4">Data Transaksi</h4>
					</div>
				</div>
			</div>
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<thead>
						<tr>
							<th scope="col">NO</th>
							<th scope="col">Nama</th>
							<th scope="col">Buku</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Tgl Pinjam</th>
							<th scope="col">Tgl Kembali</th>
							<th class="table-plus datatable-nosort">Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($peminjaman as $peminjam)
						@if($peminjam->keterangan->id == 6 || $peminjam->keterangan->id == 8)
						<tr>
							<td scope="row">{{ $loop->iteration }}</td>
							<td scope="row">{{ $peminjam->nama }}</th>
							<td scope="row">{{ $peminjam->buku->judul }}</td>
							<td scope="row">{{ $peminjam->jumlah }}</td>
							<td scope="row">{{ $peminjam->created_at }}</td>
							<td scope="row">{{ $peminjam->tgl_kembali }}</td>
							<td scope="row">
								{{-- <input type="hidden" value="{{ $peminjam->id }}" name="id"> --}}
								<button class="badge badge-success border-0">Selesai</button>
							</td>
						</tr>
						@endif
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
		<!-- Export Datatable End -->
	</div>
</div>




@endsection