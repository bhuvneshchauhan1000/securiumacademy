<?php

namespace App\Observers;

use App\Models\CourseCategory;
use Illuminate\Support\Str;

class CourseCategoryObserver
{

    public function creating(CourseCategory $courseCategory)
    {
        $slug = Str::slug($courseCategory->name);
        $originalSlug = $slug;
        $counter = 1;
        while (CourseCategory::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }
        $courseCategory->slug = $slug;
    }
    public function updating(CourseCategory $courseCategory): void
    {
        if ($courseCategory->isDirty('name')) {
            $baseSlug = Str::slug($courseCategory->name);
            $slug = $baseSlug;
            $counter = 1;

            while (
                CourseCategory::where('slug', $slug)
                    ->where('id', '!=', $courseCategory->id)
                    ->exists()
            ) {
                $counter++;
                $slug = $baseSlug . '-' . $counter;
            }

            $courseCategory->slug = $slug;
        }
    }
    /**
     * Handle the CourseCategory "created" event.
     */
    public function created(CourseCategory $courseCategory): void
    {
        //
    }

    /**
     * Handle the CourseCategory "updated" event.
     */
    public function updated(CourseCategory $courseCategory): void
    {
        //
    }

    /**
     * Handle the CourseCategory "deleted" event.
     */
    public function deleted(CourseCategory $courseCategory): void
    {
        //
    }

    /**
     * Handle the CourseCategory "restored" event.
     */
    public function restored(CourseCategory $courseCategory): void
    {
        //
    }

    /**
     * Handle the CourseCategory "force deleted" event.
     */
    public function forceDeleted(CourseCategory $courseCategory): void
    {
        //
    }
}
