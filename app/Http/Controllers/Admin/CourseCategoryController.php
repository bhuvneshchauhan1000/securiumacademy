<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Services\CourseCategoryService;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    protected CourseCategoryService $courseCategoryService;

    public function __construct(CourseCategoryService $courseCategoryService)
    {
        $this->courseCategoryService = $courseCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize("viewAny", CourseCategory::class);
        $courseCategories = CourseCategory::query()
        ->when($request->filled("search"),function ($query) use ($request){
            $search = trim($request->input("search"));
            $query->where(function ($q) use ($search){
                $q->where("name","like","%".$search."%")
                ->orWhere("slug","like","%".$search."%");
            });
        })->latest()
        ->paginate(15)
        ->withQueryString();
        return view('admin.course-categories.index', compact('courseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', CourseCategory::class);
        return view('admin.course-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('store', CourseCategory::class);
        $validated = $request->validate([
            'name'=> ['required','string','max:255'],
            'description'=> ['nullable','string'],
            'status'=> ['required','in:active,inactive'],
            'logo'=> ['nullable','image','mimes:jpeg,jpg,png,webp','max:20480']
        ]);

        $this->courseCategoryService->create($validated, $request->hasFile('logo') ? $request->file('logo') : null);
        return redirect()->route('course-categories.index')->with('success','Course Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $courseCategory)
    {
        //
        $this->authorize('edit', CourseCategory::class);
        return view('admin.course-categories.edit', compact('courseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseCategory $courseCategory)
    {
        //
        $this->authorize('update', $courseCategory);
        $validated = $request->validate([
            'name'=> ['required','string','max:255'],
            'description'=> ['nullable','string'],
            'status'=> ['required','in:active,inactive'],
            'logo'=> ['nullable','image','mimes:jpeg,jpg,png,webp','max:20480']
        ]);
        $this->courseCategoryService->update($courseCategory, $validated, $request->hasFile('logo') ? $request->file('logo') : null);
        return redirect()->route('course-categories.index')->with('success','Course Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $courseCategory)
    {
        //
        $this->authorize('delete', $courseCategory);
        $this->courseCategoryService->delete($courseCategory);
        return redirect()->route('course-categories.index')->with('success','Course Category Deleted Successfully');
    }
}
