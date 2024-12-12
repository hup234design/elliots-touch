<?php

namespace App\Models\Pages;

use App\Services\MenuCacheService;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Page extends Model
{
    use HasSEO;

    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'content' => 'array',
            'header_image' => 'array',
            'is_visible' => 'boolean',
            'is_home' => 'boolean',
            'seo_image' => 'array',
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
