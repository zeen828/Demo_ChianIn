<?php

namespace App\Filament\Resources\SignSystems\Pages;

use App\Filament\Resources\SignSystems\SignSystemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSignSystems extends ListRecords
{
    protected static string $resource = SignSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
