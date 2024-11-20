<?php

namespace App\Livewire\Blocks;

use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Filament\Forms\Components\RichEditor;
use Livewire\Component;

class GoogleMapBlock extends BaseBlockComponent
{
    public $apiKey;
    public $latitude;
    public $longitude;

    public function mount($data)
    {
        $this->latitude  = $data['location']['lat'];
        $this->longitude = $data['location']['lng'];
    }


    public static function blockSchema(): array
    {
        return [
            LocationPickr::make('location')
                ->mapControls([
                    'mapTypeControl'    => true,
                    'scaleControl'      => true,
                    'streetViewControl' => true,
                    'rotateControl'     => true,
                    'fullscreenControl' => true,
                    'zoomControl'       => true,
                ])
                ->defaultZoom(12)
                ->draggable()
                ->clickable()
                ->height('40vh'),
        ];
    }
}
