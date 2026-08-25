<?php

namespace Database\Seeders;

use App\Models\JobPost;
use App\Models\JobType;
use App\Models\JobCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobType = JobType::first();
        $jobCategory = JobCategory::first();
        $user = User::first();

        if (!$jobType || !$jobCategory) {
            $this->command->warn(
                'Please seed job_types and job_categories before running JobSeeder.'
            );

            return;
        }

        JobPost::updateOrCreate(
            [
                'name' => 'Senior Laravel Developer',
                'short_description' => 'We are looking for an experienced Laravel developer to join our development team.',
                'description' => '
                    We are looking for a skilled Senior Laravel Developer to design,
                    develop and maintain scalable web applications.

                    The ideal candidate should have strong knowledge of Laravel,
                    PHP, MySQL, REST APIs and modern web development practices.
                ',

                'job_type_id' => $jobType->id,
                'job_category_id' => $jobCategory->id,

                'status' => 'published',

                'is_featured' => true,
                'is_urgent' => false,
                'is_remote' => false,

                'work_mode' => 'hybrid',

                'experience_level' => 'Senior',
                'min_experience' => 3,
                'max_experience' => 7,
                'education_level' => 'Bachelor\'s Degree',

                'salary_min' => 60000,
                'salary_max' => 100000,
                'salary_currency' => 'INR',
                'salary_period' => 'monthly',
                'hide_salary' => false,
                'salary_description' => 'Salary depends on experience and skills.',

                'country' => 'India',
                'state' => 'Uttar Pradesh',
                'city' => 'Noida',
                'address' => 'Sector 1',
                'postal_code' => '201309',

                'latitude' => 28.6270,
                'longitude' => 77.3725,

                'company_name' => 'Securium Academy',
                'company_email' => 'career@securiumacademy.com',
                'company_phone' => '+91 79826 01944',
                'company_website' => 'http://127.0.0.1:8002',
                'company_logo' => null,

                'application_method' => 'internal',
                'application_url' => null,
                'application_email' => null,

                'application_limit' => 100,
                'application_count' => 0,
                'allow_applications' => true,

                'published_at' => now(),
                'application_start_at' => now(),
                'application_deadline' => now()->addDays(30),
                'expires_at' => now()->addDays(45),

                'requirements' => '
                    - 3+ years of PHP development experience.
                    - Strong Laravel experience.
                    - Good knowledge of MySQL.
                    - Experience with REST APIs.
                    - Knowledge of Git.
                ',

                'responsibilities' => '
                    - Develop and maintain Laravel applications.
                    - Build REST APIs.
                    - Work with the frontend development team.
                    - Optimize application performance.
                    - Write clean and maintainable code.
                ',

                'qualifications' => '
                    - Bachelor\'s degree in Computer Science or related field.
                    - Strong problem-solving skills.
                    - Good communication skills.
                ',

                'preferred_qualifications' => '
                    - Experience with Vue.js or React.
                    - Experience with Docker.
                    - Knowledge of AWS.
                ',

                'benefits' => '
                    - Health insurance.
                    - Paid leave.
                    - Flexible working hours.
                    - Performance bonus.
                ',

                'department' => 'Engineering',
                'job_code' => 'JOB-LARAVEL-001',
                'reference_number' => 'REF-2026-001',

                'vacancies' => 2,

                'shift' => 'Day Shift',
                'working_hours' => '9:00 AM - 6:00 PM',

                'industry' => 'Information Technology',
                'career_level' => 'Mid-Senior Level',

                'meta_title' => 'Senior Laravel Developer Job',
                'meta_description' => 'Apply for Senior Laravel Developer position at Tech Solutions.',
                'meta_keywords' => 'Laravel Developer, PHP Developer, Senior Developer, Laravel Jobs',
                'meta_script' => null,

                'views_count' => 0,
                'shares_count' => 0,
                'bookmarks_count' => 0,

                'is_verified' => true,
                'is_approved' => $user !== null,

                'approved_by' => $user?->id,
                'approved_at' => $user ? now() : null,
            ]
        );

        $this->command->info('Job seeded successfully.');
    }
}
