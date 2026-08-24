@php
    $isEdit = isset($course) && $course->exists;
    $courseSource = old(
        'course_source',
        $isEdit
            ? ($course->academy_id
                ? 'academy'
                : ($course->university_id ? 'university' : 'none'))
            : 'none'
    );
@endphp

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- Validation Errors --}}
    {{-- ========================================================= --}}

    @if ($errors->any())

        <div class="rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/20">

            <div class="flex gap-3">

                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600 dark:text-red-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 19.5A2.5 2.5 0 016.5 17H20">
                    </path>

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z">
                    </path>

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 6h8M8 10h8M8 14h5">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Basic Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Enter the main information about this course.') }}
                </p>

            </div>

        </div>


        {{-- Name --}}
        <div>

            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Course Name') }}
                <span class="text-red-500">*</span>
            </label>

            <input id="name" name="name" type="text"
                value="{{ old('name', $course->name ?? '') }}"
                required autofocus
                placeholder="{{ __('Enter course name...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

            @error('name')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Slug --}}
        <div class="mt-5">

            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Slug') }}

                @if ($isEdit)
                    <span class="text-xs font-normal text-gray-500">
                        ({{ __('read-only') }})
                    </span>
                @endif

            </label>

            @if ($isEdit)

                <input id="slug" name="slug" type="text"
                    value="{{ old('slug', $course->slug ?? '') }}"
                    readonly
                    class="mt-1 block w-full cursor-not-allowed rounded-md border-gray-300 bg-gray-100 text-gray-600 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400">

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('The slug is automatically generated and cannot be changed.') }}
                </p>

            @else

                <div class="rounded-lg bg-sky-50 p-4 dark:bg-sky-900/20">

                    <div class="flex gap-3">

                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-sky-600 dark:text-sky-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z">
                            </path>

                        </svg>

                        <div>

                            <p class="text-sm font-medium text-sky-800 dark:text-sky-300">
                                {{ __('Automatic Slug') }}
                            </p>

                            <p class="mt-1 text-xs text-sky-700 dark:text-sky-400">
                                {{ __('The slug will be automatically generated from the course name.') }}
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


        {{-- Short Description --}}
        <div class="mt-5">

            <label for="short_description"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Short Description') }}
            </label>

            <textarea id="short_description" name="short_description" rows="3"
                placeholder="{{ __('Write a short description about this course...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">{{ old('short_description', $course->short_description ?? '') }}</textarea>

            @error('short_description')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Content --}}
        <div class="mt-5">

            <label for="content"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Course Content') }}
            </label>

            <textarea id="content" name="content" rows="10"
                placeholder="{{ __('Write the full course content...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">{{ old('content', $course->content ?? '') }}</textarea>

            @error('content')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Course Details --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 16v-2m8-6h-2M6 12H4m13.657-5.657l-1.414 1.414M7.757 16.243l-1.414 1.414m10.314 0l-1.414-1.414M7.757 7.757L6.343 6.343">
                    </path>

                    <circle cx="12" cy="12" r="3"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    </circle>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Course Details') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure the course category, duration and level.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Category --}}
            <div>

                <label for="course_category_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Course Category') }}
                    <span class="text-red-500">*</span>

                </label>

                <select id="course_category_id" name="course_category_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                    <option value="">
                        {{ __('Select Category') }}
                    </option>

                    @foreach ($courseCategories as $category)

                        <option value="{{ $category->id }}"
                            @selected((string) old('course_category_id', $course->course_category_id ?? '') === (string) $category->id)>
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('course_category_id')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Course Level --}}
            <div>

                <label for="course_level"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Course Level') }}
                </label>

                <select id="course_level" name="course_level"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                    <option value="">
                        {{ __('Select Level') }}
                    </option>

                    <option value="beginner"
                        @selected(old('course_level', $course->course_level ?? '') === 'beginner')>
                        {{ __('Beginner') }}
                    </option>

                    <option value="intermediate"
                        @selected(old('course_level', $course->course_level ?? '') === 'intermediate')>
                        {{ __('Intermediate') }}
                    </option>

                    <option value="advanced"
                        @selected(old('course_level', $course->course_level ?? '') === 'advanced')>
                        {{ __('Advanced') }}
                    </option>

                    <option value="expert"
                        @selected(old('course_level', $course->course_level ?? '') === 'expert')>
                        {{ __('Expert') }}
                    </option>

                </select>

                @error('course_level')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Duration --}}
            <div>

                <label for="duration"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Duration') }}
                </label>

                <input id="duration" name="duration" type="text"
                    value="{{ old('duration', $course->duration ?? '') }}"
                    placeholder="{{ __('e.g. 12 weeks') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

                @error('duration')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Status --}}
            <div>

                <label for="status"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Status') }}
                    <span class="text-red-500">*</span>

                </label>

                <select id="status" name="status" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                    <option value="published"
                        @selected(old('status', $course->status ?? 'published') === 'published')>
                        {{ __('Published') }}
                    </option>

                    <option value="draft"
                        @selected(old('status', $course->status ?? '') === 'draft')>
                        {{ __('Draft') }}
                    </option>

                </select>

                @error('status')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Course Source (Academy / University) --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Course Source') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Choose whether this course belongs to an academy or a university.') }}
                </p>

            </div>

        </div>


        {{-- Source --}}
        <div>

            <label for="course_source" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Belongs To') }}

                <span class="text-red-500">*</span>

            </label>

            <select id="course_source" name="course_source"
                data-current-source="{{ $courseSource }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                <option value="none" @selected($courseSource === 'none')>
                    {{ __('None (Standalone Course)') }}
                </option>

                <option value="academy" @selected($courseSource === 'academy')>
                    {{ __('Academy') }}
                </option>

                <option value="university" @selected($courseSource === 'university')>
                    {{ __('University') }}
                </option>

            </select>

            @error('course_source')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Academy --}}
        <div id="academy-select-wrap" class="mt-5 hidden">

            <label for="academy_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Academy') }}

                <span class="text-red-500">*</span>

            </label>

            <select id="academy_id" name="academy_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                <option value="">
                    {{ __('Select Academy') }}
                </option>

                @foreach ($academies as $academy)

                    <option value="{{ $academy->id }}"
                        @selected((string) old('academy_id', $course->academy_id ?? '') === (string) $academy->id)>
                        {{ $academy->name }}
                    </option>

                @endforeach

            </select>

            @error('academy_id')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- University --}}
        <div id="university-select-wrap" class="mt-5 hidden">

            <label for="university_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('University') }}

                <span class="text-red-500">*</span>

            </label>

            <select id="university_id" name="university_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                <option value="">
                    {{ __('Select University') }}
                </option>

                @foreach ($universities as $university)

                    <option value="{{ $university->id }}"
                        @selected((string) old('university_id', $course->university_id ?? '') === (string) $university->id)>
                        {{ $university->name }}
                    </option>

                @endforeach

            </select>

            @error('university_id')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Pricing --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-14v2m0 12v2M5 12H3m18 0h-2">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Pricing') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Set the regular and discounted course fee.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Fee --}}
            <div>

                <label for="fee"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Regular Fee') }}
                </label>

                <input id="fee" name="fee" type="number"
                    step="0.01" min="0"
                    value="{{ old('fee', $course->fee ?? '') }}"
                    placeholder="{{ __('0.00') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

                @error('fee')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Discount Fee --}}
            <div>

                <label for="discount_fee"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Discounted Fee') }}
                </label>

                <input id="discount_fee" name="discount_fee" type="number"
                    step="0.01" min="0"
                    value="{{ old('discount_fee', $course->discount_fee ?? '') }}"
                    placeholder="{{ __('0.00') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

                @error('discount_fee')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Certification --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15l-3.5 2 1-4-3-2.5 4-.2L12 6l1.5 4.3 4 .2-3 2.5 1 4L12 15z">
                    </path>

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l1.5 1.5L22 9">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Certification') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure course certification details.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Certification --}}
            <div>

                <label for="certification"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Certification') }}
                </label>

                <input id="certification" name="certification" type="text"
                    value="{{ old('certification', $course->certification ?? '') }}"
                    placeholder="{{ __('e.g. Certificate of Completion') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

                @error('certification')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Certificate Image --}}
            <div>

                <label for="certificate_image"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Certificate Image') }}
                </label>

                <input id="certificate_image" name="certificate_image" type="file"
                    accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml"
                    class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                    file:mr-4 file:rounded-md file:border-0
                    file:bg-sky-50 file:px-4 file:py-2
                    file:text-sm file:font-semibold file:text-sky-700
                    hover:file:bg-sky-100
                    dark:file:bg-sky-900/50
                    dark:file:text-sky-300">

                @if ($isEdit && $course->certificate_image)

                    <div class="mt-3">

                        <img src="{{ Storage::url($course->certificate_image) }}"
                            alt="{{ __('Certificate') }}"
                            class="h-24 w-40 rounded-lg object-contain ring-1 ring-gray-200 dark:ring-gray-700">

                    </div>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        {{ __('Leave empty to keep the current certificate image.') }}
                    </p>

                @endif

                @error('certificate_image')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Featured Image --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-9H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2zM9 9h.01">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Featured Image') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Upload the main image for this course.') }}
                </p>

            </div>

        </div>


        @if ($isEdit && $course->featured_image)

            <div class="mb-5">

                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Current Featured Image') }}
                </p>

                <div class="inline-flex rounded-xl bg-gray-50 p-4 ring-1 ring-gray-200 dark:bg-gray-900 dark:ring-gray-700">

                    <img src="{{ Storage::url($course->featured_image) }}"
                        alt="{{ $course->name }}"
                        class="h-40 w-64 rounded-lg object-cover">

                </div>

            </div>

        @endif


        <input id="featured_image" name="featured_image" type="file"
            accept="image/jpeg,image/png,image/webp,image/jpg"
            class="block w-full text-sm text-gray-500 dark:text-gray-400
            file:mr-4 file:rounded-md file:border-0
            file:bg-sky-50 file:px-4 file:py-2
            file:text-sm file:font-semibold file:text-sky-700
            hover:file:bg-sky-100
            dark:file:bg-sky-900/50
            dark:file:text-sky-300">

        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
            {{ __('JPG, JPEG, PNG or WEBP. Maximum 2MB.') }}
        </p>

        @if ($isEdit)

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ __('Leave empty to keep the current featured image.') }}
            </p>

        @endif

        @error('featured_image')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror

    </div>


    {{-- ========================================================= --}}
    {{-- SEO --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71">
                    </path>

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('SEO Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure search engine optimization information.') }}
                </p>

            </div>

        </div>


        {{-- Meta Title --}}
        <div>

            <label for="meta_title"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Meta Title') }}
            </label>

            <input id="meta_title" name="meta_title" type="text"
                value="{{ old('meta_title', $course->meta_title ?? '') }}"
                placeholder="{{ __('Enter SEO title...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

            @error('meta_title')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Meta Description --}}
        <div class="mt-5">

            <label for="meta_description"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Meta Description') }}
            </label>

            <textarea id="meta_description" name="meta_description" rows="4"
                placeholder="{{ __('Enter SEO description...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">{{ old('meta_description', $course->meta_description ?? '') }}</textarea>

            @error('meta_description')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Meta Keywords --}}
        <div class="mt-5">

            <label for="meta_keywords"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Meta Keywords') }}
            </label>

            <input id="meta_keywords" name="meta_keywords" type="text"
                value="{{ old('meta_keywords', $course->meta_keywords ?? '') }}"
                placeholder="{{ __('course, education, training') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">

            @error('meta_keywords')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Meta Script --}}
        <div class="mt-5">

            <label for="meta_script"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Meta Script') }}
            </label>

            <textarea id="meta_script" name="meta_script" rows="8"
                placeholder="{{ __('Enter custom SEO scripts or structured data...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 font-mono text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500">{{ old('meta_script', $course->meta_script ?? '') }}</textarea>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ __('Add custom SEO scripts or structured data such as JSON-LD.') }}
            </p>

            @error('meta_script')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Visibility --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="space-y-4">

            {{-- Featured Course --}}
            <div class="rounded-lg bg-sky-50 p-4 dark:bg-sky-900/20">

                <div class="flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-100 dark:bg-sky-900/50">

                            <svg class="h-5 w-5 text-sky-600 dark:text-sky-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.802 2.036a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.802-2.036a1 1 0 00-1.176 0l-2.802 2.036c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L4.802 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.247-3.292z">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <label for="is_featured"
                                class="text-sm font-medium text-sky-900 dark:text-sky-200">
                                {{ __('Featured Course') }}
                            </label>

                            <p class="text-xs text-sky-700 dark:text-sky-400">
                                {{ __('Display this course as a featured course.') }}
                            </p>

                        </div>

                    </div>


                    <label class="relative inline-flex cursor-pointer items-center">

                        <input type="hidden" name="is_featured" value="0">

                        <input type="checkbox"
                            id="is_featured"
                            name="is_featured"
                            value="1"
                            class="peer sr-only"
                            @checked(old('is_featured', $course->is_featured ?? false))>

                        <div
                            class="h-6 w-11 rounded-full bg-gray-200
                            peer-checked:bg-sky-600
                            peer-focus:outline-none
                            peer-focus:ring-4
                            peer-focus:ring-sky-300
                            dark:bg-gray-700
                            dark:peer-focus:ring-sky-800
                            after:absolute
                            after:left-[2px]
                            after:top-[2px]
                            after:h-5
                            after:w-5
                            after:rounded-full
                            after:border
                            after:border-gray-300
                            after:bg-white
                            after:transition-all
                            after:content-['']
                            peer-checked:after:translate-x-full
                            peer-checked:after:border-white">
                        </div>

                    </label>

                </div>

            </div>


            @error('is_featured')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Form Actions --}}
    {{-- ========================================================= --}}

    <div
        class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-end">

        {{-- Cancel --}}
        <a href="{{ route('courses.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-gray-100 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">

            {{ __('Cancel') }}

        </a>


        {{-- Submit --}}
        <button type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-sky-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

            @if ($isEdit)

                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 13l4 4L19 7">
                    </path>

                </svg>

                {{ __('Update Course') }}

            @else

                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M12 4v16m8-8H4">
                    </path>

                </svg>

                {{ __('Create Course') }}

            @endif

        </button>

    </div>

</div>

{{-- ========================================================= --}}
{{-- Course Source toggle --}}
{{-- ========================================================= --}}

<script>
    (function () {
        var sourceSelect = document.getElementById('course_source');
        var academyWrap = document.getElementById('academy-select-wrap');
        var universityWrap = document.getElementById('university-select-wrap');
        if (!sourceSelect || !academyWrap || !universityWrap) return;

        function syncSourceSelects() {
            var source = sourceSelect.value;

            var showAcademy = source === 'academy';
            var showUniversity = source === 'university';

            academyWrap.classList.toggle('hidden', !showAcademy);
            universityWrap.classList.toggle('hidden', !showUniversity);

            // disabled selects are not submitted with the form
            document.getElementById('academy_id').disabled = !showAcademy;
            document.getElementById('university_id').disabled = !showUniversity;
        }

        sourceSelect.addEventListener('change', syncSourceSelects);

        // initial state
        syncSourceSelects();
    })();
</script>
