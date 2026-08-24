<?php

namespace App\Jobs;

use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\facades\Mail;

class ProcessCourseUpdated implements ShouldQueue
{
    use Queueable;

    public Course $course;

    public User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(Course $course, User $user)
    {
        $this->course = $course;
        $this->user = $user;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Put your background processing here
        |--------------------------------------------------------------------------
        |
        | Example:
        | - Send notification
        | - Generate sitemap
        | - Clear cache
        | - Send email
        | - Index course in search engine
        |
        */

        Mail::raw(
            'Course Updated: '.$this->course->name,
            function ($mail) {
                $mail->to($this->user->email)
                    ->subject('Course Updated');

            }
        );
    }
}
