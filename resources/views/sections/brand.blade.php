<div class="background-100 pb-70">
	<div class="container">
		<div class="box-search-category">
			<h3 class="heading-3 mb-0 neutral-1000 wow fadeInUp">Premium Brands</h3>
			<div class="d-flex align-items-center justify-content-between">
				<p class="text-lg-medium neutral-500 wow fadeInUp">Unveil the Finest Selection of High-End Vehicles</p>
				<a href="{{ url('/cars-list-1') }}" class="text-sm-bold neutral-1000 wow fadeInUp">
					Show All Brands
					<i class="fi fi-rr-arrow-right ms-1"></i>
				</a>
			</div>
			<div class="carouselTicker carouselTicker-left box-list-brand-car justify-content-center wow fadeIn">
				<ul class="carouselTicker__list">
					@foreach($brands as $brand)
						<li class="carouselTicker__item">
							<a href="{{ url('/cars-list-1?brand_id='.$brand->id) }}" class="item-brand title-sm-bold text-center">
								@if($brand->logo)
									<img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" style="max-height: 40px; object-fit: contain;">
								@else
									<span>{{ $brand->name }}</span>
								@endif
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
