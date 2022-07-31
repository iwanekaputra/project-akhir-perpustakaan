@extends('admin.main')

@section('section')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Detail</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Detail</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Detail</h4>
						</div>
					</div>
                    <form action="{{route('penerbit.update',$penerbit->id)}}" method="POST">
                    @csrf
                    @method('PUT')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="nama" value="{{$penerbit->nama}}" class="form-control" placeholder="Nama" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="alamat"  value="{{$penerbit->alamat}}" class="form-control" placeholder="Alamat" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
                            <input type="email" name="email"  value="{{$penerbit->email}}" class="form-control" placeholder="Email" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Hp</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="hp"  value="{{$penerbit->hp}}" class="form-control" placeholder="Hp" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Foto</label>
							<div class="col-sm-12 col-md-10">
							
		                        <img src="{{ asset('admin/vendors/images/' . $penerbit->foto) }}" alt="" class="cover-preview img-fluid col-sm-5 mb-3 d-block">

							</div>
						</div>
					</form>

			
@endsection