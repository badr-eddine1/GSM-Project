<?php

namespace App\Filament\Resources\AffectationResource\Pages;

use App\Filament\Resources\AffectationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAffectation extends ViewRecord
{
    protected static string $resource = AffectationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
