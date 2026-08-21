<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index(Request $request): View
    {
        $roles = Role::with(['permissions', 'users'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create(): View
    {
        $permissionGroups = $this->groupedPermissions();

        return view('admin.roles.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role): View
    {
        $permissionGroups = $this->groupedPermissions();
        $rolePermissions = $role->permissions->pluck('name')->all();

        return view('admin.roles.edit', compact('role', 'permissionGroups', 'rolePermissions'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,'.$role->id],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if ($role->users()->count() > 0) {
            return back()->with('error', 'Cannot delete a role that is assigned to users.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    /**
     * Group all permissions by their module name.
     */
    protected function groupedPermissions(): array
    {
        $groups = [];

        foreach (Permission::orderBy('name')->get() as $permission) {
            $module = Str::after($permission->name, '-');
            $groups[$module][] = $permission;
        }

        ksort($groups);

        return $groups;
    }
}
