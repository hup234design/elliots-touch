<?php

namespace App\Models\Events;

use App\Concerns\HasMediables;
use App\Models\Posts\PostCategory;
use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Stevebauman\Hypertext\Transformer;

class Event extends Model
{
    use HasMediables;
    use HasSEO;

    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'content' => 'array',
            'featured_image' => 'array',
            'header_image' => 'array',
            'is_visible' => 'boolean',
            'date' => 'datetime',
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
        else if( $this->featured_image ) {
            if ( $media = Media::find($this->featured_image['media_id'] ?? null) ) {
                $seoImageUrl = $media->url;
            }
        }

        $title = $this->seo->title
            ? $this->seo->title . ' | ' . config('app.name')
            : $this->title . ' | ' . config('app.name');

        $description = $this->seo->description
            ? $this->seo->description
            : (new Transformer())->toText($this->summary ?? "");

        return new SEOData(
            image: $seoImageUrl,
            title: $title,
            description: $description
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', Carbon::now()->startOfDay());
    }

    public function scopePrevious($query)
    {
        return $query->whereDate('date', '<', Carbon::now()->startOfDay());
    }
}
