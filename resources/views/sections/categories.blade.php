<section class="section-box background-body py-96">
	<div class="container">
		<div class="row align-items-end mb-40">
			<div class="col-md-8">
				<h3 class="neutral-1000 wow fadeInUp">Browse by Type</h3>
				<p class="text-xl-medium neutral-500 wow fadeInUp">Find the perfect ride for any occasion</p>
			</div>
			<div class="col-md-4">
				<div class="d-flex justify-content-md-end mt-md-0 mt-4">
					<a class="btn btn-primary wow fadeInUp" href="{{ url('/cars-list-1') }}">
						View All
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="box-list-populars">
			<div class="row">
				@foreach($carTypes as $index => $type)
					<div class="col-lg-3 col-sm-6 mb-30">
						<div class="card-popular background-card hover-up wow fadeIn" data-wow-delay="{{ ($index + 1) * 0.1 }}s">
							<div class="card-image">
								<a class="card-title" href="{{ url('/cars-list-1?car_type_id='.$type->id) }}">
									@if($type->image)
										<img src="{{ asset($type->image) }}" alt="{{ $type->name }}" style="height: 120px; object-fit: contain;">
									@else
										<img src="{{ asset('assets/imgs/categories/categories-1/car-1.png') }}" alt="{{ $type->name }}" style="height: 120px; object-fit: contain;">
									@endif
								</a>
							</div>
							<div class="card-info">
								<a class="card-title" href="{{ url('/cars-list-1?car_type_id='.$type->id) }}">{{ $type->name }}</a>
								<div class="card-meta">
									<div class="meta-links">
										<a href="{{ url('/cars-list-1?car_type_id='.$type->id) }}">{{ $type->cars_count }} Vehicles</a>
									</div>
									<div class="card-button">
										<a href="{{ url('/cars-list-1?car_type_id='.$type->id) }}">
											<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
