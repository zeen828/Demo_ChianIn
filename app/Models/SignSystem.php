<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'status',
    ];

    protected function casts(): array
    {
        return [
            'total_fortunes' => 'integer',
            'status' => 'boolean',
        ];
    }

    // 關聯
    public function mainGods()
    {
        return $this->belongsToMany(MainGod::class, 'main_god_sign_system', 'sign_system_id', 'main_god_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }

    // 關聯
    public function temples()
    {
        return $this->belongsToMany(Temple::class, 'temple_sign_system', 'temple_id', 'main_god_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }

    public function fortunes(): HasMany
    {
        return $this->hasMany(Fortune::class, 'sign_system_id', 'id');
    }
}
