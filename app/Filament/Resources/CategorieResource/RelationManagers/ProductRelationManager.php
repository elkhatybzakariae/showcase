<?php

namespace App\Filament\Resources\CategorieResource\RelationManagers;

use App\Models\Categorie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class ProductRelationManager extends RelationManager
{
    protected static string $relationship = 'product';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()->schema([
                TextInput::make('proName')->label('Produckt Name')->required(),
                TextInput::make('price')
                    ->numeric()
                    ->integer(),
                TextInput::make('oldPrice')->label('Old Price')
                    ->numeric()
                    ->integer(),
                TextInput::make('stockQuantity')->label('stock Quantity')
                    ->numeric(),
                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull()
                    ->required(),
                Toggle::make('valider'),
                FileUpload::make('pic')
                    ->rules(['mimes:jpeg,png,jpg,gif,svg'])
                    ->disk('public')
                    ->directory('pics')
                    ->columnSpanFull(),
            ])->columns(2),

        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('proName')
            ->columns([
                ImageColumn::make('pic')->disk('public'),
                TextColumn::make('proName')->label('Produckt')->sortable()->searchable(),
                TextColumn::make('price')->sortable()->searchable(),
                TextColumn::make('oldPrice')->label('Old Price')->sortable()->searchable()->toggleable(),
                TextColumn::make('description')->label('Description')->sortable()->searchable()->toggleable(),
                TextColumn::make('stockQuantity')->label('stock Quantity')->sortable()->searchable(),
                ToggleColumn::make('valider')->sortable()->searchable(),
                TextColumn::make('categorie.Catname')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }
}
