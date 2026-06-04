<?php

namespace App\Filament\Resources\FortuneTranslations\Pages;

use App\Filament\Resources\FortuneTranslations\FortuneTranslationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFortuneTranslations extends ListRecords
{
    protected static string $resource = FortuneTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
