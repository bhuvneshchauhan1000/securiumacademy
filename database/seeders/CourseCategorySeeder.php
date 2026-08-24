<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseCategory;
class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $courseCategories = [
            [
                "name"=> "Cyber Security",
                "description"=> "Cyber Security",
                "status"=> "active",
            ]
        ];

        foreach ($courseCategories as $courseCategory) {
            CourseCategory::create($courseCategory);
        }
        $this->command->info('CourseCategory seeding completed successfully.');
    }
}
