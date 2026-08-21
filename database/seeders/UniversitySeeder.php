<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use APP\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $universities = [
            [
                "name"=> "Ec Council University",
                "country"=> "New Maxico",
                "description"=> "Ec Council University",
                "website_url"=> "https://www.eccu.edu/",
                "status"=> "active",
            ],
            [
                "name"=> "Brichwood University",
                "country"=> "Florida",
                "description"=> "Brichwood University",
                "website_url"=> "https://www.birchwoodu.org/",
                "status"=> "active",
            ]
        ];

        foreach ($universities as $university) {
            University::create($university);
        }
        $this->command->info('University seeding completed successfully.');
    }
}
