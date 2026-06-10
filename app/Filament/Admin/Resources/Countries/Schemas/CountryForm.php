<?php

namespace App\Filament\Admin\Resources\Countries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('region_id')
                //     ->required()
                //     ->numeric(),
                // 關聯
                Select::make('user_id')
                    ->relationship('region', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('name_en')
                    ->required(),
                TextInput::make('code'),
                TextInput::make('slug')
                    ->required(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
