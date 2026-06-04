<?php

namespace App\Filament\Resources\Fortunes;

use App\Filament\Resources\Fortunes\Pages\CreateFortune;
use App\Filament\Resources\Fortunes\Pages\EditFortune;
use App\Filament\Resources\Fortunes\Pages\ListFortunes;
use App\Filament\Resources\Fortunes\Pages\ViewFortune;
use App\Filament\Resources\Fortunes\Schemas\FortuneForm;
use App\Filament\Resources\Fortunes\Schemas\FortuneInfolist;
use App\Filament\Resources\Fortunes\Tables\FortunesTable;
use App\Models\Fortune;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FortuneResource extends Resource
{
    // protected static ?string $navigationParentItem = 'Products';
    // protected static string | UnitEnum | null $navigationGroup = '系統管理';// 菜單分類
    public static function getNavigationGroup(): ?string
    {
        return __('filament/navigation.system');
    }

    // protected static ?string $navigationLabel = '使用者';// 菜單標題
    public static function getNavigationLabel(): string
    {
        return __('filament/navigation.users');
    }
    protected static ?int $navigationSort = 1;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.users');
    }
    // protected static ?string $pluralModelLabel = '主標題們';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.users');
    }

    protected static ?string $model = Fortune::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Fortune';

    public static function form(Schema $schema): Schema
    {
        return FortuneForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FortuneInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FortunesTable::configure($table);
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
            'index' => ListFortunes::route('/'),
            'create' => CreateFortune::route('/create'),
            'view' => ViewFortune::route('/{record}'),
            'edit' => EditFortune::route('/{record}/edit'),
        ];
    }
}
