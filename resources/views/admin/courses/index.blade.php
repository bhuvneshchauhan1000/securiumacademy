<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}

                <div class="flex flex-col gap-4 bg-gradient-to-r from-sky-500 via-sky-600 to-blue-600 px-6 py-5 sm:px-8 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Title --}}
                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            {{-- Course / Book Icon --}}
                            <svg class="h-6 w-6 shrink-0 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 19.5A2.5 2.5 0 016.5 17H20">
                                </path>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z">
                                </path>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 6h8M8 10h8M8 14h5">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Course Management') }}
                            </h3>

                            <p class="text-sm text-sky-100">
                                {{ __('Create, edit and manage courses.') }}
                            </p>

                        </div>

                    </div>


                    {{-- Search + Create --}}
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                        {{-- Search --}}
                        <form method="GET"
                            action="{{ route('courses.index') }}"
                            class="flex flex-col gap-2 sm:flex-row">

                            @if (!empty($academyFilter))
                                <input type="hidden" name="academy_id" value="{{ $academyFilter->id }}">
                            @endif

                            @if (!empty($universityFilter))
                                <input type="hidden" name="university_id" value="{{ $universityFilter->id }}">
                            @endif

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                    <svg class="h-4 w-4 text-sky-100"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z">
                                        </path>

                                    </svg>

                                </div>

                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="{{ __('Search courses...') }}"
                                    class="block w-full rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-sky-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 sm:w-56"
                                >

                            </div>


                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">

                                {{ __('Search') }}

                            </button>


                            @if (request('search'))

                                <a href="{{ route('courses.index') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30">

                                    {{ __('Clear') }}

                                </a>

                            @endif

                        </form>


                        {{-- Create --}}
                        @can('create-courses')

                            <a href="{{ route('courses.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-sky-700 shadow-sm hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-white">

                                <svg class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4">
                                    </path>

                                </svg>

                                {{ __('New Course') }}

                            </a>

                        @endcan

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Source Filter Notice --}}
                {{-- ========================================================= --}}

                @if (!empty($academyFilter) || !empty($universityFilter))

                    <div
                        class="mt-6 flex flex-wrap items-center justify-between gap-3 rounded-lg border border-sky-200 bg-sky-50 px-4 py-3 dark:border-sky-800 dark:bg-sky-900/20">

                        <p class="flex items-center gap-2 text-sm text-sky-800 dark:text-sky-300">

                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                </path>

                            </svg>

                            {{ __('Showing courses for') }}

                            <span class="font-semibold">
                                {{ $academyFilter?->name ?? $universityFilter?->name }}
                            </span>

                            <span class="rounded-full bg-sky-200 px-2 py-0.5 text-xs font-semibold text-sky-800 dark:bg-sky-800 dark:text-sky-200">
                                {{ $courses->total() }} {{ __('courses') }}
                            </span>

                        </p>

                        <a href="{{ route('courses.index') }}"
                            class="text-xs font-semibold uppercase tracking-widest text-sky-700 hover:text-sky-500 dark:text-sky-300 dark:hover:text-sky-100">

                            {{ __('Show All Courses') }}

                        </a>

                    </div>

                @endif


                {{-- ========================================================= --}}
                {{-- Empty State --}}
                {{-- ========================================================= --}}

                @if ($courses->count() === 0)

                    <div class="px-6 py-16 sm:px-8">

                        <div class="flex flex-col items-center justify-center text-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-sky-100 dark:bg-sky-900/50">

                                <svg class="h-8 w-8 text-sky-600 dark:text-sky-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 19.5A2.5 2.5 0 016.5 17H20">
                                    </path>

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z">
                                    </path>

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M8 6h8M8 10h8M8 14h5">
                                    </path>

                                </svg>

                            </div>


                            <h3 class="mt-5 text-lg font-semibold text-gray-900 dark:text-gray-100">

                                @if (request('search'))
                                    {{ __('No Courses Found') }}
                                @else
                                    {{ __('No Courses') }}
                                @endif

                            </h3>


                            <p class="mt-2 max-w-md text-sm text-gray-500 dark:text-gray-400">

                                @if (request('search'))

                                    {{ __('No courses matched your search. Try a different keyword.') }}

                                @else

                                    {{ __('You don’t have any courses yet. Create your first course to get started.') }}

                                @endif

                            </p>


                            @can('create-courses')

                                @if (!request('search'))

                                    <a href="{{ route('courses.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-md bg-sky-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

                                        <svg class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4">
                                            </path>

                                        </svg>

                                        {{ __('Create Course') }}

                                    </a>

                                @endif

                            @endcan

                        </div>

                    </div>

                @else

                    {{-- ========================================================= --}}
                    {{-- Course Table --}}
                    {{-- ========================================================= --}}

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            <thead class="bg-gray-50 dark:bg-gray-700/50">

                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Course') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Category') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Course Source') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Level') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Fee') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Status') }}
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Actions') }}
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($courses as $course)

                                    <tr class="transition hover:bg-sky-50/50 dark:hover:bg-sky-900/10">

                                        {{-- Course --}}
                                        <td class="px-6 py-4">

                                            <div class="flex items-center gap-3">

                                                @if ($course->featured_image)

                                                    <img
                                                        src="{{ Storage::url($course->featured_image) }}"
                                                        alt="{{ $course->name }}"
                                                        class="h-12 w-16 shrink-0 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                                                    >

                                                @else

                                                    <div class="flex h-12 w-16 shrink-0 items-center justify-center rounded-lg bg-sky-100 text-sky-600 dark:bg-sky-900/50 dark:text-sky-300">

                                                        <svg class="h-6 w-6"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.8"
                                                                d="M4 19.5A2.5 2.5 0 016.5 17H20">
                                                            </path>

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.8"
                                                                d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z">
                                                            </path>

                                                        </svg>

                                                    </div>

                                                @endif


                                                <div class="min-w-0">

                                                    <div class="flex items-center gap-2">

                                                        <p class="max-w-xs truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                            {{ $course->name }}
                                                        </p>

                                                        @if ($course->is_featured)

                                                            <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold text-amber-700 dark:bg-amber-900/50 dark:text-amber-300">
                                                                {{ __('Featured') }}
                                                            </span>

                                                        @endif

                                                    </div>

                                                    <p class="mt-0.5 max-w-xs truncate text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $course->slug }}
                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- Category --}}
                                        <td class="px-6 py-4">

                                            @if ($course->courseCategory)

                                                <span class="inline-flex items-center rounded-full bg-fuchsia-100 px-2.5 py-1 text-xs font-medium text-fuchsia-700 dark:bg-fuchsia-900/50 dark:text-fuchsia-300">
                                                    {{ $course->courseCategory->name }}
                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">
                                                    {{ __('Uncategorized') }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Course Source --}}
                                        <td class="px-6 py-4">

                                            @if ($course->academy)

                                                <a href="{{ route('courses.index', ['academy_id' => $course->academy->id]) }}"
                                                    title="{{ __('View all courses of this academy') }}"
                                                    class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-medium text-amber-700 transition hover:bg-amber-200 dark:bg-amber-900/50 dark:text-amber-300 dark:hover:bg-amber-900">

                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                        </path>

                                                    </svg>

                                                    {{ $course->academy->name }}

                                                </a>

                                            @elseif ($course->university)

                                                <a href="{{ route('courses.index', ['university_id' => $course->university->id]) }}"
                                                    title="{{ __('View all courses of this university') }}"
                                                    class="inline-flex items-center gap-1 rounded-full bg-teal-100 px-2.5 py-1 text-xs font-medium text-teal-700 transition hover:bg-teal-200 dark:bg-teal-900/50 dark:text-teal-300 dark:hover:bg-teal-900">

                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 14l9-5-9-5-9 5 9 5z">
                                                        </path>

                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 12v5c0 1.657 3.134 3 7 3s7-1.343 7-3v-5">
                                                        </path>

                                                    </svg>

                                                    {{ $course->university->name }}

                                                </a>

                                            @else

                                                <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600 dark:bg-gray-800 dark:text-gray-400">

                                                    {{ __('Standalone') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- Level --}}
                                        <td class="px-6 py-4">

                                            @if ($course->course_level)

                                                <span class="inline-flex items-center rounded-full bg-sky-100 px-2.5 py-1 text-xs font-medium text-sky-700 dark:bg-sky-900/50 dark:text-sky-300">
                                                    {{ ucfirst($course->course_level) }}
                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">
                                                    {{ __('N/A') }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Fee --}}
                                        <td class="px-6 py-4">

                                            @if ($course->discount_fee !== null)

                                                <div class="flex flex-col">

                                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                        {{ number_format($course->discount_fee, 2) }}
                                                    </span>

                                                    @if ($course->fee !== null && $course->fee > $course->discount_fee)

                                                        <span class="text-xs text-gray-400 line-through dark:text-gray-500">
                                                            {{ number_format($course->fee, 2) }}
                                                        </span>

                                                    @endif

                                                </div>

                                            @elseif ($course->fee !== null)

                                                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                    {{ number_format($course->fee, 2) }}
                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">
                                                    {{ __('Free') }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Status --}}
                                        <td class="px-6 py-4">

                                            @if ($course->status)

                                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                    {{ ucfirst($course->status) }}

                                                </span>

                                            @else

                                                <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700 dark:bg-gray-900/50 dark:text-gray-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-gray-500"></span>

                                                    {{ __('Inactive') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- Actions --}}
                                        <td class="px-6 py-4 text-right text-sm whitespace-nowrap">

                                            <div class="flex items-center justify-end gap-2">

                                                @can('edit-courses')

                                                    <a href="{{ route('courses.edit', \App\Support\HashId::encode($course->id)) }}"
                                                        class="inline-flex items-center gap-1 rounded-md bg-sky-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500">

                                                        <svg class="h-3.5 w-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>

                                                        </svg>

                                                        {{ __('Edit') }}

                                                    </a>

                                                @endcan


                                                @can('delete-courses')

                                                    <form
                                                        method="POST"
                                                        action="{{ route('courses.destroy', \App\Support\HashId::encode($course->id)) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to delete this course?') }}');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="inline-flex items-center gap-1 rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">

                                                            <svg class="h-3.5 w-3.5"
                                                                fill="none"
                                                                stroke="currentColor"
                                                                viewBox="0 0 24 24">

                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 01-1 1v3M4 7h16">
                                                                </path>

                                                            </svg>

                                                            {{ __('Delete') }}

                                                        </button>

                                                    </form>

                                                @endcan

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    @if ($courses->hasPages())

                        <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">

                            {{ $courses->withQueryString()->links() }}

                        </div>

                    @endif

                @endif

            </div>

        </div>

    </div>

</x-app-layout>
