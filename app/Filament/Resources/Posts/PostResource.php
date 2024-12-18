<?php

namespace App\Filament\Resources\Posts;

use App\Filament\Forms\Components\MediablePicker;
use App\Filament\Forms\Components\MediaPicker;
use App\Filament\Resources\Posts\PostResource\Pages;
use App\Filament\Resources\Posts\PostResource\RelationManagers;
use App\Livewire\Blocks\EditorBlock;
use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\GoogleMapBlock;
use App\Livewire\Blocks\ImageBlock;
use App\Livewire\Blocks\LatestPostsBlock;
use App\Livewire\Blocks\LinksBlock;
use App\Livewire\Blocks\TeamMembersBlock;
use App\Livewire\Blocks\TwoColumnsBlock;
use App\Livewire\Blocks\UpcomingEventsBlock;
use App\Livewire\Blocks\VideoBlock;
use App\Models\Posts\Post;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationLabel = "Posts";

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
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                Forms\Components\Textarea::make('summary')
                    ->columnSpanFull(),

//                        Forms\Components\RichEditor::make('content')
//                            ->disableToolbarButtons([
//                                'attachFiles',
//                                'strike',
//                                'codeBlock'
//                            ])
//                            ->required()
//                            ->columnSpanFull(),

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
                                //UpcomingEventsBlock::schema(),
                                //GoogleMapBlock::schema(),
                                //TeamMembersBlock::schema(),
                                //LinksBlock::schema(),
                            ])
                        ->columnSpanFull(),

//                        Forms\Components\Select::make('blog_author_id')
//                            ->relationship('author', 'name')
//                            ->searchable()
//                            ->required(),


                    ])
                    ->columns(2),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('post_category_id')
                            ->relationship('category', 'name')
                            ->searchable(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Published Date')
                            ->required()
                            ->columnStart(1),

                        Forms\Components\Select::make('is_visible')
                            ->options([
                                1 => 'Yes',
                                0 => 'No'
                            ])
                            ->label('Is Visible?'),

//                        SpatieTagsInput::make('tags'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Featured Image')
                    ->schema([
                        MediaPicker::make('featured_image')
                            ->columnSpanFull()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        SEO::make(['title','description']),
                        MediaPicker::make('seo_image'),
                    ])
                    ->collapsible()
                    ->columns(2)
                    ->hiddenOn('create')
            ]);

//        return $form
//            ->schema([
//                Forms\Components\TextInput::make('post_category_id')
//                    ->numeric(),
//                Forms\Components\TextInput::make('title')
//                    ->required(),
//                Forms\Components\TextInput::make('slug')
//                    ->required(),
//                Forms\Components\Textarea::make('summary')
//                    ->columnSpanFull(),
//                MediaPicker::make('featured_image')
//                    ->columnSpanFull(),
//                Forms\Components\RichEditor::make('content')
//                    ->disableToolbarButtons([
//                        'attachFiles',
//                        'strike',
//                        'codeBlock'
//                    ])
//                    ->columnSpanFull(),
//                Forms\Components\DateTimePicker::make('published_at'),
//                Forms\Components\Toggle::make('is_visible')
//                    ->required(),
//            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            //->modifyQueryUsing(fn (Builder $query) => $query->with('featuredImage'))
            ->columns([
                CuratorColumn::make('featured_image.media_id')
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Is Visible?')
                    ->boolean(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
