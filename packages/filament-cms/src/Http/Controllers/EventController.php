<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Event;
use Hup234design\FilamentCms\Models\EventCategory;
use Hup234design\FilamentCms\Models\IndexPage;

class EventController extends Controller
{
    public function index()
    {
        $page = IndexPage::where('for', 'events')->firstOrFail();

        $events = Event::upcoming()->visible()
            ->orderBy('date', 'asc')
            ->paginate(3);

        return view('cms::events.index', compact('page','events'));
    }

    public function event($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        return view('cms::events.event', compact('event'));
    }

    public function category($slug)
    {
        $category = EventCategory::whereSlug($slug)->firstOrFail();

        $events = $category
            ->events()
            ->upcoming()
            ->visible()
            ->orderBy('date', 'asc')
            ->paginate(3);

        return view('cms::events.category', compact('category','events'));
    }
}
