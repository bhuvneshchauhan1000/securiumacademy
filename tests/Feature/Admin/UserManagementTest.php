<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserManagementTest extends TestCase
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

    public function test_admin_can_view_users_index(): void
    {
        $this->actingAs($this->userWithRole('admin'))
            ->get(route('users.index'))
            ->assertOk();
    }

    public function test_editor_cannot_view_users_index(): void
    {
        $this->actingAs($this->userWithRole('editor'))
            ->get(route('users.index'))
            ->assertForbidden();
    }

    public function test_admin_can_create_user_with_role(): void
    {
        $admin = $this->userWithRole('admin');

        $editor = Role::where('name', 'editor')->first();

        $this->actingAs($admin)->post(route('users.store'), [
            'name' => 'New User',
            'email' => 'new@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => $editor->id,
        ])->assertRedirect(route('users.index'));

        $user = User::where('email', 'new@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->hasRole('editor'));
    }

    public function test_editor_cannot_create_user(): void
    {
        $this->actingAs($this->userWithRole('editor'))
            ->post(route('users.store'), [
                'name' => 'New User',
                'email' => 'new@example.com',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'role' => Role::where('name', 'editor')->first()->id,
            ])
            ->assertForbidden();
    }

    public function test_admin_can_update_user_and_role(): void
    {
        $admin = $this->userWithRole('admin');
        $user = $this->userWithRole('author');

        $editor = Role::where('name', 'editor')->first();

        $this->actingAs($admin)->put(route('users.update', $user), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'role' => $editor->id,
        ])->assertRedirect(route('users.index'));

        $user->refresh();

        $this->assertSame('Updated Name', $user->name);
        $this->assertTrue($user->hasRole('editor'));
    }

    public function test_admin_can_delete_user(): void
    {
        $admin = $this->userWithRole('admin');
        $user = User::factory()->create();

        $this->actingAs($admin)->delete(route('users.destroy', $user))
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_cannot_delete_own_account(): void
    {
        $admin = $this->userWithRole('admin');

        $this->actingAs($admin)->delete(route('users.destroy', $admin))
            ->assertSessionHas('error');

        $this->assertDatabaseHas('users', ['id' => $admin->id]);
    }
}
