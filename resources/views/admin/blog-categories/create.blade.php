<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Blog Category') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-emerald-600 via-emerald-600 to-green-600 px-6 py-5 sm:px-8">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            <svg class="h-5 w-5 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Create Blog Category') }}
                            </h3>

                            <p class="text-sm text-emerald-100">
                                {{ __('Add a new category for your blog posts.') }}
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Form --}}
                <form
                    method="POST"
                    action="{{ route('blog-categories.store') }}"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-8"
                >

                    @csrf

                    <div class="space-y-6">

                        {{-- Name --}}
                        <div>

                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Name') }}
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="{{ __('e.g. Technology') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            >

                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Slug Information --}}
                        <div class="rounded-lg bg-emerald-50 p-4 dark:bg-emerald-900/20">

                            <div class="flex gap-3">

                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600 dark:text-emerald-400"
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

                                    <p class="text-sm font-medium text-emerald-800 dark:text-emerald-300">
                                        {{ __('Slug') }}
                                    </p>

                                    <p class="mt-1 text-xs text-emerald-700 dark:text-emerald-400">
                                        {{ __('The slug will be automatically generated from the category name.') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- Description --}}
                        <div>

                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Description') }}
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="{{ __('Category description...') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Feature Image --}}
                        <div>

                            <label for="feature_image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Feature Image') }}
                            </label>

                            <input
                                id="feature_image"
                                name="feature_image"
                                type="file"
                                accept="image/jpeg,image/png,image/webp"
                                class="mt-2 block w-full text-sm text-gray-500 dark:text-gray-400
                                file:mr-4 file:rounded-md file:border-0
                                file:bg-emerald-50 file:px-4 file:py-2
                                file:text-sm file:font-semibold file:text-emerald-700
                                hover:file:bg-emerald-100
                                dark:file:bg-emerald-900/50
                                dark:file:text-emerald-300"
                            >

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                {{ __('JPG, JPEG, PNG or WEBP. Maximum 2MB.') }}
                            </p>

                            @error('feature_image')
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

                            <select
                                id="status"
                                name="status"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            >

                                <option value="draft" @selected(old('status', 'draft') === 'draft')}>
                                    {{ __('Draft') }}
                                </option>

                                <option value="published" @selected(old('status') === 'published')}>
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

                    {{-- Actions --}}
                    <div class="mt-8 flex items-center justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700">

                        <a href="{{ route('blog-categories.index') }}"
                            class="inline-flex items-center rounded-md bg-gray-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            {{ __('Cancel') }}
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                        >

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

                            {{ __('Create Category') }}

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>