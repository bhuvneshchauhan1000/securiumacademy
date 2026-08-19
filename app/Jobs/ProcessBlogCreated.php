<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\facades\Mail;

class ProcessBlogCreated implements ShouldQueue
{
    use Queueable;

    public Blog $blog;
    public User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(Blog $blog, User $user)
    {
        $this->blog = $blog;
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
        | - Index blog in search engine
        |
        */

        Mail::raw(
            "New Blog Created: ".$this->blog->title,
            function($mail){
                $mail->to($this->user->email)
                     ->subject('New Blog Created');

            }
        );
    }
}
