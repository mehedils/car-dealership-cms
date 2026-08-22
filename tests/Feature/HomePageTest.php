<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Location;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyUsFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_successfully_with_dynamic_data(): void
    {
        // Seed database
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertViewHasAll([
            'brands',
            'carTypes',
            'locations',
            'fuelTypes',
            'featuredCars',
            'latestCars',
            'services',
            'whyUsFeatures',
            'blogPosts',
        ]);
    }

    public function test_footer_renders_dealership_links_and_hours(): void
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Quick Links');
        $response->assertSee('Vehicles by Type');
        $response->assertSee('Vehicle Financing');
        $response->assertSee('Schedule Test Drive');
        $response->assertDontSee('Car Rental Services');
        $response->assertDontSee('Travel Agents');
    }
}
