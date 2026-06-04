<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Acufara AI Clinic',
                'slug' => 'acufara-ai-clinic',
                'description' => 'AI-powered clinic & homecare management system built with Laravel 13 and Gemini API integration.',
                'content' => 'A comprehensive healthcare management system that leverages artificial intelligence to streamline clinic operations and homecare services.',
                'github_url' => 'https://github.com/adamfahmil96/acufara-ai-clinic',
                'live_url' => null,
                'technologies' => ['Laravel', 'Gemini API', 'MySQL', 'TailwindCSS'],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Klinikku',
                'slug' => 'klinikku',
                'description' => 'Sistem informasi untuk tenaga kesehatan dengan fitur manajemen pasien dan rekam medis.',
                'content' => 'An information system designed for healthcare professionals to manage patient records and medical history efficiently.',
                'github_url' => 'https://github.com/adamfahmil96/klinikku',
                'live_url' => null,
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap'],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Big Data Analysis',
                'slug' => 'big-data-analysis',
                'description' => 'Final project for Digital Talent Scholarship 2019 - Big Data analysis using Hadoop ecosystem.',
                'content' => 'A comprehensive big data analysis project utilizing Hadoop and Spark for processing and analyzing large datasets.',
                'github_url' => 'https://github.com/adamfahmil96/dts-finalproject',
                'live_url' => null,
                'technologies' => ['Python', 'Hadoop', 'Spark', 'Jupyter'],
                'is_featured' => false,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
