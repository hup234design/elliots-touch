<?php

namespace App\View\Components;

use App\Models\Media\Mediable;
use Awcodes\Curator\Curations\CurationPreset;
use Awcodes\Curator\Curations\ThumbnailPreset;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MediableRenderer extends Component
{
    public ?string $crops = null;
    public ?Media $media = null;
    public ?CurationPreset $curationPreset = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Mediable | null $mediable,
        public string | null $curation = null,
        public string | null $class = ""
    )
    {
        $this->media = $mediable?->media;

        if( $mediable?->crops ) {
            $this->crops = implode(',', array_values($mediable->crops));
        }

        if ( $curation == "thumbnail" ) {
            $this->curationPreset = new ThumbnailPreset();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mediable-renderer');
    }
}
