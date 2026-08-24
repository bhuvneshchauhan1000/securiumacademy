<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CourseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table("courses")->truncate();
        Schema::enableForeignKeyConstraints();

        $courseCategory = CourseCategory::pluck('id')->toArray();

        if (empty($courseCategory)) {
            $this->command->error('No Course Category found. Please seed Course Category first.');
            return;
        }


        $courses = [
            [
                'name' => 'Certified Ethical Hacker (CEH v13)',
                'short_description' => 'CEH v13',
                'content' => '<h3>About The Program</h3><p>Master the latest ethical hacking tools, techniques and AI-assisted attack vectors used by modern penetration testers. The CEH v13 program teaches you to think and act like a hacker so you can better defend enterprise networks.</p><h3>What You Will Learn</h3><ul><li>Footprinting, scanning and enumeration</li><li>System, network and web application hacking</li><li>Social engineering and wireless attacks</li><li>AI-powered threat detection and mitigation</li><li>Report writing and mitigation strategies</li></ul>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 50000,
                'discount_fee' => 29999,
                'course_level' => 'intermediate',
                'certification' => 'EC-Council CEH',
                'is_featured' => true,
            ],
            [
                'name' => 'Certified Penetration Testing Professional (CPENT)',
                'short_description' => 'CPENT',
                'content' => '<h3>About The Program</h3><p>Learn to conduct enterprise-level penetration testing in a live cyber range. This hands-on program covers advanced exploitation, binary analysis, and pivoting in modern networks.</p><h3>What You Will Learn</h3><ul><li>Advanced network penetration testing</li><li>Exploitation and post-exploitation</li><li>Active Directory attacks</li><li>IoT and OT pentesting</li><li>Report writing and client communication</li></ul>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 65000,
                'discount_fee' => 39999,
                'course_level' => 'advanced',
                'certification' => 'EC-Council CPENT',
                'is_featured' => true,
            ],
            [
                'name' => 'EC-Council Certified Incident Handler (ECIH v2)',
                'short_description' => 'ECIH v2',
                'content' => '<h3>About The Program</h3><p>Learn how to handle security incidents effectively - from detection and containment to eradication and recovery - using industry-standard incident handling procedures.</p>',
                'duration' => '2 Days (16 Hours)',
                'fee' => 35000,
                'discount_fee' => 19999,
                'course_level' => 'intermediate',
                'certification' => 'EC-Council ECIH',
                'is_featured' => false,
            ],
            [
                'name' => 'Offensive Security Certified Professional (OSCP)',
                'short_description' => 'OSCP (PEN-200)',
                'content' => '<h3>About The Program</h3><p>The gold standard for penetration testing. This course trains you to attack and exploit vulnerable machines in an isolated lab environment and prove your skills in a 24-hour practical exam.</p><h3>What You Will Learn</h3><ul><li>Reconnaissance and information gathering</li><li>Vulnerability scanning and exploitation</li><li>Buffer overflows</li><li>Active Directory attacks</li><li>Post-exploitation and privilege escalation</li></ul>',
                'duration' => 'Self-Paced + Labs',
                'fee' => 85000,
                'discount_fee' => 64999,
                'course_level' => 'advanced',
                'certification' => 'OffSec OSCP',
                'is_featured' => true,
            ],
            [
                'name' => 'Offensive Security Web Expert (OSWE)',
                'short_description' => 'OSWE',
                'content' => '<h3>About The Program</h3><p>Master advanced web application attacks, including source code review, and build fully weaponized exploits against white-box web applications.</p>',
                'duration' => 'Self-Paced + Labs',
                'fee' => 95000,
                'discount_fee' => 74999,
                'course_level' => 'advanced',
                'certification' => 'OffSec OSWE',
                'is_featured' => false,
            ],
            [
                'name' => 'Certified Information Systems Auditor (CISA)',
                'short_description' => 'CISA',
                'content' => '<h3>About The Program</h3><p>Learn to audit, control, monitor and assess information systems. CISA is recognized globally for IS/IT audit, control and security professionals.</p>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 45000,
                'discount_fee' => 27999,
                'course_level' => 'intermediate',
                'certification' => 'ISACA CISA',
                'is_featured' => false,
            ],
            [
                'name' => 'Certified Information Security Manager (CISM)',
                'short_description' => 'CISM',
                'content' => '<h3>About The Program</h3><p>For experienced security managers, CISM validates your skills in information security governance, program development, and incident management.</p>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 48000,
                'discount_fee' => 29999,
                'course_level' => 'Advanced',
                'certification' => 'ISACA CISM',
                'is_featured' => false,
            ],
            [
                'name' => 'Certified Information Systems Security Professional (CISSP)',
                'short_description' => 'CISSP',
                'content' => '<h3>About The Program</h3><p>The premier certification for security professionals. CISSP covers the eight domains of information security from security management to software development security.</p>',
                'duration' => '6 Days (48 Hours)',
                'fee' => 55000,
                'discount_fee' => 34999,
                'course_level' => 'advanced',
                'certification' => 'ISC² CISSP',
                'is_featured' => true,
            ],
            [
                'name' => 'CompTIA Security+',
                'short_description' => 'Security+',
                'content' => '<h3>About The Program</h3><p>Start your cybersecurity career with Security+ - the most popular entry-level security certification covering network security, threats, vulnerabilities, and risk management.</p>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 25000,
                'discount_fee' => 14999,
                'course_level' => 'beginner',
                'certification' => 'CompTIA Security+',
                'is_featured' => true,
            ],
            [
                'name' => 'CompTIA PenTest+',
                'short_description' => 'PenTest+',
                'content' => '<h3>About The Program</h3><p>Prepare for the CompTIA PenTest+ exam covering penetration testing planning, vulnerability scanning, exploitation, and reporting.</p>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 30000,
                'discount_fee' => 17999,
                'course_level' => 'intermediate',
                'certification' => 'CompTIA PenTest+',
                'is_featured' => false,
            ],
            [
                'name' => 'Project Management Professional (PMP)',
                'short_description' => 'PMP',
                'content' => '<h3>About The Program</h3><p>Advance your project management career with PMP. Learn agile, predictive and hybrid approaches to deliver projects successfully in any environment.</p>',
                'duration' => '4 Days (32 Hours)',
                'fee' => 40000,
                'discount_fee' => 24999,
                'course_level' => 'intermediate',
                'certification' => 'PMI PMP',
                'is_featured' => false,
            ],
            [
                'name' => 'Cisco Certified Network Associate (CCNA)',
                'short_description' => 'CCNA',
                'content' => '<h3>About The Program</h3><p>Build a solid foundation in networking with CCNA - covering network fundamentals, IP services, security fundamentals, and automation.</p>',
                'duration' => '6 Days (48 Hours)',
                'fee' => 28000,
                'discount_fee' => 16999,
                'course_level' => 'beginner',
                'certification' => 'Cisco CCNA',
                'is_featured' => false,
            ],
            [
                'name' => 'INE eJPT - Junior Penetration Tester',
                'short_description' => 'eJPT',
                'content' => '<h3>About The Program</h3><p>Perfect for beginners. eJPT validates practical penetration testing skills with a 100% hands-on, performance-based exam.</p>',
                'duration' => 'Self-Paced',
                'fee' => 22000,
                'discount_fee' => 12999,
                'course_level' => 'beginner',
                'certification' => 'INE eJPT',
                'is_featured' => false,
            ],
            [
                'name' => 'PECB ISO/IEC 27001 Lead Auditor',
                'short_description' => 'ISO 27001 LA',
                'content' => '<h3>About The Program</h3><p>Become a certified ISO/IEC 27001 Lead Auditor and learn to plan, conduct and report information security management system audits.</p>',
                'duration' => '5 Days (40 Hours)',
                'fee' => 42000,
                'discount_fee' => 25999,
                'course_level' => 'intermediate',
                'certification' => 'PECB ISO 27001',
                'is_featured' => false,
            ],
        ];

        foreach ($courses as $course) {
            $course['course_category_id'] = fake()->randomElement($courseCategory);
            $course['status'] = 'published';
            $course['meta_title'] = $course['name'] . ' | Securium Academy';
            $course['meta_description'] = 'Enroll in ' . $course['name'] . ' at Securium Academy. ' . ($course['duration'] ?? '') . ' of expert-led training with global certification.';
            $course['meta_keywords'] = Str::lower($course['name']) . ', securium academy, cybersecurity training';

            Course::updateOrCreate(
                $course
            );
        }
        $this->command->info('Course seeding completed successfully');
    }
}
