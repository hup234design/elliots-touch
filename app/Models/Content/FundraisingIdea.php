<?php

namespace App\Models\Content;

use App\Concerns\HasMediables;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class FundraisingIdea extends Model implements Sortable
{
    use SortableTrait;
    use HasMediables;

    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'featured_image' => 'array',
            'is_visible' => 'boolean'
        ];
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
