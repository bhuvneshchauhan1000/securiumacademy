@php
    $isEdit = isset($testimonial) && $testimonial->exists;
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

                <svg class="h-5 w-5 shrink-0 text-indigo-600 dark:text-indigo-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Personal Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Enter the person\'s details and testimonial.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


            {{-- ========================================================= --}}
            {{-- Name --}}
            {{-- ========================================================= --}}

            <div>

                <label for="name"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Full Name') }}

                    <span class="text-red-500">*</span>

                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name', $testimonial->name ?? '') }}"
                    required
                    autofocus
                    placeholder="{{ __('Enter full name...') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('name')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ========================================================= --}}
            {{-- Designation --}}
            {{-- ========================================================= --}}

            <div>

                <label for="designation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Designation') }}

                </label>

                <input
                    id="designation"
                    name="designation"
                    type="text"
                    value="{{ old('designation', $testimonial->designation ?? '') }}"
                    placeholder="{{ __('e.g. Software Engineer') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('designation')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ========================================================= --}}
            {{-- Company --}}
            {{-- ========================================================= --}}

            <div>

                <label for="company"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Company') }}

                </label>

                <input
                    id="company"
                    name="company"
                    type="text"
                    value="{{ old('company', $testimonial->company ?? '') }}"
                    placeholder="{{ __('e.g. Acme Inc.') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                @error('company')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ========================================================= --}}
            {{-- Rating --}}
            {{-- ========================================================= --}}

            <div>

                <label for="rating"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Rating') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="rating"
                    name="rating"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    @for ($i = 1; $i <= 5; $i++)

                        <option
                            value="{{ $i }}"
                            @selected(old('rating', $testimonial->rating ?? 5) == $i)
                        >
                            {{ $i }} {{ __('Star') }}{{ $i > 1 ? 's' : '' }}
                        </option>

                    @endfor

                </select>

                @error('rating')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Content --}}
        {{-- ========================================================= --}}

        <div class="mt-5">

            <label for="content"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Testimonial Content') }}

                <span class="text-red-500">*</span>

            </label>

            <textarea
                id="content"
                name="content"
                rows="5"
                required
                placeholder="{{ __('Write the testimonial here...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('content', $testimonial->content ?? '') }}</textarea>

            @error('content')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Settings --}}
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
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Display Settings') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure the display order and status.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


            {{-- ========================================================= --}}
            {{-- Status --}}
            {{-- ========================================================= --}}

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
                        value="published"
                        @selected(old('status', $testimonial->status ?? 'published') === 'published')
                    >
                        {{ __('Published') }}
                    </option>

                    <option
                        value="draft"
                        @selected(old('status', $testimonial->status ?? '') === 'draft')
                    >
                        {{ __('Draft') }}
                    </option>

                </select>

                @error('status')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ========================================================= --}}
            {{-- Sort Order --}}
            {{-- ========================================================= --}}

            <div>

                <label for="sort_order"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Sort Order') }}

                </label>

                <input
                    id="sort_order"
                    name="sort_order"
                    type="number"
                    min="0"
                    value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                    placeholder="{{ __('0') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('Lower numbers appear first.') }}
                </p>

                @error('sort_order')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Testimonial Image --}}
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
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-9H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2zM9 9h.01">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Profile Image') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Upload a profile photo for this testimonial.') }}
                </p>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Current Image --}}
        {{-- ========================================================= --}}

        @if ($isEdit && $testimonial->image)

            <div class="mb-5">

                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Current Image') }}
                </p>

                <div class="inline-flex rounded-xl bg-gray-50 p-4 ring-1 ring-gray-200 dark:bg-gray-900 dark:ring-gray-700">

                    <img
                        src="{{ Storage::url($testimonial->image) }}"
                        alt="{{ $testimonial->name }}"
                        class="h-32 w-32 rounded-lg object-cover"
                    >

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- Image Upload --}}
        {{-- ========================================================= --}}

        <input
            id="image"
            name="image"
            type="file"
            accept="image/jpeg,image/png,image/webp,image/jpg"
            class="block w-full text-sm text-gray-500 dark:text-gray-400
            file:mr-4 file:rounded-md file:border-0
            file:bg-indigo-50 file:px-4 file:py-2
            file:text-sm file:font-semibold file:text-indigo-700
            hover:file:bg-indigo-100
            dark:file:bg-indigo-900/50
            dark:file:text-indigo-300"
        >

        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
            {{ __('JPG, JPEG, PNG or WEBP. Maximum 2MB.') }}
        </p>

        @if ($isEdit)

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ __('Leave empty to keep the current image.') }}
            </p>

        @endif


        @error('image')

            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                {{ $message }}
            </p>

        @enderror

    </div>


    {{-- ========================================================= --}}
    {{-- Form Actions --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-end">

        {{-- Cancel --}}
        <a
            href="{{ route('testimonials.index') }}"
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

                {{ __('Update Testimonial') }}

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

                {{ __('Create Testimonial') }}

            @endif

        </button>

    </div>

</div>
