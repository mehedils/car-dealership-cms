<section class="section-box box-why-book-22 background-body">
	<div class="container">
		<div class="text-center wow fadeInUp">
			<p class="text-xl-medium neutral-500 wow fadeInUp">{{ setting('home_why_us_subtitle', 'WHY CHOOSE US') }}</p>
			<h3 class="neutral-1000 wow fadeInUp">
				{!! nl2br(e(setting('home_why_us_title', "Presenting Your Premier Car\nDealership Experience"))) !!}
			</h3>
		</div>
		<div class="row mt-40">
			@foreach($whyUsFeatures as $index => $feature)
				<div class="col-lg-3 col-sm-6 mb-30">
					<div class="card-why wow fadeIn" data-wow-delay="{{ ($index + 1) * 0.1 }}s">
						<div class="card-image d-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 60px; height: 60px; margin: 0 auto 20px;">
							<span class="text-brand-2 text-xl-bold">{{ $index + 1 }}</span>
						</div>
						<div class="card-info text-center">
							<h6 class="text-xl-bold neutral-1000">{{ $feature->title }}</h6>
							<p class="text-md-medium neutral-500">{{ $feature->description }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
