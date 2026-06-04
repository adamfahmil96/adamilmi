<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'Universitas Sebelas Maret (UNS)',
                'position' => 'Information Systems Designer / Fullstack Developer',
                'location' => 'Surakarta, Indonesia',
                'description' => 'Develop and maintain web-based applications utilizing the Laravel framework within the Directorate of ICT. Leverage custom Laravel boilerplates to ensure enhanced system security and seamless Single Sign-On (SSO) integration. Spearhead the planning and implementation of the "Satu Data UNS" initiative, incorporating API Gateway technologies.',
                'start_date' => '2025-07-01',
                'end_date' => null,
                'is_current' => true,
                'sort_order' => 1,
            ],
            [
                'company' => 'PT Takodam Ciptamandiri Nusantara',
                'position' => 'Software Engineer',
                'location' => 'Surakarta, Indonesia',
                'description' => 'Engineered backend web services and system integrations for a startup omnichannel marketplace platform (Praktis.co) using Python and the Django REST Framework. Built and optimized Sales Order, Purchase Order, and inventory management modules for seamless integration with the client\'s internal ERP systems.',
                'start_date' => '2020-12-01',
                'end_date' => '2025-07-01',
                'is_current' => false,
                'sort_order' => 2,
            ],
            [
                'company' => 'AILESH',
                'position' => 'IT Specialist',
                'location' => 'Yogyakarta, Indonesia',
                'description' => 'Initiated and developed the corporate website using WordPress and Elementor, significantly enhancing online visibility and client trust. Collaborated closely with design and marketing teams to structure digital content and visual elements.',
                'start_date' => '2019-01-01',
                'end_date' => '2020-12-01',
                'is_current' => false,
                'sort_order' => 3,
            ],
            [
                'company' => 'RSUI Banyubening',
                'position' => 'IT Support Specialist',
                'location' => 'Boyolali, Indonesia',
                'description' => 'Mastered the operational workflows of the Ministry of Health\'s SIMGOS (Hospital Management Information System). Conducted staff training, managed data entry, performed routine server maintenance, and executed system updates.',
                'start_date' => '2019-09-01',
                'end_date' => '2020-11-01',
                'is_current' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
