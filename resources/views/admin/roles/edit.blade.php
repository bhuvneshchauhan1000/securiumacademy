<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
            @include('partials.flash')

            <form method="POST" action="{{ route('roles.update', \App\Support\HashId::encode($role->id)) }}">
                @csrf
                @method('PUT')

                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl">
                    <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 px-6 py-6 sm:px-8">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('Edit Role') }}</h3>
                                <p class="text-sm text-amber-100">{{ __('Update the name and permissions for :name.', ['name' => $role->name]) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">
                        <div>
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Role Details') }}</h4>
                            </div>

                            <div class="mt-4 max-w-lg">
                                <x-input-label for="name" :value="__('Role Name')" />
                                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name', $role->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-8 border-t border-gray-100 pt-8 dark:border-gray-700">
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Permissions') }}</h4>
                            </div>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Select the permissions to assign to this role. Use the toggle in each group to select all.</p>

                            <div class="mt-4">
                                @include('admin.roles.partials.permission-checkboxes')
                                <x-input-error :messages="$errors->get('permissions')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-900/50 sm:px-8">
                        <a href="{{ route('roles.index') }}">
                            <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
                        </a>
                        <x-primary-button class="bg-orange-600 hover:bg-orange-500 focus:ring-orange-500">{{ __('Update Role') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
