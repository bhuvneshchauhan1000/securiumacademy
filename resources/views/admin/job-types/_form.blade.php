@php
    $isEdit = isset($jobType) && $jobType->exists;
@endphp

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- Validation Errors --}}
    {{-- ========================================================= --}}

    @if ($errors->any())

        <div class="rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/20">

            <div class="flex gap-3">

                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600 dark:text-red-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4m0 4h.01M10.29 3.86l-7.4 12.8A2 2 0 004.62 20h14.76a2 2 0 001.73-3.34l-7.4-12.8a2 2 0 00-3.42 0z">
                    </path>

                </svg>

                <div>

                    <p class="text-sm font-semibold text-red-800 dark:text-red-300">
                        {{ __('Please fix the following errors:') }}
                    </p>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700 dark:text-red-400">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- Basic Information --}}
    {{-- ========================================================= --}}

    <div>

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/50">

                <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-8.995-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Basic Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Enter the main information about this job type.') }}
                </p>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Name --}}
        {{-- ========================================================= --}}

        <div>

            <label for="name"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Job Type Name') }}

                <span class="text-red-500">*</span>

            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $jobType->name ?? '') }}"
                required
                autofocus
                placeholder="{{ __('e.g. Full Time, Part Time, Internship...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

            @error('name')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- ========================================================= --}}
        {{-- Slug --}}
        {{-- ========================================================= --}}

        <div class="mt-5">

            <label for="slug"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Slug') }}

                @if ($isEdit)

                    <span class="text-xs font-normal text-gray-500">
                        ({{ __('read-only') }})
                    </span>

                @endif

            </label>


            @if ($isEdit)

                <input
                    id="slug"
                    name="slug"
                    type="text"
                    value="{{ old('slug', $jobType->slug ?? '') }}"
                    readonly
                    class="mt-1 block w-full cursor-not-allowed rounded-md border-gray-300 bg-gray-100 text-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('The slug is automatically generated and cannot be changed.') }}
                </p>

            @else

                <div class="rounded-lg bg-indigo-50 p-4 dark:bg-indigo-900/20">

                    <div class="flex gap-3">

                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-600 dark:text-indigo-300"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z">
                            </path>

                        </svg>

                        <div>

                            <p class="text-sm font-medium text-indigo-800 dark:text-indigo-300">
                                {{ __('Automatic Slug') }}
                            </p>

                            <p class="mt-1 text-xs text-indigo-700 dark:text-indigo-400">
                                {{ __('The slug will be automatically generated from the job type name.') }}
                            </p>

                        </div>

                    </div>

                </div>

            @endif


            @error('slug')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>


        {{-- ========================================================= --}}
        {{-- Description --}}
        {{-- ========================================================= --}}

        <div class="mt-5">

            <label for="description"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Description') }}

            </label>

            <textarea
                id="description"
                name="description"
                rows="6"
                placeholder="{{ __('Write a description about this job type...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('description', $jobType->description ?? '') }}</textarea>

            @error('description')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Job Type Settings --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-900/50">

                <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6V4m0 16v-2m8-6h-2M6 12H4m13.657-5.657l-1.414 1.414M7.757 16.243l-1.414 1.414m10.314 0l-1.414-1.414M7.757 7.757L6.343 6.343">
                    </path>

                    <circle cx="12" cy="12" r="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2">
                    </circle>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Job Type Settings') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure the job type status.') }}
                </p>

            </div>

        </div>


        {{-- Status --}}
        <div>

            <label for="status"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Status') }}

                <span class="text-red-500">*</span>

            </label>

            <select
                id="status"
                name="status"
                required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
            >

                <option
                    value="draft"
                    @selected(old('status', $jobType->status ?? 'draft') === 'draft')
                >
                    {{ __('Draft') }}
                </option>

                <option
                    value="published"
                    @selected(old('status', $jobType->status ?? '') === 'published')
                >
                    {{ __('Published') }}
                </option>

            </select>

            @error('status')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Form Actions --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-end">

        {{-- Cancel --}}
        <a
            href="{{ route('job-types.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-gray-100 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
        >
            {{ __('Cancel') }}
        </a>


        {{-- Submit --}}
        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-indigo-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >

            @if ($isEdit)

                <svg class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7">
                    </path>

                </svg>

                {{ __('Update Job Type') }}

            @else

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

                {{ __('Create Job Type') }}

            @endif

        </button>

    </div>

</div>
