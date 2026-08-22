@extends('layouts.app')
@section('title', 'Carento - Premium Car Dealership')
@section('headerStyle', '1')
@section('content')
    @if(setting('home_show_hero', true))
        @include('sections.hero')
    @endif
    @if(setting('home_show_search', true))
        @include('sections.search')
    @endif
    @if(setting('home_show_brands', true))
        @include('sections.brand')
    @endif
    @if(setting('home_show_featured', true))
        @include('sections.cars-featured')
    @endif
    @if(setting('home_show_cta', true))
        @include('sections.cta')
    @endif
    @if(setting('home_show_categories', true))
        @include('sections.categories')
    @endif
    @if(setting('home_show_why_us', true))
        @include('sections.why-us')
    @endif
    @if(setting('home_show_latest', true))
        @include('sections.cars-latest')
    @endif
    @if(setting('home_show_services', true))
        @include('sections.services')
    @endif
    @if(setting('home_show_blog', true))
        @include('sections.blog')
    @endif
@endsection
