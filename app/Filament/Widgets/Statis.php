<?php

namespace App\Filament\Widgets;

use App\Models\Categorie;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Statis extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Categorie', Categorie::count())
            ->description('Category')
            // ->descriptionIcon()
            ->chart([1,2,4,5,13,24])
            ->color('info'),
            Stat::make('Produckt', Product::count())
            ->description('Produckts')
            // ->descriptionIcon()
            ->chart([1,2,4,5,13,24])
            ->color('info'),
        ];
    }
}
