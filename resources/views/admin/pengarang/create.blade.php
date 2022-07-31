@extends('admin.main')

@section('section')

<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tambah Pengarang</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4 mb-30">Tambah Pengarang</h4>
						</div>
					</div>
					<form action="{{ route('pengarang.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
						<div class="form-group @error('nama') has-danger @enderror row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
								@error('nama')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
							</div>
						</div>
						<div class="form-group @error('email') has-danger @enderror row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="email" name="email" value="{{ old('email') }}">
								@error('email')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
							</div>
						</div>
						<div class="form-group @error('hp') has-danger @enderror row">
							<label class="col-sm-12 col-md-2 col-form-label">Hp</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="hp" value="{{ old('hp') }}">
								@error('hp')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
							</div>
						</div>
						<div class="form-group @error('foto') has-danger @enderror row">
							<label class="col-sm-12 col-md-2 col-form-label">Foto</label>
							<div class="col-sm-12 col-md-10">
								<img class="cover-preview img-fluid col-sm-5 d-block" alt="">
								<input type="file" class="form-control-file form-control height-auto" id="cover" name="foto" onchange="previewCover()">
								@error('foto')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
							</div>
						</div>

						<button class="btn btn-primary" type="submit">Cancel</button>
						<button class="btn btn-primary" type="submit">Simpan</button>

						
						
					</form>
				</div>
			</div>
		</div>
			@endsection