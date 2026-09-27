<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
    ];

    /**
     * Get setting value by key with cache support.
     */
    public static function get(string $key, mixed$default = null): mixed
    {
        $setting = Cache::rememberForever("site_setting_{$key}", function () use ($key) {
            return self::where('key', $key)->first();
        });

        if (!$setting) {
            return $default;
        }

        return match ($setting->type) {
            'boolean' => (bool) $setting->value,
            'integer' => (int) $setting->value,
            'array'   => !empty($setting->value) ? json_decode($setting->value, true) : [],
            default   => $setting->value,
        };
    }

    /**
     * Set/Update setting by key and clear cache.
     */
    public static function set(string $key, mixed$value, string $group = 'general', string$type = 'string'): void
    {
        $formattedValue = is_array($value) ? json_encode(array_values($value)) :$value;

        self::updateOrCreate(
            ['key' => $key],
            [
                'group' => $group,
                'value' => $formattedValue,
                'type'  => $type,
            ]
        );

        Cache::forget("site_setting_{$key}");
    }
}