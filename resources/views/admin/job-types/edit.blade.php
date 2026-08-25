<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Job Type') }}
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">

            @include('partials.flash')


            <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700 sm:rounded-xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-600 px-6 py-5 sm:px-8">

                    <div class="flex items-center justify-between gap-3">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/20">

                                <svg class="h-5 w-5 shrink-0 text-white"
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
                                    {{ __('Edit Job Type') }}
                                </h3>

                                <p class="text-sm text-indigo-100">
                                    {{ __('Update the details of this job type.') }}
                                </p>

                            </div>

                        </div>


                        <a
                            href="{{ route('job-types.index') }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-white/10 px-3 py-2 text-sm font-medium text-white transition hover:bg-white/20"
                        >

                            <svg class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18">
                                </path>

                            </svg>

                            {{ __('Back to List') }}

                        </a>

                    </div>

                </div>


                {{-- Form --}}
                <form
                    method="POST"
                    action="{{ route('job-types.update', $jobType) }}"
                    class="p-6 sm:p-8"
                >

                    @csrf
                    @method('PUT')

                    @include('admin.job-types._form')

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
