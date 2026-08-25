<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $jobTypes = [
            [
                "name" => "Intership",
                "description" => "Internship",
                "status" => "published",
            ],
            [
                "name" => "Full Time",
                "description" => "Full Time",
                "status" => "published",
            ],
            [
                "name" => "Part Time",
                "description" => "Part Time",
                "status" => "published",
            ],
            [
                "name" => "Contract",
                "description" => "Contract",
                "status" => "published",
            ],
            [
                "name" => "Temporary",
                "description" => "Temporary",
                "status" => "published",
            ],
            [
                "name" => "Freelance",
                "description" => "Freelance",
                "status" => "published",
            ],
            [
                "name" => "Volunteer",
                "description" => "Volunteer",
                "status" => "published",
            ],
            [
                "name" => "Apprenticeship",
                "description" => "Apprenticeship",
                "status" => "published",
            ],
        ];

        foreach ($jobTypes as $type) {
            JobType::create($type);
        }
        $this->command->info("Job Type Seeding Successfully Completed");
    }
}
