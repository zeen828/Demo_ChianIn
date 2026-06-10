<?php

namespace App\Filament\Admin\Resources\FortuneTranslations\Pages;

use App\Filament\Admin\Resources\FortuneTranslations\FortuneTranslationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFortuneTranslation extends EditRecord
{
    protected static string $resource = FortuneTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
