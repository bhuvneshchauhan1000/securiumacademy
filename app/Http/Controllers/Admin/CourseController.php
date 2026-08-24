<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    //
    public function index(Request $request)
    {
        $this->authorize('viewAny', Course::class);
        $courses = Course::with('courseCategory')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('short_description', 'like', '%'.$search.'%')
                        ->orWhere('fee', 'like', '%'.$search.'%')
                        ->orWhere('discount_fee', 'like', '%'.$search.'%')
                        ->orWhere('course_level', 'like', '%'.$search.'%')
                        ->orWhere('content', 'like', '%'.$search.'%');
                });
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $this->authorize('create', Course::class);
        $courseCategories = CourseCategory::active();

        return view('admin.courses.create', compact('courseCategories'));
    }

    public function store(StoreCourseRequest $request)
    {
        $this->authorize('store', Course::class);

        $this->courseService->create(
            $request->validated(),
            $request->file('featured_image'),
            $request->file('certificate_image')
        );

        return redirect()
            ->route('courses.index')
            ->with(
                'success',
                __('Course created successfully.')
            );
    }

    public function edit(Course $course)
    {
        $this->authorize('edit', Course::class);
        $courseCategories = CourseCategory::active();

        return view('admin.courses.edit', compact('course', 'courseCategories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('update', $course);

        $this->courseService->update(
            $course,
            $request->validated(),
            $request->file('featured_image'),
            $request->file('certificate_image')
        );

        return redirect()
            ->route('courses.index')
            ->with(
                'success',
                __('Course updated successfully.')
            );
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $this->courseService->delete($course);

        return redirect()->route('courses.index')->with('success','Course deleted successfully');
    }
}
