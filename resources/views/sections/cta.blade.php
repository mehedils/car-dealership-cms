<section class="box-cta-1 background-100 py-96">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 pe-lg-5 wow fadeInUp">
                <div class="card-video">
                    <div class="card-image">
                        <a class="btn-play-trigger popup-youtube position-absolute top-50 start-50 translate-middle z-2" href="{{ setting('home_cta_video_url', 'https://www.youtube.com/watch?v=AOg61RB75Ho') }}">
                            <x-play-button />
                        </a>
                        @php
                            $ctaImg = setting('home_cta_image');
                            if ($ctaImg) {
                                $ctaImgUrl = (str_starts_with($ctaImg, 'http') || str_starts_with($ctaImg, '/')) ? $ctaImg : asset('storage/' . $ctaImg);
                            } else {
                                $ctaImgUrl = asset('assets/imgs/cta/cta-1/video.png');
                            }
                        @endphp
                        <img src="{{ $ctaImgUrl }}" alt="{{ setting('site_name', 'Carento') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-4">
                <span class="btn btn-signin bg-white text-dark mb-4 wow fadeInUp">{{ __(setting('home_cta_badge', 'Best Car Dealership')) }}</span>
                <h4 class="mb-4 neutral-1000 wow fadeInUp">{{ __(setting('home_cta_title', 'Receive a Competitive Offer Sell Your Car to Us Today.')) }}</h4>
                <p class="text-lg-medium neutral-500 mb-4 wow fadeInUp">{{ __(setting('home_cta_description', 'We are committed to delivering exceptional service, competitive pricing, and a diverse selection of options for our customers.')) }}</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-ticks-green">
                            @if(setting('home_cta_bullet_1', 'Expert Certified Mechanics'))
                                <li class="neutral-1000 wow fadeInUp" data-wow-delay="0.1s">
                                    <x-tick-icon />
                                    <span>{{ __(setting('home_cta_bullet_1', 'Expert Certified Mechanics')) }}</span>
                                </li>
                            @endif
                            @if(setting('home_cta_bullet_2', 'Get Reasonable Price'))
                                <li class="neutral-1000 wow fadeInUp" data-wow-delay="0.2s">
                                    <x-tick-icon />
                                    <span>{{ __(setting('home_cta_bullet_2', 'Get Reasonable Price')) }}</span>
                                </li>
                            @endif
                            @if(setting('home_cta_bullet_3', 'Genuine Spares Parts'))
                                <li class="neutral-1000 wow fadeInUp" data-wow-delay="0.3s">
                                    <x-tick-icon />
                                    <span>{{ __(setting('home_cta_bullet_3', 'Genuine Spares Parts')) }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-ticks-green wow fadeInUp">
                            @if(setting('home_cta_bullet_4', 'First Class Services'))
                                <li class="neutral-1000 wow fadeInUp" data-wow-delay="0.1s">
                                    <x-tick-icon />
                                    <span>{{ __(setting('home_cta_bullet_4', 'First Class Services')) }}</span>
                                </li>
                            @endif
                            @if(setting('home_cta_bullet_5', '24/7 road assistance'))
                                <li class="neutral-1000 wow fadeInUp" data-wow-delay="0.2s">
                                    <x-tick-icon />
                                    <span>{{ __(setting('home_cta_bullet_5', '24/7 road assistance')) }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
