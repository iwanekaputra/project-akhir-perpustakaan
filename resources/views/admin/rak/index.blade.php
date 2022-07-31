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
								<li class="breadcrumb-item active" aria-current="page">Rak</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#small-modal" type="button">Tambah Rak</button>

					</div>
				</div>
			</div>


				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Rak</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>OPSI</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($rak as $r)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $r->nama }}</td>
										<td>
										<form action="{{route('rak.show', $r->id)}}" method="POST">
												<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
													</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{ route('rak.edit',$r->id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item delete-confirm" href="/rak-delete/{{$r->id}}"><i class="dw dw-delete-3"></i> Delete</a>
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
				<!-- Export Datatable End -->
</div>

    </div>

<br>
<div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form action="{{ route('rak.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Nama : </label>
						<input class="form-control" type="text" name="nama">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
			
		
	


@endsection
							