<?php

namespace App\Filament\Admin\Resources\Regions;

use App\Filament\Admin\Resources\Regions\Pages\CreateRegion;
use App\Filament\Admin\Resources\Regions\Pages\EditRegion;
use App\Filament\Admin\Resources\Regions\Pages\ListRegions;
use App\Filament\Admin\Resources\Regions\Pages\ViewRegion;
use App\Filament\Admin\Resources\Regions\Schemas\RegionForm;
use App\Filament\Admin\Resources\Regions\Schemas\RegionInfolist;
use App\Filament\Admin\Resources\Regions\Tables\RegionsTable;
use App\Models\Region;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RegionResource extends Resource
{
    // protected static ?string $navigationParentItem = 'Products';
    // protected static string | UnitEnum | null $navigationGroup = '區域';// 菜單分類
    public static function getNavigationGroup(): ?string
    {
        return __('filament/navigation.area');
    }

    // protected static ?string $navigationLabel = '區域';// 菜單標題
    public static function getNavigationLabel(): string
    {
        return __('filament/navigation.regions');
    }
    protected static ?int $navigationSort = 1;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題-2';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.regions');
    }
    // protected static ?string $pluralModelLabel = '主標題們-2';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.regions');
    }

    protected static ?string $model = Region::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Region';

    public static function form(Schema $schema): Schema
    {
        return RegionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RegionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegionsTable::configure($table);
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
            'index' => ListRegions::route('/'),
            'create' => CreateRegion::route('/create'),
            'view' => ViewRegion::route('/{record}'),
            'edit' => EditRegion::route('/{record}/edit'),
        ];
    }
}
