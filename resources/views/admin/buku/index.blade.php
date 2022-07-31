@extends('admin.main')

@section('section')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
					<div class="col-md-6 col-sm-12">
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Buku</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<a href="{{url('buku-pdf')}}" type="button" class="btn btn-outline-primary">
							<i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"> PDF</i>
						</a>
						<a href="{{url('buku-excel')}}" class="btn btn-outline-primary" >
							<i class="icon-copy fa fa-file-excel-o" aria-hidden="true"> Excel</i>
						</a>
							</div>
							<a class="btn btn-primary" href="{{ route('buku.create') }}">Tambah Buku</a>
					</div>
				</div>
			</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Buku</h4>
					</div>
					@error('deskripsi')
					      <div class="invalid-feedback">
							{{ $message }}				      	
					      </div>
				      @enderror
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO</th>
									<th>JUDUL</th>
									<th>ISBN</th>
									<th>STOCK</th>
									<th class="table-plus datatable-nosort">OPSI</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($bukus as $buku)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $buku->judul }}</td>
										<td>{{ $buku->isbn }}</td>
										<td>{{ $buku->stok }}</td>
										<td>
											<form action="{{route('buku.show', $buku->id)}}" method="POST">
												<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
													</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg-{{ $buku->id }}" type="button"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="{{ route('buku.edit',$buku->id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item delete-confirm" href="/buku-delete/{{$buku->id}}"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</form>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
		</div>
	</div>
</div>
<br>

{{-- detail --}}
@foreach ($bukus as $detail)
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Detail Buku</h4>
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
								<th>ISBN</th>
								<td>:</td>
								<td>{{ $detail->isbn }}</td>
							</tr>
							<tr>
								<th>Judul Buku</th>
								<td>:</td>
								<td>{{ $detail->judul }}</td>
							</tr>
							<tr>
								<th>Stok</th>
								<td>:</td>
								<td>{{ $detail->stok }}</td>
							</tr>
							<tr>
								<th>Halaman</th>
								<td>:</td>
								<td>{{ $detail->halaman }}</td>
							</tr>
							<tr>
								<th>Harga</th>
								<td>:</td>
								<td>{{$detail->harga}} </td>
							</tr>
							<tr>
								<th>Nama Pengarang</th>
								<td>:</td>
								<td>{{ $detail->pengarang->nama}}</td>
							</tr>
							<tr>
								<th>Nama Penerbit</th>
								<td>:</td>
								<td>{{ $detail->penerbit->nama}}</td>
							</tr>
							<tr>
								<th>Kategori Buku</th>
								<td>:</td>
								<td>{{ $detail->kategori->nama}}</td>
							</tr>
							<tr>
								<th>Rak Buku</th>
								<td>:</td>
								<td>{{ $detail->rak->nama}}</td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<td>:</td>
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

		@endsection
				