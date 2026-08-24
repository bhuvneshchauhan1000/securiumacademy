<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course Category') }}
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">

            @include('partials.flash')


            <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:rounded-xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-fuchsia-600 via-purple-600 to-violet-600 px-6 py-5 sm:px-8">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">

                            <svg class="h-5 w-5 shrink-0 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z">
                                </path>

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 11h8M8 15h5">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-semibold text-white">
                                {{ __('Edit Course Category') }}
                            </h3>

                            <p class="text-sm text-fuchsia-100">
                                {{ __('Update and manage this course category.') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <form
                    method="POST"
                    action="{{ route('course-categories.update', \App\Support\HashId::encode($courseCategory->id)) }}"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-8"
                >

                    @csrf

                    @method('PUT')

                    @include('admin.course-categories._form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
