<?php

namespace App\Services;

use App\Models\Menus\Menu;
use App\Models\Pages\Page;
use Illuminate\Support\Facades\Cache;

class MenuCacheService
{
    public static function getCachedMenus()
    {
        return Cache::remember('site_menus', now()->addHours(4), function () {
            return static::makeMenus();
        });
    }

    public static function refreshCache()
    {
        Cache::put('site_menus', static::makeMenus(), now()->addHours(4));
    }

    public static function makeMenus()
    {
        return Menu::all()->map(function ($menu, $menuIndex) {
            return [
                'id' => $menu->id,
                'title' => $menu->title,
                'slug' => $menu->slug,
                'items' => collect($menu->items)->map(function ($item, $itemIndex) {
                    return [
                        'route' => $item->route != "dropdown" ? $item->route : null,
                        'title' => $item->title,
                        'slug' => $item->page?->slug,
                        'children' => $item->route != "dropdown" ? null : collect($item->children ?? [])->map(function ($child) {
                            if ( $page = Page::find($child['page_id']) ) {
                                return [
                                    'route' => 'pages.page',
                                    'title' => $child['title'],
                                    'slug' => $page->slug,
                                ];
                            }
                        })->reject(function ($child) {
                            return empty($child);
                        })
                    ];
                })
            ];
        });
    }
}

