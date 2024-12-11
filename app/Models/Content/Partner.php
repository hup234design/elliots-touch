<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    protected function casts() : array
{
    return [
        'logo' => 'array',
        'is_visible' => 'boolean'
    ];
}
}
