<?php

namespace App\Filament\Resources\Fortunes\Pages;

use App\Filament\Resources\Fortunes\FortuneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFortunes extends ListRecords
{
    protected static string $resource = FortuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
