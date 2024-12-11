<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Events\EventResource;
use App\Models\Events\Event;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingEvents extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(EventResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('date', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Starts')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Finishes')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\Action::make('open')
                    ->url(fn (Event $record): string => EventResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
