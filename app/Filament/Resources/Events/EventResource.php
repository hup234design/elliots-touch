<?php

namespace App\Filament\Resources\Events;

use App\Filament\Forms\Components\MediaPicker;
use App\Filament\Resources\Events\EventResource\Pages;
use App\Filament\Resources\Events\EventResource\RelationManagers;
use App\Livewire\Blocks\EditorBlock;
use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\ImageBlock;
use App\Livewire\Blocks\LatestPostsBlock;
use App\Livewire\Blocks\TwoColumnsBlock;
use App\Livewire\Blocks\VideoBlock;
use App\Models\Events\Event;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

     protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

//    protected static ?string $navigationGroup = 'Event Management';

    protected static ?int $navigationSort = 3;

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
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Event::class, 'slug', ignoreRecord: true),

                        Forms\Components\Textarea::make('summary')
                            ->columnSpanFull(),

                        \Filament\Forms\Components\Builder::make('content')
                            ->hiddenLabel()
                            ->blockNumbers(false)
                            ->collapsible()
                            ->blocks(fn(Get $get) => [
                                EditorBlock::schema(),
                                TwoColumnsBlock::schema(),
                                ImageBlock::schema(),
                                GalleryBlock::schema(),
                                VideoBlock::schema(),
                                LatestPostsBlock::schema(),
                            ])
                            ->columnSpanFull(),
                ])
                    ->columns(2),

                Forms\Components\Section::make('Featured Image')
                    ->schema([
                        MediaPicker::make('featured_image')
                            ->columnSpanFull()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('event_category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->columnSpan(3),

                        Forms\Components\Select::make('is_visible')
                            ->options([
                                1 => 'Yes',
                                0 => 'No'
                            ])
                            ->default(1)
                            ->label('Is Visible?')
                            ->columnSpan(3),

                        Forms\Components\DatePicker::make('date')
                            ->label('Date')
                            ->required()
                            ->columnSpan(2),

                        Forms\Components\TimePicker::make('start_time')
                            ->seconds(false)
                            ->label('Start Time')
                            ->columnSpan(2),

                        Forms\Components\TimePicker::make('end_time')
                            ->seconds(false)
                            ->label('End Time')
                            ->columnSpan(2),
                    ])
                    ->columns(6),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        SEO::make(['title','description']),
                        MediaPicker::make('seo_image'),
                    ])
                    ->collapsible()
                    ->columns(2)
                    ->hiddenOn('create'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('featuredImage'))
            ->columns([
                CuratorColumn::make('featured_image.media_id')
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
