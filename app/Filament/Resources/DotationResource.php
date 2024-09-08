<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DotationResource\Pages;
use App\Filament\Resources\DotationResource\RelationManagers;
use App\Models\Dotation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;// Import Auth Facade
use App\Models\User;

class DotationResource extends Resource
{
    protected static ?string $model = Dotation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'puce & operation Management';

    public static function getGloballySearchableAttributes(): array
    {
        return ['type_dotation', 'est_active'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('puce_id')
                    ->relationship('puce', 'numero_telephone')
                    ->required(),
                Forms\Components\DatePicker::make('date_dotation')
                    ->required(),
                Forms\Components\Toggle::make('est_active')
                    ->required(),
                Forms\Components\select::make('type_dotation')
                ->options([
                    'internet' => 'internet',
                    'appel' => 'appel',
                                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('puce.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_dotation')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('est_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('type_dotation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => Auth::user()?->profile === 'Admin')
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
            'index' => Pages\ListDotations::route('/'),
            'create' => Pages\CreateDotation::route('/create'),
            'view' => Pages\ViewDotation::route('/{record}'),
            'edit' => Pages\EditDotation::route('/{record}/edit'),
        ];
    }
}
