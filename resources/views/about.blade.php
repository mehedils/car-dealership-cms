@extends('layouts.app')

@section('title', 'About Us - ' . setting('site_name', 'Carento'))

@section('content')
<div>
    {{-- Page Header --}}
    <div class="page-header pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 rounded-12 img-banner" src="/assets/imgs/page-header/banner4.png" alt="About Us" />
            </div>
            <div class="container position-absolute z-1 top-50 start-50 translate-middle text-center">
                <h2 class="text-white">About Our Dealership</h2>
                <p class="text-lg-medium text-white opacity-75">Your Trusted Partner in Premium Automobile Sales & Service</p>
            </div>
        </div>
    </div>

    {{-- Company Story Section --}}
    <section class="box-section background-body pt-80 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <div class="position-relative rounded-16 overflow-hidden shadow-sm">
                        <img class="w-100 rounded-16" src="/assets/imgs/page/homepage1/author2.png" alt="{{ setting('site_name', 'Carento') }}" style="max-height: 450px; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 mb-30 ps-lg-5">
                    <span class="text-sm-bold text-uppercase neutral-500 tracking-wide">Who We Are</span>
                    <h3 class="neutral-1000 mt-10 mb-20">Dedicated to Excellence in Automotive Solutions</h3>
                    <p class="text-md-regular neutral-500 mb-20">
                        At {{ setting('site_name', 'Carento') }}, we pride ourselves on delivering an exceptional automobile buying and ownership experience. From certified pre-owned vehicles to brand-new luxury models, our dealership is built on integrity, transparency, and customer satisfaction.
                    </p>
                    <p class="text-md-regular neutral-500 mb-30">
                        Our team of automotive professionals is here to guide you every step of the way—whether you are looking for vehicle financing, trade-in valuations, or specialized maintenance services.
                    </p>
                    <button class="btn btn-brand-2 py-3 px-4 text-md-bold d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#leadModal" style="gap: 8px;">
                        <i class="fi fi-rr-paper-plane" style="display: inline-flex; align-items: center; justify-content: center; line-height: 1; font-size: 16px; margin: 0; position: relative; top: -1px;"></i>
                        <span style="line-height: 1;">Contact Our Team</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    @if(isset($whyUsFeatures) && count($whyUsFeatures) > 0)
    <section class="section-box box-why-book-22 background-body pt-60 pb-60">
        <div class="container">
            <div class="text-center mb-40">
                <p class="text-xl-medium neutral-500">WHY CHOOSE US</p>
                <h3 class="neutral-1000">Presenting Your Premier Car Dealership Experience</h3>
            </div>
            <div class="row">
                @foreach($whyUsFeatures as $index => $feature)
                    <div class="col-lg-3 col-sm-6 mb-30">
                        <div class="card-why text-center p-4 background-card rounded-16 h-100">
                            <div class="card-image d-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 60px; height: 60px; margin: 0 auto 20px;">
                                <span class="text-brand-2 text-xl-bold">{{ $index + 1 }}</span>
                            </div>
                            <div class="card-info">
                                <h6 class="text-xl-bold neutral-1000 mb-10">{{ $feature->title }}</h6>
                                <p class="text-md-medium neutral-500">{{ $feature->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Team Members Section --}}
    @if(isset($teamMembers) && count($teamMembers) > 0)
    <section class="box-section background-body pt-60 pb-60">
        <div class="container">
            <div class="text-center mb-50">
                <span class="text-sm-bold text-uppercase neutral-500 tracking-wide">Our Experts</span>
                <h3 class="neutral-1000 mt-10">Meet Our Team</h3>
            </div>
            <div class="row">
                @foreach($teamMembers as $member)
                    <div class="col-lg-3 col-md-6 mb-30">
                        <div class="card-team background-card p-3 rounded-16 border text-center">
                            <div class="card-image mb-15 overflow-hidden rounded-12">
                                @if($member->image_url)
                                    <img class="w-100 rounded-12" src="{{ $member->image_url }}" alt="{{ $member->name }}" style="height: 240px; object-fit: cover;">
                                @else
                                    <img class="w-100 rounded-12" src="/assets/imgs/page/homepage1/author2.png" alt="{{ $member->name }}" style="height: 240px; object-fit: cover;">
                                @endif
                            </div>
                            <h5 class="text-lg-bold neutral-1000 mb-5">{{ $member->name }}</h5>
                            <p class="text-sm-medium neutral-500 mb-0">{{ $member->role ?? $member->designation ?? 'Sales Representative' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</div>
@endsection
