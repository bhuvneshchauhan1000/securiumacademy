<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use App\Services\UniversityService;

class UniversityController extends Controller
{
    protected UniversityService $universityService;

    public function __construct(UniversityService $universityService)
    {
        $this->universityService = $universityService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize("viewAny", University::class);
        $universities = University::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('website_url', 'like', "%{$search}%")
                        ->orWhere('country', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();
        return view("admin.universities.index", compact("universities"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize("create", University::class);
        return view("admin.universities.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize("store", University::class);

        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "country" => ["nullable", "string"],
            "description" => ["nullable", "string"],
            "website_url" => ["nullable", "string"],
            "sort_order" => ["nullable", "integer", "min:0"],
            "status" => ["required", "in:active,inactive"],
            "logo" => ["nullable", "image", "mimes:jpeg,jpg,png,webp", 'max:20480'],
        ]);

        $this->universityService->create($validated);
        return redirect()->route('universities.index')->with('success', 'University Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        $this->authorize('edit', University::class);

        return view('admin.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        $this->authorize('update', $university);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            "website_url" => ["nullable", "string"],
            "sort_order" => ["nullable", "integer", "min:0"],
            'logo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:20480'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $this->universityService->update($university, $validated, $request->file('logo'));
        return redirect()->route('universities.index')->with('success', 'University updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        //
        $this->authorize('delete', $university);
        $this->universityService->delete($university);
        return redirect()->route('universities.index')->with('success','University Deleted Successfully');
    }
}
