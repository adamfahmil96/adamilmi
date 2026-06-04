<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Backend
            ['name' => 'Python', 'category' => 'backend', 'proficiency' => 95, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Django', 'category' => 'backend', 'proficiency' => 90, 'is_highlighted' => true, 'sort_order' => 2],
            ['name' => 'Django REST Framework', 'category' => 'backend', 'proficiency' => 90, 'is_highlighted' => true, 'sort_order' => 3],
            ['name' => 'PHP', 'category' => 'backend', 'proficiency' => 85, 'is_highlighted' => true, 'sort_order' => 4],
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 85, 'is_highlighted' => true, 'sort_order' => 5],
            ['name' => 'REST API', 'category' => 'backend', 'proficiency' => 92, 'is_highlighted' => true, 'sort_order' => 6],

            // Frontend
            ['name' => 'JavaScript', 'category' => 'frontend', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 1],
            ['name' => 'Next.js', 'category' => 'frontend', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'React Native', 'category' => 'frontend', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 3],
            ['name' => 'TailwindCSS', 'category' => 'frontend', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 4],

            // Database
            ['name' => 'PostgreSQL', 'category' => 'database', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 1],
            ['name' => 'MySQL', 'category' => 'database', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'SQLite', 'category' => 'database', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 3],

            // Tools
            ['name' => 'Git', 'category' => 'tools', 'proficiency' => 90, 'is_highlighted' => false, 'sort_order' => 1],
            ['name' => 'Docker', 'category' => 'tools', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'Postman', 'category' => 'tools', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 3],

            // DevOps
            ['name' => 'CI/CD', 'category' => 'devops', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 1],
            ['name' => 'Linux', 'category' => 'devops', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 2],

            // Other
            ['name' => 'TOGAF', 'category' => 'other', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 1],
            ['name' => 'Enterprise Architecture', 'category' => 'other', 'proficiency' => 65, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'Technical Documentation', 'category' => 'other', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 3],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
