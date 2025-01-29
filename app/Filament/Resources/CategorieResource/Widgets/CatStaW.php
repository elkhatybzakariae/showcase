<?php

namespace App\Filament\Resources\CategorieResource\Widgets;

use App\Models\Categorie;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CatStaW extends BaseWidget
{
    public ?Categorie $record;

    protected function getStats(): array
    {
        return [
            Stat::make('Product Count', $this->record->product->count()),
        ];
    }
}
