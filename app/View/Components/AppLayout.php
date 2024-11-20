<?php

namespace App\View\Components;

use App\Models\Pages\Page;
use App\Services\MenuCacheService;
use App\Settings\GeneralSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menus = MenuCacheService::getCachedMenus();

        $headerMenu = [];
        if( $menu = $menus->where('id', app(GeneralSettings::class)->header_primary_menu)->first() ) {
            $headerMenu = $menu['items'];
        }
        $footerMenu = [];
        if( $menu = $menus->where('id', app(GeneralSettings::class)->footer_primary_menu)->first() ) {
            $footerMenu = $menu['items'];
        }

//        dd($headerMenu);

        $pages = Page::where('is_visible',true)->pluck('title','slug');

        return view('layouts.app', [
            'pages' => $pages,
            'headerMenu' => $headerMenu,
            'footerMenu' => $footerMenu,
        ]);
    }
}
