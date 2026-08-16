<?php

namespace Tests\Feature;

use App\Models\Setting;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminThemeBrandingTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('logo-d.svg');
    }

    public function test_admin_panel_evaluates_dynamic_branding_and_colors(): void
    {
        Setting::updateOrCreate(
            ['key' => 'primary_color'],
            ['value' => '#ff5500']
        );
        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => 'Carento Motors']
        );

        $panel = Filament::getPanel('admin');

        $this->assertEquals('Carento Motors', $panel->getBrandName());
        $this->assertStringContainsString('logo-d.svg', (string) $panel->getBrandLogo());
        $this->assertStringContainsString('logo-w.svg', (string) $panel->getDarkModeBrandLogo());
        $this->assertEquals('2.5rem', $panel->getBrandLogoHeight());
        $this->assertStringContainsString('favicon.svg', (string) $panel->getFavicon());

        $colors = $panel->getColors();
        $this->assertArrayHasKey('primary', $colors);
        $this->assertIsArray($colors['primary']);
        $this->assertArrayHasKey(500, $colors['primary']);
    }

    public function test_admin_panel_evaluates_custom_uploaded_logos(): void
    {
        Setting::updateOrCreate(
            ['key' => 'site_logo_dark'],
            ['value' => 'settings/custom-dark-logo.png']
        );
        Setting::updateOrCreate(
            ['key' => 'site_logo_light'],
            ['value' => 'settings/custom-light-logo.png']
        );
        Setting::updateOrCreate(
            ['key' => 'site_favicon'],
            ['value' => 'settings/custom-favicon.png']
        );

        $panel = Filament::getPanel('admin');

        $this->assertStringContainsString('settings/custom-dark-logo.png', (string) $panel->getBrandLogo());
        $this->assertStringContainsString('settings/custom-light-logo.png', (string) $panel->getDarkModeBrandLogo());
        $this->assertStringContainsString('settings/custom-favicon.png', (string) $panel->getFavicon());
    }

    public function test_admin_panel_handles_invalid_or_missing_color_gracefully(): void
    {
        Setting::updateOrCreate(
            ['key' => 'primary_color'],
            ['value' => 'invalid-color']
        );

        $panel = Filament::getPanel('admin');
        $colors = $panel->getColors();

        $this->assertArrayHasKey('primary', $colors);
        $this->assertIsArray($colors['primary']);
        // Default #70f46d shade (approximate green rgb)
        $this->assertArrayHasKey(500, $colors['primary']);
    }
}
