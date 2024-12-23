<?php

namespace App\Livewire\Blocks;

use App\Models\Events\Event;

class UpcomingEventsBlock extends BaseBlockComponent
{
    public $events = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->events = Event::upcoming()->visible()->orderBy('date', 'asc')->take(3)->get();
    }
}
