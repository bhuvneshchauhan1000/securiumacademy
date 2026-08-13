<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class PermissionManagementTest extends TestCase
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

    public function test_admin_can_view_permissions_index(): void
    {
        $this->actingAs($this->userWithRole('admin'))
            ->get(route('permissions.index'))
            ->assertOk()
            ->assertSee('Permissions')
            ->assertSee('create-permissions');
    }

    public function test_editor_cannot_access_permissions(): void
    {
        $this->actingAs($this->userWithRole('editor'))
            ->get(route('permissions.index'))
            ->assertForbidden();
    }

    public function test_admin_can_create_permission(): void
    {
        $admin = $this->userWithRole('admin');

        $this->actingAs($admin)->post(route('permissions.store'), [
            'name' => 'publish posts',
        ])->assertRedirect(route('permissions.index'));

        $this->assertDatabaseHas('permissions', [
            'name' => 'publish-posts',
            'guard_name' => 'web',
        ]);
    }

    public function test_duplicate_permission_is_rejected(): void
    {
        $admin = $this->userWithRole('admin');

        $this->actingAs($admin)->post(route('permissions.store'), [
            'name' => 'view blogs',
        ])->assertSessionHasErrors('name');

        $this->assertSame(1, Permission::where('name', 'view-blogs')->count());
    }

    public function test_admin_can_update_permission(): void
    {
        $admin = $this->userWithRole('admin');
        $permission = Permission::where('name', 'view-blogs')->first();

        $this->actingAs($admin)->put(route('permissions.update', $permission), [
            'name' => 'view articles',
        ])->assertRedirect(route('permissions.index'));

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'view-articles',
        ]);
    }

    public function test_admin_can_delete_permission(): void
    {
        $admin = $this->userWithRole('admin');
        $permission = Permission::create(['name' => 'temp-permission', 'guard_name' => 'web']);

        $this->actingAs($admin)->delete(route('permissions.destroy', $permission))
            ->assertRedirect(route('permissions.index'));

        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }
}
