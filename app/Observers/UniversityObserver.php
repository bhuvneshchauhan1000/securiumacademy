<?php

namespace App\Observers;

use App\Models\University;
use Illuminate\Support\Str;

class UniversityObserver
{
    /**
     * Handle the University "created" event.
     */

    public function creating(University $university)
    {
        $slug = Str::slug($university->name);
        $originalSlug = $slug;
        $counter = 1;
        while (University::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }
        $university->slug = $slug;
    }
    public function updating(University $university): void
    {
        if ($university->isDirty('name')) {
            $baseSlug = Str::slug($university->name);
            $slug = $baseSlug;
            $counter = 1;

            while (
                University::where('slug', $slug)
                    ->where('id', '!=', $university->id)
                    ->exists()
            ) {
                $counter++;
                $slug = $baseSlug . '-' . $counter;
            }

            $university->slug = $slug;
        }
    }

    public function created(University $university): void
    {
        //
    }

    /**
     * Handle the University "updated" event.
     */
    public function updated(University $university): void
    {
        //
    }

    /**
     * Handle the University "deleted" event.
     */
    public function deleted(University $university): void
    {
        //
    }

    /**
     * Handle the University "restored" event.
     */
    public function restored(University $university): void
    {
        //
    }

    /**
     * Handle the University "force deleted" event.
     */
    public function forceDeleted(University $university): void
    {
        //
    }
}
