<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Inquiry;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarsInventoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_inventory_page_renders_successfully(): void
    {
        $response = $this->get('/cars');

        $response->assertStatus(200);
        $response->assertViewIs('cars-list');
        $response->assertViewHasAll([
            'paginatedCars',
            'brands',
            'carTypes',
            'fuelTypes',
            'conditionCounts',
        ]);
        $response->assertDontSee('Our Vehicle Fleet');
        $response->assertDontSee('carouselTicker');
    }

    public function test_inventory_condition_filtering(): void
    {
        $newCarsResponse = $this->get('/cars?condition=new');
        $newCarsResponse->assertStatus(200);

        $certifiedCarsResponse = $this->get('/cars?condition=certified');
        $certifiedCarsResponse->assertStatus(200);
    }

    public function test_inventory_brand_and_year_filtering(): void
    {
        $toyota = Brand::where('name', 'Toyota')->first();
        if ($toyota) {
            $response = $this->get('/cars?brand_id[]=' . $toyota->id . '&year_min=2020&year_max=2025');
            $response->assertStatus(200);
        }
    }

    public function test_inventory_sorting(): void
    {
        $sortPriceAsc = $this->get('/cars?sort=price_asc');
        $sortPriceAsc->assertStatus(200);

        $sortYearDesc = $this->get('/cars?sort=year_desc');
        $sortYearDesc->assertStatus(200);

        $sortMileageAsc = $this->get('/cars?sort=mileage_asc');
        $sortMileageAsc->assertStatus(200);
    }

    public function test_inventory_empty_state(): void
    {
        // Query impossible price
        $response = $this->get('/cars?price_min=9999999&price_max=10000000');
        $response->assertStatus(200);
        $response->assertSee('empty-inventory-state');
    }

    public function test_lead_inquiry_with_car_id(): void
    {
        $car = Car::first();

        $response = $this->post(route('inquiries.store'), [
            'car_id' => $car->id,
            'name' => 'Carlos Rodriguez',
            'email' => 'carlos@example.com',
            'phone' => '+52 55 1234 5678',
            'message' => 'Interested in test driving this car.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', [
            'car_id' => $car->id,
            'name' => 'Carlos Rodriguez',
            'phone' => '+52 55 1234 5678',
        ]);
    }
}
