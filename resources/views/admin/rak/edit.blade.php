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
									<li class="breadcrumb-item active" aria-current="page">Edit Rak</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Rak</h4>
						</div>
					</div>
                    <form action="{{route('rak.update',$rak->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="nama"  value="{{$rak->nama}}" class="form-control" placeholder="Nama">
							</div>
						</div>
						<div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
				        </div>
					</form>

			
@endsection