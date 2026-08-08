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

class CarDetailsPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_car_details_page_renders_successfully_with_car_data(): void
    {
        $brand = Brand::create(['name' => 'Toyota', 'slug' => 'toyota']);
        $carType = CarType::create(['name' => 'Sedan', 'slug' => 'sedan']);
        $fuelType = FuelType::create(['name' => 'Hybrid', 'slug' => 'hybrid']);
        $location = Location::create(['name' => 'Los Angeles']);

        $car = Car::create([
            'brand_id' => $brand->id,
            'car_type_id' => $carType->id,
            'fuel_type_id' => $fuelType->id,
            'location_id' => $location->id,
            'name' => 'Toyota Camry 2025 Special Edition',
            'slug' => 'toyota-camry-2025',
            'price' => 32000,
            'rating' => 4.9,
            'description' => 'A beautiful sedan in silver.',
            'mileage' => '15k',
            'transmission' => 'Automatic',
            'seats' => 5,
            'doors' => 4,
            'engine_capacity' => '2.5L',
        ]);

        $response = $this->get('/cars/' . $car->slug);

        $response->assertStatus(200);
        $response->assertSee('Toyota Camry 2025 Special Edition');
        $response->assertSee('$32,000');
        $response->assertSee('Los Angeles');
        $response->assertSee('Inquire About This Car');
    }

    public function test_user_can_submit_an_inquiry_for_a_car(): void
    {
        $brand = Brand::create(['name' => 'Honda', 'slug' => 'honda']);
        $carType = CarType::create(['name' => 'SUV', 'slug' => 'suv']);
        $fuelType = FuelType::create(['name' => 'Petrol', 'slug' => 'petrol']);
        $location = Location::create(['name' => 'New York']);

        $car = Car::create([
            'brand_id' => $brand->id,
            'car_type_id' => $carType->id,
            'fuel_type_id' => $fuelType->id,
            'location_id' => $location->id,
            'name' => 'Honda CR-V 2024',
            'slug' => 'honda-crv-2024',
            'price' => 35000,
        ]);

        $response = $this->post('/inquiries', [
            'car_id' => $car->id,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '1234567890',
            'message' => 'I would like to schedule a test drive for this SUV.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'car_id' => $car->id,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);
    }
}
