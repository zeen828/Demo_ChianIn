<?php

namespace App\Filament\Resources\InterpretationTranslations\Pages;

use App\Filament\Resources\InterpretationTranslations\InterpretationTranslationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInterpretationTranslation extends EditRecord
{
    protected static string $resource = InterpretationTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
