@php
    $settings = \App\Models\SiteSetting::pluck('value', 'key')->toArray();

    $appName = config('app.name', 'Laravel');

    $site = [
        'name' => !empty($settings['site_name'])
            ? $settings['site_name']
            : $appName,

        'meta_title' => !empty($settings['meta_title_default'])
            ? $settings['meta_title_default']
            : $appName,

        'meta_description' => !empty($settings['meta_description_default'])
            ? $settings['meta_description_default']
            : $appName,

        'favicon' => !empty($settings['site_favicon'])
            ? asset($settings['site_favicon'])
            : asset('favicon.ico'),

        'url' => route('home'),

        'address' => [
            'india' => $settings['address_india'] ?? '',
            'dubai' => $settings['address_dubai'] ?? '',
            'us'    => $settings['address_us'] ?? '',
        ],

        'contact' => [
            'phone'      => $settings['contact_phone'] ?? '',
            'phone_link' => $settings['contact_phone_link'] ?? '',
            'email'      => $settings['contact_email'] ?? '',
            'whatsapp'   => $settings['whatsapp_url'] ?? '',
        ],

        'social' => [
            'facebook'  => $settings['facebook_url'] ?? '#',
            'twitter'   => $settings['twitter_url'] ?? '#',
            'instagram' => $settings['instagram_url'] ?? '#',
            'youtube'   => $settings['youtube_url'] ?? '#',
            'linkedin'  => $settings['linkedin_url'] ?? '#',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ route('home') }}/">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Basic SEO --}}
    <title>@yield('meta_title', $site['meta_title'])</title>

    <meta
        name="description"
        content="@yield('meta_description', $site['meta_description'])"
    >

    <meta
        name="robots"
        content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"
    >

    <link
        rel="canonical"
        href="@yield('canonical_url', url()->current())"
    >

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ $site['favicon'] }}">

    @yield('meta_keywords')

    {{-- Open Graph --}}
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="@yield('og_type', 'website')">

    <meta
        property="og:title"
        content="@yield('meta_title', $site['meta_title'])"
    >

    <meta
        property="og:description"
        content="@yield('meta_description', $site['meta_description'])"
    >

    <meta
        property="og:url"
        content="@yield('canonical_url', url()->current())"
    >

    <meta property="og:site_name" content="{{ $site['name'] }}">

    <meta
        property="article:publisher"
        content="https://www.facebook.com/SecuriumAcademy/"
    >

    <meta
        property="og:image"
        content="@yield('og_image', $site['url'] . '/assets/images/default-banner.png')"
    >

    <meta
        property="og:image:secure_url"
        content="@yield('og_image', $site['url'] . '/assets/images/default-banner.png')"
    >

    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta
        property="og:image:alt"
        content="@yield('meta_title', $site['meta_title'])"
    >

    <meta property="og:image:type" content="image/png">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">

    <meta
        name="twitter:title"
        content="@yield('meta_title', $site['meta_title'])"
    >

    <meta
        name="twitter:description"
        content="@yield('meta_description', $site['meta_description'])"
    >

    <meta name="twitter:site" content="@Securium_academ">
    <meta name="twitter:creator" content="@Securium_academ">

    <meta
        name="twitter:image"
        content="@yield('og_image', $site['url'] . '/assets/images/default-banner.png')"
    >

    {{-- CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    >

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    @yield('head')
</head>

<body>

    @include('site.site-header')

    <main>
        @if (session('enquiry_success'))
            <div
                class="alert alert-success text-center m-0 rounded-0"
                role="alert"
            >
                {{ session('enquiry_success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('site.site-footer')

    {{-- @include('partials.enquiry-modal')

    @include('partials.sticky-form') --}}

    {{-- Bootstrap --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    ></script>

    <script src="{{ asset('assets/js/script.js') }}" defer></script>

    @stack('scripts')

</body>
</html>
