<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Models\Academy;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\University;
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
        $courses = Course::with(['courseCategory', 'academy', 'university'])
            ->when($request->filled('academy_id'), function ($query) use ($request) {
                $query->where('academy_id', $request->input('academy_id'));
            })
            ->when($request->filled('university_id'), function ($query) use ($request) {
                $query->where('university_id', $request->input('university_id'));
            })
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

        $academyFilter = $request->filled('academy_id')
            ? Academy::find($request->input('academy_id'))
            : null;
        $universityFilter = $request->filled('university_id')
            ? University::find($request->input('university_id'))
            : null;

        return view('admin.courses.index', compact(
            'courses',
            'academyFilter',
            'universityFilter'
        ));
    }

    public function create()
    {
        $this->authorize('create', Course::class);
        $courseCategories = CourseCategory::active();
        $academies = Academy::orderBy('name')->get();
        $universities = University::orderBy('name')->get();

        return view('admin.courses.create', compact(
            'courseCategories',
            'academies',
            'universities'
        ));
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
        $academies = Academy::orderBy('name')->get();
        $universities = University::orderBy('name')->get();

        return view('admin.courses.edit', compact(
            'course',
            'courseCategories',
            'academies',
            'universities'
        ));
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

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
