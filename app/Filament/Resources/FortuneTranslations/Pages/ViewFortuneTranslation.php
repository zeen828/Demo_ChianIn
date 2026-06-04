<?php

namespace App\Filament\Resources\FortuneTranslations\Pages;

use App\Filament\Resources\FortuneTranslations\FortuneTranslationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFortuneTranslation extends ViewRecord
{
    protected static string $resource = FortuneTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
