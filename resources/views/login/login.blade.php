@extends('landingpage.buku.main')

@section('content')

<div class="login-wrap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="login-box bg-white box-shadow border-radius-10">
					<div class="login-title">
						<h2 class="text-center text-primary">Login to App</h2>
					</div>
					<form action="{{ url('login') }}" method="post">
						@csrf
						@error('email')
						<div class="form-control-feedback has-danger">{{ $message }}</div>
						@enderror
						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" placeholder="Email" name="email"
								value="{{ old('email') }}">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>

						@error('password')
						<div class="form-control-feedback has-danger">{{ $message }}</div>
						@enderror
						<div class="input-group custom">
							<input type="password" class="form-control form-control-lg" placeholder="**********"
								name="password">
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
</div>


@endsection