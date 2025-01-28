<?php

namespace App\Filament\Widgets;

use App\Models\Categorie;
use App\Models\Product;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Console\Concerns\InteractsWithIO;

class Statis extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $start=$this->filters['startDate'];
        $end=$this->filters['endDate'];

        return [
            Stat::make('Categorie', Categorie::count())
                ->description('Category')
                // ->descriptionIcon()
                ->chart([1, 2, 4, 5, 13, 24])
                ->color('info'),
            Stat::make(
                'Produckt',
                Product::when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
                ->when($end, fn ($query) => $query->whereDate('created_at', '<', $end))->count()
            )
                ->description('Produckts')
                // ->descriptionIcon()
                ->chart([1, 2, 4, 5, 13, 24])
                ->color('info'),
        ];
    }
}
