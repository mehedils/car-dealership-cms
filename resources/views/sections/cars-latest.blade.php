<section class="section-box box-flights background-body pt-50">
	<div class="container">
		<div class="row align-items-end mb-30">
			<div class="col-md-9 wow fadeInUp">
				<h3 class="title-svg neutral-1000 mb-5">Latest Arrivals</h3>
				<p class="text-lg-medium text-bold neutral-500">Check out the newest additions to our inventory</p>
			</div>
			<div class="col-md-3 text-end wow fadeInUp">
				<a href="{{ url('/cars-list-1') }}" class="btn btn-brand-2">View All Inventory</a>
			</div>
		</div>
		<div class="row">
			@foreach($latestCars as $car)
				<div class="col-lg-3 col-md-6 mb-30 wow fadeInUp">
					@include('partials.car-card', ['car' => $car])
				</div>
			@endforeach
		</div>
	</div>
</section>
