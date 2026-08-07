<section class="box-section box-search-advance-home10 background-100">
	<div class="container">
		<div class="box-search-advance background-card wow fadeIn">
			<form action="{{ url('/cars-list-1') }}" method="GET">
				<div class="box-top-search">
					<div class="left-top-search">
						<a class="category-link text-sm-bold btn-click active" href="#">All cars</a>
					</div>
					<div class="right-top-search d-none d-md-flex">
						<a class="text-sm-medium need-some-help" href="#">Need help?</a>
					</div>
				</div>
				<div class="box-bottom-search background-card">
					<div class="item-search">
						<label class="text-sm-bold neutral-500">Location</label>
						<select name="location_id" class="form-control border-0 bg-transparent text-sm-bold">
							<option value="">Select Location</option>
							@foreach($locations as $loc)
								<option value="{{ $loc->id }}">{{ $loc->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="item-search item-search-2">
						<label class="text-sm-bold neutral-500">Brand</label>
						<select name="brand_id" class="form-control border-0 bg-transparent text-sm-bold">
							<option value="">Select Brand</option>
							@foreach($brands as $brand)
								<option value="{{ $brand->id }}">{{ $brand->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="item-search item-search-3">
						<label class="text-sm-bold neutral-500">Car Type</label>
						<select name="car_type_id" class="form-control border-0 bg-transparent text-sm-bold">
							<option value="">Select Body Type</option>
							@foreach($carTypes as $type)
								<option value="{{ $type->id }}">{{ $type->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="item-search bd-none d-flex justify-content-end">
						<button type="submit" class="btn btn-brand-2 text-nowrap">
							<svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							Find a Vehicle
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
