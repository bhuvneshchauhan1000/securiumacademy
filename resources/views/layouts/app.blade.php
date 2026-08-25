<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if ($site_name = \App\Models\SiteSetting::get('site_name'))
            <meta name="title" content="{{ $site_name }}">
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>
        @endif

        
        @if ($favicon = \App\Models\SiteSetting::get('site_favicon'))
            <link rel="icon" href="{{ asset($favicon) }}" type="image/x-icon" />
        @endif

        @if ($meta_title = \App\Models\SiteSetting::get('meta_title_default'))
            <meta name="title" content="{{ $meta_title }}">
        @else
            <meta name="title" content="{{ config('app.name', 'Laravel') }}">
        @endif
        @if ($meta_description = \App\Models\SiteSetting::get('meta_description_default'))
            <meta name="description" content="{{ $meta_description }}">
        @else
            <meta name="description" content="{{ config('app.name', 'Laravel') }}">
        @endif


        <!-- favicon -->
        @if ($favicon = \App\Models\SiteSetting::get('site_favicon'))
            <link rel="icon" type="image/png" href="{{ asset($favicon) }}">
        @else
            <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
        @endif
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.sidebar')

            <div class="flex min-h-screen flex-col lg:pl-64">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="px-4 py-6 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
