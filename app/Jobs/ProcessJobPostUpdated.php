<?php

namespace App\Jobs;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ProcessJobPostUpdated implements ShouldQueue
{
    use Queueable;

    public JobPost $jobPost;

    public User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(JobPost $jobPost, User $user)
    {
        $this->jobPost = $jobPost;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw(
            'Job Post Updated: '.$this->jobPost->name,
            function ($mail) {
                $mail->to($this->user->email)
                    ->subject('Job Post Updated');
            }
        );
    }
}
