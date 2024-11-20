<?php

namespace App\Models\Menus;

use App\Models\Pages\Page;
use App\Services\MenuCacheService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'children' => 'array',
        ];
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
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
