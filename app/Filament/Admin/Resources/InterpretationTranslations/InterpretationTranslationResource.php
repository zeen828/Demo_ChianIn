<?php

namespace App\Filament\Admin\Resources\InterpretationTranslations;

use App\Filament\Admin\Resources\InterpretationTranslations\Pages\CreateInterpretationTranslation;
use App\Filament\Admin\Resources\InterpretationTranslations\Pages\EditInterpretationTranslation;
use App\Filament\Admin\Resources\InterpretationTranslations\Pages\ListInterpretationTranslations;
use App\Filament\Admin\Resources\InterpretationTranslations\Pages\ViewInterpretationTranslation;
use App\Filament\Admin\Resources\InterpretationTranslations\Schemas\InterpretationTranslationForm;
use App\Filament\Admin\Resources\InterpretationTranslations\Schemas\InterpretationTranslationInfolist;
use App\Filament\Admin\Resources\InterpretationTranslations\Tables\InterpretationTranslationsTable;
use App\Models\InterpretationTranslation;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InterpretationTranslationResource extends Resource
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
        return __('filament/navigation.interpretation_translations');
    }
    protected static ?int $navigationSort = 4;// 排序
    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';// Icon標籤圖示

    // protected static ?string $modelLabel = '主標題';// 標題
    public static function getModelLabel(): string
    {
        return __('filament/navigation.interpretation_translations');
    }
    // protected static ?string $pluralModelLabel = '主標題們';// 標題(複數)
    public static function getPluralModelLabel(): string
    {
        return __('filament/navigation.interpretation_translations');
    }

    protected static ?string $model = InterpretationTranslation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'InterpretationTranslation';

    public static function form(Schema $schema): Schema
    {
        return InterpretationTranslationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InterpretationTranslationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InterpretationTranslationsTable::configure($table);
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
            'index' => ListInterpretationTranslations::route('/'),
            'create' => CreateInterpretationTranslation::route('/create'),
            'view' => ViewInterpretationTranslation::route('/{record}'),
            'edit' => EditInterpretationTranslation::route('/{record}/edit'),
        ];
    }
}
