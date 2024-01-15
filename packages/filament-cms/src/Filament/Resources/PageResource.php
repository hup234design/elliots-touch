<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\FilamentCms\ContentBlocks\ButtonsBlock;
use Hup234design\FilamentCms\ContentBlocks\CallToActionBlock;
use Hup234design\FilamentCms\ContentBlocks\CardsBlock;
use Hup234design\FilamentCms\ContentBlocks\ContactBlock;
use Hup234design\FilamentCms\ContentBlocks\ImageStripBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestEventsBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestPostsBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectListBlock;
use Hup234design\FilamentCms\Filament\Forms\Components\MediablePreview;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlocksBuilder;
use Hup234design\FilamentCms\Filament\Forms\SidebarLayout;
use Hup234design\FilamentCms\Filament\Resources\PageResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\PageResource\RelationManagers;
use Hup234design\FilamentCms\Livewire\BuilderBlocks\CardListBuilderBlock;
use Hup234design\FilamentCms\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use RalphJSmit\Filament\Components\Forms\Sidebar;
use RalphJSmit\Filament\Components\Forms\Timestamps;
use RalphJSmit\Filament\SEO\SEO;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            SidebarLayout::make([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Page::class, 'slug', ignoreRecord: true)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

//                Forms\Components\Section::make('Featured Image')
//                    ->relationship('featured_image')
//                    ->collapsible()
//                    ->collapsed()
//                    ->columns(4)
//                    ->schema([
//                        Forms\Components\Group::make([
//                            Forms\Components\Hidden::make('type')
//                                ->default('featured'),
//                            CuratorPicker::make('media_id')
//                                ->label('Image')
//                                ->live()
//                                ->afterStateUpdated(function (Forms\Set $set, $state) {
//                                    $set('curation', null);
//                                }),
//                            Forms\Components\Select::make('curation')
//                                ->placeholder('No Curation')
//                                ->options(fn(Forms\Get $get) => collect(collect($get('media_id'))->first()['curations'] ?? [])
//                                    ->mapWithKeys(function ($item) {
//                                        return [$item["curation"]["key"] => $item["curation"]["key"]];
//                                    }))
//                                ->live()
//                                ->visible(fn(Forms\Get $get) => $get('media_id')),
//                        ]),
//                        MediablePreview::make('preview')
//                            ->media(fn(Forms\Get $get) => $get('media_id'))
//                            ->curation(fn(Forms\Get $get) => $get('curation'))
//                            ->columnSpan(3)
//                            ->visible(fn(Forms\Get $get) => $get('media_id'))
//                    ]),

//                Forms\Components\Section::make('Content')
//                    ->collapsible()
//                    ->collapsed()
//                    ->schema([
                        TiptapEditor::make('content')
                            ->profile('cms')
                            ->output(TiptapOutput::Json)
                            ->columnSpanFull(),
//                    ]),

//                Forms\Components\Section::make('Content Blocks')
//                    ->collapsible()
//                    ->collapsed()
//                    ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        ContentBlocksBuilder::make()
                    ])
                    ->columnSpanFull()
            ], [
                Forms\Components\Section::make('SEO')
                    ->collapsible()
                    ->schema([
                        SEO::make(['title','description']),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        ...Timestamps::make(),
                    ]),
            ]),
        ]);
    }

//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Forms\Components\Section::make()
//                    ->schema([
//                        Forms\Components\TextInput::make('title')
//                        ->required(),
//                    Forms\Components\TextInput::make('slug')
//                        ->required(),
//                ]),
//
//                Forms\Components\Section::make('Featured Image')
//                    ->relationship('featured_image')
//                    ->collapsible()
//                    ->columns(4)
//                    ->schema([
//                        Forms\Components\Group::make([
//                            Forms\Components\Hidden::make('type')
//                                ->default('featured'),
//                            CuratorPicker::make('media_id')
//                                ->label('Image')
//                                ->live()
//                                ->afterStateUpdated(function (Forms\Set $set, $state) {
//                                    $set('curation', null);
//                                }),
//                            Forms\Components\Select::make('curation')
//                                ->placeholder('No Curation')
//                                ->options(fn(Forms\Get $get) => collect(collect($get('media_id'))->first()['curations'] ?? [])
//                                    ->mapWithKeys(function ($item) {
//                                        return [$item["curation"]["key"] => $item["curation"]["key"]];
//                                    }))
//                                ->live()
//                                ->visible(fn(Forms\Get $get) => $get('media_id')),
//                        ]),
//                        MediablePreview::make('preview')
//                            ->media(fn(Forms\Get $get) => $get('media_id'))
//                            ->curation(fn(Forms\Get $get) => $get('curation'))
//                            ->columnSpan(3)
//                            ->visible(fn(Forms\Get $get) => $get('media_id'))
//                    ]),
//
//                Forms\Components\Section::make('Content')
//                    ->collapsible()
//                    ->schema([
//                        TiptapEditor::make('content')
//                            ->label(false)
//                            ->profile('default')
//                            ->output(TiptapOutput::Json)
//                            ->maxContentWidth('full')
//                            ->columnSpanFull(),
//                    ]),
//
//                Forms\Components\Toggle::make('is_home')
//                    ->required(),
//                Forms\Components\Toggle::make('is_visible')
//                    ->required(),
//
//                Forms\Components\Section::make('Header')
//                    ->relationship('header')
//                    ->collapsible()
//                    ->schema([
//                        Forms\Components\TextInput::make('heading'),
//                        Forms\Components\TextInput::make('subheading')
//                    ]),
//
//                Forms\Components\Builder::make('blocks')
//                    ->blocks([
//                        CardListBuilderBlock::blockSchema(),
//                    ])
//                    ->addActionLabel('Add Content Block')
//                    ->labelBetweenItems('Insert Content Block')
//                    ->blockNumbers(false)
//                    ->collapsible()
//                    ->collapsed()
//                    ->columnSpanFull(),
//            ])
//            ->columns(2);
//    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_home')
                    ->label(false)
                    ->boolean()
                    ->trueIcon('heroicon-s-home')
                    ->falseIcon(false)
                    ->extraCellAttributes(['style' => 'width: 40px']),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('Visible?')
                    ->disabled(fn(Page $record) => $record->is_home),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
