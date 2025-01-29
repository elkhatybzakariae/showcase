<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Widgets\Statis;
use App\Filament\Widgets\StatisChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            // Statis::class,
            // StatisChart::class
        ];
    }

    public function getTabs(): array
    {
        return[
            'all'=>Tab::make(),
            'valider'=>Tab::make()->modifyQueryUsing(function(EloquentBuilder $query){
                return $query->where('valider', true);
            }),
            'not valider'=>Tab::make()->modifyQueryUsing(function(EloquentBuilder $query){
                return $query->where('valider', false);
            }),
        ];
    }
}
