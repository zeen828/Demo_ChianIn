<?php

namespace App\Filament\Admin\Resources\SignSystems\Pages;

use App\Filament\Admin\Resources\SignSystems\SignSystemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSignSystem extends EditRecord
{
    protected static string $resource = SignSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
