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
        'fortune_level',
        'code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}
