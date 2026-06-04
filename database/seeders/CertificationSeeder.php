<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            [
                'name' => 'IT Enterprise Architecture',
                'issuing_organization' => 'Badan Nasional Sertifikasi Profesi (BNSP)',
                'license_number' => 'No. 62090 2511 6 0002736 2025',
                'issue_date' => '2025-10-01',
                'expiry_date' => '2028-10-01',
                'credential_url' => null,
                'sort_order' => 1,
            ],
            [
                'name' => 'Digital Marketing Fundamental',
                'issuing_organization' => 'Habiskerja.com',
                'license_number' => '01/DMF/2023',
                'issue_date' => '2024-05-01',
                'expiry_date' => '2028-05-01',
                'credential_url' => null,
                'sort_order' => 2,
            ],
        ];

        foreach ($certifications as $certification) {
            Certification::updateOrCreate(
                [
                    'name' => $certification['name'],
                    'issuing_organization' => $certification['issuing_organization'],
                ],
                $certification
            );
        }

        $this->command->info('Certifications seeded successfully.');
    }
}
