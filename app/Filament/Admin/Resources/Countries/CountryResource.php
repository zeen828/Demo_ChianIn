<?php

namespace App\Filament\Admin\Resources\Countries;

use App\Filament\Admin\Resources\Countries\Pages\CreateCountry;
use App\Filament\Admin\Resources\Countries\Pages\EditCountry;
use App\Filament\Admin\Resources\Countries\Pages\ListCountries;
use App\Filament\Admin\Resources\Countries\Pages\ViewCountry;
use App\Filament\Admin\Resources\Countries\Schemas\CountryForm;
use App\Filament\Admin\Resources\Countries\Schemas\CountryInfolist;
use App\Filament\Admin\Resources\Countries\Tables\CountriesTable;
use App\Models\Country;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    // protected static ?string $navigationParentItem = 'Products';
    // protected static string | UnitEnum | null $navigationGroup = '區域';// 菜單分類
    public static function getNavigationGroup(): ?string
    {
        return __('filament/navigation.area');
    }

    // protected static ?string $navigationLabel = '國家';// 菜單標題
    public static function getNavigationLabel(): string
    {
        return __('filament/navigation.countries');
    }
    protected static ?int $navigationSort = 2;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題-2';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.countries');
    }
    // protected static ?string $pluralModelLabel = '主標題們-2';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.countries');
    }

    protected static ?string $model = Country::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Country';

    public static function form(Schema $schema): Schema
    {
        return CountryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CountryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CountriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCountries::route('/'),
            'create' => CreateCountry::route('/create'),
            'view' => ViewCountry::route('/{record}'),
            'edit' => EditCountry::route('/{record}/edit'),
        ];
    }
}
