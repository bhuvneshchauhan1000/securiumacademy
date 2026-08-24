<?php

namespace App\Services;

use App\Events\CourseCreated;
use App\Events\CourseUpdated;
use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    private CourseRepositoryInterface $repository;

    public function __construct(
        CourseRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Resolve the course source (academy or university) into
     * academy_id and university_id.
     */
    protected function resolveCourseSource(array $data): array
    {
        /*
        |--------------------------------------------------------------------------
        | Course Source (Academy / University / None)
        |--------------------------------------------------------------------------
        */

        $source = $data['course_source'] ?? 'none';

        if ($source === 'academy') {
            $data['academy_id'] = $data['academy_id'] ?? null;
            $data['university_id'] = null;
        } elseif ($source === 'university') {
            $data['university_id'] = $data['university_id'] ?? null;
            $data['academy_id'] = null;
        } else {
            $data['academy_id'] = null;
            $data['university_id'] = null;
        }

        unset($data['course_source']);

        return $data;
    }

    /**
     * Create a course.
     */
    public function create(
        array $data,
        ?UploadedFile $featuredImage = null,
        ?UploadedFile $certificateImage = null
    ): Course {

        /*
        |--------------------------------------------------------------------------
        | Resolve course source
        |--------------------------------------------------------------------------
        */

        $data = $this->resolveCourseSource($data);

        /*
        |--------------------------------------------------------------------------
        | Upload featured image
        |--------------------------------------------------------------------------
        */

        if ($featuredImage) {
            $data['featured_image'] = $featuredImage->store(
                'courses',
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Upload certificate image
        |--------------------------------------------------------------------------
        */

        if ($certificateImage) {
            $data['certificate_image'] = $certificateImage->store(
                'courses/certificates',
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Create Course through Repository
        |--------------------------------------------------------------------------
        */

        $course = $this->repository->create($data);

        /*
        |--------------------------------------------------------------------------
        | Fire Event
        |--------------------------------------------------------------------------
        */

        event(new CourseCreated($course));

        return $course;
    }

    /**
     * Update a course.
     */
    public function update(
        Course $course,
        array $data,
        ?UploadedFile $featuredImage = null,
        ?UploadedFile $certificateImage = null
    ): Course {

        /*
        |--------------------------------------------------------------------------
        | Resolve course source
        |--------------------------------------------------------------------------
        */

        $data = $this->resolveCourseSource($data);

        if ($featuredImage) {
            if ($course->featured_image) {
                Storage::disk('public')->delete($course->featured_image);
            }
            $data['featured_image'] = $featuredImage->store('courses', 'public');
        }

        if ($certificateImage) {
            if ($course->certificate_image) {
                Storage::disk('public')->delete($course->certificate_image);
            }
            $data['certificate_image'] = $certificateImage->store('courses/certificates', 'public');
        }

        $course = $this->repository->update($course, $data);

        event(new CourseUpdated($course));

        return $course;
    }

    /**
     * Delete a course.
     */
    public function delete(Course $course): bool
    {
        return $this->repository->delete($course);
    }
}
