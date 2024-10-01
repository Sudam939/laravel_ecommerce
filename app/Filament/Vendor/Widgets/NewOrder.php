<?php

namespace App\Filament\Vendor\Widgets;

use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class NewOrder extends BaseWidget
{

    protected static ?int $sort = 1;
    protected int|array|string $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn() => Order::query()
                ->where('status', 'pending')
                ->where('vendor_id', Auth::guard('vendor')->user()->id))
            ->defaultSort('id', 'desc')


            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Order Time")
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_address.user.name')
                    ->label("Customer Name")
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_address.address_note')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amt')
                    ->money('NRs.')
                    ->sortable(),
            ]);
    }
}
