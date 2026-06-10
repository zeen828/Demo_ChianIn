<?php

namespace App\Filament\Admin\Resources\InterpretationTranslations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InterpretationTranslationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fortune_id')
                    ->numeric(),
                TextEntry::make('locale'),
                TextEntry::make('general_interpretation')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('love')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('career')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('wealth')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('health')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('exam')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('travel')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('relationship')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('lawsuit')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('lost_item')
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
