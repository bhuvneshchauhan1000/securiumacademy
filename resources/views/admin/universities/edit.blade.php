<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit University') }}
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">

            @include('partials.flash')


            <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:rounded-xl">


                {{-- ========================================================= --}}
                {{-- Header --}}
                {{-- ========================================================= --}}

                <div class="bg-gradient-to-r from-teal-600 via-teal-600 to-cyan-600 px-6 py-5 sm:px-8">

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
                                {{ __('Edit University') }}
                            </h3>

                            <p class="text-sm text-teal-100">
                                {{ __('Update and manage this university.') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- Form --}}
                {{-- ========================================================= --}}

                <form
                    method="POST"
                    action="{{ route('universities.update', \App\Support\HashId::encode($university->id)) }}"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-8"
                >

                    @csrf

                    @method('PUT')

                    @include('admin.universities._form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
