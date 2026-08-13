<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
            @include('partials.flash')

            <form method="POST" action="{{ route('permissions.update', \App\Support\HashId::encode($permission->id)) }}">
                @csrf
                @method('PUT')

                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl">
                    <div class="bg-gradient-to-r from-fuchsia-600 via-purple-600 to-violet-600 px-6 py-6 sm:px-8">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('Edit Permission') }}</h3>
                                <p class="text-sm text-fuchsia-100">{{ __('Update the permission :name.', ['name' => $permission->name]) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">
                        <div>
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __('Permission Details') }}</h4>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Permission Name')" />
                                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name', $permission->name)" required autofocus />
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Spaces and special characters are converted to dashes (e.g. "View Posts" becomes "view-posts").</p>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-900/50 sm:px-8">
                        <a href="{{ route('permissions.index') }}">
                            <x-secondary-button>{{ __('Cancel') }}</x-secondary-button>
                        </a>
                        <x-primary-button class="bg-purple-600 hover:bg-purple-500 focus:ring-purple-500">{{ __('Update Permission') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
