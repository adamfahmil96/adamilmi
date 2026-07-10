<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update admin user
        User::updateOrCreate(
            ['email' => 'admin@adamilmi.me'],
            [
                'name' => 'Adam Fahmil',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Run seeders (all idempotent - safe to run multiple times)
        $this->call([
            CategorySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            CertificationSeeder::class,
            ProjectSeeder::class,
            PostSeeder::class,
        ]);

        $this->command->info('All seeders completed successfully!');
    }
}
