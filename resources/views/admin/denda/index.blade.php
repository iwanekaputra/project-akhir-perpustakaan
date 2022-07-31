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
							<li class="breadcrumb-item active" aria-current="page"> Data Denda</li>
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
						<h4 class="text-blue h4">Data Denda</h4>
					</div>
				</div>
			</div>
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<thead>
						<tr>
							<th scope="col">NO</th>
							<th scope="col">Nama</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Tgl Pinjam</th>
							<th scope="col">Tgl Kembali</th>
							<th class="table-plus datatable-nosort">Harga Denda</th>
							<th class="table-plus datatable-nosort">Status</th>
							<th class="table-plus datatable-nosort">Opsi</th>

						</tr>
					</thead>
					<tbody>
						@foreach ($dendas as $denda)
						@if ($denda->keterangan_id == 7 || $denda->keterangan_id == 8)
							<tr>
							<td scope="row">{{ $loop->iteration }}</td>
							<td scope="row">{{ $denda->peminjaman->nama }}</th>
							<td scope="row">{{ $denda->peminjaman->jumlah }}</th>
							<td scope="row">{{ $denda->peminjaman->tgl_pinjam }}</th>
							<td scope="row">{{ $denda->peminjaman->tgl_kembali }}</th>
							<td scope="row">Rp. {{ number_format($denda->harga_denda,0,",",".") }}</th>
							<td scope="row">{{ $denda->keterangan->status }}</th>
							<td scope="row">
									<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
												</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" data-toggle="modal" data-target="#small-modal-{{ $denda->id }}" type="button"><i class="dw dw-edit2"></i> Aksi</a>
										</div>
								
							</td>
							
						</tr>
					  	@else
						@endif
						
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
		<!-- Export Datatable End -->
	</div>
</div>

{{-- modal --}}
@foreach ($dendas as $denda)
<div class="modal fade" id="small-modal-{{ $denda->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form action="{{ route('denda.update', $denda->id) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Keterangan :</label>
						<input type="hidden" value="{{ $denda->id }}" name="id">
						<select class="custom-select form-control" name="keterangan_id">
							@foreach ($keterangans as $keterangan)
								@if (old('keterangan_id', $denda->keterangan->id) == $keterangan->id)
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