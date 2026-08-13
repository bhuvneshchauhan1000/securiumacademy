<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="space-y-6">
                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">
                    <div class="bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-600 px-6 py-8 sm:px-8">
                        <div class="flex flex-wrap items-center gap-5">
                            <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-white/20 text-3xl font-bold text-white ring-2 ring-white/40">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-2xl font-bold text-white">{{ $user->name }}</h3>
                                <p class="text-sm text-sky-100">{{ $user->email }}</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @forelse ($user->roles as $role)
                                        <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">{{ ucwords($role->name) }}</span>
                                    @empty
                                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-sky-100">{{ __('No role assigned') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('profile.partials.update-profile-information-form')

                @include('profile.partials.update-password-form')

                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
