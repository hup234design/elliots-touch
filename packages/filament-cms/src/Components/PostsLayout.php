<?php

namespace Hup234design\FilamentCms\Components;

use Closure;
use Hup234design\FilamentCms\Models\PostCategory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsLayout extends Component
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
        $post_categories = PostCategory::withCount('posts')->get();
        return view('cms::layouts.posts', compact('post_categories'));
    }
}
