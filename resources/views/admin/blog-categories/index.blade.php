<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @include('partials.flash')

            @if ($categories->count())

                {{-- Categories exist --}}
                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                    {{-- Header --}}
                    <div class="flex flex-col gap-4 bg-gradient-to-r from-sky-600 via-blue-600 to-indigo-600 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">

                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h10M4 18h6">
                                    </path>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold text-white">
                                    {{ __('Blog Category Management') }}
                                </h3>

                                <p class="text-sm text-sky-100">
                                    {{ __('Create, edit and manage blog categories.') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                            {{-- Search --}}
                            <form method="GET"
                                action="{{ route('blog-categories.index') }}"
                                class="flex gap-2">

                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-4 w-4 text-gray-400"
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

                                    <input
                                        type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="{{ __('Search categories...') }}"
                                        class="block w-56 rounded-md border-transparent bg-white/20 py-2 pl-9 pr-3 text-sm text-white placeholder-sky-100 shadow-sm backdrop-blur focus:border-white focus:bg-white/30 focus:ring-0"
                                    >
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center rounded-md bg-white/20 px-3 py-2 text-xs font-semibold text-white uppercase tracking-widest backdrop-blur hover:bg-white/30">
                                    {{ __('Search') }}
                                </button>

                                @if (request('search'))
                                    <a href="{{ route('blog-categories.index') }}"
                                        class="inline-flex items-center rounded-md bg-white/20 px-3 py-2 text-xs font-semibold text-white uppercase tracking-widest backdrop-blur hover:bg-white/30">
                                        {{ __('Clear') }}
                                    </a>
                                @endif

                            </form>

                            @can('create-blog-categories')
                                <a href="{{ route('blog-categories.create') }}"
                                    class="inline-flex items-center justify-center gap-1 rounded-md bg-white px-4 py-2 text-xs font-semibold text-sky-700 uppercase tracking-widest shadow-sm hover:bg-sky-50">

                                    <svg class="h-4 w-4" fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4">
                                        </path>
                                    </svg>

                                    {{ __('New Category') }}
                                </a>
                            @endcan

                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Image') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Name') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Slug') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Status') }}
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Created') }}
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($categories as $category)

                                    <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-700/30">

                                        <td class="px-6 py-4">
                                            @if ($category->feature_image)
                                                <img
                                                    src="{{ Storage::url($category->feature_image) }}"
                                                    alt="{{ $category->name }}"
                                                    class="h-10 w-10 rounded-lg object-cover ring-1 ring-gray-200 dark:ring-gray-700"
                                                >
                                            @else
                                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-sky-500 to-indigo-500 text-sm font-semibold text-white">
                                                    {{ strtoupper(substr($category->name, 0, 1)) }}
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">

                                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $category->name }}
                                                </span>

                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ $category->slug }}
                                        </td>

                                        <td class="px-6 py-4">

                                            @if ($category->status === 'published')
                                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">
                                                    {{ __('Published') }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-700 dark:bg-yellow-900/50 dark:text-yellow-300">
                                                    {{ __('Draft') }}
                                                </span>
                                            @endif

                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ $category->created_at->format('M d, Y') }}
                                        </td>

                                        <td class="px-6 py-4 text-right whitespace-nowrap">

                                            @can('edit-blog-categories')
                                                <a href="{{ route('blog-categories.edit', \App\Support\HashId::encode($category->id)) }}"
                                                    class="inline-flex items-center gap-1 rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-indigo-500">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan

                                            @can('delete-blog-categories')
                                                <form
                                                    method="POST"
                                                    action="{{ route('blog-categories.destroy', \App\Support\HashId::encode($category->id)) }}"
                                                    class="inline"
                                                    onsubmit="return confirm('{{ __('Are you sure you want to delete this category?') }}');"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="ms-2 inline-flex items-center gap-1 rounded-md bg-red-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-red-500">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @if ($categories->hasPages())
                        <div class="border-t border-gray-100 px-6 py-4 dark:border-gray-700">
                            {{ $categories->links() }}
                        </div>
                    @endif

                </div>

            @else

                {{-- Empty state --}}
                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm ring-1 ring-gray-200 dark:ring-gray-700 sm:rounded-xl">

                    <div class="px-6 py-10 sm:px-8">

                        <div class="flex flex-col items-center justify-center text-center">

                            {{-- Icon --}}
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-100 dark:bg-indigo-900/40">

                                <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 6h16M4 10h16M4 14h10M4 18h6">
                                    </path>

                                </svg>

                            </div>

                            {{-- Title --}}
                            <h3 class="mt-5 text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('No Blog Categories') }}
                            </h3>

                            {{-- Description --}}
                            <p class="mt-2 max-w-md text-sm text-gray-500 dark:text-gray-400">
                                {{ __('You don’t have any blog categories yet. Create your first category to start organizing your blog posts.') }}
                            </p>

                            {{-- Button --}}
                            @can('create-blog-categories')
                                <a href="{{ route('blog-categories.create') }}"
                                    class="mt-6 inline-flex items-center gap-2 rounded-md bg-indigo-600 px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

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

                                </a>
                            @endcan

                        </div>

                    </div>

                </div>

            @endif

        </div>
    </div>
</x-app-layout>