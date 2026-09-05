<?php

namespace Tests\Feature;

use App\Models\Location;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class DynamicContentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
    }

    public function test_contact_page_renders_dynamic_locations_when_present(): void
    {
        Location::create([
            'name' => 'Downtown Manhattan Branch',
            'address' => '123 Broadway, New York, NY 10006',
            'phone' => '+1 (212) 555-0199',
            'email' => 'manhattan@carento-test.com',
        ]);

        Location::create([
            'name' => 'Brooklyn Showroom',
            'address' => '456 Atlantic Ave, Brooklyn, NY 11217',
            'phone' => '+1 (718) 555-0188',
            'email' => 'brooklyn@carento-test.com',
        ]);

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Downtown Manhattan Branch');
        $response->assertSee('123 Broadway, New York, NY 10006');
        $response->assertSee('+1 (212) 555-0199');
        $response->assertSee('manhattan@carento-test.com');

        $response->assertSee('Brooklyn Showroom');
        $response->assertSee('456 Atlantic Ave, Brooklyn, NY 11217');
        $response->assertSee('+1 (718) 555-0188');
        $response->assertSee('brooklyn@carento-test.com');
    }

    public function test_contact_page_renders_fallback_card_when_no_locations_exist(): void
    {
        Setting::updateOrCreate(['key' => 'site_name'], ['value' => 'Apex Motors Dealership']);
        Setting::updateOrCreate(['key' => 'contact_address'], ['value' => '999 Auto Blvd, Detroit, MI 48201']);
        Setting::updateOrCreate(['key' => 'contact_phone'], ['value' => '+1 (313) 555-0100']);
        Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'info@apexmotors-test.com']);
        Cache::flush();

        $this->assertEquals(0, Location::count());

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Apex Motors Dealership');
        $response->assertSee('999 Auto Blvd, Detroit, MI 48201');
        $response->assertSee('+1 (313) 555-0100');
        $response->assertSee('info@apexmotors-test.com');
    }

    public function test_homepage_brands_section_renders_defaults_when_settings_empty(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Premium Brands');
        $response->assertSee('Unveil the Finest Selection of High-End Vehicles');
        $response->assertSee('Show All Brands');
    }

    public function test_homepage_brands_section_renders_custom_settings(): void
    {
        Setting::updateOrCreate(['key' => 'home_brands_title'], ['value' => 'Certified Manufacturer Partners']);
        Setting::updateOrCreate(['key' => 'home_brands_subtitle'], ['value' => 'Browse our collection of verified official brands']);
        Setting::updateOrCreate(['key' => 'home_brands_button_text'], ['value' => 'Explore All Makes']);
        Cache::flush();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Certified Manufacturer Partners');
        $response->assertSee('Browse our collection of verified official brands');
        $response->assertSee('Explore All Makes');
    }

    public function test_about_page_renders_defaults_when_settings_empty(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('About Our Dealership');
        $response->assertSee('Your Trusted Partner in Premium Automobile Sales & Service');
        $response->assertSee('Who We Are');
        $response->assertSee('Dedicated to Excellence in Automotive Solutions');
        $response->assertSee('Contact Our Team');
    }

    public function test_about_page_renders_custom_hero_and_story_settings(): void
    {
        Setting::updateOrCreate(['key' => 'about_hero_title'], ['value' => 'Our Automotive Heritage']);
        Setting::updateOrCreate(['key' => 'about_hero_subtitle'], ['value' => 'Three decades of trusted automotive excellence']);
        Setting::updateOrCreate(['key' => 'about_story_badge'], ['value' => 'SINCE 1995']);
        Setting::updateOrCreate(['key' => 'about_story_title'], ['value' => 'Building Lasting Customer Relationships']);
        Setting::updateOrCreate(['key' => 'about_story_description'], ['value' => "Founded in 1995, our dealership has served over 50,000 satisfied motorists across the country.\nEvery vehicle passes a rigorous 150-point inspection."]);
        Cache::flush();

        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('Our Automotive Heritage');
        $response->assertSee('Three decades of trusted automotive excellence');
        $response->assertSee('SINCE 1995');
        $response->assertSee('Building Lasting Customer Relationships');
        $response->assertSee('Founded in 1995, our dealership has served over 50,000 satisfied motorists across the country.');
        $response->assertSee('Every vehicle passes a rigorous 150-point inspection.');
    }
}
