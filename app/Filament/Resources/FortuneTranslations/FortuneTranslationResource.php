<?php

namespace App\Filament\Resources\FortuneTranslations;

use App\Filament\Resources\FortuneTranslations\Pages\CreateFortuneTranslation;
use App\Filament\Resources\FortuneTranslations\Pages\EditFortuneTranslation;
use App\Filament\Resources\FortuneTranslations\Pages\ListFortuneTranslations;
use App\Filament\Resources\FortuneTranslations\Pages\ViewFortuneTranslation;
use App\Filament\Resources\FortuneTranslations\Schemas\FortuneTranslationForm;
use App\Filament\Resources\FortuneTranslations\Schemas\FortuneTranslationInfolist;
use App\Filament\Resources\FortuneTranslations\Tables\FortuneTranslationsTable;
use App\Models\FortuneTranslation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FortuneTranslationResource extends Resource
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
        return __('filament/navigation.fortune_translations');
    }
    protected static ?int $navigationSort = 3;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.fortune_translations');
    }
    // protected static ?string $pluralModelLabel = '主標題們';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.fortune_translations');
    }

    protected static ?string $model = FortuneTranslation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'FortuneTranslation';

    public static function form(Schema $schema): Schema
    {
        return FortuneTranslationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FortuneTranslationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FortuneTranslationsTable::configure($table);
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
            'index' => ListFortuneTranslations::route('/'),
            'create' => CreateFortuneTranslation::route('/create'),
            'view' => ViewFortuneTranslation::route('/{record}'),
            'edit' => EditFortuneTranslation::route('/{record}/edit'),
        ];
    }
}
