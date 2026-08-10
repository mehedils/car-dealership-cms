<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::saved(function (Setting $setting) {
            Cache::forget('setting_' . $setting->key);
            if (in_array($setting->key, ['site_logo_dark', 'site_logo_light'])) {
                Cache::forget('setting_site_logo_dark');
                Cache::forget('setting_site_logo_light');
            }
        });

        static::deleted(function (Setting $setting) {
            Cache::forget('setting_' . $setting->key);
            if (in_array($setting->key, ['site_logo_dark', 'site_logo_light'])) {
                Cache::forget('setting_site_logo_dark');
                Cache::forget('setting_site_logo_light');
            }
        });
    }
}
