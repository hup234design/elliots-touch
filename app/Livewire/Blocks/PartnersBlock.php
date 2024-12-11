<?php

namespace App\Livewire\Blocks;

use App\Models\Content\Partner;
use Livewire\Component;

class PartnersBlock extends BaseBlockComponent
{
    public $partners = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->partners = Partner::all();
    }
}
