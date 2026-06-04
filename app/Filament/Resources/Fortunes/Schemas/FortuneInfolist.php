<?php

namespace App\Filament\Resources\Fortunes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FortuneInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sign_system_id')
                    ->numeric(),
                TextEntry::make('number')
                    ->numeric(),
                TextEntry::make('fortune_level')
                    ->placeholder('-'),
                TextEntry::make('code')
                    ->placeholder('-'),
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
