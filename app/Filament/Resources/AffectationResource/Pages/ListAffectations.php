<?php

namespace App\Filament\Resources\AffectationResource\Pages;

use App\Filament\Resources\AffectationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAffectations extends ListRecords
{
    protected static string $resource = AffectationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
