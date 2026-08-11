<div class="background-100 pb-70">
	<div class="container">
		<div class="box-search-category">
			<h3 class="heading-3 mb-0 neutral-1000 wow fadeInUp">Premium Brands</h3>
			<div class="d-flex align-items-center justify-content-between mb-4">
				<p class="text-lg-medium neutral-500 mb-0 wow fadeInUp">Unveil the Finest Selection of High-End Vehicles</p>
				<a href="{{ url('/cars') }}" class="text-sm-bold neutral-1000 d-inline-flex align-items-center gap-2 link-hover-primary wow fadeInUp">
					<span>Show All Brands</span>
					<i class="fi fi-rr-arrow-right text-primary fs-6"></i>
				</a>
			</div>
			<div class="carouselTicker carouselTicker-left box-list-brand-car justify-content-center wow fadeIn">
				<ul class="carouselTicker__list">
					@for($i = 0; $i < 3; $i++)
						@foreach($brands as $brand)
							<li class="carouselTicker__item">
								<a href="{{ url('/cars?brand_id='.$brand->id) }}" class="item-brand title-sm-bold text-center">
									@if($brand->logo)
										<img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}">
									@else
										<span class="text-sm-bold">{{ $brand->name }}</span>
									@endif
								</a>
							</li>
						@endforeach
					@endfor
				</ul>
			</div>
		</div>
	</div>
</div>
