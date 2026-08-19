@php
    $isEdit = isset($blog) && $blog->exists;
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

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50">

                <svg class="h-5 w-5 text-blue-600 dark:text-blue-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM7 8h10M7 12h10M7 16h6">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Basic Information') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Enter the main information about your blog post.') }}
                </p>

            </div>

        </div>


        {{-- Title --}}
        <div>

            <label for="title"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Title') }}

                <span class="text-red-500">*</span>

            </label>

            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title', $blog->title ?? '') }}"
                required
                autofocus
                placeholder="{{ __('Enter blog post title...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

            @error('title')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Slug --}}
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
                    value="{{ old('slug', $blog->slug ?? '') }}"
                    readonly
                    class="mt-1 block w-full cursor-not-allowed rounded-md border-gray-300 bg-gray-100 text-gray-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('The slug is automatically generated and cannot be changed.') }}
                </p>

            @else

                <div class="rounded-lg bg-blue-50 p-4 dark:bg-blue-900/20">

                    <div class="flex gap-3">

                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-blue-600 dark:text-blue-400"
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

                            <p class="text-sm font-medium text-blue-800 dark:text-blue-300">
                                {{ __('Automatic Slug') }}
                            </p>

                            <p class="mt-1 text-xs text-blue-700 dark:text-blue-400">
                                {{ __('The slug will be automatically generated from the blog post title.') }}
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

            <textarea
                id="short_description"
                name="short_description"
                rows="4"
                placeholder="{{ __('Write a short summary of the blog post...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('short_description', $blog->short_description ?? '') }}</textarea>

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

                {{ __('Content') }}

                <span class="text-red-500">*</span>

            </label>

            <textarea
                id="content"
                name="content"
                rows="14"
                required
                placeholder="{{ __('Write your blog post content...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('content', $blog->content ?? '') }}</textarea>

            @error('content')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Category & Publishing --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50">

                <svg class="h-5 w-5 text-blue-600 dark:text-blue-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h10M4 18h6">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Category & Publishing') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Choose the category and publishing status for this post.') }}
                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- Category --}}
            <div>

                <label for="blog_categories_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Blog Category') }}

                    <span class="text-red-500">*</span>

                </label>

                <select
                    id="blog_categories_id"
                    name="blog_categories_id"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option value="">
                        {{ __('Select category') }}
                    </option>

                    @foreach ($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('blog_categories_id', $blog->blog_categories_id ?? '') == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('blog_categories_id')
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
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                    <option
                        value="draft"
                        @selected(old('status', $blog->status ?? 'draft') === 'draft')
                    >
                        {{ __('Draft') }}
                    </option>

                    <option
                        value="published"
                        @selected(old('status', $blog->status ?? '') === 'published')
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


            {{-- Published At --}}
            <div>

                <label for="published_at"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    {{ __('Published At') }}

                </label>

                <input
                    id="published_at"
                    name="published_at"
                    type="datetime-local"
                    value="{{ old('published_at', isset($blog->published_at) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                >

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    {{ __('Leave empty if the post has not been published yet.') }}
                </p>

                @error('published_at')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- Feature Image --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50">

                <svg class="h-5 w-5 text-blue-600 dark:text-blue-300"
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
                    {{ __('Feature Image') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Upload the main image for your blog post.') }}
                </p>

            </div>

        </div>


        {{-- Current Image --}}
        @if ($isEdit && $blog->feature_image)

            <div class="mb-5">

                <p class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Current Image') }}
                </p>

                <img
                    src="{{ Storage::url($blog->feature_image) }}"
                    alt="{{ $blog->title }}"
                    class="h-48 w-80 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                >

            </div>

        @endif


        <input
            id="feature_image"
            name="feature_image"
            type="file"
            accept="image/jpeg,image/png,image/webp,image/jpg"
            class="block w-full text-sm text-gray-500 dark:text-gray-400
            file:mr-4 file:rounded-md file:border-0
            file:bg-blue-50 file:px-4 file:py-2
            file:text-sm file:font-semibold file:text-blue-700
            hover:file:bg-blue-100
            dark:file:bg-blue-900/50
            dark:file:text-blue-300"
        >

        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
            {{ __('JPG, JPEG, PNG or WEBP. Maximum 2MB.') }}
        </p>

        @error('feature_image')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                {{ $message }}
            </p>
        @enderror

    </div>


    {{-- ========================================================= --}}
    {{-- Tags & Options --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50">

                <svg class="h-5 w-5 text-blue-600 dark:text-blue-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 7h.01M4 4h5l11 11a2 2 0 010 2l-3 3a2 2 0 01-2 0L4 9V4z">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Tags & Options') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Add tags and identify special types of content.') }}
                </p>

            </div>

        </div>


        {{-- Tags --}}
        <div>

            <label for="tags"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Tags') }}

            </label>

            <input
                id="tags"
                name="tags"
                type="text"
                value="{{ old('tags', $blog->tags ?? '') }}"
                placeholder="{{ __('Laravel, PHP, Programming') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                {{ __('Separate tags with commas.') }}
            </p>

            @error('tags')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Guide / Press Release --}}
        <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">

            {{-- Guide --}}
            <label
                for="guide"
                class="flex cursor-pointer items-start gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-blue-300 hover:bg-blue-50/50 dark:border-gray-700 dark:hover:border-blue-700 dark:hover:bg-blue-900/10"
            >

                <input
                    type="hidden"
                    name="guide"
                    value="0"
                >

                <input
                    id="guide"
                    name="guide"
                    type="checkbox"
                    value="1"
                    @checked(old('guide', $blog->guide ?? false))
                    class="mt-0.5 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                >

                <div>

                    <span class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Guide') }}
                    </span>

                    <span class="block text-xs text-gray-500 dark:text-gray-400">
                        {{ __('Mark this post as a guide or tutorial.') }}
                    </span>

                </div>

            </label>


            {{-- Press Release --}}
            <label
                for="press_release"
                class="flex cursor-pointer items-start gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-blue-300 hover:bg-blue-50/50 dark:border-gray-700 dark:hover:border-blue-700 dark:hover:bg-blue-900/10"
            >

                <input
                    type="hidden"
                    name="press_release"
                    value="0"
                >

                <input
                    id="press_release"
                    name="press_release"
                    type="checkbox"
                    value="1"
                    @checked(old('press_release', $blog->press_release ?? false))
                    class="mt-0.5 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                >

                <div>

                    <span class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Press Release') }}
                    </span>

                    <span class="block text-xs text-gray-500 dark:text-gray-400">
                        {{ __('Mark this post as a press release.') }}
                    </span>

                </div>

            </label>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SEO Settings --}}
    {{-- ========================================================= --}}

    <div class="border-t border-gray-200 pt-8 dark:border-gray-700">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/50">

                <svg class="h-5 w-5 text-blue-600 dark:text-blue-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71">
                    </path>

                </svg>

            </div>

            <div>

                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('SEO Settings') }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Configure search engine metadata for this blog post.') }}
                </p>

            </div>

        </div>


        {{-- Meta Title --}}
        <div>

            <label for="meta_title"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                {{ __('Meta Title') }}

            </label>

            <input
                id="meta_title"
                name="meta_title"
                type="text"
                value="{{ old('meta_title', $blog->meta_title ?? '') }}"
                placeholder="{{ __('SEO title...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >

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

            <textarea
                id="meta_description"
                name="meta_description"
                rows="4"
                placeholder="{{ __('SEO description...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>

            @error('meta_description')
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

            <textarea
                id="meta_script"
                name="meta_script"
                rows="7"
                placeholder="{{ __('Paste custom meta/SEO scripts here...') }}"
                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 font-mono text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-500"
            >{{ old('meta_script', $blog->meta_script ?? '') }}</textarea>

            @error('meta_script')
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
            href="{{ route('blogs.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-gray-100 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
        >
            {{ __('Cancel') }}
        </a>


        {{-- Submit --}}
        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-md bg-blue-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
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

                {{ __('Update Blog Post') }}

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

                {{ __('Create Blog Post') }}

            @endif

        </button>

    </div>

</div>
