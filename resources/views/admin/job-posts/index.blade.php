<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Job Posts') }}
        </h2>
    </x-slot>

    @php
        $statusBadges = [
            'draft' => 'bg-gray-100 text-gray-700 dark:bg-gray-900/50 dark:text-gray-300',
            'published' => 'bg-green-100 text-green-700 dark:bg-green-900/50 dark:text-green-300',
            'paused' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/50 dark:text-amber-300',
            'closed' => 'bg-red-100 text-red-700 dark:bg-red-900/50 dark:text-red-300',
            'expired' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/50 dark:text-purple-300',
        ];

        $statusDots = [
            'draft' => 'bg-gray-500',
            'published' => 'bg-green-500',
            'paused' => 'bg-amber-500',
            'closed' => 'bg-red-500',
            'expired' => 'bg-purple-500',
        ];
    @endphp

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}

                <div class="flex flex-col gap-4 bg-gradient-to-r from-violet-600 via-purple-600 to-fuchsia-600 px-6 py-5 sm:px-8 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Title --}}
                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            {{-- Job Post Icon --}}
                            <svg class="h-6 w-6 shrink-0 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-8.995-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Job Post Management') }}
                            </h3>

                            <p class="text-sm text-violet-100">
                                {{ __('Create, edit and manage job posts.') }}
                            </p>

                        </div>

                    </div>


                    {{-- Search + Create --}}
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                        {{-- Search + Filters --}}
                        <form method="GET"
                            action="{{ route('job-posts.index') }}"
                            class="flex flex-col gap-2 sm:flex-row">

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                    <svg class="h-4 w-4 text-violet-100"
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
                                    placeholder="{{ __('Search jobs, companies...') }}"
                                    class="block w-full rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-violet-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 sm:w-52"
                                >

                            </div>


                            {{-- Status Filter --}}
                            <select
                                name="status"
                                class="rounded-md border-transparent bg-white/20 py-2 pr-8 pl-3 text-sm text-white shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 [&>option]:text-gray-900"
                            >

                                <option value="">{{ __('All Statuses') }}</option>

                                @foreach (['draft', 'published', 'paused', 'closed', 'expired'] as $statusOption)

                                    <option value="{{ $statusOption }}" @selected(request('status') === $statusOption)>
                                        {{ ucfirst($statusOption) }}
                                    </option>

                                @endforeach

                            </select>


                            {{-- Job Type Filter --}}
                            <select
                                name="job_type_id"
                                class="rounded-md border-transparent bg-white/20 py-2 pr-8 pl-3 text-sm text-white shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 [&>option]:text-gray-900"
                            >

                                <option value="">{{ __('All Types') }}</option>

                                @foreach (\App\Models\JobType::orderBy('name')->get() as $typeFilter)

                                    <option value="{{ $typeFilter->id }}" @selected(request('job_type_id') == $typeFilter->id)>
                                        {{ $typeFilter->name }}
                                    </option>

                                @endforeach

                            </select>


                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">

                                {{ __('Filter') }}

                            </button>


                            @if (request('search') || request('status') || request('job_type_id'))

                                <a href="{{ route('job-posts.index') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30">

                                    {{ __('Clear') }}

                                </a>

                            @endif

                        </form>


                        {{-- Create --}}
                        @can('create-job-posts')

                            <a href="{{ route('job-posts.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-violet-700 shadow-sm hover:bg-violet-50 focus:outline-none focus:ring-2 focus:ring-white">

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4">
                                    </path>

                                </svg>

                                {{ __('New Job Post') }}

                            </a>

                        @endcan

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Empty State --}}
                {{-- ========================================================= --}}

                @if ($jobPosts->count() === 0)

                    <div class="px-6 py-16 sm:px-8">

                        <div class="flex flex-col items-center justify-center text-center">

                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-violet-100 dark:bg-violet-900/50">

                                <svg class="h-8 w-8 text-violet-600 dark:text-violet-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-8.995-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>

                                </svg>

                            </div>


                            <h3 class="mt-5 text-lg font-semibold text-gray-900 dark:text-gray-100">

                                @if (request('search'))
                                    {{ __('No Job Posts Found') }}
                                @else
                                    {{ __('No Job Posts') }}
                                @endif

                            </h3>


                            <p class="mt-2 max-w-md text-sm text-gray-500 dark:text-gray-400">

                                @if (request('search'))

                                    {{ __('No job posts matched your search. Try a different keyword or filter.') }}

                                @else

                                    {{ __("You don't have any job posts yet. Create your first job post to get started.") }}

                                @endif

                            </p>


                            @can('create-job-posts')

                                @if (!request('search'))

                                    <a href="{{ route('job-posts.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-md bg-violet-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16m8-8H4">
                                            </path>

                                        </svg>

                                        {{ __('Create Job Post') }}

                                    </a>

                                @endif

                            @endcan

                        </div>

                    </div>

                @else

                    {{-- ========================================================= --}}
                    {{-- Job Post Table --}}
                    {{-- ========================================================= --}}

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            <thead class="bg-gray-50 dark:bg-gray-700/50">

                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Job') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Type / Category') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Salary') }}
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

                                @foreach ($jobPosts as $jobPost)

                                    <tr class="transition hover:bg-violet-50/50 dark:hover:bg-violet-900/10">

                                        {{-- Job --}}
                                        <td class="px-6 py-4">

                                            <div class="flex items-start gap-3">

                                                @if ($jobPost->is_featured || $jobPost->is_urgent)

                                                    <div class="flex shrink-0 flex-col gap-1 pt-0.5">

                                                        @if ($jobPost->is_featured)

                                                            <span class="inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold uppercase text-amber-700 dark:bg-amber-900/50 dark:text-amber-300">
                                                                ★
                                                            </span>

                                                        @endif

                                                        @if ($jobPost->is_urgent)

                                                            <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-[10px] font-semibold uppercase text-red-700 dark:bg-red-900/50 dark:text-red-300">
                                                                !
                                                            </span>

                                                        @endif

                                                    </div>

                                                @endif


                                                <div class="min-w-0">

                                                    <p class="max-w-sm truncate text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                        {{ $jobPost->name }}
                                                    </p>

                                                    <p class="mt-0.5 max-w-sm truncate text-xs text-gray-500 dark:text-gray-400">

                                                        @if ($jobPost->company_name)
                                                            {{ $jobPost->company_name }}
                                                        @else
                                                            {{ $jobPost->slug }}
                                                        @endif

                                                        @if ($jobPost->city || $jobPost->country)
                                                            · {{ collect([$jobPost->city, $jobPost->country])->filter()->implode(', ') }}
                                                        @endif

                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- Type / Category --}}
                                        <td class="px-6 py-4">

                                            <div class="space-y-1.5">

                                                @if ($jobPost->jobType)

                                                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-1 text-xs font-medium text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300">
                                                        {{ $jobPost->jobType->name }}
                                                    </span>

                                                @endif


                                                @if ($jobPost->jobCategory)

                                                    <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300">
                                                        {{ $jobPost->jobCategory->name }}
                                                    </span>

                                                @endif

                                            </div>

                                        </td>


                                        {{-- Salary --}}
                                        <td class="px-6 py-4">

                                            @if ($jobPost->hide_salary)

                                                <span class="text-sm text-gray-400 dark:text-gray-500">
                                                    {{ __('Hidden') }}
                                                </span>

                                            @elseif ($jobPost->salary_min || $jobPost->salary_max)

                                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">

                                                    {{ $jobPost->salary_currency }}

                                                    @if ($jobPost->salary_min && $jobPost->salary_max && $jobPost->salary_min != $jobPost->salary_max)

                                                        {{ number_format((float) $jobPost->salary_min) }} - {{ number_format((float) $jobPost->salary_max) }}

                                                    @else

                                                        {{ number_format((float) ($jobPost->salary_max ?: $jobPost->salary_min)) }}

                                                    @endif

                                                </p>

                                                @if ($jobPost->salary_period)

                                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                                        {{ __('per '.ucfirst($jobPost->salary_period)) }}
                                                    </p>

                                                @endif

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">
                                                    {{ __('Not Specified') }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Status --}}
                                        <td class="px-6 py-4">

                                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium {{ $statusBadges[$jobPost->status] ?? $statusBadges['draft'] }}">

                                                <span class="mr-1.5 h-1.5 w-1.5 rounded-full {{ $statusDots[$jobPost->status] ?? $statusDots['draft'] }}"></span>

                                                {{ ucfirst($jobPost->status) }}

                                            </span>

                                        </td>


                                        {{-- Actions --}}
                                        <td class="px-6 py-4 text-right text-sm whitespace-nowrap">

                                            <div class="flex items-center justify-end gap-2">

                                                @can('edit-job-posts')

                                                    <a href="{{ route('job-posts.edit', \App\Support\HashId::encode($jobPost->id)) }}"
                                                        class="inline-flex items-center gap-1 rounded-md bg-violet-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500">

                                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>

                                                        </svg>

                                                        {{ __('Edit') }}

                                                    </a>

                                                @endcan


                                                @can('delete-job-posts')

                                                    <form
                                                        method="POST"
                                                        action="{{ route('job-posts.destroy', \App\Support\HashId::encode($jobPost->id)) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to delete this job post?') }}');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="inline-flex items-center gap-1 rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">

                                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

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
                    @if ($jobPosts->hasPages())

                        <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">

                            {{ $jobPosts->withQueryString()->links() }}

                        </div>

                    @endif

                @endif

            </div>

        </div>

    </div>

</x-app-layout>
