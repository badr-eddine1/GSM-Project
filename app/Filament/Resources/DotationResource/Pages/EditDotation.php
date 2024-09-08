<?php

namespace App\Filament\Resources\DotationResource\Pages;

use App\Filament\Resources\DotationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDotation extends EditRecord
{
    protected static string $resource = DotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
