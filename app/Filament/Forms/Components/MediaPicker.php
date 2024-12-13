<?php

namespace App\Filament\Forms\Components;

use App\Models\User;
use Awcodes\Curator\Actions\MediaAction;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Concerns\CanGeneratePaths;
use Awcodes\Curator\Concerns\CanUploadFiles;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Config;

class MediaPicker extends Field
{
    use CanUploadFiles;
    use CanGeneratePaths;

    protected string $view = 'filament.forms.components.media-picker';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (MediaPicker $component, $state) {
            $component->state([
                'media_id' => $state['media_id'] ?? '',
                'curation' => $state['curation'] ?? '',
                'crops' => $state['crops'] ?? '',
                'caption' => $state['caption'] ?? '',
            ]);
        });

        $this->dehydrateStateUsing(function ($state) {
            return [
                'media_id' => $state['media_id'] ?? '',
                'curation' => $state['curation'] ?? '',
                'crops' => $state['crops'] ?? '',
                'caption' => $state['caption'] ?? '',
            ];
    });

        $this->registerActions([
            fn (MediaPicker $component): Action => $component->getCuratorPickerAction(),
            fn (MediaPicker $component): Action => $component->getCropAction(),
            fn (MediaPicker $component): Action => $component->getRemoveImageAction()
        ]);
    }



//    /**
//     * @throws Exception
//     */
//    protected function setUp(): void
//    {
//        parent::setUp();
//
////        $this->registerActions([
////            fn (MediaPicker $component): Action => $component->getCuratorPickerAction(),
////        ]);
//    }

    public function getCuratorPickerAction(): Action
    {
        return Action::make('openCuratorPicker')
            ->icon('heroicon-m-photo')
            ->label(fn($state) => $state['media_id'] ? "Change Image" : "Select Image")
            ->button()
            ->size('sm')
            ->color('primary')
            ->action(function (MediaPicker $component, array $data, \Livewire\Component $livewire): void {
                $livewire->dispatch('open-modal', id: 'curator-panel', settings: [
                    'acceptedFileTypes' => $component->getAcceptedFileTypes(),
                    'defaultSort' => 'desc',
                    'directory' => $component->getDirectory(),
                    'diskName' => $component->getDiskName(),
                    'imageCropAspectRatio' => $component->getImageCropAspectRatio(),
                    'imageResizeTargetWidth' => $component->getImageResizeTargetWidth(),
                    'imageResizeTargetHeight' => $component->getImageResizeTargetHeight(),
                    'imageResizeMode' => $component->getImageResizeMode(),
                    'isLimitedToDirectory' => false,
                    'isTenantAware' => Config::get('curator.is_tenant_aware'),
                    'tenantOwnershipRelationshipName' => Config::get('curator.tenant_ownership_relationship_name'),
                    'isMultiple' => false,
                    'maxItems' => 1,
                    'maxSize' => $component->getMaxSize(),
                    'minSize' => $component->getMinSize(),
                    'modalId' => $component->getLivewire()->getId() . '-form-component-action',
                    'pathGenerator' => Config::get('curator.path_generator'),
                    'rules' => [],
                    'selected' => null,
                    'shouldPreserveFilenames' => $component->shouldPreserveFilenames(),
                    'statePath' => $component->getStatePath(),
                    'types' => $component->getAcceptedFileTypes(),
                    'visibility' => $component->getVisibility(),
                ]);
            });
    }

    public function getCropAction() : Action
    {
        return Action::make('cropImage')
            ->label('Crop Image')
            ->modalSubmitActionLabel('save')
            ->color('secondary')
            ->size('sm')
            ->icon('heroicon-o-scissors')
            ->form(function ($state, array $arguments) {
                $media = Media::find($state['media_id']);
                $crops = json_decode($state['crops'], true)  ?? [];
//                $crops = implode(',', array_values($cropData));
                return [
                    MediaImageCropper::make("crop")
                        ->media($media)
                        ->crops($crops),
                ];
            })
            ->modalWidth('7xl')
            ->action(function (\Livewire\Component $livewire, Set $set, array $data, $state) : void {
                $state['crops'] = json_encode($data['crop']);
                $set('crops', json_encode($data['crop']));
                $livewire->dispatch('update-crops', [
                    'statePath' => $this->getStatePath(),
                    'crops' => json_encode($data['crop'])
                ]);
            })
            ->closeModalByClickingAway(false);
    }


    public function getRemoveImageAction() : Action
    {
        return Action::make('removeImage')
            ->label('Remove Image')
            ->modalSubmitActionLabel('save')
            ->color('danger')
            ->size('sm')
            ->icon('heroicon-o-trash')
            ->requiresConfirmation()
            ->action(function (\Livewire\Component $livewire, Set $set, array $data, $state) : void {
                $livewire->dispatch('remove-media');
            });
    }
}


