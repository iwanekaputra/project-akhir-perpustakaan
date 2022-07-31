<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Peminjaman Buku</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('landingpage.partials.link')
  @include('admin.link')
</head>

<body>
    @include('landingpage.partials.header')

  <main id="main">
    <!-- ======= Clients Section ======= -->
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('landingpage.partials.footer')
  </footer><!-- End Footer -->

  <a href="#main" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('landingpage.partials.script')
    @include('admin.script')

</body>
</html>