<?php

namespace App\Http\Controllers;

use App\Models\Events\Event;
use App\Settings\EventsPageSettings;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(EventsPageSettings $settings){
        $events = Event::where('is_visible', true)->get();
        return view('events', [
            'settings' => $settings,
            'events' => $events
        ]);
    }
}
