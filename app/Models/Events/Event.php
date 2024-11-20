<?php

namespace App\Models\Events;

use App\Concerns\HasMediables;
use Illuminate\Database\Eloquent\Model;

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
}
