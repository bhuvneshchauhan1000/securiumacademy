<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand logo-wrap" href="{{ route('home') }}">
                <img src="{{ $site['logo'] ?? asset('logo.svg') }}" alt="{{ $site['name'] ?? 'Securium Academy' }} Logo" class="site-logo">
            </a>

            <!-- All Courses Button -->
            <button class="custom-btn" id="megaMenuBtn">
                <img src="{{ asset('images/menu.png') }}" alt="icon"> <span>All Courses</span>
            </button>

            <!-- Mega Menu -->
            <div class="mega-menu" id="megaMenu">
                <div class="menu-container">
                    <!-- Side Menu -->
                    <div class="side-menu">
                        @foreach ($megaMenu as $item)
                            <button class="menu-item" data-target="{{ $item['target'] }}">{{ $item['label'] }}</button>
                        @endforeach
                    </div>

                    <!-- Content Area -->
                    <div class="content-area">

                        @foreach ($megaMenu as $item)
                            <div id="{{ $item['target'] }}" class="content-box">
                                @if ($item['category'] === 'universities')
                                    @php
                                        $currentUniversity = isset($item['university_slug'])
                                            ? $universities->firstWhere('slug', $item['university_slug'])
                                            : null;
                                    @endphp
                                    @if ($currentUniversity)
                                        <p>
                                            <strong><a href="{{ url('university/' . $currentUniversity->slug) }}"
                                                    text-decoration:none;">{{ $currentUniversity->name }}</a></strong>
                                        </p>
                                        <div class="course-container university-course-container">
                                            @php
                                                $catCourses = isset($coursesByCategory[$item['university_slug']])
                                                    ? $coursesByCategory[$item['university_slug']]
                                                    : collect();
                                            @endphp
                                            @forelse ($catCourses as $course)
                                                <a href="{{ url($course->slug) }}" class="course-card">
                                                    @php
                                                        $universityLogo = $currentUniversity->logo;
                                                        $deliveredBy = $course->academy?->logo ? $course->academy : $currentUniversity;
                                                    @endphp
                                                    <div class="course-card-logos">
                                                        @if ($universityLogo)
                                                            <img src="{{ Storage::url($universityLogo) }}"
                                                                alt="{{ $currentUniversity->name }} Logo" class="course-university-logo">
                                                        @endif
                                                        <span class="course-delivered-by">
                                                            <span>Delivered by</span>
                                                            @if ($deliveredBy->logo)
                                                                <img src="{{ Storage::url($deliveredBy->logo) }}"
                                                                    alt="{{ $deliveredBy->name }} Logo">
                                                            @endif
                                                        </span>
                                                        </div>
                                                        <div class="course-card-content">
                                                            <p class="course-card-name">{{ $course->name }}</p>
                                                        </div>
                                                </a>
                                            @empty
                                                <a href="#" class="course-card">
                                                    <p>Courses coming soon</p>
                                                </a>
                                            @endforelse
                                        </div>
                                    @else
                                        <p><strong>Top Universities:</strong></p>
                                        <div class="course-container">
                                            @forelse ($universities as $u)
                                                <div class="course-card">
                                                    @if ($u->logo)
                                                        <img src="{{ asset($u->logo) }}" alt="{{ $u->name }}"
                                                            style="max-width:120px; margin-bottom:8px;">
                                                    @endif
                                                    <p><a href="{{ url('university/' . $u->slug) }}"
                                                            style="color:#fff; text-decoration:none;">{{ $u->name }}</a></p>
                                                </div>
                                            @empty
                                                <a href="#" class="course-card">
                                                    <p>No universities added yet</p>
                                                </a>
                                            @endforelse
                                        </div>
                                    @endif
                                @else
                                    <p class="{{ isset($item['logo']) && $item['logo'] ? 'title-with-logo' : '' }}">
                                        @if (isset($item['logo']) && $item['logo'])
                                            <img src="{{ asset($item['logo']) }}" alt="{{ $item['label'] }} Logo">
                                        @endif
                                        <strong>{{ $item['label'] }}:</strong>
                                    </p>
                                    <div class="course-container">
                                        @php
                                            $catCourses = isset($coursesByCategory[$item['category']]) ? $coursesByCategory[$item['category']] : collect();
                                        @endphp
                                        @forelse ($catCourses as $course)
                                            <a href="{{ url($course->slug) }}" class="course-card {{ $item['card_class'] ?? '' }}">
                                                <p>{{ $course->name }}</p>
                                            </a>
                                        @empty
                                            <a href="#" class="course-card">
                                                <p>Courses coming soon</p>
                                            </a>
                                        @endforelse
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Navbar Toggle (Mobile View) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Center Menu -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ecitAcademyDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Course From Securium Academy
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="ecitAcademyDropdown">
                            @foreach ($secMenuItems as $item)
                                <li><a class="dropdown-item"
                                        href="{{ url(ltrim($item['url'], '/')) }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://elearn.securiumacademy.com/">eLearn</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://securiumx.com/">Securiumx</a></li>

                    <li class="nav-item dropdown ms-lg-3">
                        <button class="btn btn-light dropdown-toggle" type="button" id="payNowDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" style="background:#5cc7cc; color:#fff;">
                            <img src="{{ asset('images/menu.png') }}" alt="icon" style="width:26px;">
                            Pay Now
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="payNowDropdown">
                            <li><a class="dropdown-item" href="https://pages.razorpay.com/pl_GdJu7xc4YMW3LZ/view"
                                    target="_blank">USD</a></li>
                            <li><a class="dropdown-item" href="https://pages.razorpay.com/pl_HhWttIXw6rFLR9/view"
                                    target="_blank">INR</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown flag-dropdown ms-lg-3">
                        <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button"
                            id="flagDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://flagcdn.com/w20/sa.png" class="flag-icon me-2" alt="Region">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="flagDropdown">
                            @php
                                $flags = [
                                    ['sa', 'Saudi Arabia', 'oscp-training-in-saudi-arabia'],
                                    ['om', 'Oman', 'oscp-training-in-oman'],
                                    ['qa', 'Qatar', 'oscp-training-in-qatar'],
                                    ['kw', 'Kuwait', 'oscp-training-in-kuwait'],
                                    ['ae', 'Dubai', 'oscp-training-in-dubai'],
                                ];
                            @endphp
                            @foreach ($flags as $flag)
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url($flag[2]) }}">
                                        <img src="https://flagcdn.com/w20/{{ $flag[0] }}.png" class="flag-icon me-2">
                                        {{ $flag[1] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item d-lg-none mt-3">
                        <div class="search-box mobile-search">
                            <input type="text" class="search-input" placeholder="Search courses..."
                                id="mobileSearchInput" autocomplete="off">
                            <svg class="search-icon" viewBox="0 0 24 24">
                                <path fill="white"
                                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C8.01 14 6 11.99 6 9.5S8.01 5 10.5 5 15 7.01 15 9.5 12.99 14 10.5 14z" />
                            </svg>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="search-box d-none d-lg-flex" id="searchBox">
                <input type="text" class="search-input" placeholder="Search courses..." id="searchInput"
                    autocomplete="off">
                <svg class="search-icon" viewBox="0 0 24 24">
                    <path fill="white"
                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C8.01 14 6 11.99 6 9.5S8.01 5 10.5 5 15 7.01 15 9.5 12.99 14 10.5 14z" />
                </svg>
            </div>

            <script>
                function initSearch(inputId, boxId) {
                    const box = boxId ? document.getElementById(boxId) : null;
                    const input = document.getElementById(inputId);
                    if (!input) return;
                    input.addEventListener("keydown", function (e) {
                        if (e.key === "Enter") {
                            const q = input.value.trim();
                            if (q) window.location.href = "{{ url('search') }}?q=" + encodeURIComponent(q);
                        }
                    });
                    input.addEventListener("focus", () => box && box.classList.add("active"));
                    input.addEventListener("blur", () => {
                        if (input.value.trim() === "" && box) box.classList.remove("active");
                    });
                }
                initSearch("searchInput", "searchBox");
                initSearch("mobileSearchInput", null);
            </script>

        </div>
    </nav>


</header>


<!-- Mega Menu JavaScript - Mobile Click + Desktop Hover + Proper Scrolling -->
<script>
    $(document).ready(function () {
        const isMobile = $(window).width() <= 1200;

        function openMenu() {
            $("#megaMenu").stop(true, true).slideDown(300);
        }
        function closeMenu() {
            $("#megaMenu").stop(true, true).slideUp(300);
        }

        if (isMobile) {
            $("#megaMenuBtn").off('hover').on('click', function (e) {
                e.stopPropagation();
                $("#megaMenu").is(":visible") ? closeMenu() : openMenu();
            });

            $(document).on('click', function (e) {
                if ($(e.target).closest('[data-bs-toggle="dropdown"], .dropdown-menu').length) return;
                if ($("#megaMenu").is(":visible")) closeMenu();
            });

            $("#megaMenu, #megaMenuBtn").on('click', function (e) {
                e.stopPropagation();
            });
        } else {
            $("#megaMenuBtn, #megaMenu").hover(
                function () {
                    openMenu();
                },
                function () {
                    setTimeout(function () {
                        if (!$("#megaMenu").is(":hover") && !$("#megaMenuBtn").is(":hover")) {
                            closeMenu();
                        }
                    }, 300);
                }
            );
        }

        $(".menu-item").on('click', function () {
            $(".content-box").hide();
            const target = $(this).data("target");
            $("#" + target).fadeIn(300);
        });

        $(".content-box").hide();
        if ($(".content-box").length > 0) {
            $(".menu-item").first().trigger("click");
        }
    });
</script>