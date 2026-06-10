<?php

namespace App\Filament\Admin\Resources\FortuneTranslations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FortuneTranslationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fortune_id')
                    ->required()
                    ->numeric(),
                TextInput::make('locale')
                    ->required(),
                TextInput::make('title'),
                Textarea::make('poem')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('summary')
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
