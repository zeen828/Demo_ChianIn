<?php

namespace App\Filament\Resources\Fortunes\Pages;

use App\Filament\Resources\Fortunes\FortuneResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFortune extends CreateRecord
{
    protected static string $resource = FortuneResource::class;
}
