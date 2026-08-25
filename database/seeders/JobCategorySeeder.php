<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $jobCategories = [
            [
                'name' => 'Engineering',
                'description' => 'Software & Engineering Jobs',
                'status' => 'published',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Marketing Jobs',
                'status' => 'published',
            ],
            [
                'name' => 'Finance',
                'description' => 'Finance & Accounting Jobs',
                'status' => 'published',
            ],
            [
                'name' => 'Human Resources',
                'description' => 'HR Jobs',
                'status' => 'published',
            ],
        ];

        foreach ($jobCategories as $category) {
            JobCategory::create($category);
        }
        $this->command->info('Job Category Seeding Successfully Completed');
    }
}
