<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            @include('partials.flash')

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl">
                    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-sky-600 px-6 py-6 sm:px-8">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('Create New User') }}</h3>
                                <p class="text-sm text-indigo-100">{{ __('Add a new user to the application and assign their role.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 p-6 sm:p-8">
                        {{-- Account Information --}}
                        <div>
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Account Information') }}</h4>
                            </div>

                            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="e.g. John Doe" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="e.g. john@example.com" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="border-t border-gray-100 pt-8 dark:border-gray-700">
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Password') }}</h4>
                            </div>

                            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Role --}}
                        <div class="border-t border-gray-100 pt-8 dark:border-gray-700">
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Role') }}</h4>
                            </div>

                            <div class="mt-4">
                                <label for="role" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Assign Role') }}</label>
                                <div class="mt-2 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                    @forelse ($roles as $role)
                                        <label class="relative flex cursor-pointer items-center rounded-lg border border-gray-200 dark:border-gray-700 p-3 transition hover:border-indigo-400 dark:hover:border-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50 dark:has-[:checked]:bg-indigo-900/30">
                                            <input type="radio" name="role" value="{{ $role->id }}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" @checked(old('role') == $role->id) />
                                            <div class="ms-3">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $role->name }}</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $role->permissions->count() }} permissions</div>
                                            </div>
                                        </label>
                                    @empty
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('No roles available. Create a role first.') }}</p>
                                    @endforelse
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-900/50 sm:px-8">
                        <a href="{{ route('users.index') }}">
                            <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
                        </a>
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-500">{{ __('Create User') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
