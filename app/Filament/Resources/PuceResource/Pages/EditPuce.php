<?php

namespace App\Filament\Resources\PuceResource\Pages;

use App\Filament\Resources\PuceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPuce extends EditRecord
{
    protected static string $resource = PuceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
