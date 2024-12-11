<?php

namespace App\Livewire\Blocks;

use App\Models\Content\FundraisingIdea;
use Livewire\Component;

class FundraisingIdeasBlock extends BaseBlockComponent
{
    public $ideas = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->ideas = FundraisingIdea::visible()
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
