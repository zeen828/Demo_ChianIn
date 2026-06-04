<?php

namespace App\Filament\Resources\SignSystems;

use App\Filament\Resources\SignSystems\Pages\CreateSignSystem;
use App\Filament\Resources\SignSystems\Pages\EditSignSystem;
use App\Filament\Resources\SignSystems\Pages\ListSignSystems;
use App\Filament\Resources\SignSystems\Pages\ViewSignSystem;
use App\Filament\Resources\SignSystems\Schemas\SignSystemForm;
use App\Filament\Resources\SignSystems\Schemas\SignSystemInfolist;
use App\Filament\Resources\SignSystems\Tables\SignSystemsTable;
use App\Models\SignSystem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SignSystemResource extends Resource
{
    // protected static ?string $navigationParentItem = 'Products';
    // protected static string | UnitEnum | null $navigationGroup = '系統管理';// 菜單分類
    public static function getNavigationGroup(): ?string
    {
        return __('filament/navigation.fortune');
    }

    // protected static ?string $navigationLabel = '使用者';// 菜單標題
    public static function getNavigationLabel(): string
    {
        return __('filament/navigation.sign_systems');
    }
    protected static ?int $navigationSort = 1;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.sign_systems');
    }
    // protected static ?string $pluralModelLabel = '主標題們';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.sign_systems');
    }

    protected static ?string $model = SignSystem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SignSystem';

    public static function form(Schema $schema): Schema
    {
        return SignSystemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SignSystemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SignSystemsTable::configure($table);
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
            'index' => ListSignSystems::route('/'),
            'create' => CreateSignSystem::route('/create'),
            'view' => ViewSignSystem::route('/{record}'),
            'edit' => EditSignSystem::route('/{record}/edit'),
        ];
    }
}
