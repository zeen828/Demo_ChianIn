<?php

namespace App\Filament\Admin\Resources\FortuneTranslations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FortuneTranslationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fortune_id')
                    ->numeric(),
                TextEntry::make('locale'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('poem')
                    ->columnSpanFull(),
                TextEntry::make('summary')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('status')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
