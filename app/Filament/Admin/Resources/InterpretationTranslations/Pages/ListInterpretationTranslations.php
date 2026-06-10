<?php

namespace App\Filament\Admin\Resources\InterpretationTranslations\Pages;

use App\Filament\Admin\Resources\InterpretationTranslations\InterpretationTranslationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInterpretationTranslations extends ListRecords
{
    protected static string $resource = InterpretationTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
