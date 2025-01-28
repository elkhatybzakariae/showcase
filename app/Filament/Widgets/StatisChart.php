<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StatisChart extends ChartWidget
{
    protected static ?string $heading = 'Product';
    
    use InteractsWithPageFilters;

    protected function getData(): array
    {
        $start=$this->filters['startDate'];
        $end=$this->filters['endDate'];
        $data = Trend::model(Product::class)
        ->between(
            start: $start ? Carbon::parse($start) : now()->subDays(20),
            end: $end ? Carbon::parse($end) :  now(),
        )
        ->perDay()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Blog Product created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
