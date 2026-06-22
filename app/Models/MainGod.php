<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainGod extends Model
{
    /** @use HasFactory<\Database\Factories\MainGodFactory> */
    use HasFactory;

    protected $table = 'main_god';

    protected $fillable = [
        // 'id',
        'name',
        'slug',
        'description',
        'sort',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'sort' => 'integer',
            'status' => 'boolean',
        ];
    }
}
