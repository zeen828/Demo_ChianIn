<?php

namespace App\Filament\Resources\Fortunes\Pages;

use App\Filament\Resources\Fortunes\FortuneResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFortune extends ViewRecord
{
    protected static string $resource = FortuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
