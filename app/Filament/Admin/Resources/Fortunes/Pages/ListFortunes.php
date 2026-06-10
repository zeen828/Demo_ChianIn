<?php

namespace App\Filament\Admin\Resources\Fortunes\Pages;

use App\Filament\Admin\Resources\Fortunes\FortuneResource;
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
