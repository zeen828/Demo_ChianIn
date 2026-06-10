<?php

namespace App\Filament\Admin\Resources\Fortunes\Pages;

use App\Filament\Admin\Resources\Fortunes\FortuneResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFortune extends EditRecord
{
    protected static string $resource = FortuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
