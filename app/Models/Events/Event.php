<?php

namespace App\Models\Events;

use App\Concerns\HasMediables;
use App\Models\Posts\PostCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasMediables;

    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'content' => 'array',
            'featured_image' => 'array',
            'header_image' => 'array',
            'is_visible' => 'boolean',
            'date' => 'datetime',
        ];
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
