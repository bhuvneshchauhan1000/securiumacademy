<aside
    class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 dark:bg-gray-950 transform transition-transform duration-200 ease-in-out -translate-x-full lg:translate-x-0"
    :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
>
    <div class="flex h-16 items-center justify-between border-b border-gray-800 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            @if ($logo = \App\Models\SiteSetting::get('site_logo'))
                <img src="{{ asset($logo) }}" alt="{{ config('app.name', 'Laravel') }}" class="h-12 w-auto" />
            @else
                <x-application-logo class="h-8 w-auto fill-current text-white" />
            @endif
            <!-- <span class="text-lg font-semibold text-white">{{ config('app.name', 'Laravel') }}</span> -->
        </a>

        <button @click="sidebarOpen = false" class="text-gray-400 hover:text-white lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <nav class="mt-2 h-[calc(100%-4rem)] overflow-y-auto px-3 pb-6">
        @can('view-dashboard')
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                {{ __('Dashboard') }}
            </x-sidebar-link>
        @endcan

        @canany(['view-blogs', 'view-blog-categories'])
            <x-sidebar-section label="{{ __('Blog Management') }}" />
        @endcanany

        @can('view-blogs')
            <x-sidebar-link :href="route('blogs.index')" :active="request()->routeIs('blogs.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-8 4h5m-9-9h14a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V9a2 2 0 012-2z"></path>
                </svg>
                {{ __('Blog Posts') }}
            </x-sidebar-link>
        @endcan

        @can('view-blog-categories')
            <x-sidebar-link :href="route('blog-categories.index')" :active="request()->routeIs('blog-categories.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                {{ __('Blog Categories') }}
            </x-sidebar-link>
        @endcan

        @canany(['view-users', 'view-roles', 'view-permissions'])
            <x-sidebar-section label="{{ __('User Management') }}" />
        @endcanany

        @can('view-users')
            <x-sidebar-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                {{ __('Users') }}
            </x-sidebar-link>
        @endcan

        @can('view-roles')
            <x-sidebar-link :href="route('roles.index')" :active="request()->routeIs('roles.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                {{ __('Roles') }}
            </x-sidebar-link>
        @endcan

        @can('view-permissions')
            <x-sidebar-link :href="route('permissions.index')" :active="request()->routeIs('permissions.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ __('Permissions') }}
            </x-sidebar-link>
        @endcan

        @can('edit-site-settings')
            <x-sidebar-section label="{{ __('Site Settings') }}" />
            <x-sidebar-link :href="route('site-settings.edit')" :active="request()->routeIs('site-settings.*')">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543-.826-3 .826z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ __('Site Settings') }}
            </x-sidebar-link>
        @endcan

        <x-sidebar-section label="{{ __('Account') }}" />

        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            {{ __('Profile') }}
        </x-sidebar-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-sidebar-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                {{ __('Log Out') }}
            </x-sidebar-link>
        </form>
    </nav>
</aside>

{{-- Mobile overlay --}}
<div
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition.opacity
    class="fixed inset-0 z-30 bg-gray-900/60 lg:hidden"
></div>
