<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Backend',
                'slug' => 'backend',
                'description' => 'Artikel tentang pengembangan backend, API, dan arsitektur sistem.',
                'color' => '#4F46E5',
                'sort_order' => 1,
            ],
            [
                'name' => 'Frontend',
                'slug' => 'frontend',
                'description' => 'Artikel tentang pengembangan frontend, UI/UX, dan framework JavaScript.',
                'color' => '#059669',
                'sort_order' => 2,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'Artikel tentang deployment, CI/CD, Docker, dan infrastruktur.',
                'color' => '#DC2626',
                'sort_order' => 3,
            ],
            [
                'name' => 'Career',
                'slug' => 'career',
                'description' => 'Artikel tentang karir, tips, dan pengalaman profesional.',
                'color' => '#D97706',
                'sort_order' => 4,
            ],
            [
                'name' => 'Tutorial',
                'slug' => 'tutorial',
                'description' => 'Tutorial dan panduan teknis tentang berbagai topik.',
                'color' => '#7C3AED',
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
