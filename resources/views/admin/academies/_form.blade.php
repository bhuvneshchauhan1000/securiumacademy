@php
    $isEdit = isset($academy) && $academy->exists;
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

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50">

                {{-- Academy / Graduation Icon --}}
                <svg class="h-5 w-5 shrink-0 text-amber-600 dark:text-amber-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M22 10l-10-5L2 10l10 5 10-5z">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 12v4c0 1.5 3.5 3 6 3s6-1.5 6-3v-4">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M22 10v6">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Basic Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Enter the main information about this academy.') }}
                </p>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Name --}}
        {{-- ========================================================= --}}

        <div>

            <label for="name"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Academy Name') }}

                <span class="text-red-500">*</span>

            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $academy->name ?? '') }}"
                required
                autofocus
                placeholder="{{ __('Enter academy name...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
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
                    value="{{ old('slug', $academy->slug ?? '') }}"
                    readonly
                    class="mt-1 block w-full cursor-not-allowed rounded-md border-gray-300 bg-gray-100 text-gray-600 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('The slug is automatically generated and cannot be changed.') }}
                </p>

            @else

                <div class="rounded-lg bg-amber-50 p-4 dark:bg-amber-900/20">

                    <div class="flex gap-3">

                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-600 dark:text-amber-300"
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

                            <p class="text-sm font-medium text-amber-800 dark:text-amber-300">
                                {{ __('Automatic Slug') }}
                            </p>

                            <p class="mt-1 text-xs text-amber-700 dark:text-amber-400">
                                {{ __('The slug will be automatically generated from the academy name.') }}
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
        {{-- Country --}}
        {{-- ========================================================= --}}

        <div class="mt-5">

            <label for="country"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Country') }}

                <span class="text-red-500">*</span>

            </label>

            <input
                id="country"
                name="country"
                type="text"
                value="{{ old('country', $academy->country ?? '') }}"
                required
                placeholder="{{ __('India') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

            @error('country')

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
                placeholder="{{ __('Write a description about this academy...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('description', $academy->description ?? '') }}</textarea>

            @error('description')

                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Academy Details --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50">

                <svg class="h-5 w-5 text-amber-600 dark:text-amber-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M22 10l-10-5L2 10l10 5 10-5z">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 12v4c0 1.5 3.5 3 6 3s6-1.5 6-3v-4">
                    </path>

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M22 10v6">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Academy Details') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure the academy website and status.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


            {{-- ========================================================= --}}
            {{-- Website --}}
            {{-- ========================================================= --}}

            <div>

                <label for="website_url"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Website URL') }}

                </label>

                <input
                    id="website_url"
                    name="website_url"
                    type="url"
                    value="{{ old('website_url', $academy->website_url ?? '') }}"
                    placeholder="{{ __('https://www.example.com') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('Enter the official academy website URL.') }}
                </p>

                @error('website_url')

                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>

                @enderror

            </div>


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
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option
                        value="active"
                        @selected(old('status', $academy->status ?? 'active') === 'active')
                    >
                        {{ __('Active') }}
                    </option>

                    <option
                        value="inactive"
                        @selected(old('status', $academy->status ?? '') === 'inactive')
                    >
                        {{ __('Inactive') }}
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
    {{-- Academy Logo --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/50">

                <svg class="h-5 w-5 text-amber-600 dark:text-amber-300"
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
                    {{ __('Academy Logo') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Upload the official logo of the academy.') }}
                </p>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Current Logo --}}
        {{-- ========================================================= --}}

        @if ($isEdit && $academy->logo)

            <div class="mb-5">

                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Current Logo') }}
                </p>

                <div class="inline-flex rounded-xl bg-gray-50 p-4 ring-1 ring-gray-200 dark:bg-gray-900 dark:ring-gray-700">

                    <img
                        src="{{ Storage::url($academy->logo) }}"
                        alt="{{ $academy->name }}"
                        class="h-32 w-32 rounded-lg object-contain"
                    >

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- Logo Upload --}}
        {{-- ========================================================= --}}

        <input
            id="logo"
            name="logo"
            type="file"
            accept="image/jpeg,image/png,image/webp,image/jpg,image/svg+xml"
            class="block w-full text-sm text-gray-500 dark:text-gray-400
            file:mr-4 file:rounded-md file:border-0
            file:bg-amber-50 file:px-4 file:py-2
            file:text-sm file:font-semibold file:text-amber-700
            hover:file:bg-amber-100
            dark:file:bg-amber-900/50
            dark:file:text-amber-300"
        >

        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
            {{ __('JPG, JPEG, PNG, WEBP or SVG. Maximum 2MB.') }}
        </p>

        @if ($isEdit)

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ __('Leave empty to keep the current logo.') }}
            </p>

        @endif


        @error('logo')

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
            href="{{ route('academies.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-gray-100 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
        >
            {{ __('Cancel') }}
        </a>


        {{-- Submit --}}
        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-amber-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
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

                {{ __('Update Academy') }}

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

                {{ __('Create Academy') }}

            @endif

        </button>

    </div>

</div>
