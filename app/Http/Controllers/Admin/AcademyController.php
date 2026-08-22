<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Services\AcademyService;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    protected AcademyService $academyService;

    public function __construct(AcademyService $academyService)
    {
        $this->academyService = $academyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize("viewAny", Academy::class);
        $academies = Academy::query()
        ->when($request->filled("filled"),function ($query) use ($request){
            $search = trim($request->input("search"));
            $query->where(function ($q) use ($search){
                $q->where("name","like","%".$search."%")
                ->orWhere("country","like","%".$search."%")
                ->orWhere("website_url","like","%".$search."%");
                
            });
        })->latest()
        ->paginate(15)
        ->withQueryString();
        return view('admin.academies.index', compact('academies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Academy::class);
        return view('admin.academies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('store', Academy::class);
        $validated = $request->validate([
            'name'=> ['required','string','max:255'],
            'country'=> ['nullable','string'],
            'description'=> ['nullable','string'],
            'website_url'=> ['nullable','string'],
            'status'=> ['required','in:active,inactive'],
            'logo' => ['nullable','image','mimes:jpeg,jpg,png,webp','max:20480']
        ]);

        $this->academyService->create($validated, $request->hasFile('logo') ? $request->file('logo') : null);
        return redirect()->route('academies.index')->with('success','Academy Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Academy $academy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academy $academy)
    {
        //
        $this->authorize('edit', Academy::class);
        return view('admin.academies.edit', compact('academy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academy $academy)
    {
        //
        $this->authorize('update', $academy);
        $validated = $request->validate([
            'name'=> ['required','string','max:255'],
            'country'=> ['nullable','string'],
            'description'=> ['nullable','string'],
            'website_url'=> ['nullable','string'],
            'status'=> ['required','in:active,inactive'],
            'logo'=> ['nullable','image','mimes:jpeg,jpg,png,webp','max:20480']
        ]);
        $this->academyService->update($academy, $validated, $request->hasFile('logo') ? $request->file('logo') : null);
        return redirect()->route('academies.index')->with('success','Academy Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academy $academy)
    {
        //
        $this->authorize('delete', $academy);
        $this->academyService->delete($academy);
        return redirect()->route('academies.index')->with('success','Academy Delete Successfully');
    }
}
