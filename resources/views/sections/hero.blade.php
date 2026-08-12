@php
    $heroImg = setting('home_hero_bg_image');
    if ($heroImg) {
        $heroBgUrl = (str_starts_with($heroImg, 'http') || str_starts_with($heroImg, '/')) ? $heroImg : asset('storage/' . $heroImg);
    } else {
        $heroBgUrl = asset('assets/imgs/hero/hero-1/banner.png');
    }
@endphp
<section class="box-section block-banner-home1 position-relative">
	<div class="container position-relative z-1">
		<p class="text-primary text-md-bold wow fadeInUp">{{ __(setting('home_hero_tagline', 'Find Your Perfect Car')) }}</p>
		<h1 class="color-white mb-35 wow fadeInUp">{!! nl2br(e(__(setting('home_hero_title', "Looking for a vehicle?\nYou’re in the perfect spot.")))) !!}</h1>
		<ul class="list-ticks-green">
			@if(setting('home_hero_bullet_1', 'High quality at a low cost.'))
				<li class="wow fadeInUp" data-wow-delay="0.1s">
					<x-tick-icon />
					<span>{{ __(setting('home_hero_bullet_1', 'High quality at a low cost.')) }}</span>
				</li>
			@endif
			@if(setting('home_hero_bullet_2', 'Premium services'))
				<li class="wow fadeInUp" data-wow-delay="0.2s">
					<x-tick-icon />
					<span>{{ __(setting('home_hero_bullet_2', 'Premium services')) }}</span>
				</li>
			@endif
			@if(setting('home_hero_bullet_3', '24/7 roadside support.'))
				<li class="wow fadeInUp" data-wow-delay="0.4s">
					<x-tick-icon />
					<span>{{ __(setting('home_hero_bullet_3', '24/7 roadside support.')) }}</span>
				</li>
			@endif
		</ul>
	</div>
	<div class="bg-shape z-0" style="--hero-bg-url: url('{{ $heroBgUrl }}');"></div>
</section>
