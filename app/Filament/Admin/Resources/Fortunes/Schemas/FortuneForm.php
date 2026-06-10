<?php

namespace App\Filament\Admin\Resources\Fortunes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                TextInput::make('title'),
                Textarea::make('content')
                    ->columnSpanFull(),
                TextInput::make('fortune_level'),
                TextInput::make('code'),
                FileUpload::make('image')
                    ->image(),
                Textarea::make('memo')
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
