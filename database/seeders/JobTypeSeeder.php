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
        //

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
        ];

        foreach ($jobTypes as $type) {
            JobType::create($type);
        }
        $this->command->info("Job Type Seeding Successfully Completed");
    }
}
