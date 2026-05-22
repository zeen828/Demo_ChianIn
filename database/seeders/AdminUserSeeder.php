<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 超級管理員
        User::factory()->superAdmin()->create([
            'name' => 'SuperAdmin',
            'email' => 'super@test.com',
            'password' => 'qaz123wsx',
        ]);
        // 管理員
        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => 'qaz123wsx',
        ]);
        // 廟方
        User::factory()->temple()->create([
            'name' => 'Temple',
            'email' => 'temple@test.com',
            'password' => '12345678',
        ]);
    }
}
