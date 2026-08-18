<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog Category') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-emerald-600 via-emerald-600 to-green-600 px-6 py-5 sm:px-8">

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">

                                <svg class="h-5 w-5 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

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

                                <p class="text-sm text-emerald-100">
                                    {{ __('Update your blog category information.') }}
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Form --}}
                <form
                    method="POST"
                    action="{{ route('blog-categories.update', \App\Support\HashId::encode($blogCategory->id)) }}"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-8"
                >

                    @csrf
                    @method('PUT')

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
                                value="{{ old('name', $blogCategory->name) }}"
                                required
                                autofocus
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            >

                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Slug --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Slug') }}
                            </label>

                            <div class="mt-1 flex items-center rounded-md border border-gray-300 bg-gray-50 px-3 py-2 dark:border-gray-700 dark:bg-gray-900">

                                <span class="text-sm text-gray-400">
                                    /
                                </span>

                                <span class="ml-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $blogCategory->slug }}
                                </span>

                            </div>

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                {{ __('The slug is automatically generated from the category name.') }}
                            </p>

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
                                    {{ __('Current Feature Image') }}
                                </label>

                                <div class="mt-2">

                                    <img
                                        src="{{ Storage::url($blogCategory->feature_image) }}"
                                        alt="{{ $blogCategory->name }}"
                                        class="h-32 w-32 rounded-lg object-cover shadow-sm ring-1 ring-gray-200 dark:ring-gray-700"
                                    >

                                </div>

                            </div>

                        @endif

                        {{-- New Image --}}
                        <div>

                            <label for="feature_image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Change Feature Image') }}
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
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                            >

                                <option value="draft"
                                    @selected(old('status', $blogCategory->status) === 'draft')}>
                                    {{ __('Draft') }}
                                </option>

                                <option value="published"
                                    @selected(old('status', $blogCategory->status) === 'published')}>
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
                                    d="M5 13l4 4L19 7">
                                </path>

                            </svg>

                            {{ __('Update Category') }}

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>