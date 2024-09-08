<?php

namespace App\Filament\Resources\DotationResource\Pages;

use App\Filament\Resources\DotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDotation extends ViewRecord
{
    protected static string $resource = DotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
