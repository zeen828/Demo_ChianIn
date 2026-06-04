<?php

namespace App\Filament\Resources\InterpretationTranslations\Pages;

use App\Filament\Resources\InterpretationTranslations\InterpretationTranslationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInterpretationTranslation extends ViewRecord
{
    protected static string $resource = InterpretationTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
