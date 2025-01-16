<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Categorie;
use App\Models\Product;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
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

use function PHPSTORM_META\type;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Create New Product')->tabs([
                    Tab::make('Produckt Information')->schema([
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
                    ])->columns(2),
                    Tab::make('Uplaod')->schema([
                        Toggle::make('valider'),
                        Select::make('id_Cat')
                            ->label('Categories')
                            // ->relationship('categorie', 'Catname')
                            ->options(Categorie::all()->pluck('Catname', 'id_Cat'))
                            // ->getSearchResultsUsing(fn (string $search) => \App\Models\Categorie::where('Catname', 'like', "%{$search}%")->pluck('Catname', 'id_Cat'))
                            ->searchable(),

                        FileUpload::make('pic')
                            ->rules(['mimes:jpeg,png,jpg,gif,svg'])
                            ->disk('public')
                            ->directory('pics')
                            ->columnSpanFull(),
                    ])
                ])->columnSpanFull()->persistTabInQueryString(),
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
                    Select::make('id_Cat')
                        ->label('Categories')
                        // ->relationship('categorie', 'Catname')
                        ->options(Categorie::all()->pluck('Catname', 'id_Cat'))
                        // ->getSearchResultsUsing(fn (string $search) => \App\Models\Categorie::where('Catname', 'like', "%{$search}%")->pluck('Catname', 'id_Cat'))
                        ->searchable(),

                    FileUpload::make('pic')
                        ->rules(['mimes:jpeg,png,jpg,gif,svg'])
                        ->disk('public')
                        ->directory('pics')
                        ->columnSpanFull(),
                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ReplicateAction::make(),
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
