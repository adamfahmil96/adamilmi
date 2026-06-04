<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Adam Fahmil',
            'email' => 'admin@adamilmi.me',
            'password' => Hash::make('password'),
        ]);

        // Run seeders
        $this->call([
            CategorySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
