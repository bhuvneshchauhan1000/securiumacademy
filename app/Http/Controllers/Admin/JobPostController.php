<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobPostRequest;
use App\Http\Requests\Admin\UpdateJobPostRequest;
use App\Models\JobCategory;
use App\Models\JobPost;
use App\Models\JobType;
use App\Services\JobPostService;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    protected JobPostService $jobPostService;

    public function __construct(JobPostService $jobPostService)
    {
        $this->jobPostService = $jobPostService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize('viewAny', JobPost::class);

        $jobPosts = JobPost::query()
            ->with(['jobType', 'jobCategory'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%'.$search.'%')
                        ->orWhere('slug', 'like', '%'.$search.'%')
                        ->orWhere('company_name', 'like', '%'.$search.'%');
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->when($request->filled('job_type_id'), function ($query) use ($request) {
                $query->where('job_type_id', $request->input('job_type_id'));
            })
            ->when($request->filled('job_category_id'), function ($query) use ($request) {
                $query->where('job_category_id', $request->input('job_category_id'));
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.job-posts.index', compact('jobPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', JobPost::class);

        $jobTypes = JobType::orderBy('name')->get();
        $jobCategories = JobCategory::orderBy('name')->get();

        return view('admin.job-posts.create', compact('jobTypes', 'jobCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {
        //
        $this->authorize('store', JobPost::class);

        $this->jobPostService->create(
            $request->validated(),
            $request->file('company_logo')
        );

        return redirect()
            ->route('job-posts.index')
            ->with('success', __('Job post created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        //
        $this->authorize('edit', $jobPost);

        $jobTypes = JobType::orderBy('name')->get();
        $jobCategories = JobCategory::orderBy('name')->get();

        return view('admin.job-posts.edit', compact('jobPost', 'jobTypes', 'jobCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPostRequest $request, JobPost $jobPost)
    {
        //
        $this->authorize('update', $jobPost);

        $this->jobPostService->update(
            $jobPost,
            $request->validated(),
            $request->file('company_logo')
        );

        return redirect()
            ->route('job-posts.index')
            ->with('success', __('Job post updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        //
        $this->authorize('delete', $jobPost);

        $this->jobPostService->delete($jobPost);

        return redirect()
            ->route('job-posts.index')
            ->with('success', __('Job post deleted successfully'));
    }
}
