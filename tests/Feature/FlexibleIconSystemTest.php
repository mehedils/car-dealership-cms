<?php

namespace Tests\Feature;

use App\Filament\Resources\AmenityResource;
use App\Filament\Resources\ServiceResource;
use App\Filament\Resources\WhyUsFeatureResource;
use App\Models\Amenity;
use App\Models\Service;
use App\Models\User;
use App\Models\WhyUsFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlexibleIconSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_app_icon_component_renders_vector_blade_icons(): void
    {
        $renderedFa = view('components.app-icon', ['icon' => 'fas-car'])->render();
        $this->assertStringContainsString('<svg', $renderedFa);

        $renderedHero = view('components.app-icon', ['icon' => 'heroicon-o-check-circle'])->render();
        $this->assertStringContainsString('<svg', $renderedHero);
    }

    public function test_app_icon_component_renders_custom_uploaded_images(): void
    {
        $renderedSvg = view('components.app-icon', ['icon' => 'icons/sunroof.svg', 'alt' => 'Sunroof'])->render();
        $this->assertStringContainsString('<img', $renderedSvg);
        $this->assertStringContainsString('storage/icons/sunroof.svg', $renderedSvg);
        $this->assertStringContainsString('alt="Sunroof"', $renderedSvg);

        $renderedPng = view('components.app-icon', ['icon' => 'icons/turbo.png'])->render();
        $this->assertStringContainsString('<img', $renderedPng);
        $this->assertStringContainsString('storage/icons/turbo.png', $renderedPng);
    }

    public function test_app_icon_component_renders_font_icon_classes(): void
    {
        $renderedFont = view('components.app-icon', ['icon' => 'fi fi-rr-shield-check'])->render();
        $this->assertStringContainsString('<i class="fi fi-rr-shield-check', $renderedFont);
    }

    public function test_why_us_section_renders_with_app_icon(): void
    {
        $feature = WhyUsFeature::create([
            'title' => 'Comprehensive Warranty',
            'description' => 'Full coverage on every vehicle.',
            'icon' => 'fas-shield-halved',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Comprehensive Warranty');
    }

    public function test_services_renders_with_app_icon(): void
    {
        $service = Service::create([
            'title' => 'Custom Wheel Tuning',
            'slug' => 'custom-wheel-tuning',
            'description' => 'Expert alignment and tuning.',
            'icon' => 'fas-gears',
            'is_active' => true,
        ]);

        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Custom Wheel Tuning');
    }
}
