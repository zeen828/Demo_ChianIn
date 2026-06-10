<?php

namespace App\Filament\Admin\Resources\InterpretationTranslations\Pages;

use App\Filament\Admin\Resources\InterpretationTranslations\InterpretationTranslationResource;
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
