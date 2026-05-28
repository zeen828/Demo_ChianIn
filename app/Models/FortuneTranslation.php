<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FortuneTranslation extends Model
{
    /** @use HasFactory<\Database\Factories\FortuneTranslationFactory> */
    use HasFactory;

    // protected $table = 'fortune_translations';

    protected $fillable = [
        // 'id',
        'fortune_id',
        'locale',
        'title',
        'poem',
        'summary',
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}

    