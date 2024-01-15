<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\FilamentCms\Filament\Forms\Components\MediablePreview;
use Hup234design\FilamentCms\Filament\Resources\PostResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\PostResource\RelationManagers;
use Hup234design\FilamentCms\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')->label('Title'),
                        Forms\Components\TextInput::make('slug')->label('Slug'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('publish_at')
                            ->required(),
                        Forms\Components\Toggle::make('is_visible')
                            ->inline(false)
                            ->default(true),
                    ])
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_category.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
