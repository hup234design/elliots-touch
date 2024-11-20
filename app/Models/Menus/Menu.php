<?php

namespace App\Models\Menus;

use App\Services\MenuCacheService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
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
