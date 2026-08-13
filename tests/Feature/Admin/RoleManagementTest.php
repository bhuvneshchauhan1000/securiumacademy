<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    private function userWithRole(string $role): User
    {
        $user = User::factory()->create();
        $user->assignRole($role);

        return $user;
    }

    public function test_admin_can_view_roles_index(): void
    {
        $this->actingAs($this->userWithRole('admin'))
            ->get(route('roles.index'))
            ->assertOk()
            ->assertSee('admin')
            ->assertSee('editor');
    }

    public function test_editor_cannot_access_roles(): void
    {
        $this->actingAs($this->userWithRole('editor'))
            ->get(route('roles.index'))
            ->assertForbidden();
    }

    public function test_admin_can_create_role_with_permissions(): void
    {
        $admin = $this->userWithRole('admin');

        $this->actingAs($admin)->post(route('roles.store'), [
            'name' => 'manager',
            'permissions' => ['view-dashboard', 'view-blogs'],
        ])->assertRedirect(route('roles.index'));

        $role = Role::where('name', 'manager')->first();

        $this->assertNotNull($role);
        $this->assertTrue($role->hasPermissionTo('view-blogs'));
        $this->assertFalse($role->hasPermissionTo('view-roles'));
    }

    public function test_role_name_must_be_unique(): void
    {
        $this->actingAs($this->userWithRole('admin'))
            ->post(route('roles.store'), [
                'name' => 'admin',
            ])
            ->assertSessionHasErrors('name');
    }

    public function test_admin_can_update_role_permissions(): void
    {
        $admin = $this->userWithRole('admin');
        $role = Role::where('name', 'author')->first();

        $this->actingAs($admin)->put(route('roles.update', $role), [
            'name' => 'author',
            'permissions' => ['view-dashboard'],
        ])->assertRedirect(route('roles.index'));

        $role->refresh();

        $this->assertTrue($role->hasPermissionTo('view-dashboard'));
        $this->assertFalse($role->hasPermissionTo('view-blogs'));
    }

    public function test_role_assigned_to_users_cannot_be_deleted(): void
    {
        $admin = $this->userWithRole('admin');
        $role = Role::where('name', 'editor')->first();

        $this->userWithRole('editor');

        $this->actingAs($admin)->delete(route('roles.destroy', $role))
            ->assertSessionHas('error');

        $this->assertDatabaseHas('roles', ['id' => $role->id]);
    }

    public function test_unassigned_role_can_be_deleted(): void
    {
        $admin = $this->userWithRole('admin');
        $role = Role::create(['name' => 'temp', 'guard_name' => 'web']);

        $this->actingAs($admin)->delete(route('roles.destroy', $role))
            ->assertRedirect(route('roles.index'));

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }
}
