<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Categorie;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('pic')->disk('public')
                ->directory('pics'),
                TextInput::make('proName')->label('Produckt Name')->required(),
                TextInput::make('price')
                    ->numeric()
                    ->integer(),
                TextInput::make('oldPrice')->label('Old Price')
                    ->numeric()
                    ->integer(),
                Textarea::make('description')
                    ->label('Description')
                    ->required(),
                TextInput::make('stockQuantity')->label('stock Quantity')
                    ->numeric(),
                Toggle::make('valider'),
                Select::make('id_Cat')
                    ->label('Categories')
                    ->options(Categorie::all()->pluck('Catname', 'id_Cat'))
                    ->searchable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('pic')->disk('public'),
                TextColumn::make('proName'),
                TextColumn::make('price'),
                TextColumn::make('oldPrice'),
                TextColumn::make('description'),
                TextColumn::make('stockQuantity'),
                ToggleColumn::make('valider'),
                TextColumn::make('categorie.Catname'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
