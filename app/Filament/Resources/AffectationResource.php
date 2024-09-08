<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AffectationResource\Pages;
use App\Filament\Resources\AffectationResource\RelationManagers;
use App\Models\Affectation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use App\Models\User;


class AffectationResource extends Resource
{
    protected static ?string $model = Affectation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'puce & operation Management';

    public static function getGloballySearchableAttributes(): array
    {
        return ['personnel_id'];
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
                Forms\Components\Select::make('personnel_id')
                    ->relationship('personnel', 'nom')
                    ->required(),
                Forms\Components\DatePicker::make('date_affectation')
                    ->required(),
                Forms\Components\TextInput::make('observation')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('puce.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('personnel.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_affectation')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('abservation')
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
                SelectFilter::make('puce')
                ->relationship('puce','numero_telephone')
                ->searchable()
                ->preload()
                ->label('Filter par le numero de telephone'),
                SelectFilter::make('personnel')
                ->relationship('personnel','matricule')
                ->searchable()
                ->preload()
                ->label(' filter par le matricule'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => Auth::User()?->profile === 'Admin'),
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
            'index' => Pages\ListAffectations::route('/'),
            'create' => Pages\CreateAffectation::route('/create'),
            'view' => Pages\ViewAffectation::route('/{record}'),
            'edit' => Pages\EditAffectation::route('/{record}/edit'),
        ];
    }
}
