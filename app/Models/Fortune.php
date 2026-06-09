<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fortune extends Model
{
    /** @use HasFactory<\Database\Factories\FortuneFactory> */
    use HasFactory;

    // protected $table = 'fortunes';

    protected $fillable = [
        // 'id',
        'sign_system_id',
        'number',
        'title',
        'content',
        'fortune_level',
        'code',
        'image',
        'memo',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'number' => 'integer',
            'status' => 'boolean',
        ];
    }
}
