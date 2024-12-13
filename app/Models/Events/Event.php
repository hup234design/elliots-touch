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
        if( $this->seo_image ) {
            if ( $media = Media::find($this->seo_image['media_id'] ?? null) ) {
                return new SEOData(
                    image: $media->url
                );
            }
        }
        return new SEOData();
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
