<section class="section-box box-why-book-22 background-body pt-50 pb-40">
	<div class="container">
		<div class="text-center wow fadeInUp mb-45">
			<span class="text-xs-bold bg-brand-2 text-dark px-3 py-2 rounded-12 d-inline-block mb-3 shadow-sm text-uppercase tracking-wider">
				{{ __(setting('home_why_us_subtitle', 'WHY CHOOSE US')) }}
			</span>
			<h3 class="neutral-1000 wow fadeInUp fw-bold">
				{!! nl2br(e(__(setting('home_why_us_title', "Presenting Your Premier Car\nDealership Experience")))) !!}
			</h3>
		</div>
		<div class="row g-4">
			@php
				$defaultIcons = [
					0 => 'fi fi-rr-shield-check',
					1 => 'fi fi-rr-credit-card',
					2 => 'fi fi-rr-money',
					3 => 'fi fi-rr-badge',
				];
			@endphp
			@foreach($whyUsFeatures as $index => $feature)
				@php
					$iconValue = !empty($feature->icon) ? $feature->icon : $defaultIcons[$index % 4];
				@endphp
				<div class="col-lg-3 col-sm-6 mb-30">
					<div class="card-why-dealership wow fadeIn" data-wow-delay="{{ ($index + 1) * 0.1 }}s">
						<div class="card-why-icon-wrap d-flex align-items-center justify-content-center">
							<x-app-icon :icon="$iconValue" :alt="$feature->title" style="font-size: 28px; width: 28px; height: 28px;" />
						</div>
						<h5 class="card-why-title">{{ __($feature->title) }}</h5>
						<p class="card-why-desc">{{ __($feature->description) }}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
