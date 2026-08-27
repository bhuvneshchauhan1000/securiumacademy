<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobCategoryRequest;
use App\Http\Requests\Admin\UpdateJobCategoryRequest;
use App\Models\JobCategory;
use App\Services\JobCategoryService;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    protected JobCategoryService $jobCategoryService;

    public function __construct(JobCategoryService $jobCategoryService)
    {
        $this->jobCategoryService = $jobCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize('viewAny', JobCategory::class);

        $jobCategories = JobCategory::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('slug', 'like', '%'.$search.'%');
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.job-categories.index', compact('jobCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', JobCategory::class);

        return view('admin.job-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCategoryRequest $request)
    {
        //
        $this->authorize('store', JobCategory::class);

        $this->jobCategoryService->create($request->validated());

        return redirect()
            ->route('job-categories.index')
            ->with('success', __('Job category created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $jobCategory)
    {
        //
        $this->authorize('edit', $jobCategory);

        return view('admin.job-categories.edit', compact('jobCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobCategoryRequest $request, JobCategory $jobCategory)
    {
        //
        $this->authorize('update', $jobCategory);

        $this->jobCategoryService->update($jobCategory, $request->validated());

        return redirect()
            ->route('job-categories.index')
            ->with('success', __('Job category updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        //
        $this->authorize('delete', $jobCategory);

        $this->jobCategoryService->delete($jobCategory);

        return redirect()
            ->route('job-categories.index')
            ->with('success', __('Job category deleted successfully'));
    }
}
