<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Universities') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}
                <div class="flex flex-col gap-4 bg-gradient-to-r from-teal-600 via-teal-600 to-cyan-600 px-6 py-5 sm:px-8 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Title --}}
                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            <svg class="h-6 w-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 21h18M5 21V10l7-4 7 4v11M8 21v-7h3v7m2 0v-7h3v7M4 10h16M12 3l8 4H4l8-4z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('University Management') }}
                            </h3>

                            <p class="text-sm text-teal-100">
                                {{ __('Create, edit and manage universities.') }}
                            </p>

                        </div>

                    </div>


                    {{-- Search + Create --}}
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                        {{-- Search --}}
                        <form method="GET"
                            action="{{ route('universities.index') }}"
                            class="flex flex-col gap-2 sm:flex-row">

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                    <svg class="h-4 w-4 text-teal-100"
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
                                    placeholder="{{ __('Search universities...') }}"
                                    class="block w-full rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-teal-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 sm:w-56"
                                >

                            </div>


                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">

                                {{ __('Search') }}

                            </button>


                            @if (request('search'))

                                <a href="{{ route('universities.index') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30">

                                    {{ __('Clear') }}

                                </a>

                            @endif

                        </form>


                        {{-- Create --}}
                        @can('create-universities')

                            <a href="{{ route('universities.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-teal-700 shadow-sm hover:bg-teal-50 focus:outline-none focus:ring-2 focus:ring-white">

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

                                {{ __('New University') }}

                            </a>

                        @endcan

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Empty State --}}
                {{-- ========================================================= --}}
                @if ($universities->count() === 0)

                    <div class="px-6 py-16 sm:px-8">

                        <div class="flex flex-col items-center justify-center text-center">

                            {{-- Icon --}}
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-teal-100 dark:bg-teal-900/50">

                                <svg class="h-8 w-8 text-teal-600 dark:text-teal-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 21h18M5 21V10l7-4 7 4v11M8 21v-7h3v7m2 0v-7h3v7M4 10h16M12 3l8 4H4l8-4z">
                                    </path>

                                </svg>

                            </div>


                            {{-- Title --}}
                            <h3 class="mt-5 text-lg font-semibold text-gray-900 dark:text-gray-100">

                                @if (request('search'))
                                    {{ __('No Universities Found') }}
                                @else
                                    {{ __('No Universities') }}
                                @endif

                            </h3>


                            {{-- Description --}}
                            <p class="mt-2 max-w-md text-sm text-gray-500 dark:text-gray-400">

                                @if (request('search'))

                                    {{ __('No universities matched your search. Try a different keyword.') }}

                                @else

                                    {{ __('You don’t have any universities yet. Create your first university to get started.') }}

                                @endif

                            </p>


                            {{-- Create --}}
                            @can('create-universities')

                                @if (!request('search'))

                                    <a href="{{ route('universities.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-md bg-teal-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">

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

                                        {{ __('Create University') }}

                                    </a>

                                @endif

                            @endcan

                        </div>

                    </div>

                @else


                    {{-- ========================================================= --}}
                    {{-- University Table --}}
                    {{-- ========================================================= --}}
                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            {{-- Table Header --}}
                            <thead class="bg-gray-50 dark:bg-gray-700/50">

                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('University') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Country') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Website') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Status') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Sort Order') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Courses') }}
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Actions') }}
                                    </th>

                                </tr>

                            </thead>


                            {{-- Table Body --}}
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($universities as $university)

                                    <tr class="transition hover:bg-teal-50/50 dark:hover:bg-teal-900/10">


                                        {{-- ================================================= --}}
                                        {{-- University --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            <div class="flex items-center gap-3">

                                                {{-- Logo --}}
                                                @if ($university->logo)

                                                    <img
                                                        src="{{ Storage::url($university->logo) }}"
                                                        alt="{{ $university->name }}"
                                                        class="h-12 w-12 shrink-0 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                                                    >

                                                @else

                                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-300">

                                                        <span class="text-lg font-semibold">
                                                            {{ strtoupper(substr($university->name, 0, 1)) }}
                                                        </span>

                                                    </div>

                                                @endif


                                                {{-- Name --}}
                                                <div class="min-w-0">

                                                    <p class="max-w-sm truncate text-sm font-semibold text-gray-900 dark:text-gray-100">

                                                        {{ $university->name }}

                                                    </p>

                                                    <p class="mt-0.5 max-w-sm truncate text-xs text-gray-500 dark:text-gray-400">

                                                        {{ $university->slug }}

                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Country --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            @if ($university->country)

                                                <span class="inline-flex items-center rounded-full bg-teal-100 px-2.5 py-1 text-xs font-medium text-teal-700 dark:bg-teal-900/50 dark:text-teal-300">

                                                    {{ $university->country }}

                                                </span>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">

                                                    {{ __('N/A') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Website --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            @if ($university->website_url)

                                                <a href="{{ $university->website_url }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="inline-flex items-center gap-1 text-sm font-medium text-teal-600 hover:text-teal-500 dark:text-teal-400 dark:hover:text-teal-300">

                                                    {{ __('Visit Website') }}

                                                    <svg class="h-3.5 w-3.5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-7-7h7m0 0v7m0-7L10 14">
                                                        </path>

                                                    </svg>

                                                </a>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">

                                                    {{ __('No Website') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Status --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            @if ($university->status)

                                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                                    {{ ucfirst($university->status) }}

                                                </span>

                                            @else

                                                <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700 dark:bg-gray-900/50 dark:text-gray-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-gray-500"></span>

                                                    {{ __('Inactive') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Sort Order --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">

                                                {{ $university->sort_order ?? 0 }}

                                            </span>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Courses --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            <a href="{{ route('courses.index', ['university_id' => $university->id]) }}"
                                                title="{{ __('View courses of this university') }}"
                                                class="inline-flex items-center gap-1.5 rounded-full bg-purple-100 px-2.5 py-1 text-xs font-semibold text-purple-700 transition hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-purple-900/50 dark:text-purple-300 dark:hover:bg-purple-900">

                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                    </path>

                                                </svg>

                                                {{ $university->courses_count }} {{ __('Courses') }}

                                            </a>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Actions --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4 text-right text-sm whitespace-nowrap">

                                            <div class="flex items-center justify-end gap-2">

                                                {{-- Edit --}}
                                                @can('edit-universities')

                                                    <a href="{{ route('universities.edit', \App\Support\HashId::encode($university->id)) }}"
                                                        class="inline-flex items-center gap-1 rounded-md bg-teal-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-500">

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


                                                {{-- Delete --}}
                                                @can('delete-universities')

                                                    <form
                                                        method="POST"
                                                        action="{{ route('universities.destroy', \App\Support\HashId::encode($university->id)) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to delete this university?') }}');"
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


                    {{-- ========================================================= --}}
                    {{-- Pagination --}}
                    {{-- ========================================================= --}}
                    @if ($universities->hasPages())

                        <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">

                            {{ $universities->withQueryString()->links() }}

                        </div>

                    @endif

                @endif

            </div>

        </div>

    </div>

</x-app-layout>
