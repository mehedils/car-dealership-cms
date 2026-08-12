<style>
	.hero-search-card .item-search::before {
		display: none !important;
	}
	.hero-input-field {
		height: 52px !important;
		border: 1px solid #E2E8F0 !important;
		border-radius: 10px !important;
		font-size: 14px !important;
		background-color: #FFFFFF !important;
		padding: 0 16px !important;
		color: #0F172A !important;
	}
	.hero-input-field:focus {
		border-color: #FF002E !important;
		box-shadow: 0 0 0 3px rgba(255, 0, 46, 0.1) !important;
	}
	.hero-submit-btn {
		height: 52px !important;
		border-radius: 10px !important;
		font-size: 15px !important;
		font-weight: 700 !important;
		display: inline-flex !important;
		align-items: center !important;
		justify-content: center !important;
	}
</style>

<section class="box-section box-search-advance-home10 background-100">
	<div class="container">
		<div class="box-search-advance background-card wow fadeIn">
			@if(session('success'))
				<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
					{{ session('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

			@if($errors->any())
				<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
					<ul class="mb-0">
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

			<form action="{{ route('inquiries.store') }}" method="POST">
				@csrf

				<div class="box-bottom-search background-card hero-search-card align-items-end gap-3 p-3">
					<!-- Searchable Vehicle Dropdown -->
					<div class="item-search position-relative flex-grow-1 p-0 m-0">
						<label class="text-sm-bold neutral-500 mb-1.5 d-block">{{ __('Select Vehicle') }}</label>
						<input type="hidden" name="car_id" id="hero_car_id_input" value="{{ old('car_id') }}">
						<div class="dropdown">
							<button type="button" class="btn hero-input-field w-100 text-start text-sm-bold text-truncate d-flex align-items-center justify-content-between" data-bs-toggle="dropdown" id="heroCarDropdownBtn" aria-expanded="false">
								<span id="heroCarSelectedText">
									@if(old('car_id') && isset($cars))
										{{ optional($cars->firstWhere('id', old('car_id')))->name ?? __('Select Vehicle') }}
									@else
										{{ __('Select Vehicle') }}
									@endif
								</span>
								<i class="fi fi-rr-angle-small-down ms-2 fs-6"></i>
							</button>
							<div class="dropdown-menu p-2 shadow-lg" style="min-width: 260px; max-height: 300px; overflow-y: auto; border-radius: 10px;">
								<div class="sticky-top bg-white pb-2">
									<input type="text" class="form-control form-control-sm border" id="heroCarSearchInput" placeholder="🔍 {{ __('Type model name...') }}" autocomplete="off">
								</div>
								<ul class="list-unstyled mb-0" id="heroCarList">
									<li>
										<a href="#" class="dropdown-item car-select-item text-sm-medium rounded py-1.5 px-2" data-id="" data-name="{{ __('General Inquiry / Any Vehicle') }}">
											<em>{{ __('General Inquiry / Any Vehicle') }}</em>
										</a>
									</li>
									@if(isset($cars) && $cars->count() > 0)
										@foreach($cars as $car)
											<li>
												<a href="#" class="dropdown-item car-select-item text-sm-medium rounded py-1.5 px-2" data-id="{{ $car->id }}" data-name="{{ $car->name }}">
													{{ $car->name }} @if($car->brand) <span class="text-muted text-xs">({{ $car->brand->name }})</span> @endif
												</a>
											</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>

					<!-- Full Name Input -->
					<div class="item-search item-search-2 flex-grow-1 p-0 m-0">
						<label class="text-sm-bold neutral-500 mb-1.5 d-block">{{ __('Your Name') }}</label>
						<input type="text" name="name" value="{{ old('name') }}" class="form-control hero-input-field text-sm-bold" placeholder="{{ __('Enter your name') }}" required>
					</div>

					<!-- Phone / WhatsApp Input -->
					<div class="item-search item-search-3 flex-grow-1 p-0 m-0">
						<label class="text-sm-bold neutral-500 mb-1.5 d-block">{{ __('Phone / WhatsApp') }}</label>
						<input type="tel" name="phone" value="{{ old('phone') }}" class="form-control hero-input-field text-sm-bold" placeholder="+52 (55) 0000-0000" required>
					</div>

					<!-- Submit Button -->
					<div class="item-search bd-none p-0 m-0">
						<button type="submit" class="btn btn-brand-2 hero-submit-btn text-nowrap px-4">
							<i class="fi fi-rr-phone-call me-2"></i>
							{{ __('Request Callback') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('heroCarSearchInput');
	const carList = document.getElementById('heroCarList');
	const hiddenInput = document.getElementById('hero_car_id_input');
	const selectedText = document.getElementById('heroCarSelectedText');
	const dropdownBtn = document.getElementById('heroCarDropdownBtn');

	if (searchInput && carList) {
		// Live search keyup filter
		searchInput.addEventListener('input', function() {
			const filter = searchInput.value.toLowerCase().trim();
			const items = carList.getElementsByClassName('car-select-item');
			Array.from(items).forEach(function(item) {
				const text = item.textContent.toLowerCase();
				if (text.includes(filter)) {
					item.parentElement.style.display = '';
				} else {
					item.parentElement.style.display = 'none';
				}
			});
		});

		// Prevent dropdown from hiding when clicking search input field
		searchInput.addEventListener('click', function(e) {
			e.stopPropagation();
		});

		// Select option handling
		carList.addEventListener('click', function(e) {
			const itemLink = e.target.closest('.car-select-item');
			if (itemLink) {
				e.preventDefault();
				const carId = itemLink.getAttribute('data-id') || '';
				const carName = itemLink.getAttribute('data-name') || itemLink.textContent.trim();
				hiddenInput.value = carId;
				if (selectedText) {
					selectedText.textContent = carName;
				}

				// Toggle bootstrap dropdown
				if (window.bootstrap && bootstrap.Dropdown) {
					const bsDropdown = bootstrap.Dropdown.getInstance(dropdownBtn);
					if (bsDropdown) {
						bsDropdown.hide();
					}
				}
			}
		});
	}
});
</script>
