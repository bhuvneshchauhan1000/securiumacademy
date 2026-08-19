<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
        Schema::enableForeignKeyConstraints();

        // Make sure required records exist before creating blogs.
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            $this->command->error('No users found. Please seed users first.');
            return;
        }
        $blogCategoryIds = BlogCategory::pluck('id')->toArray();

        if (empty($blogCategoryIds)) {
            $this->command->error('No Blog Category found. Please seed Blog Category first.');
            return;
        }

        $blogs = [
            [
                'title' => 'How OSCP Certification Can Transform Your Cybersecurity Career',
                'short_description' => 'OSCP is the most respected hands-on penetration testing certification. Learn why it matters and how to prepare for it.',
                'content' => '<h3>Why OSCP Matters</h3><p>The Offensive Security Certified Professional (OSCP) is widely regarded as the gold standard for penetration testing certifications. Unlike multiple-choice exams, OSCP requires you to actually hack into machines in a live lab environment.</p><h3>What Makes It Different</h3><p>You are tested in a real-world, hands-on manner over a 24-hour practical exam. This proves to employers that you can think critically and solve problems under pressure.</p><h3>How To Prepare</h3><p>Start with the PEN-200 course, practice on Hack The Box and TryHackMe, document everything, and build your own home lab. Consistency beats cramming when it comes to OSCP.</p>',
                'tags' => 'oscp, penetration testing, career, certification',
                'guide' => false,
                'press_release' => false,
                'status' => 'published',
                'days_ago' => 1,
            ],

            [
                'title' => 'Top 7 Cybersecurity Certifications to Boost Your Career',
                'short_description' => 'From CEH to CISSP, here are the certifications that recruiters actually look for in 2026.',
                'content' => '<h3>The Most In-Demand Certifications</h3><p>Certifications remain a strong signal of competence in cybersecurity. Here are the ones that consistently open doors: CEH, OSCP, CPENT, CISSP, CISA, CompTIA Security+, and eJPT.</p><ul><li><strong>CEH</strong> - Great starting point for ethical hacking.</li><li><strong>OSCP</strong> - Hands-on penetration testing credibility.</li><li><strong>CISSP</strong> - The manager-level benchmark.</li><li><strong>Security+</strong> - Perfect for beginners.</li></ul><p>Choose a certification based on your career stage, not just its popularity.</p>',
                'tags' => 'certifications, CEH, CISSP, career',
                'guide' => false,
                'press_release' => false,
                'status' => 'published',
                'days_ago' => 5,
            ],

            [
                'title' => 'How AI in Cyber Security Is Shaping the Future of Defense',
                'short_description' => 'Artificial intelligence is transforming both attacks and defenses. Understand how AI is reshaping the security landscape.',
                'content' => '<h3>The Dual Role of AI</h3><p>AI is a double-edged sword in cybersecurity. Attackers use AI to automate phishing and generate malware, while defenders use it for anomaly detection and automated response.</p><h3>What This Means For You</h3><p>Security professionals who understand AI-assisted tools will be in high demand. Learn to use AI for threat hunting, log analysis, and faster incident response.</p>',
                'tags' => 'AI, cyber security, defense, threat hunting',
                'guide' => false,
                'press_release' => false,
                'status' => 'published',
                'days_ago' => 10,
            ],

            [
                'title' => 'How to Install Kali Linux on VirtualBox: Step-by-Step Guide',
                'short_description' => 'A complete beginner-friendly guide to setting up your first ethical hacking lab with Kali Linux.',
                'content' => '<h3>Set Up Your Hacking Lab</h3><p>Kali Linux is the go-to distribution for penetration testing. Installing it in VirtualBox lets you practice safely without affecting your main system.</p><h3>Steps</h3><ol><li>Download the VirtualBox installer and the Kali Linux VM image.</li><li>Install VirtualBox and import the Kali VM.</li><li>Allocate at least 4 GB RAM and 2 CPU cores.</li><li>Enable nested virtualization for better performance.</li><li>Log in, run <code>sudo apt update</code>, and you are ready.</li></ol>',
                'tags' => 'kali linux, virtualbox, lab setup, beginner',
                'guide' => false,
                'press_release' => false,
                'status' => 'draft',
                'days_ago' => 15,
            ],

            [
                'title' => 'The Dark Web: Understanding Its Role in Cybercrime',
                'short_description' => 'A practical look at what the dark web is, how cybercriminals use it, and why security teams monitor it.',
                'content' => '<h3>What Is the Dark Web?</h3><p>The dark web is a small, encrypted portion of the internet that requires special tools like Tor to access. It hosts both legitimate privacy tools and illegal marketplaces.</p><h3>Why Security Teams Care</h3><p>Monitoring the dark web helps organizations detect leaked credentials, planned attacks, and compromised data before they are exploited.</p>',
                'tags' => 'dark web, cybercrime, threat intelligence',
                'guide' => false,
                'press_release' => false,
                'status' => 'published',
                'days_ago' => 20,
            ],

            [
                'title' => 'Exposing Broken Access Control: A Comprehensive Guide',
                'short_description' => 'Broken access control is the #1 web application risk. Learn how attackers exploit it and how to test for it.',
                'content' => '<h3>What Is Broken Access Control?</h3><p>Broken access control is consistently ranked as the most critical web application security risk. It occurs when users can act outside of their intended permissions.</p><h3>How Attackers Exploit It</h3><p>Common examples include IDOR (Insecure Direct Object References), privilege escalation, and missing function-level access control. Always test with two accounts to verify what a user can actually access.</p>',
                'tags' => 'OWASP, access control, IDOR, pentest',
                'guide' => false,
                'press_release' => false,
                'status' => 'draft',
                'days_ago' => 25,
            ],
        ];

        foreach ($blogs as $blog) {
            /*
             * Find the category by name.
             *
             * IMPORTANT:
             * Change "name" below if your BlogCategory model uses
             * another column such as "title".
             */


            $publishedAt = Carbon::now()->subDays($blog['days_ago']);

            Blog::create([
                'title' => $blog['title'],
                'blog_categories_id' => fake()->randomElement($blogCategoryIds),
                'short_description' => $blog['short_description'],
                'content' => $blog['content'],
                'tags' => $blog['tags'],
                'guide' => $blog['guide'],
                'press_release' => $blog['press_release'],
                'status' => $blog['status'],
                'user_id' => fake()->randomElement($userIds),
                'published_at' => $publishedAt,
            ]);
        }

        $this->command->info('Blog seeding completed successfully.');
    }
}
