<?php

namespace Hup234design\FilamentCms\Components;

use Closure;
use Hup234design\FilamentCms\Models\EventCategory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventsLayout extends Component
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
        $event_categories = EventCategory::withCount('events')->get();
        return view('cms::layouts.events', compact('event_categories'));
    }
}
