<?php

namespace App\Filament\Forms\Components;

use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Log;

class MediaImagePreview extends Field
{
    protected string $view = 'filament.forms.components.media-image-preview';

    protected array | \Closure | null $selectedMedia = null;

    protected function setUp() : void
    {
        parent::setUp();

        $this->registerActions([
            fn(self $component): Action => $component->getCropAction(),
            fn(self $component): Action => $component->getDeleteCropAction(),
            fn(self $component): Action => $component->getDeleteMediaAction(),
        ]);
    }

    public function selectedMedia(): array
    {
        return $this->evaluate($this->selectedMedia);
    }

    public function media(array | \Closure $condition = null): static
    {
        $this->selectedMedia = $condition;
        return $this;
    }

    public function getMedia()
    {
        $media = collect( $this->selectedMedia() )->first();
        return Media::find($media['id']);
    }

    public function getCropAction() : Action
    {
        return Action::make('crop')
            ->label('Crop Image')
            ->modalSubmitActionLabel('save')
//            ->color('primary')
            ->size('xs')
            ->icon('heroicon-o-scissors')
//            ->fillForm(function (array $arguments) : array {
//                $image = ImageLibrary::imageModel()::find($arguments['id']);
//
//                return $this->getImageConversions($image)
//                    ->mapWithKeys(function (ImageConversion $conversion) use ($image) {
//                        return [
//                            "conversion_{$conversion->id}" => [
//                                'id' => $conversion->id,
//                                'x' => $conversion->x ?? 0,
//                                'y' => $conversion->y ?? 0,
//                                'width' => $conversion->width ?? $image->width,
//                                'height' => $conversion->height ?? $image->height,
//                                'rotate' => $conversion->rotate ?? 0,
//                                'scale_x' => $conversion->scale_x ?? 1,
//                                'scale_y' => $conversion->scale_y ?? 1,
//                            ],
//                        ];
//                    })
//                    ->toArray();
//            })
            ->form(function (array $arguments) {
                return [
                    MediaImageCropper::make("crop")
                        ->media($this->getMedia())
                        ->crops($this->getState()),
                ];
            })
            ->modalWidth('7xl')
            ->action(function (Set $set, array $data) : void {
                $set('crops', $data['crop']);
            })
            ->closeModalByClickingAway(false);
    }

    public function getDeleteCropAction() : Action
    {
        return Action::make('deleteCrop')
            ->label('Delete Crop')
            ->requiresConfirmation()
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->action(function (Set $set) : void {
                $set('crops', null);
            });
    }

    public function getDeleteMediaAction() : Action
    {
        return Action::make('deleteMedia')
            ->label('Delete Media')
            ->requiresConfirmation()
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->action(function (Set $set) : void {
                $set('media_id', null);
            });
    }
}
