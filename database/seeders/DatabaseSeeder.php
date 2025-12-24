<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            User::query()->firstOrCreate([
                'email' => 'developer@test.com',
            ], [
                'name' => 'Filament Developer',
                'role' => UserRole::Developer,
                'password' => bcrypt('password'),
            ]);

            User::query()->firstOrCreate([
                'email' => 'admin@test.com',
            ], [
                'name' => 'Filament Admin',
                'role' => UserRole::Admin,
                'password' => bcrypt('password'),
            ]);

            User::query()->firstOrCreate([
                'email' => 'user@test.com',
            ], [
                'name' => 'Filament User',
                'role' => UserRole::User,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
