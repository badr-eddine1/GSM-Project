<?php

namespace App\Filament\Resources\AffectationResource\Pages;

use App\Filament\Resources\AffectationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAffectation extends EditRecord
{
    protected static string $resource = AffectationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
