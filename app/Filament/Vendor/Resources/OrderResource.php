<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\OrderResource\Pages;
use App\Filament\Vendor\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')
            ->where('vendor_id', Auth::guard('vendor')->user()->id)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('shipping_address_id')
                    ->relationship('shipping_address', 'address_note')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'pending',
                        'rejected' => 'rejected',
                        'approved' => 'approved',
                    ])
                    ->default('pending'),
                Forms\Components\TextInput::make('total_amt')
                    ->required()
                    ->numeric(),
                Repeater::make('order_descriptions')
                    ->relationship('order_descriptions')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name'),
                        Forms\Components\TextInput::make('qty'),
                        Forms\Components\TextInput::make('price'),
                    ])->columnSpanFull()->grid(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn() => Order::query()
                ->where('vendor_id', Auth::guard('vendor')->user()->id))
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('shipping_address.address_note')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amt')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_address.user.name')
                    ->label("Customer Name")
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'pending' => 'pending',
                                'rejected' => 'rejected',
                                'approved' => 'approved',
                            ])
                            ->default('pending'),
                    ]),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
