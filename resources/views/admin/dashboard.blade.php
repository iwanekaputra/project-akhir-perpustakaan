@extends('admin.main')

@section('section')
<div class="main-container pb-0">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Dashboard</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div>
			</div>

			<br/>
			<div class="row">
				<div class="col-md-4">
					<img src="{{asset('admin/vendors/images/admin1.png')}}" alt="">
				</div>

				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">SIMPEKU!</div>
						</h4>
						<p class="font-18 max-width-600">SIMPEKU adalah Sistem Peminjaman Buku Berbasis Web yang ada di sekolah A.</p>
				</div>

			</div>


		</div>
	</div>
</div>
<div class="main-container py-0">
	<div class="xs-pd-20-10 pd-ltr-20 pt-0">
		<div class="page-header">
			<div class="row py-3 px-4">
				<canvas id="myChart" width="400" height="400"></canvas>
				{{-- <div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Dashboard</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div> --}}
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	// const ctx = document.getElementById('myChart');
	// const ctx = document.getElementById('myChart').getContext('2d');
	// const ctx = $('#myChart');
	// const ctx = 'myChart';

	const ctx = document.getElementById('myChart');
	const myChart = new Chart(ctx, {
	type: 'bar',
	data: {
	labels: [@foreach ($chart as $c)'{{$c->judul}}',
@endforeach],
	datasets: [{
	label: 'Bagan Peminjaman Buku',
	data: [@foreach ($chart as $c){{$c->jumlah}},
	@endforeach],
	backgroundColor: [
	'rgba(255, 99, 132, 0.2)',
	'rgba(54, 162, 235, 0.2)',
	'rgba(255, 206, 86, 0.2)',
	'rgba(75, 192, 192, 0.2)',
	'rgba(153, 102, 255, 0.2)',
	'rgba(255, 159, 64, 0.2)'
	],
	borderColor: [
	'rgba(255, 99, 132, 1)',
	'rgba(54, 162, 235, 1)',
	'rgba(255, 206, 86, 1)',
	'rgba(75, 192, 192, 1)',
	'rgba(153, 102, 255, 1)',
	'rgba(255, 159, 64, 1)'
	],
	borderWidth: 1
	}]
	},
	options: {
	scales: {
	y: {
	beginAtZero: true
	}
	}
	}
	});

</script>




@endsection