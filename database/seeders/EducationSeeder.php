<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $educations = [
            [
                'school_name' => 'Universitas Sebelas Maret',
                'degree' => 'Bachelor\'s degree',
                'field_of_study' => 'Informatics (Computer Science)',
                'start_year' => 2014,
                'end_year' => 2019,
                'notes' => 'Universitas Sebelas Maret Surakarta (UNS) is a favorite university in Surakarta City, Central Java, Indonesia. In UNS, I was a student of Informatics Department, Faculty of Mathematics and Natural Sciences. My bachelor focused on data mining.',
                'activities' => 'Active in the organization of Himpunan Mahasiswa Informatika (HIMASTER), Tim Robotika UNS, and Nashirussunnah UNS.',
                'sort_order' => 1,
            ],
            [
                'school_name' => 'Universiti Utara Malaysia',
                'degree' => 'Student Exchange',
                'field_of_study' => 'School of Computing, Information Technology',
                'start_year' => 2018,
                'end_year' => 2018,
                'notes' => 'Universiti Utara Malaysia (UUM) is a favorite university in Malaysia. In UUM, I was an exchange student at School of Computing, Information Technology Department, College of Arts and Sciences for one semester.',
                'activities' => null,
                'sort_order' => 2,
            ],
            [
                'school_name' => 'SMA Negeri 1 Surakarta',
                'degree' => null,
                'field_of_study' => 'Science (Physics, Biology, Chemistry, Mathematics)',
                'start_year' => 2011,
                'end_year' => 2014,
                'notes' => 'SMA Negeri 1 Surakarta (SMANSA) is one of the favorite senior high schools in Surakarta, Central Java, Indonesia. In SMANSA, I was a student of Science Major that focused on physics, biology, chemistry, and mathematics.',
                'activities' => 'Active in the organization of Majelis Kerohanian Islam (MKI) and Organisasi Siswa Intra Sekolah (OSIS).',
                'sort_order' => 3,
            ],
        ];

        foreach ($educations as $education) {
            Education::updateOrCreate(
                [
                    'school_name' => $education['school_name'],
                    'start_year' => $education['start_year'],
                ],
                $education
            );
        }

        $this->command->info('Education seeded successfully.');
    }
}
