@php
    $isEdit = isset($jobPost) && $jobPost->exists;
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

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
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
                    {{ __('Enter the main information about this job post.') }}
                </p>

            </div>

        </div>


        {{-- Name + Slug --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>

                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Job Title') }}

                    <span class="text-red-500">*</span>

                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $jobPost->name ?? '') }}"
                    required
                    autofocus
                    placeholder="{{ __('e.g. Senior Laravel Developer...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('name')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            <div>

                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Slug') }}

                    @if ($isEdit)

                        <span class="text-xs font-normal text-gray-500">({{ __('read-only') }})</span>

                    @endif

                </label>

                @if ($isEdit)

                    <input
                        id="slug"
                        name="slug"
                        type="text"
                        value="{{ old('slug', $jobPost->slug ?? '') }}"
                        readonly
                        class="mt-1 block w-full cursor-not-allowed rounded-md border-gray-300 bg-gray-100 text-gray-600 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400"
                    >

                @else

                    <div class="mt-1 flex h-[42px] items-center rounded-md border border-dashed border-violet-300 bg-violet-50 px-3 dark:border-violet-800 dark:bg-violet-900/20">

                        <p class="text-xs text-violet-700 dark:text-violet-400">
                            {{ __('Slug is auto-generated from the job title.') }}
                        </p>

                    </div>

                @endif

                @error('slug')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>

        </div>


        {{-- Short Description --}}
        <div class="mt-5">

            <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Short Description') }}

            </label>

            <input
                id="short_description"
                name="short_description"
                type="text"
                maxlength="500"
                value="{{ old('short_description', $jobPost->short_description ?? '') }}"
                placeholder="{{ __('A one-line summary shown in listings...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

            @error('short_description')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

            @enderror

        </div>


        {{-- Description --}}
        <div class="mt-5">

            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Full Description') }}

                <span class="text-red-500">*</span>

            </label>

            <textarea
                id="description"
                name="description"
                rows="7"
                required
                placeholder="{{ __('Describe the role in detail...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('description', $jobPost->description ?? '') }}</textarea>

            @error('description')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Classification --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Classification') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Categorize this job post.') }}
                </p>

            </div>

        </div>


        {{-- Type / Category / Status / Work Mode --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            {{-- Job Type --}}
            <div>

                <label for="job_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Job Type') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="job_type_id"
                    name="job_type_id"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option value="">{{ __('Select Type') }}</option>

                    @foreach ($jobTypes as $type)

                        <option
                            value="{{ $type->id }}"
                            @selected(old('job_type_id', $jobPost->job_type_id ?? '') == $type->id)
                        >
                            {{ $type->name }}
                        </option>

                    @endforeach

                </select>

                @error('job_type_id')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Job Category --}}
            <div>

                <label for="job_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Job Category') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="job_category_id"
                    name="job_category_id"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option value="">{{ __('Select Category') }}</option>

                    @foreach ($jobCategories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('job_category_id', $jobPost->job_category_id ?? '') == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('job_category_id')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Status --}}
            <div>

                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Status') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="status"
                    name="status"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    @foreach (['draft', 'published', 'paused', 'closed', 'expired'] as $statusOption)

                        <option
                            value="{{ $statusOption }}"
                            @selected(old('status', $jobPost->status ?? 'draft') === $statusOption)
                        >
                            {{ ucfirst($statusOption) }}
                        </option>

                    @endforeach

                </select>

                @error('status')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Work Mode --}}
            <div>

                <label for="work_mode" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Work Mode') }}

                </label>

                <select
                    id="work_mode"
                    name="work_mode"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option value="">{{ __('Select Work Mode') }}</option>

                    @foreach (['on_site' => 'On Site', 'remote' => 'Remote', 'hybrid' => 'Hybrid'] as $modeValue => $modeLabel)

                        <option
                            value="{{ $modeValue }}"
                            @selected(old('work_mode', $jobPost->work_mode ?? '') === $modeValue)
                        >
                            {{ __($modeLabel) }}
                        </option>

                    @endforeach

                </select>

                @error('work_mode')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>

        </div>


        {{-- Experience / Education / Department --}}
        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <label for="experience_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Experience Level') }}

                </label>

                <input
                    id="experience_level"
                    name="experience_level"
                    type="text"
                    value="{{ old('experience_level', $jobPost->experience_level ?? '') }}"
                    placeholder="{{ __('e.g. Junior, Mid, Senior...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

            </div>


            <div class="grid grid-cols-2 gap-3">

                <div>

                    <label for="min_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                        {{ __('Min Exp (yrs)') }}

                    </label>

                    <input
                        id="min_experience"
                        name="min_experience"
                        type="number"
                        min="0"
                        value="{{ old('min_experience', $jobPost->min_experience ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                    >

                </div>


                <div>

                    <label for="max_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                        {{ __('Max Exp (yrs)') }}

                    </label>

                    <input
                        id="max_experience"
                        name="max_experience"
                        type="number"
                        min="0"
                        value="{{ old('max_experience', $jobPost->max_experience ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                    >

                </div>

            </div>


            <div>

                <label for="education_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Education Level') }}

                </label>

                <input
                    id="education_level"
                    name="education_level"
                    type="text"
                    value="{{ old('education_level', $jobPost->education_level ?? '') }}"
                    placeholder="{{ __('e.g. Bachelor\'s Degree...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

            </div>


            <div>

                <label for="department" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Department') }}

                </label>

                <input
                    id="department"
                    name="department"
                    type="text"
                    value="{{ old('department', $jobPost->department ?? '') }}"
                    placeholder="{{ __('e.g. Engineering...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

            </div>

        </div>


        {{-- Job Code / Reference / Vacancies / Industry / Career Level / Shift / Hours --}}
        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <label for="job_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Job Code') }}

                </label>

                <input
                    id="job_code"
                    name="job_code"
                    type="text"
                    value="{{ old('job_code', $jobPost->job_code ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="reference_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Reference Number') }}

                </label>

                <input
                    id="reference_number"
                    name="reference_number"
                    type="text"
                    value="{{ old('reference_number', $jobPost->reference_number ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="vacancies" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Vacancies') }}

                </label>

                <input
                    id="vacancies"
                    name="vacancies"
                    type="number"
                    min="0"
                    value="{{ old('vacancies', $jobPost->vacancies ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="industry" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Industry') }}

                </label>

                <input
                    id="industry"
                    name="industry"
                    type="text"
                    value="{{ old('industry', $jobPost->industry ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="career_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Career Level') }}

                </label>

                <input
                    id="career_level"
                    name="career_level"
                    type="text"
                    value="{{ old('career_level', $jobPost->career_level ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="shift" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Shift') }}

                </label>

                <input
                    id="shift"
                    name="shift"
                    type="text"
                    value="{{ old('shift', $jobPost->shift ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="working_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Working Hours') }}

                </label>

                <input
                    id="working_hours"
                    name="working_hours"
                    type="text"
                    value="{{ old('working_hours', $jobPost->working_hours ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>

        </div>

        @error('min_experience')

            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

        @enderror

        @error('max_experience')

            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

        @enderror

    </div>


    {{-- ========================================================= --}}
    {{-- Highlights --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Highlights') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Control how this job post is displayed.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ([

                'is_featured' => __('Featured Job'),
                'is_urgent' => __('Urgent Hiring'),
                'is_remote' => __('Remote Friendly'),

            ] as $flagField => $flagLabel)

                <label class="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/50">

                    <input
                        type="hidden"
                        name="{{ $flagField }}"
                        value="0"
                    >

                    <input
                        id="{{ $flagField }}"
                        name="{{ $flagField }}"
                        type="checkbox"
                        value="1"
                        class="h-4 w-4 rounded border-gray-300 text-violet-600 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-900"
                        @checked(old($flagField, $jobPost->{$flagField} ?? false))
                    >

                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ $flagLabel }}
                    </span>

                </label>

            @endforeach

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Compensation --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Compensation') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Salary details for this position.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <label for="salary_min" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Minimum Salary') }}

                </label>

                <input
                    id="salary_min"
                    name="salary_min"
                    type="number"
                    step="0.01"
                    min="0"
                    value="{{ old('salary_min', $jobPost->salary_min ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="salary_max" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Maximum Salary') }}

                </label>

                <input
                    id="salary_max"
                    name="salary_max"
                    type="number"
                    step="0.01"
                    min="0"
                    value="{{ old('salary_max', $jobPost->salary_max ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                @error('salary_max')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            <div>

                <label for="salary_currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Currency') }}

                </label>

                <input
                    id="salary_currency"
                    name="salary_currency"
                    type="text"
                    maxlength="3"
                    value="{{ old('salary_currency', $jobPost->salary_currency ?? 'INR') }}"
                    placeholder="{{ __('e.g. INR, USD...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('salary_currency')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            <div>

                <label for="salary_period" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Salary Period') }}

                </label>

                <select
                    id="salary_period"
                    name="salary_period"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option value="">{{ __('Select Period') }}</option>

                    @foreach (['hourly', 'daily', 'weekly', 'monthly', 'yearly'] as $period)

                        <option
                            value="{{ $period }}"
                            @selected(old('salary_period', $jobPost->salary_period ?? '') === $period)
                        >
                            {{ ucfirst($period) }}
                        </option>

                    @endforeach

                </select>

                @error('salary_period')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>

        </div>


        <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-2">

            <div>

                <label for="salary_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Salary Description') }}

                </label>

                <input
                    id="salary_description"
                    name="salary_description"
                    type="text"
                    value="{{ old('salary_description', $jobPost->salary_description ?? '') }}"
                    placeholder="{{ __('e.g. Salary depends on experience and skills.') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

            </div>


            <label class="flex cursor-pointer items-center gap-3 self-end rounded-lg border border-gray-200 p-3 transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/50">

                <input
                    type="hidden"
                    name="hide_salary"
                    value="0"
                >

                <input
                    id="hide_salary"
                    name="hide_salary"
                    type="checkbox"
                    value="1"
                    class="h-4 w-4 rounded border-gray-300 text-violet-600 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-900"
                    @checked(old('hide_salary', $jobPost->hide_salary ?? false))
                >

                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Hide salary from public listing') }}
                </span>

            </label>

        </div>

        @error('salary_min')

            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

        @enderror

    </div>


    {{-- ========================================================= --}}
    {{-- Location --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Location') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Where is this job located?') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

            <div>

                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Country') }}

                </label>

                <input
                    id="country"
                    name="country"
                    type="text"
                    value="{{ old('country', $jobPost->country ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('State') }}

                </label>

                <input
                    id="state"
                    name="state"
                    type="text"
                    value="{{ old('state', $jobPost->state ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('City') }}

                </label>

                <input
                    id="city"
                    name="city"
                    type="text"
                    value="{{ old('city', $jobPost->city ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div class="lg:col-span-2">

                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ ('Address') }}

                </label>

                <input
                    id="address"
                    name="address"
                    type="text"
                    value="{{ old('address', $jobPost->address ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="postal_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Postal Code') }}

                </label>

                <input
                    id="postal_code"
                    name="postal_code"
                    type="text"
                    value="{{ old('postal_code', $jobPost->postal_code ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Company Information --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Company Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Details about the hiring company.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>

                <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Company Name') }}

                </label>

                <input
                    id="company_name"
                    name="company_name"
                    type="text"
                    value="{{ old('company_name', $jobPost->company_name ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="company_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Company Email') }}

                </label>

                <input
                    id="company_email"
                    name="company_email"
                    type="email"
                    value="{{ old('company_email', $jobPost->company_email ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                @error('company_email')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            <div>

                <label for="company_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Company Phone') }}

                </label>

                <input
                    id="company_phone"
                    name="company_phone"
                    type="text"
                    value="{{ old('company_phone', $jobPost->company_phone ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="company_website" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Company Website') }}

                </label>

                <input
                    id="company_website"
                    name="company_website"
                    type="url"
                    value="{{ old('company_website', $jobPost->company_website ?? '') }}"
                    placeholder="{{ __('https://example.com') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('company_website')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>

        </div>


        {{-- Current Logo --}}
        @if ($isEdit && $jobPost->company_logo)

            <div class="mt-5">

                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Current Logo') }}
                </p>

                <img
                    src="{{ Storage::url($jobPost->company_logo) }}"
                    alt="{{ $jobPost->company_name }}"
                    class="inline-flex h-16 w-16 rounded-lg object-contain ring-1 ring-gray-200 dark:ring-gray-700"
                >

            </div>

        @endif


        {{-- Logo Upload --}}
        <div class="mt-5">

            <label for="company_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Company Logo') }}

            </label>

            <input
                id="company_logo"
                name="company_logo"
                type="file"
                accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml"
                class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                file:mr-4 file:rounded-md file:border-0
                file:bg-violet-50 file:px-4 file:py-2
                file:text-sm file:font-semibold file:text-violet-700
                hover:file:bg-violet-100
                dark:file:bg-violet-900/50
                dark:file:text-violet-300"
            >

            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                {{ __('JPG, JPEG, PNG, WEBP or SVG. Maximum 2MB.') }}

                @if ($isEdit)

                    {{ __('Leave empty to keep the current logo.') }}

                @endif

            </p>

            @error('company_logo')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Application Settings --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l6 6m0 0l-6 6m6-6H3m18-3a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Application Settings') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('How candidates apply and important dates.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            {{-- Application Method --}}
            <div>

                <label for="application_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Application Method') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="application_method"
                    name="application_method"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    @foreach (['internal' => 'Internal', 'external' => 'External URL', 'email' => 'Email'] as $methodValue => $methodLabel)

                        <option
                            value="{{ $methodValue }}"
                            @selected(old('application_method', $jobPost->application_method ?? 'internal') === $methodValue)
                        >
                            {{ __($methodLabel) }}
                        </option>

                    @endforeach

                </select>

                @error('application_method')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Application URL --}}
            <div>

                <label for="application_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Application URL') }}

                </label>

                <input
                    id="application_url"
                    name="application_url"
                    type="url"
                    value="{{ old('application_url', $jobPost->application_url ?? '') }}"
                    placeholder="{{ __('https://example.com/apply') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('application_url')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Application Email --}}
            <div>

                <label for="application_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Application Email') }}

                </label>

                <input
                    id="application_email"
                    name="application_email"
                    type="email"
                    value="{{ old('application_email', $jobPost->application_email ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                @error('application_email')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            {{-- Application Limit --}}
            <div>

                <label for="application_limit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Application Limit') }}

                </label>

                <input
                    id="application_limit"
                    name="application_limit"
                    type="number"
                    min="0"
                    value="{{ old('application_limit', $jobPost->application_limit ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>

        </div>


        {{-- Dates --}}
        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Published At') }}

                </label>

                <input
                    id="published_at"
                    name="published_at"
                    type="datetime-local"
                    value="{{ old('published_at', isset($jobPost->published_at) && $jobPost->published_at ? $jobPost->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="application_start_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Applications Open At') }}

                </label>

                <input
                    id="application_start_at"
                    name="application_start_at"
                    type="datetime-local"
                    value="{{ old('application_start_at', isset($jobPost->application_start_at) && $jobPost->application_start_at ? $jobPost->application_start_at->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div>

                <label for="application_deadline" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Application Deadline') }}

                </label>

                <input
                    id="application_deadline"
                    name="application_deadline"
                    type="datetime-local"
                    value="{{ old('application_deadline', isset($jobPost->application_deadline) && $jobPost->application_deadline ? $jobPost->application_deadline->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                @error('application_deadline')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                @enderror

            </div>


            <div>

                <label for="expires_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Expires At') }}

                </label>

                <input
                    id="expires_at"
                    name="expires_at"
                    type="datetime-local"
                    value="{{ old('expires_at', isset($jobPost->expires_at) && $jobPost->expires_at ? $jobPost->expires_at->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>

        </div>


        {{-- Allow Applications --}}
        <label class="mt-5 flex w-fit cursor-pointer items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/50">

            <input
                type="hidden"
                name="allow_applications"
                value="0"
            >

            <input
                id="allow_applications"
                name="allow_applications"
                type="checkbox"
                value="1"
                class="h-4 w-4 rounded border-gray-300 text-violet-600 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-900"
                @checked(old('allow_applications', $jobPost->allow_applications ?? true))
            >

            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Allow applications for this job') }}
            </span>

        </label>

    </div>


    {{-- ========================================================= --}}
    {{-- Requirements & Details --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Requirements & Details') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Detailed expectations for candidates. One item per line.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>

                <label for="requirements" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Requirements') }}

                </label>

                <textarea
                    id="requirements"
                    name="requirements"
                    rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >{{ old('requirements', $jobPost->requirements ?? '') }}</textarea>

            </div>


            <div>

                <label for="responsibilities" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Responsibilities') }}

                </label>

                <textarea
                    id="responsibilities"
                    name="responsibilities"
                    rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >{{ old('responsibilities', $jobPost->responsibilities ?? '') }}</textarea>

            </div>


            <div>

                <label for="qualifications" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Qualifications') }}

                </label>

                <textarea
                    id="qualifications"
                    name="qualifications"
                    rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >{{ old('qualifications', $jobPost->qualifications ?? '') }}</textarea>

            </div>


            <div>

                <label for="preferred_qualifications" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Preferred Qualifications') }}

                </label>

                <textarea
                    id="preferred_qualifications"
                    name="preferred_qualifications"
                    rows="5"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >{{ old('preferred_qualifications', $jobPost->preferred_qualifications ?? '') }}</textarea>

            </div>


            <div class="md:col-span-2">

                <label for="benefits" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Benefits') }}

                </label>

                <textarea
                    id="benefits"
                    name="benefits"
                    rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >{{ old('benefits', $jobPost->benefits ?? '') }}</textarea>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SEO --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-100 dark:bg-violet-900/50">

                <svg class="h-5 w-5 text-violet-600 dark:text-violet-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('SEO') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Search engine metadata for this job post.') }}
                </p>

            </div>

        </div>


        <div class="space-y-5">

            <div>

                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Meta Title') }}

                </label>

                <input
                    id="meta_title"
                    name="meta_title"
                    type="text"
                    value="{{ old('meta_title', $jobPost->meta_title ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

            </div>


            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                <div>

                    <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                        {{ __('Meta Description') }}

                    </label>

                    <textarea
                        id="meta_description"
                        name="meta_description"
                        rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                    >{{ old('meta_description', $jobPost->meta_description ?? '') }}</textarea>

                </div>


                <div>

                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                        {{ __('Meta Keywords') }}

                    </label>

                    <textarea
                        id="meta_keywords"
                        name="meta_keywords"
                        rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-violet-500 focus:ring-violet-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                    >{{ old('meta_keywords', $jobPost->meta_keywords ?? '') }}</textarea>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Form Actions --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-end">

        {{-- Cancel --}}
        <a
            href="{{ route('job-posts.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-gray-100 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
        >
            {{ __('Cancel') }}
        </a>


        {{-- Submit --}}
        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-violet-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2"
        >

            @if ($isEdit)

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7">
                    </path>

                </svg>

                {{ __('Update Job Post') }}

            @else

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4">
                    </path>

                </svg>

                {{ __('Create Job Post') }}

            @endif

        </button>

    </div>

</div>
