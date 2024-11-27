<?php

namespace App\Livewire\Blocks;

use App\Models\Partner;
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
