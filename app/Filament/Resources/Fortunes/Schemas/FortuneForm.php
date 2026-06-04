<?php

namespace App\Filament\Resources\Fortunes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FortuneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sign_system_id')
                    ->required()
                    ->numeric(),
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                TextInput::make('fortune_level'),
                TextInput::make('code'),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
