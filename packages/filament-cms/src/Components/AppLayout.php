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
        $headerMenu = Navigation::fromHandle('header');
        $headerLinks = NavigationMenuItems::transform($headerMenu['items'] ?? []);

        $footerMenu = Navigation::fromHandle('footer');
        $footerLinks = NavigationMenuItems::transform($footerMenu['items'] ?? []);

        $menus = [
            'header' => $headerLinks,
            'footer' => $footerLinks,
        ];

        return view('cms::layouts.app', compact('menus'));
    }
}
