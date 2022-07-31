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
									<li class="breadcrumb-item active" aria-current="page">Tambah Rak</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4 mb-30">Tambah Rak</h4>
						</div>
					</div>
					<form action="{{ route('rak.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="nama">
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Cancel</button>
						<button class="btn btn-primary" type="submit">Simpan</button>

						
						
					</form>
				</div>
			</div>
		</div>
			@endsection