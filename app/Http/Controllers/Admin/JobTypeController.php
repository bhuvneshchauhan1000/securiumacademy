<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobTypeRequest;
use App\Http\Requests\Admin\UpdateJobTypeRequest;
use App\Models\JobType;
use App\Services\JobTypeService;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    protected JobTypeService $jobTypeService;

    public function __construct(JobTypeService $jobTypeService)
    {
        $this->jobTypeService = $jobTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', JobType::class);
        $jobTypes = JobType::query()
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

        return view('admin.job-types.index', compact('jobTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', JobType::class);

        return view('admin.job-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobTypeRequest $request)
    {
        //
        $this->authorize('store', JobType::class);

        $this->jobTypeService->create($request->validated());

        return redirect()
            ->route('job-types.index')
            ->with('success', 'Job type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobType $jobType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobType $jobType)
    {
        //
        $this->authorize('edit', JobType::class);

        return view('admin.job-types.edit', compact('jobType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        //
        $this->authorize('update', $jobType);

        $this->jobTypeService->update($jobType, $request->validated());

        return redirect()
            ->route('job-types.index')
            ->with('success', 'Job type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobType)
    {
        //
        $this->authorize('delete', $jobType);

        $this->jobTypeService->delete($jobType);

        return redirect()
            ->route('job-types.index')
            ->with('success', 'Job type deleted successfully');
    }
}
