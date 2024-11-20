<?php

namespace App\Livewire\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Illuminate\Support\Str;
use Livewire\Component;

class BaseBlockComponent extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }

    public static function sharedSchema(): array
    {
        return [
//            TextInput::make('header')->label('Header'),
//            Select::make('style')
//                ->options([
//                    'default' => 'Default',
//                    'light' => 'Light',
//                    'dark' => 'Dark',
//                ])
//                ->default('default')
//                ->required()
        ];
    }

    public static function schema(): Block
    {
        // Get the class name of the child component that called this method
        $childClassName = class_basename(get_called_class());
        $blockName = Str::snake($childClassName);
        return Block::make($blockName)
            ->schema([
//                Tabs::make('Content Block')
//                    ->schema([
//                        Tabs\Tab::make('Content')
//                            ->schema(
//                                static::blockSchema()
//                            ),
//                        Tabs\Tab::make('Header')
//                            ->schema([
//                                TextInput::make('header')->label('Header'),
//                            ]),
//                        Tabs\Tab::make('Options')
//                            ->schema([
//                                Select::make('style')
//                                    ->options([
//                                        'default' => 'Default',
//                                        'light' => 'Light',
//                                        'dark' => 'Dark',
//                                    ])
//                                    ->default('default')
//                                    ->required()
//                            ])
//                    ]),
                Group::make(self::sharedSchema()),
                Group::make(static::blockSchema()),
            ]);
//            ->preview(static::preview());
    }

    public static function blockSchema(): array
    {
        return [];
    }

//    public static function preview(): string
//    {
//        return 'cms::content-blocks.'.static::name().'.preview';
//    }

    public function render()
    {
        return view('livewire.blocks.' . Str::kebab(class_basename($this)));
    }
}
