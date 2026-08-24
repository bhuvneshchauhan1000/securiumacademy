<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div x-data="{ search: '', visibleCount: 0 }" x-init="$watch('search', () => $nextTick(() => {
            const grid = $root.querySelector('#modules-grid');
            visibleCount = grid
                ? [...grid.querySelectorAll('a')].filter(a => !a.getAttribute('style')?.includes('display: none')).length
                : 0;
        }))" class="space-y-6">
        {{-- Welcome banner --}}
        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 px-6 py-8 sm:px-10 sm:py-10 text-white shadow-lg">
            <div class="absolute -top-16 -right-16 h-56 w-56 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-20 right-24 h-40 w-40 rounded-full bg-white/10"></div>
            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium text-indigo-100">{{ now()->format('l, F j, Y') }}</p>
                    <h1 class="mt-1 text-2xl font-bold sm:text-3xl">
                        {{ __('Welcome back, :name!', ['name' => Auth::user()->name]) }}</h1>
                    <p class="mt-2 max-w-xl text-sm text-indigo-100 sm:text-base">
                        {{ __('Here is an overview of your application. Use the search below to quickly jump to any module.') }}
                    </p>
                </div>
                @if (\App\Models\SiteSetting::get('site_logo'))
                    <img src="{{ asset(\App\Models\SiteSetting::get('site_logo')) }}"
                        alt="{{ config('app.name', 'Laravel') }}"
                        class="h-16 w-16 rounded-2xl bg-white/20 p-2 object-contain sm:h-20 sm:w-20" />
                @endif
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
            @can('view-universities')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Universities') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-300">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6M7 12h.01M12 12h.01M17 12h.01">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['universities'] }}</p>
                </div>
            @endcan

            @can('view-academies')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Academies') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 10l-10-5L2 10l10 5 10-5z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 12v4c0 1.5 3.5 3 6 3s6-1.5 6-3v-4"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 10v6"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['academies'] }}</p>
                </div>
            @endcan

            @can('view-course-categories')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Course Category') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300">
                            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11h8M8 15h5">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['courseCategories'] }}</p>
                </div>
            @endcan

            @can('view-blogs')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Blog Posts') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h8m-8 4h5m-9-9h14a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V9a2 2 0 012-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['blogs'] }}</p>
                </div>
            @endcan

            @can('view-blog-categories')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Blog Categories') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['blogCategories'] }}</p>
                </div>
            @endcan

            @can('view-users')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Users') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['users'] }}</p>
                </div>
            @endcan

            @can('view-roles')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Roles') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['roles'] }}</p>
                </div>
            @endcan

            @can('view-permissions')
                <div class="rounded-xl bg-white dark:bg-gray-800 p-5 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Permissions') }}</p>
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-3 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['permissions'] }}</p>
                </div>
            @endcan
        </div>

        {{-- Search --}}
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" x-model="search"
                placeholder="{{ __('Search modules... (e.g. users, roles, settings)') }}"
                class="w-full rounded-xl border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-800 py-3.5 pl-12 pr-4 text-sm text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            <button x-show="search" x-cloak @click="search = ''"
                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- All modules --}}
        <div>
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('All Modules') }}</h2>
                <span
                    class="rounded-full bg-gray-200 dark:bg-gray-700 px-3 py-1 text-xs font-medium text-gray-600 dark:text-gray-300">{{ __('Quick Access') }}</span>
            </div>

            <div id="modules-grid" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @can('view-universities')
                    <a href="{{ route('universities.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-teal-300 dark:hover:ring-teal-700"
                        x-show="!search || 'university configuration and management'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-teal-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-300">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6M7 12h.01M12 12h.01M17 12h.01">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Universities') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Create and manage universities') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-teal-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-academies')
                    <a href="{{ route('academies.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-amber-300 dark:hover:ring-amber-700"
                        x-show="!search || 'academies and academy management system'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-amber-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 10l-10-5L2 10l10 5 10-5z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 12v4c0 1.5 3.5 3 6 3s6-1.5 6-3v-4"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 10v6"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Academies') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ __('Manage academies ') }}
                                </div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-amber-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-course-categories')
                    <a href="{{ route('course-categories.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-fuchsia-300 dark:hover:ring-fuchsia-700"
                        x-show="!search || 'course category management system'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-fuchsia-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 11h8M8 15h5">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Course Category') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Manage application course category') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-fuchsia-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan
                
                @can('view-blogs')
                    <a href="{{ route('blogs.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-indigo-300 dark:hover:ring-indigo-700"
                        x-show="!search || 'blog posts blogs article'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-indigo-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h8m-8 4h5m-9-9h14a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V9a2 2 0 012-2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Blog Posts') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Create and manage blog posts') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-indigo-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-blog-categories')
                    <a href="{{ route('blog-categories.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-emerald-300 dark:hover:ring-emerald-700"
                        x-show="!search || 'blog categories category'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-emerald-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Blog Categories') }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Organize blog content by category') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-emerald-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-users')
                    <a href="{{ route('users.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-sky-300 dark:hover:ring-sky-700"
                        x-show="!search || 'users user members people account'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-sky-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Users') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ __('Manage application users') }}
                                </div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-sky-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-roles')
                    <a href="{{ route('roles.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-amber-300 dark:hover:ring-amber-700"
                        x-show="!search || 'roles role permissions access'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-amber-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Roles') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ __('Manage roles & permissions') }}
                                </div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-amber-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('view-permissions')
                    <a href="{{ route('permissions.index') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-fuchsia-300 dark:hover:ring-fuchsia-700"
                        x-show="!search || 'permissions permission access roles'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-fuchsia-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Permissions') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Manage application permissions') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-fuchsia-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                @can('edit-site-settings')
                    <a href="{{ route('site-settings.edit') }}"
                        class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-teal-300 dark:hover:ring-teal-700"
                        x-show="!search || 'site settings setting configuration logo'.includes(search.toLowerCase())">
                        <div class="absolute inset-x-0 top-0 h-1 bg-teal-500"></div>
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-300">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Site Settings') }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Configure site name, logo & contact info') }}</div>
                            </div>
                            <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-teal-500 dark:text-gray-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endcan

                <a href="{{ route('profile.edit') }}"
                    class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 p-6 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 transition hover:shadow-md hover:ring-rose-300 dark:hover:ring-rose-700"
                    x-show="!search || 'profile account settings password'.includes(search.toLowerCase())">
                    <div class="absolute inset-x-0 top-0 h-1 bg-rose-500"></div>
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-rose-100 dark:bg-rose-900/50 text-rose-600 dark:text-rose-300">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 dark:text-gray-100">{{ __('Profile') }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Update your profile & password') }}</div>
                        </div>
                        <svg class="h-5 w-5 text-gray-300 transition group-hover:translate-x-1 group-hover:text-rose-500 dark:text-gray-600"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </a>
            </div>

            {{-- No results --}}
            <div x-show="search && visibleCount === 0" x-cloak
                class="rounded-xl bg-white dark:bg-gray-800 p-8 text-center shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
                <svg class="mx-auto h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <p class="mt-3 text-sm font-medium text-gray-900 dark:text-gray-100">
                    {{ __('No modules match your search') }}</p>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Try a different keyword, e.g. "users" or "settings".') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>