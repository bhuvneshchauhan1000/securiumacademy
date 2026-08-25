<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rahul Sharma',
                'designation' => 'Penetration Tester',
                'company' => 'TCS',
                'rating' => 5,
                'content' => 'The OSCP training at Securium Academy was a game changer for me. The labs and mentorship prepared me to clear the exam on my first attempt.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Priya Nair',
                'designation' => 'Security Analyst',
                'company' => 'Cognizant',
                'rating' => 5,
                'content' => 'I transitioned from IT support to cybersecurity after completing the CEH program. The trainers explain real-world attacks with such clarity.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Ahmed Al-Farsi',
                'designation' => 'SOC Lead',
                'company' => 'Etisalat',
                'rating' => 4,
                'content' => 'Practical, hands-on and career focused. The VAPT internship gave me exposure to live client engagements that no other institute offers.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Sneha Kulkarni',
                'designation' => 'Security Engineer',
                'company' => 'Infosys',
                'rating' => 5,
                'content' => 'Best decision of my career. The mentors are active red-team professionals and the placement support genuinely helped me land my current role.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Mohammed Irfan',
                'designation' => 'GRC Consultant',
                'company' => 'Deloitte',
                'rating' => 5,
                'content' => 'Completed CISA and CISM here. The structured study material and mock exams were exactly what I needed to pass both certifications.',
                'sort_order' => 5,
            ],
            [
                'name' => 'Ankit Verma',
                'designation' => 'Bug Bounty Hunter',
                'company' => 'Freelance',
                'rating' => 5,
                'content' => 'The web application pentesting modules changed how I approach bug bounty. I earned my first bounties within two months of the course.',
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            $testimonial['status'] = 'published';
            $testimonial['image'] = null;

            Testimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial
            );
        }
        $this->command->info('Testimonials seeding Complete successfully ');
    }
}
