<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterpretationTranslation extends Model
{
    /** @use HasFactory<\Database\Factories\InterpretationTranslationFactory> */
    use HasFactory;

    // protected $table = 'interpretation_translations';

    protected $fillable = [
        // 'id',
        'fortune_id',
        'locale',
        'general_interpretation',
        'love',
        'career',
        'wealth',
        'health',
        'exam',
        'travel',
        'relationship',
        'lawsuit',
        'lost_item',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}
