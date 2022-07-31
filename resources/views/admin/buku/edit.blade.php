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
									<li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Buku</h4>
						</div>
					</div>
                    <form action="{{route('buku.update',$buku->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">ISBN :</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="isbn" value="{{$buku->isbn}}" class="form-control" placeholder="ISBN">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Judul</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="judul"  value="{{$buku->judul}}" class="form-control" placeholder="Judul">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Stok</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="stok"  value="{{$buku->stok}}" class="form-control" placeholder="Stok">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Halaman</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="halaman"  value="{{$buku->halaman}}" class="form-control" placeholder="Halaman">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Harga</label>
							<div class="col-sm-12 col-md-10">
                            <input type="text" name="harga"  value="{{$buku->harga}}" class="form-control" placeholder="Harga">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pengarang</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="pengarang_id">
								<option value="">---- Pilih Pengarang Buku ----</option>
									@foreach ($pengarang as $p)
										<option value="{{ $p->id }}"{{ ($p->id == $buku->pengarang_id)?'selected':'' }}>{{$p->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Penerbit</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="penerbit_id">
								<option value="">---- Pilih Penerbit Buku ----</option>
									@foreach ($penerbit as $pen)
										<option value="{{ $pen->id }}"{{ ($pen->id == $buku->penerbit_id)?'selected':'' }}>{{$pen->nama}}</option>
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
										<option value="{{ $kategori->id }}"{{ ($kategori->id == $buku->kategori_id)?'selected':'' }}>{{$kategori->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Rak</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="rak_id">
								<option value="">---- Pilih Rak Buku ----</option>
									@foreach ($rak as $r)
										<option value="{{ $kategori->id }}"{{ ($r->id == $buku->rak_id)?'selected':'' }}>{{$r->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Cover</label>
							<input type="hidden" name="oldCover" value="{{ $buku->cover }}">
	                        @if ($buku->cover) 
	                            <img src="{{ asset('admin/vendors/images/' . $buku->cover) }}" alt="" class="cover-preview img-fluid col-sm-5 mb-3 d-block">
	                        @else
	                            <img class="cover-preview img-fluid col-sm-5 mb-3 d-block" alt="">
	                        @endif
                     		 <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" onchange="previewCover()">
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                        	<textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
						</div>
						<div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
				        </div>
					</form>

			
@endsection