<?php

namespace App\Filament\Admin\Resources\FortuneTranslations\Pages;

use App\Filament\Admin\Resources\FortuneTranslations\FortuneTranslationResource;
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
