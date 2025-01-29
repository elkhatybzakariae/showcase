<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProducktStatW extends BaseWidget
{
    public ?Product $record;

    protected function getStats(): array
    {
        return [
            Stat::make('name', $this->record->proName),
                // ->description('Produckts')
                // ->descriptionIcon()
                // ->chart([1, 2, 4, 5, 13, 24])
                // ->color('info'),
        ];
    }
}
