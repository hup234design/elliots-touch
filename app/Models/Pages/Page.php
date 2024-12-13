<?php

namespace App\Models\Pages;

use App\Services\MenuCacheService;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Stevebauman\Hypertext\Transformer;

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

    public function getDynamicSEOData(): SEOData
    {
        $seoImageUrl = null;
        if( $this->seo_image ) {
            if ( $media = Media::find($this->seo_image['media_id'] ?? null) ) {
                $seoImageUrl = $media->url;
            }
        }

        $title = $this->seo->title
            ? $this->seo->title . ' | ' . config('app.name')
            : $this->title . ' | ' . config('app.name');

        return new SEOData(
            image: $seoImageUrl,
            title: $title
        );
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
