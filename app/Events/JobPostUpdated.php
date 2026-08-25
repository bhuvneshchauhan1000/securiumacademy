<?php

namespace App\Events;

use App\Models\JobPost;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobPostUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public JobPost $jobPost;

    /**
     * Create a new event instance.
     */
    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }
}
