<?php

namespace App\Filament\Resources\SignSystems\Pages;

use App\Filament\Resources\SignSystems\SignSystemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSignSystem extends ViewRecord
{
    protected static string $resource = SignSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
