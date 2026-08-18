<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Technology',
                'description' => 'Latest trends, tutorials, and insights in technology and software development.',
                'status'      => 'published',
            ],
            [
                'name'        => 'Cybersecurity',
                'description' => 'Articles about online safety, threat prevention, and security best practices.',
                'status'      => 'published',
            ],
            [
                'name'        => 'Web Development',
                'description' => 'Tutorials and guides on frontend, backend, and full-stack web development.',
                'status'      => 'published',
            ],
            [
                'name'        => 'Artificial Intelligence',
                'description' => 'Exploring machine learning, deep learning, and AI-powered solutions.',
                'status'      => 'published',
            ],
            [
                'name'        => 'Cloud Computing',
                'description' => 'Cloud platforms, DevOps, infrastructure, and deployment strategies.',
                'status'      => 'draft',
            ],
            [
                'name'        => 'Mobile Development',
                'description' => 'Building iOS, Android, and cross-platform mobile applications.',
                'status'      => 'published',
            ],
            [
                'name'        => 'Data Science',
                'description' => 'Data analysis, visualization, statistics, and predictive modeling.',
                'status'      => 'draft',
            ],
            [
                'name'        => 'Programming Tips',
                'description' => 'Handy tips, tricks, and best practices for programmers of all levels.',
                'status'      => 'published',
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
