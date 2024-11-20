<?php

namespace App\Models\Pages;

use App\Services\MenuCacheService;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'content' => 'array',
            'header_image' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public static function boot()
    {
        parent::boot();

        self::saved(function($model){
            MenuCacheService::refreshCache();
        });
        self::deleted(function($model){
            MenuCacheService::refreshCache();
        });
    }
}
