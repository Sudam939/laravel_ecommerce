<?php

namespace App\Filament\Widgets;

use App\Models\Vendor;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class VendorRequest extends BaseWidget
{
    protected array|int|string  $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn() => Vendor::query()->where('status', 'pending'))
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.name')
                    ->label('Store Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.address')
                    ->label('Store Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.phone')
                    ->label('Store Phone')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        Select::make('status')
                            ->required()
                            ->options([
                                "approved" => "Approved",
                                "pending" => "Pending",
                                "rejected" => "Rejected",
                            ]),
                    ]),
            ]);
    }
}
