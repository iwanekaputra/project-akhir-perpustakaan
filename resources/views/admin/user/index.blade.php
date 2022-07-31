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
							<li class="breadcrumb-item active" aria-current="page"> Data User</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>


		<!-- Export Datatable start -->
		<div class="card-box mb-30">
			<div class="pd-20">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<h4 class="text-blue h4">Data User</h4>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-6">
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Nama</th>
						      <th scope="col">Role</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach ($users as $user)
						  	<tr>
						      <td scope="">{{ $loop->iteration }}</td>
						      <td scope="">{{ $user->fullname }}</td>
						      @if($user->is_admin)
						  		<td scope="">Admin</td>
						      @else 
						  		<td scope="">Siswa</td>
						      @endif
						      <td>
						      	<button class="badge badge-info border-0" data-toggle="modal" data-target="#small-modal-{{ $user->id }}" type="button">Ubah</button>

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
</div>

@foreach ($users as $user)
	{{-- expr --}}
<div class="modal fade" id="small-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form action="{{ route('user.update', $user->id) }}" method="POST">
					@csrf
                    @method('PUT')
					<div class="form-group">
						<label>Role : </label>

							<select class="custom-select col-12" name="is_admin">
								@if($user->is_admin)
									<option value="1" selected>Admin</option>
									<option value="0">Siswa</option>
								@else
									<option value="1" >Admin</option>
									<option value="0" selected>Siswa</option>
								@endif

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