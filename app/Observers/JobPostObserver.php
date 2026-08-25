<?php

namespace App\Observers;

use App\Models\JobPost;
use Illuminate\Support\Str;

class JobPostObserver
{
    public function creating(JobPost $jobPost)
    {
        $slug = Str::slug($jobPost->name);
        $originalSlug = $slug;
        $counter = 1;
        while (JobPost::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }
        $jobPost->slug = $slug;
    }

    public function updating(JobPost $jobPost)
    {

        if ($jobPost->isDirty('name')) {
            $slug = Str::slug($jobPost->name);
            $originalSlug = $slug;
            $counter = 1;
            while (JobPost::where('slug', $slug)->where('id', '!=', $jobPost->id)->exists()) {
                $counter++;
                $slug = $originalSlug.'-'.$counter;
            }
            $jobPost->slug = $slug;
        }

    }

    /**
     * Handle the JobPost "created" event.
     */
    public function created(JobPost $jobPost): void
    {
        //
    }

    /**
     * Handle the JobPost "updated" event.
     */
    public function updated(JobPost $jobPost): void
    {
        //
    }

    /**
     * Handle the JobPost "deleted" event.
     */
    public function deleted(JobPost $jobPost): void
    {
        //
    }

    /**
     * Handle the JobPost "restored" event.
     */
    public function restored(JobPost $jobPost): void
    {
        //
    }

    /**
     * Handle the JobPost "force deleted" event.
     */
    public function forceDeleted(JobPost $jobPost): void
    {
        //
    }
}
