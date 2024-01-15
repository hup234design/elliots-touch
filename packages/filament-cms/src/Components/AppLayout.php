<?php

namespace Hup234design\FilamentCms\Components;

use Closure;
use Hup234design\FilamentCms\Models\Page;
use Hup234design\FilamentCms\Support\NavigationMenuItems;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Models\Navigation;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = Navigation::fromHandle('header');
        $menuLinks = NavigationMenuItems::transform($menu['items'] ?? []);

        $pageLinks = Page::where('is_home',false)->visible()->pluck('title','slug');
        return view('cms::layouts.app', compact('pageLinks','menuLinks'));
    }
}
