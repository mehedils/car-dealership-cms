<section class="section-box box-flights background-body pt-50">
	<div class="container">
		<div class="row align-items-center mb-40">
			<div class="col-md-8 wow fadeInUp">
				<h3 class="title-svg neutral-1000 mb-2">{{ __(setting('home_latest_title', 'Latest Arrivals')) }}</h3>
				<p class="text-lg-medium text-bold neutral-500 mb-0">{{ __(setting('home_latest_subtitle', 'Check out the newest additions to our inventory')) }}</p>
			</div>
			<div class="col-md-4 wow fadeInUp">
				<div class="d-flex justify-content-md-end mt-md-0 mt-3">
					<a href="{{ url('/cars') }}" class="btn btn-brand-2 d-inline-flex align-items-center gap-2">
						<span>{{ __('Explore Our Inventory') }}</span>
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
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
