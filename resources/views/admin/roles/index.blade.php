<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">
                <div class="flex flex-col gap-4 bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">{{ __('Role Management') }}</h3>
                            <p class="text-sm text-amber-100">{{ __('Define roles and the permissions they grant.') }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                        <form method="GET" action="{{ route('roles.index') }}" class="flex gap-2">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search roles...') }}" class="block w-56 rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-amber-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0" />
                            </div>
                            <button type="submit" class="inline-flex items-center rounded-md bg-white/20 px-3 py-2 text-xs font-semibold text-white uppercase tracking-widest backdrop-blur hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-transparent">{{ __('Search') }}</button>
                            @if (request('search'))
                                <a href="{{ route('roles.index') }}" class="inline-flex items-center rounded-md bg-white/20 px-3 py-2 text-xs font-semibold text-white uppercase tracking-widest backdrop-blur hover:bg-white/30">{{ __('Clear') }}</a>
                            @endif
                        </form>

                        @can('create-roles')
                            <a href="{{ route('roles.create') }}" class="inline-flex items-center justify-center gap-1 rounded-md bg-white px-4 py-2 text-xs font-semibold text-orange-700 uppercase tracking-widest shadow-sm hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                {{ __('New Role') }}
                            </a>
                        @endcan
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Permissions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Users</th>
                                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($roles as $role)
                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 text-white">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $role->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-full bg-emerald-100 dark:bg-emerald-900/50 px-2.5 py-0.5 text-xs font-medium text-emerald-700 dark:text-emerald-300">{{ $role->permissions->count() }} permissions</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-full bg-sky-100 dark:bg-sky-900/50 px-2.5 py-0.5 text-xs font-medium text-sky-700 dark:text-sky-300">{{ $role->users->count() }} users</span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm whitespace-nowrap">
                                        @can('edit-roles')
                                            <a href="{{ route('roles.edit', \App\Support\HashId::encode($role->id)) }}" class="inline-flex items-center gap-1 rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-indigo-500">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete-roles')
                                            <form method="POST" action="{{ route('roles.destroy', \App\Support\HashId::encode($role->id)) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ms-2 inline-flex items-center gap-1 rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-500">
                                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <svg class="mx-auto h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                        <p class="mt-3 text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('No roles found') }}</p>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ request('search') ? __('Try a different search term.') : __('Create your first role to get started.') }}</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($roles->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">
                        {{ $roles->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
