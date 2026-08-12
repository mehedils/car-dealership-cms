<section class="section-box py-96 background-body">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-9 col-sm-9 wow fadeInUp">
                <div class="box-author-testimonials">
                    {{ __(setting('home_testimonials_subtitle', 'Testimonials')) }}
                </div>
                <h3 class="mt-8 mb-15 neutral-1000">{{ __(setting('home_testimonials_title', 'What they say about us?')) }}</h3>
            </div>
        </div>
    </div>
    <div class="block-testimonials wow fadeIn">
        <div class="container-testimonials">
            <div class="container-slider ps-0">
                <div class="box-swiper mt-30">
                    <div class="swiper-container swiper-group-animate swiper-group-journey">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $item)
                                <div class="swiper-slide">
                                    <div class="card-testimonial background-card">
                                        <div class="card-info">
                                            <p class="text-xl-bold card-title neutral-1000">{{ __('Reviews') }}</p>
                                            <p class="text-md-regular neutral-500">{{ $item->content }}</p>
                                        </div>
                                        <div class="card-top pt-40 border-0 mb-0">
                                            <div class="card-author">
                                                <div class="card-image">
                                                    @if($item->author_avatar)
                                                        <img src="{{ asset($item->author_avatar) }}" alt="{{ $item->author_name }}" style="border-radius: 50%;">
                                                    @else
                                                        <img src="{{ asset('assets/imgs/testimonials/testimonials-1/author-1.png') }}" alt="{{ $item->author_name }}" style="border-radius: 50%;">
                                                    @endif
                                                </div>
                                                <div class="card-info">
                                                    <p class="text-lg-bold neutral-1000">{{ $item->author_name }}</p>
                                                    <p class="text-md-regular neutral-500">{{ $item->author_role }}</p>
                                                </div>
                                            </div>
                                             <div class="card-rate">
                                                 @for($s = 0; $s < ($item->rating ?? 5); $s++)
                                                     <i class="fi fi-rr-star text-dark background-brand-2 p-1 rounded-circle fs-6 me-1"></i>
                                                 @endfor
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
