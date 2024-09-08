<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PuceResource\Pages;
use App\Filament\Resources\PuceResource\RelationManagers;
use App\Models\Puce;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PuceResource extends Resource
{
    protected static ?string $model = Puce::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'puce & operation Management';

    public static function getGloballySearchableAttributes(): array
    {
        return [ 'numero_telephone','fournisseur', 'type_puce'];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero_telephone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fournisseur')
                    ->required()
                    ->maxLength(255),
                Forms\Components\select::make('type_puce')
                    ->options([
                        '2G' => '2G',
                        '3G' => '3G',
                        '5G' => '4G',
                                        ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero_telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fournisseur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_puce')
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

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth::user()?->profile === 'Admin'),
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
            'index' => Pages\ListPuces::route('/'),
            'create' => Pages\CreatePuce::route('/create'),
            'view' => Pages\ViewPuce::route('/{record}'),
            'edit' => Pages\EditPuce::route('/{record}/edit'),
        ];
    }
}
