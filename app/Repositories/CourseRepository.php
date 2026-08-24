<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CourseRepository implements CourseRepositoryInterface
{
    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): Course
    {
        $course->update($data);

        return $course->fresh();
    }

    public function delete(Course $course): bool
    {
        if ($course->featured_image) {
            Storage::disk('public')->delete($course->featured_image);
        }

        if ($course->certificate_image) {
            Storage::disk('public')->delete($course->certificate_image);
        }

        return $course->delete();
    }
}
