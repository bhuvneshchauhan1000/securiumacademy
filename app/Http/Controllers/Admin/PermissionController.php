<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     */
    public function index(Request $request): View
    {
        $permissions = Permission::with('roles')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('guard_name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create(): View
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $name = Str::slug($request->name);

        if (Permission::where('name', $name)->where('guard_name', 'web')->exists()) {
            return back()->withErrors(['name' => 'A permission with this name already exists.'])->withInput();
        }

        Permission::create([
            'name' => $name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission): View
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $name = Str::slug($request->name);

        $exists = Permission::where('name', $name)
            ->where('guard_name', 'web')
            ->where('id', '!=', $permission->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['name' => 'A permission with this name already exists.'])->withInput();
        }

        $permission->update(['name' => $name]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
