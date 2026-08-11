<section class="section-box box-flights background-body">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-md-9 wow fadeInUp">
				<h3 class="title-svg neutral-1000 mb-5">{{ setting('home_featured_title', 'Featured Vehicles') }}</h3>
				<p class="text-lg-medium text-bold neutral-500">{{ setting('home_featured_subtitle', 'Explore our hand-picked premium selection') }}</p>
			</div>
			<div class="col-md-3 position-relative mb-30 wow fadeInUp">
				<div class="box-button-slider box-button-slider-team justify-content-end">
					<div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-2">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10 3.5L4.5 8L10 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-2">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 3.5L11.5 8L6 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
