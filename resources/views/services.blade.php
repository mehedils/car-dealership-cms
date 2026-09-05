@extends('layouts.app')

@section('title', 'Our Services - ' . setting('site_name', 'Carento'))

@section('content')
<div>
    <div class="page-header pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 rounded-12 img-banner" src="/assets/imgs/page-header/banner4.png" alt="Our Services" />
            </div>
            <div class="container position-absolute z-1 top-50 start-50 translate-middle text-center">
                <h2 class="text-white">Our Dealership Services</h2>
                <p class="text-lg-medium text-white opacity-75">Serving You with Quality, Trust, and Professionalism</p>
            </div>
        </div>
    </div>

    <section class="box-section background-body pt-80 pb-80">
        <div class="container">
            <div class="text-center mb-50">
                <span class="text-sm-bold text-uppercase neutral-500 tracking-wide">Premium Solutions</span>
                <h3 class="neutral-1000 mt-10">What We Offer</h3>
            </div>
            <div class="row">
                @forelse($services as $service)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="card-spot background-card p-4 rounded-16 shadow-sm border h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="card-image mb-20 overflow-hidden rounded-12">
                                    @if($service->image_url)
                                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" style="height: 220px; object-fit: cover; width: 100%;">
                                    @else
                                        <img src="{{ asset('assets/imgs/services/services-1/img-1.png') }}" alt="{{ $service->title }}" style="height: 220px; object-fit: cover; width: 100%;">
                                    @endif
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-12">
                                    @if(!empty($service->icon))
                                        <span class="text-primary d-inline-flex align-items-center justify-content-center" style="font-size: 24px; width: 28px; height: 28px;">
                                            <x-app-icon :icon="$service->icon" :alt="$service->title" style="width: 24px; height: 24px;" />
                                        </span>
                                    @endif
                                    <h4 class="text-xl-bold neutral-1000 mb-0">{{ $service->title }}</h4>
                                </div>
                                <p class="text-md-regular neutral-500 mb-20">{{ $service->description }}</p>
                            </div>
                            <div>
                                <button class="btn btn-brand-2 w-100 py-3 d-flex align-items-center justify-content-center text-sm-bold" data-bs-toggle="modal" data-bs-target="#leadModal" style="gap: 8px;">
                                    <span style="line-height: 1;">Inquire About This Service</span>
                                    <i class="fi fi-rr-arrow-right" style="display: inline-flex; align-items: center; justify-content: center; line-height: 1; font-size: 14px; margin: 0; position: relative; top: -1px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-lg-medium neutral-500">No services listed yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA Banner Section --}}
    <section class="section-box background-body pb-80">
        <div class="container">
            <div class="box-banner-1 background-6 p-5 position-relative rounded-16 overflow-hidden">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="neutral-1000 mb-15">Have Questions About Our Services?</h3>
                        <p class="text-lg-medium neutral-500 mb-0">Get in touch with our expert sales and support team today for advice and consultations.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-lg-0 mt-4">
                        <button class="btn btn-brand-2 py-3 px-4 text-md-bold d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#leadModal" style="gap: 8px;">
                            <i class="fi fi-rr-envelope" style="display: inline-flex; align-items: center; justify-content: center; line-height: 1; font-size: 16px; margin: 0; position: relative; top: -1px;"></i>
                            <span style="line-height: 1;">Get in Touch Now</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
