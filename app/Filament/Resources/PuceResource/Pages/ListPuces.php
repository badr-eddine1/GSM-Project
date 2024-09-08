<?php

namespace App\Filament\Resources\PuceResource\Pages;

use App\Filament\Resources\PuceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPuces extends ListRecords
{
    protected static string $resource = PuceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
