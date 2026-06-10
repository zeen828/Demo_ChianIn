<?php

namespace App\Filament\Admin\Resources\Cities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('country_id')
                //     ->required()
                //     ->numeric(),
                // 關聯
                Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('name_en')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
