<?php

namespace App\Models\Content;

use App\Concerns\HasMediables;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class TeamMember extends Model implements Sortable
{
    use SortableTrait;
    use HasMediables;

    protected $guarded = [];

    protected function casts() : array
    {
        return [
            'profile_image' => 'array',
        ];
    }
}
