<?php

namespace App\View\Components;

use App\Models\Events\Event;
use App\Models\Posts\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsLayout extends Component
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
        $latestPosts = Post::published()->visible()->orderBy('published_at', 'desc')->take(5)->get();
        $upcomingEvents = Event::upcoming()->visible()->orderBy('date', 'asc')->take(5)->get();
        return view('layouts.posts', compact('latestPosts','upcomingEvents'));
    }
}
