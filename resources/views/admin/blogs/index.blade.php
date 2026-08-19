<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @include('partials.flash')

            <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}
                <div class="flex flex-col gap-4 bg-gradient-to-r from-blue-600 via-blue-600 to-indigo-600 px-6 py-5 sm:px-8 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Title --}}
                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            <svg class="h-6 w-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM7 8h10M7 12h10M7 16h6">
                                </path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Blog Post Management') }}
                            </h3>

                            <p class="text-sm text-blue-100">
                                {{ __('Create, edit and manage your blog posts.') }}
                            </p>

                        </div>

                    </div>


                    {{-- Search + Create --}}
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                        {{-- Search --}}
                        <form method="GET"
                            action="{{ route('blogs.index') }}"
                            class="flex flex-col gap-2 sm:flex-row">

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                                    <svg class="h-4 w-4 text-blue-100"
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
                                    placeholder="{{ __('Search posts...') }}"
                                    class="block w-full rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-blue-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0 sm:w-56"
                                >

                            </div>


                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">

                                {{ __('Search') }}

                            </button>


                            @if (request('search'))

                                <a href="{{ route('blogs.index') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white backdrop-blur hover:bg-white/30">

                                    {{ __('Clear') }}

                                </a>

                            @endif

                        </form>


                        {{-- Create --}}
                        @can('create-blogs')

                            <a href="{{ route('blogs.create') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-blue-700 shadow-sm hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-white">

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

                                {{ __('New Post') }}

                            </a>

                        @endcan

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Empty State --}}
                {{-- ========================================================= --}}
                @if ($blogs->count() === 0)

                    <div class="px-6 py-16 sm:px-8">

                        <div class="flex flex-col items-center justify-center text-center">

                            {{-- Icon --}}
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/50">

                                <svg class="h-8 w-8 text-blue-600 dark:text-blue-300"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm4 3h8M8 12h8M8 16h5">
                                    </path>

                                </svg>

                            </div>


                            {{-- Title --}}
                            <h3 class="mt-5 text-lg font-semibold text-gray-900 dark:text-gray-100">

                                @if (request('search'))
                                    {{ __('No Blog Posts Found') }}
                                @else
                                    {{ __('No Blog Posts') }}
                                @endif

                            </h3>


                            {{-- Description --}}
                            <p class="mt-2 max-w-md text-sm text-gray-500 dark:text-gray-400">

                                @if (request('search'))

                                    {{ __('No blog posts matched your search. Try a different keyword.') }}

                                @else

                                    {{ __('You don’t have any blog posts yet. Create your first post to get started.') }}

                                @endif

                            </p>


                            {{-- Create --}}
                            @can('create-blogs')

                                @if (!request('search'))

                                    <a href="{{ route('blogs.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-md bg-blue-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">

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

                                    </a>

                                @endif

                            @endcan

                        </div>

                    </div>

                @else


                    {{-- ========================================================= --}}
                    {{-- Blog Table --}}
                    {{-- ========================================================= --}}
                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            {{-- Table Header --}}
                            <thead class="bg-gray-50 dark:bg-gray-700/50">

                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Post') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Category') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Status') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Author') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Created') }}
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Actions') }}
                                    </th>

                                </tr>

                            </thead>


                            {{-- Table Body --}}
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($blogs as $blog)

                                    <tr class="transition hover:bg-blue-50/50 dark:hover:bg-blue-900/10">


                                        {{-- ================================================= --}}
                                        {{-- Post --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            <div class="flex items-center gap-3">

                                                {{-- Feature Image --}}
                                                @if ($blog->feature_image)

                                                    <img
                                                        src="{{ Storage::url($blog->feature_image) }}"
                                                        alt="{{ $blog->title }}"
                                                        class="h-12 w-16 shrink-0 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                                                    >

                                                @else

                                                    <div class="flex h-12 w-16 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-lg font-semibold text-white">

                                                        {{ strtoupper(substr($blog->title, 0, 1)) }}

                                                    </div>

                                                @endif


                                                {{-- Title --}}
                                                <div class="min-w-0">

                                                    <p class="max-w-sm truncate text-sm font-semibold text-gray-900 dark:text-gray-100">

                                                        {{ $blog->title }}

                                                    </p>

                                                    <p class="mt-0.5 max-w-sm truncate text-xs text-gray-500 dark:text-gray-400">

                                                        {{ $blog->slug }}

                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Category --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            @if ($blog->blogCategory && $blog->blogCategory->count())

                                                <div class="flex flex-wrap gap-1">

                                                    <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">

                                                            {{ $blog->blogCategory->name }}

                                                        </span>

                                                </div>

                                            @else

                                                <span class="text-sm text-gray-400 dark:text-gray-500">

                                                    {{ __('Uncategorized') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Status --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            @if ($blog->status === 'published')

                                                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                                    {{ __('Published') }}

                                                </span>

                                            @else

                                                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-1 text-xs font-medium text-yellow-700 dark:bg-yellow-900/50 dark:text-yellow-300">

                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                                    {{ __('Draft') }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Author --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4">

                                            <div class="flex items-center gap-2">

                                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-xs font-semibold text-blue-700 dark:bg-blue-900/50 dark:text-blue-300">

                                                    {{ strtoupper(substr($blog->user?->name ?? 'U', 0, 1)) }}

                                                </div>

                                                <span class="text-sm text-gray-600 dark:text-gray-300">

                                                    {{ $blog->user?->name ?? __('Unknown') }}

                                                </span>

                                            </div>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Created --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">

                                            <div>
                                                {{ $blog->created_at->format('M d, Y') }}
                                            </div>

                                            <div class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">
                                                {{ $blog->created_at->format('h:i A') }}
                                            </div>

                                        </td>


                                        {{-- ================================================= --}}
                                        {{-- Actions --}}
                                        {{-- ================================================= --}}
                                        <td class="px-6 py-4 text-right text-sm whitespace-nowrap">

                                            <div class="flex items-center justify-end gap-2">


                                                {{-- Edit --}}
                                                @can('edit-blogs')

                                                    <a href="{{ route('blogs.edit', \App\Support\HashId::encode($blog->id)) }}"
                                                        class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">

                                                        <svg class="h-3.5 w-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>

                                                        </svg>

                                                        {{ __('Edit') }}

                                                    </a>

                                                @endcan


                                                {{-- Delete --}}
                                                @can('delete-blogs')

                                                    <form
                                                        method="POST"
                                                        action="{{ route('blogs.destroy', \App\Support\HashId::encode($blog->id)) }}"
                                                        class="inline"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to delete this blog post?') }}');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="inline-flex items-center gap-1 rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">

                                                            <svg class="h-3.5 w-3.5"
                                                                fill="none"
                                                                stroke="currentColor"
                                                                viewBox="0 0 24 24">

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


                    {{-- ========================================================= --}}
                    {{-- Pagination --}}
                    {{-- ========================================================= --}}
                    @if ($blogs->hasPages())

                        <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">

                            {{ $blogs->withQueryString()->links() }}

                        </div>

                    @endif

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
