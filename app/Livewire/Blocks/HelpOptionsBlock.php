<?php

namespace App\Livewire\Blocks;

use App\Models\Content\HelpOption;

class HelpOptionsBlock extends BaseBlockComponent
{
    public $options = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->options = HelpOption::all();
    }
}
