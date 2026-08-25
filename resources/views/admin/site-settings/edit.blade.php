<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            @include('partials.flash')

            <form method="POST" action="{{ route('site-settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl">
                    <div class="bg-gradient-to-r from-teal-600 via-cyan-600 to-indigo-600 px-6 py-6 sm:px-8">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ __('Site Configuration') }}</h3>
                                <p class="text-sm text-cyan-100">{{ __('Manage your site identity, contact information, social links and more.') }}</p>
                            </div>
                        </div>
                    </div>

                    @php
                        $sections = [
                            'General' => [
                                'icon' => 'M3 21h18M4 21V10m5 11V10m5 11V10m5 11V3',
                                'color' => 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300',
                                'fields' => ['site_name', 'site_url'],
                            ],
                            'Branding' => [
                                'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                                'color' => 'bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300',
                                'fields' => ['site_logo', 'site_favicon'],
                            ],
                            'Contact Information' => [
                                'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                                'color' => 'bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300',
                                'fields' => ['contact_phone', 'contact_phone_link', 'contact_email', 'whatsapp_url'],
                            ],
                            'Addresses' => [
                                'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                                'color' => 'bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300',
                                'fields' => ['address_india', 'address_dubai', 'address_us'],
                            ],
                            'Social Links' => [
                                'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
                                'color' => 'bg-fuchsia-100 dark:bg-fuchsia-900/50 text-fuchsia-600 dark:text-fuchsia-300',
                                'fields' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url', 'linkedin_url'],
                            ],
                            'SEO' => [
                                'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                                'color' => 'bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300',
                                'fields' => ['meta_title_default', 'meta_description_default','meta_keyword_default','meta_script_default'],
                            ],
                            'Payments' => [
                                'icon' => 'M3 10h18M7 15h3m-6-8h14a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z',
                                'color' => 'bg-rose-100 dark:bg-rose-900/50 text-rose-600 dark:text-rose-300',
                                'fields' => ['pay_now_usd_url', 'pay_now_inr_url'],
                            ],
                        ];
                        $fileFields = ['site_logo', 'site_favicon'];
                    @endphp

                    <div class="space-y-8 p-6 sm:p-8">
                        @foreach ($sections as $label => $section)
                            <div>
                                <div class="flex items-center gap-2">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg {{ $section['color'] }}">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $section['icon'] }}"></path></svg>
                                    </div>
                                    <h4 class="text-sm font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-100">{{ __($label) }}</h4>
                                </div>

                                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    @foreach ($section['fields'] as $key)
                                        <div class="{{ in_array($key, ['site_name', 'site_url', 'meta_description_default', 'address_india', 'address_dubai', 'address_us']) ? 'sm:col-span-2' : '' }}">
                                            <x-input-label for="{{ $key }}" :value="__(ucwords(str_replace('_', ' ', $key)))" />

                                            @if (in_array($key, $fileFields))
                                                <input id="{{ $key }}" class="mt-1 block w-full cursor-pointer rounded-md border-gray-300 bg-white text-sm text-gray-500 shadow-sm file:mr-4 file:cursor-pointer file:rounded-md file:border-0 file:bg-gray-100 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-gray-600 hover:file:bg-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300 dark:hover:file:bg-gray-700" type="file" name="{{ $key }}" accept="image/*" />
                                                @if ($settings[$key])
                                                    <img src="{{ asset($settings[$key]) }}" alt="{{ __(ucwords(str_replace('_', ' ', $key))) }}" class="mt-3 h-16 w-auto rounded-lg border border-gray-200 dark:border-gray-700 object-contain" />
                                                @endif
                                            @else
                                                <x-text-input id="{{ $key }}" class="mt-1 block w-full" type="text" name="{{ $key }}" :value="old($key, $settings[$key])" required />
                                            @endif

                                            <x-input-error :messages="$errors->get($key)" class="mt-2" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4 dark:border-gray-700 dark:bg-gray-900/50 sm:px-8">
                        <x-primary-button class="bg-teal-600 hover:bg-teal-500 focus:ring-teal-500">{{ __('Update Settings') }}</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
