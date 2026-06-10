<?php

namespace App\Filament\Admin\Resources\InterpretationTranslations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InterpretationTranslationForm
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
                Textarea::make('general_interpretation')
                    ->columnSpanFull(),
                Textarea::make('love')
                    ->columnSpanFull(),
                Textarea::make('career')
                    ->columnSpanFull(),
                Textarea::make('wealth')
                    ->columnSpanFull(),
                Textarea::make('health')
                    ->columnSpanFull(),
                Textarea::make('exam')
                    ->columnSpanFull(),
                Textarea::make('travel')
                    ->columnSpanFull(),
                Textarea::make('relationship')
                    ->columnSpanFull(),
                Textarea::make('lawsuit')
                    ->columnSpanFull(),
                Textarea::make('lost_item')
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
