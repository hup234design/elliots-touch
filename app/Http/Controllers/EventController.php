<?php

namespace App\Http\Controllers;

use App\Models\Events\Event;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(SiteSettings $settings){
        $events = Event::upcoming()->visible()->orderBy('date', 'asc')->paginate(5);
        return view('events', [
            'settings' => $settings,
            'events' => $events
        ]);
    }

    public function event(SiteSettings $settings, $slug){
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('event', [
            'settings' => $settings,
            'event' => $event
        ]);
    }
}
