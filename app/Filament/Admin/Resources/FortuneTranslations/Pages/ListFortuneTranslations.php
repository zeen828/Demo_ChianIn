<?php

namespace App\Filament\Admin\Resources\FortuneTranslations\Pages;

use App\Filament\Admin\Resources\FortuneTranslations\FortuneTranslationResource;
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
