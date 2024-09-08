<?php

namespace App\Filament\Resources\DotationResource\Pages;

use App\Filament\Resources\DotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDotations extends ListRecords
{
    protected static string $resource = DotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
