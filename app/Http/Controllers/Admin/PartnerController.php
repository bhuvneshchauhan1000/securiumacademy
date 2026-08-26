<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePartnerRequest;
use App\Http\Requests\Admin\UpdatePartnerRequest;
use App\Models\Partner;
use App\Services\PartnerService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected PartnerService $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Partner::class);
        $partners = Partner::query()
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

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Partner::class);

        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $this->authorize('store', Partner::class);

        $this->partnerService->create($validated = $request->validated(), $request->hasFile('logo') ? $request->file('logo') : null);

        return redirect()->route('partners.index')->with('success', 'Partner Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $this->authorize('edit', $partner);

        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $this->authorize('update', $partner);

        $this->partnerService->update($partner, $validated = $request->validated(), $request->hasFile('logo') ? $request->file('logo') : null);

        return redirect()->route('partners.index')->with('success', 'Partner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $this->authorize('delete', $partner);
        $this->partnerService->delete($partner);

        return redirect()->route('partners.index')->with('success', 'Partner Deleted Successfully');
    }
}
