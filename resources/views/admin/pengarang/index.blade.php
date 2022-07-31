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
								<li class="breadcrumb-item active" aria-current="page">Data Pengarang</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<a class="btn btn-primary" href="{{ route('pengarang.create') }}">Tambah Pengarang</a>

					</div>
				</div>
			</div>
				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Pengarang</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>EMAIL</th>
                                    <th>HP</th>
									<th class="table-plus datatable-nosort">OPSI</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pengarang as $p)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $p->nama }}</td>
										<td>{{ $p->email }}</td>
                                        <td>{{ $p->hp}}</td>
										<td>
											<form action="{{route('pengarang.show', $p->id)}}" method="POST">
												<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
													</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg-{{ $p->id }}" type="button"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="{{ route('pengarang.edit',$p->id) }}"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item delete-confirm" href="/pengarang-delete/{{$p->id}}"><i class="dw dw-delete-3"></i> Delete</a>
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
			
{{-- detail --}}
@foreach ($pengarang as $detail)
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myLargeModalLabel">Detail Pengarang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('admin/vendors/images/' . $detail->foto) }}" alt="" class="bg_img">					
					</div>
					<div class="col-md-8">
					<table class="table">
						<tbody>
							<br/><br/><br/>
							<tr>
								<th>Nama Pengarang</th>
								<td>:</td>
								<td>{{ $detail->nama }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>:</td>
								<td>{{ $detail->email }}</td>
							</tr>
							<tr>
								<th>Hp</th>
								<td>:</td>
								<td>{{ $detail->hp }}</td>
							</tr>
						</tbody>
					</table>
					<br/><br/><br/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection
							