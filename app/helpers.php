<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    /**
     * Get setting value by key with optional fallback default.
     * Automatically resolves storage assets for uploaded files.
     * Smart logo fallback logic for site_logo_light and site_logo_dark.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        try {
            return Cache::remember('setting_' . $key, 3600, function () use ($key, $default) {
                $setting = Setting::where('key', $key)->first();
                $val = ($setting && ! is_null($setting->value) && $setting->value !== '')
                    ? $setting->value
                    : null;

                // If stored as JSON string (e.g. from FileUpload or repeater), try decoding
                if (is_string($val) && (str_starts_with($val, '[') || str_starts_with($val, '{'))) {
                    $decoded = json_decode($val, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        if (in_array($key, ['site_logo_dark', 'site_logo_light', 'site_favicon', 'inventory_hero_bg_image', 'home_hero_bg_image', 'home_cta_image', 'about_hero_bg_image', 'about_story_image'])) {
                            $val = is_array($decoded) ? (reset($decoded) ?: null) : $decoded;
                        }
                    }
                }

                // Smart logo fallback logic:
                // If light logo is missing, use dark logo (or vice versa)
                if (is_null($val) || $val === '') {
                    if ($key === 'site_logo_light') {
                        $darkSetting = Setting::where('key', 'site_logo_dark')->first();
                        if ($darkSetting && ! is_null($darkSetting->value) && $darkSetting->value !== '') {
                            $val = $darkSetting->value;
                        }
                    } elseif ($key === 'site_logo_dark') {
                        $lightSetting = Setting::where('key', 'site_logo_light')->first();
                        if ($lightSetting && ! is_null($lightSetting->value) && $lightSetting->value !== '') {
                            $val = $lightSetting->value;
                        }
                    }
                }

                if (is_null($val) || $val === '') {
                    $val = $default;
                }

                if (is_string($val)) {
                    // Full external URL
                    if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) {
                        return $val;
                    }

                    // Template assets
                    if (str_starts_with($val, '/assets/') || str_starts_with($val, 'assets/')) {
                        return asset(ltrim($val, '/'));
                    }

                    // Storage files
                    if (str_starts_with($val, '/storage/') || str_starts_with($val, 'storage/')) {
                        return asset(ltrim($val, '/'));
                    }

                    // Uploaded settings/media files
                    if (str_starts_with($val, 'settings/') || str_starts_with($val, 'uploads/') || str_starts_with($val, 'cars/')) {
                        return asset('storage/' . $val);
                    }
                }

                return $val;
            });
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
