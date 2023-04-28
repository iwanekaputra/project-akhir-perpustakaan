<!-- ======= Services Section ======= -->
{{-- @dd($favBooks); --}}
@php
use App\Models\Buku;
@endphp

<section id="services" class="services section-bg">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-in">Buku Favorit</h2>
      <p data-aos="fade-in">Buku favorit adalah buku yang minggu ini sangat banyak diminati untuk dibaca.</p>
    </div>

    <div class="row">
      @foreach( $favBooks as $fav)
      @php
        $buku = Buku::where("judul", $fav->judul)->get();

      @endphp
      <div class="col-md-4" data-aos="fade-right">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('admin/vendors/images/'.$buku[0]->cover) }}" alt="Card image cap">
            <div class="mt-5">
                <h5 class="card-title"><a href="">{{ $fav->judul }}</a></h5>
                        <p class="card-text">{!! $buku[0]->deskripsi !!}</p>
            </div>
            </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Services Section -->
