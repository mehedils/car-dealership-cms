<?php

namespace Tests\Feature;

use App\Filament\Widgets\CarsByCategoryChart;
use App\Filament\Widgets\DealershipStatsOverview;
use App\Filament\Widgets\InquiriesTrendChart;
use App\Filament\Widgets\LatestInquiriesTableWidget;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Inquiry;
use App\Models\Location;
use App\Models\Setting;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdminDashboardMetricsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_renders_successfully_for_authenticated_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_dealership_stats_overview_widget_computes_accurate_metrics(): void
    {
        Setting::updateOrCreate(['key' => 'currency_symbol'], ['value' => '$']);

        $brand = Brand::create(['name' => 'Audi', 'slug' => 'audi']);
        $carType = CarType::create(['name' => 'Sedan', 'slug' => 'sedan']);
        $fuelType = FuelType::create(['name' => 'Petrol', 'slug' => 'petrol']);
        $location = Location::create(['name' => 'Miami']);

        Car::create([
            'brand_id' => $brand->id,
            'car_type_id' => $carType->id,
            'fuel_type_id' => $fuelType->id,
            'location_id' => $location->id,
            'name' => 'Audi A6',
            'slug' => 'audi-a6',
            'price' => 50000,
            'is_featured' => true,
        ]);

        Car::create([
            'brand_id' => $brand->id,
            'car_type_id' => $carType->id,
            'fuel_type_id' => $fuelType->id,
            'location_id' => $location->id,
            'name' => 'Audi A4',
            'slug' => 'audi-a4',
            'price' => 30000,
            'is_featured' => false,
        ]);

        Inquiry::create([
            'name' => 'Alex Green',
            'email' => 'alex@example.com',
            'message' => 'Interested in Audi A6',
            'status' => 'new',
        ]);

        Livewire::test(DealershipStatsOverview::class)
            ->assertSee(__('Showroom Inventory'))
            ->assertSee('2')
            ->assertSee('1 ' . __('Featured Models'))
            ->assertSee(__('Showroom Valuation'))
            ->assertSee('$80k')
            ->assertSee(__('Buyer Inquiries'))
            ->assertSee('1')
            ->assertSee(__('Avg. Vehicle Price'))
            ->assertSee('$40,000');
    }

    public function test_inquiries_trend_chart_widget_renders_data_structure(): void
    {
        Inquiry::create([
            'name' => 'Buyer One',
            'email' => 'buyer1@example.com',
            'message' => 'Test inquiry',
            'created_at' => now(),
        ]);

        Livewire::test(InquiriesTrendChart::class)
            ->assertSee(__('Buyer Inquiries (Last 6 Months)'));
    }

    public function test_cars_by_category_chart_widget_groups_body_types(): void
    {
        $brand = Brand::create(['name' => 'BMW', 'slug' => 'bmw']);
        $suvType = CarType::create(['name' => 'SUV', 'slug' => 'suv']);
        $fuelType = FuelType::create(['name' => 'Diesel', 'slug' => 'diesel']);
        $location = Location::create(['name' => 'Dallas']);

        Car::create([
            'brand_id' => $brand->id,
            'car_type_id' => $suvType->id,
            'fuel_type_id' => $fuelType->id,
            'location_id' => $location->id,
            'name' => 'BMW X5',
            'slug' => 'bmw-x5',
            'price' => 65000,
        ]);

        Livewire::test(CarsByCategoryChart::class)
            ->assertSee(__('Showroom by Body Type'));
    }

    public function test_latest_inquiries_table_widget_renders_leads(): void
    {
        $inquiry = Inquiry::create([
            'name' => 'Marcus Aurelius',
            'email' => 'marcus@example.com',
            'phone' => '+1 555-0199',
            'message' => 'Seeking vehicle consultation',
            'status' => 'new',
        ]);

        Livewire::test(LatestInquiriesTableWidget::class)
            ->assertSee(__('Recent Buyer Inquiries'))
            ->assertSee('Marcus Aurelius')
            ->assertSee('+1 555-0199');
    }
}
