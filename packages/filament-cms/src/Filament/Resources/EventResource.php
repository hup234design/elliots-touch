<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\FilamentCms\Filament\Forms\Components\MediablePreview;
use Hup234design\FilamentCms\Filament\Forms\SidebarLayout;
use Hup234design\FilamentCms\Filament\Resources\EventResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\EventResource\RelationManagers;
use Hup234design\FilamentCms\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Hup234design\FilamentCms\Models\EventCategory;
use Illuminate\Support\Str;
use RalphJSmit\Filament\Components\Forms\Timestamps;
use RalphJSmit\Filament\SEO\SEO;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?int $navigationSort = 3;

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
                            ->unique(Event::class, 'slug', ignoreRecord: true)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Forms\Components\Textarea::make('summary')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Section::make('Featured Image')
                    ->relationship('featured_image')
                    ->collapsible()
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        Forms\Components\Group::make([
                            Forms\Components\Hidden::make('type')
                                ->default('featured'),
                            CuratorPicker::make('media_id')
                                ->label('Image')
                                ->live()
                                ->required()
                                ->afterStateUpdated(function (Forms\Set $set, $state) {
                                    $set('curation', null);
                                }),
                            Forms\Components\Select::make('curation')
                                ->placeholder('No Curation')
                                ->options(fn(Forms\Get $get) => collect(collect($get('media_id'))->first()['curations'] ?? [])
                                    ->mapWithKeys(function ($item) {
                                        return [$item["curation"]["key"] => $item["curation"]["key"]];
                                    }))
                                ->live()
                                ->visible(fn(Forms\Get $get) => $get('media_id')),
                        ]),
                        MediablePreview::make('preview')
                            ->media(fn(Forms\Get $get) => $get('media_id'))
                            ->curation(fn(Forms\Get $get) => $get('curation'))
                            ->columnSpan(3)
                            ->visible(fn(Forms\Get $get) => $get('media_id'))
                    ]),

                TiptapEditor::make('content')
                    ->profile('cms')
                    ->output(TiptapOutput::Json)
                    ->maxContentWidth('full')
                    ->columnSpanFull()
            ],[
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('event_category_id')
                            ->label('Category')
                            ->options(EventCategory::all()->pluck('title','id')),
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        Forms\Components\Toggle::make('is_visible')
                            ->inline(false)
                            ->default(true),
                    ]),

                Forms\Components\Section::make('SEO')
                    ->collapsible()
                    ->schema([
                        SEO::make(['title','description']),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        ...Timestamps::make(),
                    ]),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('featured_image.media_id')
                    ->label(false)
                    ->size(64),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('slug')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('event_category.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('start_time')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('end_time')
//                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_visible'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
