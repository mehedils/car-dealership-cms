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

                // Smart logo fallback logic:
                // If light logo is missing, use dark logo (or vice versa)
                if (is_null($val)) {
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

                if (is_null($val)) {
                    $val = $default;
                }

                if (is_string($val) && str_starts_with($val, 'settings/')) {
                    return asset('storage/' . $val);
                }

                return $val;
            });
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
