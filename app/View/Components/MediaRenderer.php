<?php

namespace App\View\Components;

use App\Models\Media\Mediable;
use Awcodes\Curator\Curations\CurationPreset;
use Awcodes\Curator\Curations\ThumbnailPreset;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MediaRenderer extends Component
{
    public ?string $crops = null;
    public ?Media  $media = null;
    public ?string $curation = null;
    public ?string $caption = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array | null $data = null,
        public string | null $class = "max-w-full mx-auto",
        public string | null $alt = null
    )
    {
        if( $data && isset($data['media_id'])) {
            $this->media = Media::find($data['media_id']);
            if (isset($data['crops'])) {
                $cropData = json_decode($data['crops'], true)  ?? [];
//                $this->crops = json_decode($data['crops'], true);
                $this->crops = implode(',', array_values($cropData));
            }
            if (isset($data['curation'])) {
                $this->curation = $data['curation'];
            }
            if (isset($data['caption'])) {
                $this->caption = $data['caption'];
            }
        }

//
//        if( $mediable?->crops ) {
//            $this->crops = implode(',', array_values($mediable->crops));
//        }
//
//        if ( $curation == "thumbnail" ) {
//            $this->curationPreset = new ThumbnailPreset();
//        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.media-renderer');
    }
}
