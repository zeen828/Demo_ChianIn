<?php

namespace App\Filament\Admin\Resources\Fortunes\Pages;

use App\Filament\Admin\Resources\Fortunes\FortuneResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFortune extends CreateRecord
{
    protected static string $resource = FortuneResource::class;
}
