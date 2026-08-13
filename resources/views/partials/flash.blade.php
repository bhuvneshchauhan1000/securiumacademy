@if (session('success'))
    <div class="mb-4 rounded-lg bg-green-50 dark:bg-green-900/50 p-4 text-sm text-green-700 dark:text-green-300">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/50 p-4 text-sm text-red-700 dark:text-red-300">
        {{ session('error') }}
    </div>
@endif
