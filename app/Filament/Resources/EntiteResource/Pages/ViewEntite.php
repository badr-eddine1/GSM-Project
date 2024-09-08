<?php

namespace App\Filament\Resources\EntiteResource\Pages;

use App\Filament\Resources\EntiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEntite extends ViewRecord
{
    protected static string $resource = EntiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
