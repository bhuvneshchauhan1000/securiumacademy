<?php

namespace App\Observers;

use App\Models\JobCategory;
use Illuminate\Support\Str;

class JobCategoryObserver
{
    public function creating(JobCategory $jobCategory)
    {
        $slug = Str::slug($jobCategory->name);
        $originalSlug = $slug;
        $counter = 1;
        while (JobCategory::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }
        $jobCategory->slug = $slug;
    }

    public function updating(JobCategory $jobCategory)
    {
        if ($jobCategory->isDirty('name')) {
            $slug = Str::slug($jobCategory->name);
            $baseSlug = $slug;
            $counter = 1;
            while (JobCategory::where('slug', $slug)->where('id', '!=', $jobCategory->id)->exists()) {
                $counter++;
                $slug = $baseSlug.'-'.$counter;
            }
            $jobCategory->slug = $slug;
        }
    }
}
