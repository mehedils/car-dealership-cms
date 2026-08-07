<section class="section-box box-properties-area pt-96 pb-50 background-body">
    <div class="container">
        <div class="row align-items-end mb-40">
            <div class="col-md-8">
                <h3 class="neutral-1000">Our Services</h3>
                <p class="text-lg-medium neutral-500">Serving You with Quality, Comfort, and Convenience</p>
            </div>
            <div class="col-md-4 mt-md-0 mt-4">
                <div class="d-flex justify-content-md-end justify-content-center">
                    <a class="btn btn-primary" href="{{ url('/services') }}">
                        View All
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-list-featured">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="card-spot background-card wow fadeInDown">
                            <div class="card-image">
                                <a href="{{ url('/services') }}">
                                    @if($service->image)
                                        <img class="rounded-3" src="{{ asset($service->image) }}" alt="{{ $service->title }}" style="height: 180px; object-fit: cover; width: 100%;">
                                    @else
                                        <img class="rounded-3" src="{{ asset('assets/imgs/services/services-1/img-1.png') }}" alt="{{ $service->title }}" style="height: 180px; object-fit: cover; width: 100%;">
                                    @endif
                                </a>
                            </div>
                            <div class="card-info background-card p-3">
                                <div class="card-left">
                                    <div class="card-title">
                                        <a class="text-lg-bold neutral-1000" href="{{ url('/services') }}">{{ $service->title }}</a>
                                    </div>
                                    <div class="card-desc">
                                        <p class="text-sm neutral-500">{{ Str::limit($service->description, 60) }}</p>
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
