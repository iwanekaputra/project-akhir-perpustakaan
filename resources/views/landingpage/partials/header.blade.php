<!-- ======= Header ======= -->
<header id="header">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <h1><a href="#about">SIMPEKU<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto {{ Request::is('/*') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
        <li><a class="nav-link scrollto {{ Request::is('buku*') ? 'active' : '' }}" href="{{ url('/buku') }}">Buku</a>
        </li>
        @auth
        <li><a class="nav-icon position-relative text-decoration-none" href="{{ url('buku-dipinjam') }}"><i
              class="icon-copy fa fa-book" aria-hidden="true"></i><span
              class="position-absolute top-0 translate-middle badge rounded-pill bg-dark text-white">{{
              DB::table('peminjamen')->where('user_id', auth()->user()->id)->count() }}</span></a></li>
        <li class="dropdown"><a href="#"><span>{{ Auth::user()->fullname }}</span> <i
              class="bi bi-chevron-down"></i></a>
          <ul>
            <li>
              <form action="{{ url('logout') }}" method="post">
                @csrf
                <button type="submit" class="dropdown-item fs-8"> Logout</button>
              </form>
            </li>
          </ul>
        </li>

        @else
        <li><a class="getstarted scrollto" class="" data-backdrop="static" data-toggle="modal"
            data-target="#login-modal" type="button">Login</a></li>
        <li><a class="getstarted scrollto" class="" href="{{ url('register') }}">Register</a></li>
        @endauth

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->



<!-- Login modal -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
          <h2 class="text-center text-primary ">Login To SIMPEKU</h2>
        </div>
        <form action="{{ url('login') }}" method="post">
          @csrf
          <div class="input-group custom">
            <input type="text" class="form-control form-control-lg" placeholder="Email" name="email">
            <div class="input-group-append custom">
              <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div>
          </div>
          <div class="input-group custom">
            <input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
            <div class="input-group-append custom">
              <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
          </div>
          <div class="row pb-30">
            <div class="col-6">
            </div>
            <div class="col-6">
              <div class="forgot-password"><a href="">Forgot Password</a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group mb-0">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>