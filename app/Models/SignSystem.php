<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignSystem extends Model
{
    /** @use HasFactory<\Database\Factories\SignSystemFactory> */
    use HasFactory;

    // protected $table = 'sign_systems';

    protected $fillable = [
        // 'id',
        'name',
        'slug',
        'total_fortunes',
        'description',
        'country_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'total_fortunes' => 'integer',
            'status' => 'boolean',
        ];
    }
}
