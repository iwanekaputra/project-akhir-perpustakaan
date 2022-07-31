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
									<li class="breadcrumb-item active" aria-current="page">Edit Pengarang</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Pengarang</h4>
						</div>
					</div>
                    <form action="{{route('pengarang.update',$pengarang->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="nama" value="{{$pengarang->nama}}" class="form-control" placeholder="Nama">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
                            <input type="email" name="email"  value="{{$pengarang->email}}" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Hp</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="hp"  value="{{$pengarang->hp}}" class="form-control" placeholder="HP">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Foto</label>
							<input type="hidden" name="oldCover" value="{{ $pengarang->foto }}">
	                        @if ($pengarang->foto) 
	                            <img src="{{ asset('admin/vendors/images/' . $pengarang->foto) }}" alt="" class="cover-preview img-fluid col-sm-5 mb-3 d-block">
	                        @else
	                            <img class="cover-preview img-fluid col-sm-5 mb-3 d-block" alt="">
	                        @endif
                     		 <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="foto" onchange="previewCover()">
						</div>
						<div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
				        </div>
					</form>

			
@endsection