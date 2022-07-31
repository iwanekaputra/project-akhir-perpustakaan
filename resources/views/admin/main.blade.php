<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>Admin</title>

  @include('admin.link')
</head>
<body>
    <!-- <div class="pre-loader">
      <div class="pre-loader-box">
        <div class="loader-logo"><img src="{{asset('admin/vendors/images/deskapp-logo.svg')}}" alt="" /></div>
        <div class="loader-progress" id="progress_div">
          <div class="bar" id="bar1"></div>
        </div>
        <div class="percent" id="percent1">0%</div>
        <div class="loading-text">Loading...</div>
      </div>
    </div> -->
  @include('sweetalert::alert')
	@include('admin.header')

	@include('admin.right_sidebar')

	@include('admin.left_sidebar')

	@yield('section')
   
    @include('admin.script')
  </body>
</html>
