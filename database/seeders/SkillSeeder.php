<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Backend - High proficiency
            ['name' => 'Python', 'category' => 'backend', 'proficiency' => 95, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Django', 'category' => 'backend', 'proficiency' => 92, 'is_highlighted' => true, 'sort_order' => 2],
            ['name' => 'Django REST Framework', 'category' => 'backend', 'proficiency' => 90, 'is_highlighted' => true, 'sort_order' => 3],
            ['name' => 'PHP', 'category' => 'backend', 'proficiency' => 85, 'is_highlighted' => true, 'sort_order' => 4],
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 85, 'is_highlighted' => true, 'sort_order' => 5],
            ['name' => 'RESTful WebServices', 'category' => 'backend', 'proficiency' => 90, 'is_highlighted' => true, 'sort_order' => 6],
            ['name' => 'CodeIgniter', 'category' => 'backend', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 7],
            ['name' => 'CodeIgniter Bonfire', 'category' => 'backend', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 8],
            ['name' => 'Flask', 'category' => 'backend', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 9],
            ['name' => 'Node.js', 'category' => 'backend', 'proficiency' => 65, 'is_highlighted' => false, 'sort_order' => 10],

            // Frontend
            ['name' => 'JavaScript', 'category' => 'frontend', 'proficiency' => 80, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Next.js', 'category' => 'frontend', 'proficiency' => 75, 'is_highlighted' => true, 'sort_order' => 2],
            ['name' => 'HTML5', 'category' => 'frontend', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 3],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 4],
            ['name' => 'WordPress', 'category' => 'frontend', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 5],
            ['name' => 'Elementor', 'category' => 'frontend', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 6],

            // Database
            ['name' => 'SQL', 'category' => 'database', 'proficiency' => 85, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'database', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'MySQL', 'category' => 'database', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 3],

            // Tools
            ['name' => 'Git', 'category' => 'tools', 'proficiency' => 90, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Photoshop', 'category' => 'tools', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'Adobe Illustrator', 'category' => 'tools', 'proficiency' => 55, 'is_highlighted' => false, 'sort_order' => 3],
            ['name' => 'Adobe XD', 'category' => 'tools', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 4],

            // DevOps
            ['name' => 'Linux', 'category' => 'devops', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 1],

            // Other - Professional Skills
            ['name' => 'Enterprise Architecture', 'category' => 'other', 'proficiency' => 70, 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Requirement Specifications', 'category' => 'other', 'proficiency' => 80, 'is_highlighted' => false, 'sort_order' => 2],
            ['name' => 'ERP Software', 'category' => 'other', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 3],
            ['name' => 'Project Management', 'category' => 'other', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 4],
            ['name' => 'Technical Documentation', 'category' => 'other', 'proficiency' => 85, 'is_highlighted' => false, 'sort_order' => 5],
            ['name' => 'Hospital Information Systems', 'category' => 'other', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 6],
            ['name' => 'Data Mining', 'category' => 'other', 'proficiency' => 75, 'is_highlighted' => false, 'sort_order' => 7],
            ['name' => 'Machine Learning', 'category' => 'other', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 8],
            ['name' => 'Artificial Intelligence (AI)', 'category' => 'other', 'proficiency' => 70, 'is_highlighted' => false, 'sort_order' => 9],
            ['name' => 'Artificial Neural Networks', 'category' => 'other', 'proficiency' => 65, 'is_highlighted' => false, 'sort_order' => 10],
            ['name' => 'Data Science', 'category' => 'other', 'proficiency' => 65, 'is_highlighted' => false, 'sort_order' => 11],
            ['name' => 'Digital Marketing', 'category' => 'other', 'proficiency' => 65, 'is_highlighted' => false, 'sort_order' => 12],
            ['name' => 'Graphic Design', 'category' => 'other', 'proficiency' => 55, 'is_highlighted' => false, 'sort_order' => 13],
            ['name' => 'Robotics', 'category' => 'other', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 14],
            ['name' => 'Arduino', 'category' => 'other', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 15],
            ['name' => 'Android', 'category' => 'other', 'proficiency' => 60, 'is_highlighted' => false, 'sort_order' => 16],
            ['name' => 'Java', 'category' => 'other', 'proficiency' => 55, 'is_highlighted' => false, 'sort_order' => 17],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }

        $this->command->info('Skills seeded successfully.');
    }
}
