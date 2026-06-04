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
                'company' => 'Universitas Sebelas Maret',
                'position' => 'Fullstack Developer',
                'location' => 'Surakarta, Jawa Tengah, Indonesia',
                'description' => 'Joined the Directorate of ICT at Universitas Sebelas Maret (Direktorat TIK UNS) as a Fullstack Developer, contributing to the development and maintenance of institutional information systems. Currently involved in studying and supporting the Satu Data UNS project, which aims to integrate and standardize university data in line with national data governance principles.

Key responsibilities:
• Develop and maintain web-based applications using modern frontend and backend technologies.
• Collaborate with internal teams to ensure seamless data integration and consistency across university systems.
• Participate in the planning and implementation of the Satu Data initiative to enhance data accessibility and transparency at UNS.
• Contribute to system documentation, API development, and technical troubleshooting as needed.
• Utilize Laravel with a customized boilerplate developed by DTIK UNS to ensure better security and seamless SSO integration.
• Take a major role in system design, analysis, and documentation, serving as a bridge between clients and the core programming team for each project.',
                'start_date' => '2025-07-01',
                'end_date' => null,
                'is_current' => true,
                'sort_order' => 1,
            ],
            [
                'company' => 'PT TAKODAM Ciptamandiri Nusantara',
                'position' => 'Software Engineer',
                'location' => 'Surakarta, Jawa Tengah, Indonesia',
                'description' => 'Involved in various projects across sectors such as marketplace automation, healthcare digitalization, and ERP systems.

Key contributions:
• Developed web services and system integrations for a marketplace omnichannel platform (Praktis.co) using Python and Django.
• Built modules for Sales Order, Purchase Order, and stock management integrated with client ERP systems.
• Created an OCR-based medical record reading system to help small hospitals digitize BPJS claim data entry.
• Participated in building ERP systems for furniture manufacturing companies in Sragen and Jepara.
• Developed mobile application modules for posyandu health workers using React Native.
• Contributed to the development of TAKODAM\'s new ERP-like product using Next.js.',
                'start_date' => '2022-02-01',
                'end_date' => '2025-07-01',
                'is_current' => false,
                'sort_order' => 2,
            ],
            [
                'company' => 'PT TAKODAM Ciptamandiri Nusantara',
                'position' => 'Associate IT Developer',
                'location' => 'Surakarta, Jawa Tengah, Indonesia',
                'description' => 'LOGS&WALKER a.k.a TAKODAM is a company that provides taylor-made solution that can increase clients supply chain activity and integrate with other entity system easily and effectively.

As an Associate IT Developer, involved in the project work process on the programming side in accordance with the capacity and competence directed by the company.',
                'start_date' => '2020-12-01',
                'end_date' => '2022-02-01',
                'is_current' => false,
                'sort_order' => 3,
            ],
            [
                'company' => 'Ailesh',
                'position' => 'IT Specialist',
                'location' => 'Yogyakarta, Indonesia',
                'description' => 'Worked at a waste-to-energy startup focused on renewable energy and waste management. Took initiative and led the development of the company\'s official website to strengthen its digital presence.

Key responsibilities:
• Initiated and developed the company profile website using WordPress and Elementor, aligning design and content with the company\'s branding and sustainability goals.
• Collaborated with the marketing and leadership team to ensure the website effectively represented the company\'s vision and attracted potential partners and clients.',
                'start_date' => '2019-01-01',
                'end_date' => '2020-12-01',
                'is_current' => false,
                'sort_order' => 4,
            ],
            [
                'company' => 'RSUI BanyuBening Boyolali',
                'position' => 'IT Support Specialist',
                'location' => 'Boyolali, Jawa Tengah, Indonesia',
                'description' => 'Served as part of the IT team at a regional Islamic hospital. Responsible for system support, user training, and technical development.

Key responsibilities:
• Learned and supported hospital operations using SIMGOS, a free hospital information system provided by the Indonesian Ministry of Health.
• Conducted user training, data entry assistance, server maintenance, and coordinated updates directly with the SIMGOS central team.
• Performed regular hardware maintenance and troubleshooting of hospital IT equipment.
• Developed a WhatsApp blasting system using Django to support the hospital\'s marketing efforts.',
                'start_date' => '2019-09-01',
                'end_date' => '2020-11-01',
                'is_current' => false,
                'sort_order' => 5,
            ],
            [
                'company' => 'ROBOKidz Solo Baru',
                'position' => 'Teacher',
                'location' => 'Sukoharjo, Jawa Tengah, Indonesia',
                'description' => 'ROBOKidz is a robotics learning place in Indonesia that uses LEGO as a tool. Served as a freelance teacher at ROBOKidz Solo Baru, teaching robotics fundamentals to students.',
                'start_date' => '2019-03-01',
                'end_date' => '2019-10-01',
                'is_current' => false,
                'sort_order' => 6,
            ],
            [
                'company' => 'Duxeos Software House',
                'position' => 'Web Developer Internship',
                'location' => 'Surakarta, Jawa Tengah, Indonesia',
                'description' => 'Joined as an intern at a web development startup focused on IT solutions. Worked in a team to build an e-commerce platform for service-based transactions.

Key contributions:
• Contributed to the development of several modules for Lapak Jasa, a service marketplace e-commerce platform, using CodeIgniter and Bonfire.
• Gained first hands-on experience with Git for version control and collaborative development with teammates.',
                'start_date' => '2017-01-01',
                'end_date' => '2017-02-01',
                'is_current' => false,
                'sort_order' => 7,
            ],
            [
                'company' => 'Batik Tjahaja Baru Craft',
                'position' => 'Social Media Specialist',
                'location' => 'Kampoeng Batik Laweyan Solo, Surakarta, Jawa Tengah, Indonesia',
                'description' => 'Batik Tjahaja Baru Craft is a batik showroom located in Laweyan Village, Surakarta. It sells many products about batik handicraft such as blanket, sajadah, pillow, and many more.

Responsibilities relate to the management of online stores and social media owned by Batik Tjahaja Baru Craft.',
                'start_date' => '2015-07-01',
                'end_date' => '2016-07-01',
                'is_current' => false,
                'sort_order' => 8,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate(
                [
                    'company' => $experience['company'],
                    'position' => $experience['position'],
                    'start_date' => $experience['start_date'],
                ],
                $experience
            );
        }

        $this->command->info('Experiences seeded successfully.');
    }
}
