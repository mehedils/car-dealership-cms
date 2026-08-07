<section class="section-box box-flights background-body">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-md-9 wow fadeInUp">
				<h3 class="title-svg neutral-1000 mb-5">Featured Vehicles</h3>
				<p class="text-lg-medium text-bold neutral-500">Explore our hand-picked premium selection</p>
			</div>
			<div class="col-md-3 position-relative mb-30 wow fadeInUp">
				<div class="box-button-slider box-button-slider-team justify-content-end">
					<div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
							<path d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
					</div>
					<div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
							<path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
					</div>
				</div>
			</div>
		</div>
		<div class="block-flights wow fadeInUp">
			<div class="box-swiper mt-30">
				<div class="swiper-container swiper-group-3 swiper-group-journey">
					<div class="swiper-wrapper">
						@foreach($featuredCars as $car)
							<div class="swiper-slide">
								@include('partials.car-card', ['car' => $car])
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
