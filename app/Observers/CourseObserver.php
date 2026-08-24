<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseObserver
{
    public function creating(Course $course)
    {
        $slug = Str::slug($course->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Course::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }
        $course->slug = $slug;
    }

    public function updating(Course $course)
    {
        if ($course->isDirty('name')) {
            $slug = Str::slug($course->name);
            $baseSlug = $slug;
            $counter = 1;
            while (Course::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                $counter++;
                $slug = $baseSlug.'-'.$counter;
            }
            $course->slug = $slug;
        }
    }

    /**
     * Handle the Course "created" event.
     */
    public function created(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     */
    public function restored(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     */
    public function forceDeleted(Course $course): void
    {
        //
    }
}
