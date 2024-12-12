<?php

namespace App\Livewire\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Livewire\Component;
use function Livewire\on;

class BaseBlockComponent extends Component
{
    public $data;

    public static bool $includeHeader = true;

    public function mount($data)
    {
        $this->data = $data;
    }

    public static function sharedSchema(): array
    {
        return static::$includeHeader ?
            [
                Group::make()
                    ->schema([
                        Toggle::make('include_header')->label('Include Header'),
                    ])
                    ->columns(4),
                Tabs::make('tabs')
                    ->tabs([
                        Tabs\Tab::make('content')
                            ->label('Block Content')
                            ->schema([

                            ]),
                        Tabs\Tab::make('header')
                            ->label('Block Header')
                            ->schema([
                                TextInput::make('title')->label('Title'),
                                TextInput::make('subtitle')->label('Sub-Title'),
                                Radio::make('title_alignment')
                                    ->label('Title Alignment')
                                    ->options([
                                        'left' => 'Left',
                                        'center' => 'Center',
                                        'right' => 'Right'
                                    ])
                                    ->default('center')
                                    ->required()
                            ]),
                        Tabs\Tab::make('options')
                            ->label('Block Options')
                            ->schema([
                                Select::make('style')
                                    ->options([
                                        'default' => 'Default',
                                        'light' => 'Light',
                                        'dark' => 'Dark',
                                    ])
                                    ->default('default')
                                    ->required()
                            ])
                    ]),
            ] : [];
    }

    public static function schema(): Block
    {
        return Block::make(static::blockName())
            ->label(static::blockLabel())
            ->schema([
                Group::make()
                    ->schema([
                        Toggle::make('include_header')
                            ->label('Include Header')
                            ->default(static::$includeHeader)
                            ->live(),
                    ])
                    ->columns(4),
                Section::make()
                    ->schema([
                        TextInput::make('header_title')->label('Title')->required(),
                        Textarea::make('header_text')->label('Text'),
                        Radio::make('title_alignment')
                            ->label('Title Alignment')
                            ->options([
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right'
                            ])
                            ->default('center')
                            ->inline()
                            ->required(),
                        Toggle::make('title_headline')
                            ->inlineLabel()
                            ->label('Use headline font')
                            ->default(true),
                    ])
//                    ->columns(2)
                    ->visible(fn(Get $get) => $get('include_header'))
                    ->extraAttributes(['style' => 'background-color: rgb(249, 250, 251);']),
                Section::make()
                    ->schema(static::blockSchema())
                    ->columns(2)
                    ->extraAttributes(['style' => 'background-color: rgb(249, 250, 251);']),
//                Section::make()
//                    ->schema([
//                        Select::make('style')
//                            ->options([
//                                'default' => 'Default',
//                                'light' => 'Light',
//                                'dark' => 'Dark',
//                            ])
//                            ->default('default')
//                            ->required(),
//                    ])
            ]);
    }

    public static function blockName() : string
    {
        // Get the class name of the child component that called this method
        $childClassName = class_basename(get_called_class());
        return Str::snake($childClassName);
    }

    public static function blockLabel() : string
    {
        return Str::headline(preg_replace('/_block$/i', '', static::blockName())); // Removes "_block" or "_Block"
    }

    public static function blockSchema(): array
    {
        return [];
    }

    public function render()
    {
        $this->data['include_header'] = $this->data['include_header'] ?? false;
        $this->data['header_title'] = $this->data['header_title'] ?? "";
        $this->data['header_text'] = $this->data['header_text'] ?? "";
        $this->data['title_alignment'] = $this->data['title_alignment'] ?? "center";

        return view('livewire.blocks.' . Str::kebab(class_basename($this)));
    }
}
