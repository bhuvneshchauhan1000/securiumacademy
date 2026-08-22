<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Academy') }}
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">

            @include('partials.flash')


            <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:rounded-xl">

                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}

                <div class="bg-gradient-to-r from-amber-500 via-amber-500 to-orange-500 px-6 py-5 sm:px-8">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            <svg class="h-5 w-5 shrink-0 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M22 10l-10-5L2 10l10 5 10-5z">
                                </path>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 12v4c0 1.5 3.5 3 6 3s6-1.5 6-3v-4">
                                </path>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M22 10v6">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Create Academy') }}
                            </h3>

                            <p class="text-sm text-amber-100">
                                {{ __('Create a new academy for your website.') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Form --}}
                {{-- ========================================================= --}}

                <form
                    method="POST"
                    action="{{ route('academies.store') }}"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-8"
                >

                    @csrf

                    @include('admin.academies._form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
