<?php

namespace App\Filament\Resources\CategorieResource\Pages;

use App\Filament\Resources\CategorieResource;
use App\Filament\Resources\CategorieResource\Widgets\CatStaW;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategorie extends EditRecord
{
    protected static string $resource = CategorieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            CatStaW::class,
        ];
    }
}
