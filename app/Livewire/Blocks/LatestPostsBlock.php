<?php

namespace App\Livewire\Blocks;

use App\Models\Posts\Post;

class LatestPostsBlock extends BaseBlockComponent
{
    public $posts = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->posts = Post::take(3)->get();
    }
}
