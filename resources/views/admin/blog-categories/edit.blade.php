<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:rounded-xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-sky-600 via-blue-600 to-indigo-600 px-6 py-5 sm:px-8">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">
                            <svg class="h-5 w-5 text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Edit Blog Category') }}
                            </h3>

                            <p class="text-sm text-sky-100">
                                {{ __('Update the category information below.') }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Form --}}
                <form method="POST"
                    action="{{ route('blog-categories.update', \App\Support\HashId::encode($blogCategory->id)) }}"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="space-y-6 px-6 py-6 sm:px-8">

                        {{-- Name --}}
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Category Name') }}
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $blogCategory->name) }}"
                                placeholder="{{ __('Enter category name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100"
                            >

                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label for="slug"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Slug') }}
                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                value="{{ old('slug', $blogCategory->slug) }}"
                                placeholder="{{ __('category-slug') }}"
                                readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 bg-gray-50 dark:bg-gray-600 cursor-not-allowed"
                            >

                            @error('slug')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label for="description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Description') }}
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="{{ __('Enter category description') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100"
                            >{{ old('description', $blogCategory->description) }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Current Image --}}
                        @if ($blogCategory->feature_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Current Image') }}
                                </label>

                                <div class="mt-2">
                                    <img
                                        src="{{ Storage::url($blogCategory->feature_image) }}"
                                        alt="{{ $blogCategory->name }}"
                                        class="h-32 w-32 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                                    >
                                </div>
                            </div>
                        @endif

                        {{-- Feature Image --}}
                        <div>
                            <label for="feature_image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Feature Image') }}
                            </label>

                            <input
                                type="file"
                                name="feature_image"
                                id="feature_image"
                                accept="image/*"
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white text-sm text-gray-700 shadow-sm file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                            >

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                {{ __('Leave empty to keep the current image.') }}
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
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100"
                            >
                                <option value="draft" @selected(old('status', $blogCategory->status) === 'draft')}>
                                    {{ __('Draft') }}
                                </option>

                                <option value="published" @selected(old('status', $blogCategory->status) === 'published')}>
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

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-700/30 sm:px-8">

                        <a href="{{ route('blog-categories.index') }}"
                            class="inline-flex items-center rounded-md bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:ring-gray-600 dark:hover:bg-gray-600">
                            {{ __('Cancel') }}
                        </a>

                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Update Category') }}
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>