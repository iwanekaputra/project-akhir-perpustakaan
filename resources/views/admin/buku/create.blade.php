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
								<li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Default Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4 mb-30">Tambah Buku</h4>
					</div>
				</div>
				<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group @error('isbn') has-danger @enderror row">
						<label class="col-sm-12 col-md-2 col-form-label">Isbn</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="isbn" value="{{ old('isbn') }}">
							@error('isbn')
							<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group @error('judul') has-danger @enderror row">
						<label class="col-sm-12 col-md-2 col-form-label">Judul</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="judul" value="{{ old('judul') }}">
							@error('judul')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group @error('stok') has-danger @enderror row">
						<label class="col-sm-12 col-md-2 col-form-label">Stok</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="stok" value="{{ old('stok') }}">
							@error('stok')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group @error('halaman') has-danger @enderror row">
						<label class="col-sm-12 col-md-2 col-form-label">Halaman</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="halaman" value="{{ old('halaman') }}">
							@error('halaman')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group @error('harga') has-danger @enderror row">
						<label class="col-sm-12 col-md-2 col-form-label">Harga</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="harga" value="{{ old('harga') }}">
							@error('harga')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Pengarang</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="pengarang_id">
								<option value="">---- Pilih Pengarang Buku ----</option>
								@foreach ($pengarang as $p)
								<option value="{{ $p->id }}">{{ $p->nama }}</option>
								@endforeach
							</select>
							{{-- @foreach ($pengarang as $p)
							<input type="checkbox" name="pengarang_id[]" id=""> {{ $p->nama }} <br>
							@endforeach --}}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Penerbit</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="penerbit_id">
								<option value="">---- Pilih Penerbit Buku ----</option>
								@foreach ($penerbit as $pen)
								<option value="{{ $pen->id }}">{{ $pen->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="kategori_id">
								<option value="">---- Pilih Kategori Buku ----</option>
								@foreach ($kategoris as $kategori)
								<option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
								@endforeach
							</select>
							{{-- @foreach ($kategoris as $kategori)
							<input type="checkbox" name="kategori_id[]" id=""> {{ $kategori->nama }} <br>
							@endforeach --}}
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Rak</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="rak_id">
								<option value="">---- Pilih Rak Buku ----</option>
								@foreach ($rak as $r)
								<option value="{{ $r->id }}">{{ $r->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
			</div>
			<div class="form-group @error('cover') has-danger @enderror row">
				<label class="col-sm-12 col-md-2 col-form-label">Cover</label>
				<div class="col-sm-12 col-md-10">
					<img class="cover-preview img-fluid col-sm-5 d-block" alt="">
					<input type="file" class="form-control-file form-control height-auto" id="cover" name="cover"
						onchange="previewCover()">
						@error('cover')
								<div class="form-control-feedback has-danger">{{ $message }}</div>
							@enderror
				</div>
			</div>
			<div class="form-group @error('deskripsi') has-danger @enderror row">
				<label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
				<div class="col-sm-12 col-md-10">
					<textarea class="form-control " id="validationTextarea" placeholder="Required example textarea"
						name="deskripsi" value="{{ old('deskripsi') }}"></textarea>
						@error('deskripsi')
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