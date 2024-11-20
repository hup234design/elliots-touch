<?php

namespace App\Models\Posts;

use App\Concerns\HasMediables;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
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
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now()->format('Y-m-d H:i:s'));
    }
}
