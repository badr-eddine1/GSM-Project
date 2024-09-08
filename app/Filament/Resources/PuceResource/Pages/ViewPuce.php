<?php

namespace App\Filament\Resources\PuceResource\Pages;

use App\Filament\Resources\PuceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPuce extends ViewRecord
{
    protected static string $resource = PuceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
