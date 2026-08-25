<?php

namespace App\Observers;

use App\Models\JobType;
use Illuminate\Support\Str;

class JobTypeObserver
{
    public function creating(JobType $jobType)
    {
        $slug = Str::slug($jobType->name);
        $originalSlug = $slug;
        $counter = 1;
        while (JobType::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }
        $jobType->slug = $slug;
    }

    public function updating(JobType $jobType)
    {
        if ($jobType->isDirty('name')) {
            $slug = Str::slug($jobType->name);
            $baseSlug = $slug;
            $counter = 1;
            while (JobType::where('slug', $slug)->where('id', '!=', $jobType->id)->exists()) {
                $counter++;
                $slug = $baseSlug.'-'.$counter;
            }
            $jobType->slug = $slug;
        }
    }
    /**
     * Handle the JobType "created" event.
     */
    public function created(JobType $jobType): void
    {
        //
    }

    /**
     * Handle the JobType "updated" event.
     */
    public function updated(JobType $jobType): void
    {
        //
    }

    /**
     * Handle the JobType "deleted" event.
     */
    public function deleted(JobType $jobType): void
    {
        //
    }

    /**
     * Handle the JobType "restored" event.
     */
    public function restored(JobType $jobType): void
    {
        //
    }

    /**
     * Handle the JobType "force deleted" event.
     */
    public function forceDeleted(JobType $jobType): void
    {
        //
    }
}
