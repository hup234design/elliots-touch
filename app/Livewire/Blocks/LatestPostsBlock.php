<?php

namespace App\Livewire\Blocks;

use App\Models\Posts\Post;

class LatestPostsBlock extends BaseBlockComponent
{
    public $posts = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->posts = Post::published()->visible()->orderBy('published_at', 'desc')->take(3)->get();
    }
}
