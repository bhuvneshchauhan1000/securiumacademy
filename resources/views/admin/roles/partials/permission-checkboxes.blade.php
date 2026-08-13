@php
    $palette = [
        'indigo' => ['bg-indigo-50 dark:bg-indigo-900/20', 'text-indigo-600 focus:ring-indigo-500 dark:text-indigo-500'],
        'emerald' => ['bg-emerald-50 dark:bg-emerald-900/20', 'text-emerald-600 focus:ring-emerald-500 dark:text-emerald-500'],
        'sky' => ['bg-sky-50 dark:bg-sky-900/20', 'text-sky-600 focus:ring-sky-500 dark:text-sky-500'],
        'amber' => ['bg-amber-50 dark:bg-amber-900/20', 'text-amber-600 focus:ring-amber-500 dark:text-amber-500'],
        'fuchsia' => ['bg-fuchsia-50 dark:bg-fuchsia-900/20', 'text-fuchsia-600 focus:ring-fuchsia-500 dark:text-fuchsia-500'],
        'rose' => ['bg-rose-50 dark:bg-rose-900/20', 'text-rose-600 focus:ring-rose-500 dark:text-rose-500'],
        'teal' => ['bg-teal-50 dark:bg-teal-900/20', 'text-teal-600 focus:ring-teal-500 dark:text-teal-500'],
        'violet' => ['bg-violet-50 dark:bg-violet-900/20', 'text-violet-600 focus:ring-violet-500 dark:text-violet-500'],
    ];
@endphp

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($permissionGroups as $module => $permissions)
        @php
            $groupClass = 'group_' . str_replace('-', '_', $module);
            $label = ucwords(str_replace('-', ' ', $module));
            [$headerClass, $checkboxClass] = array_values($palette)[$loop->index % count($palette)];
            $selectedCount = collect($permissions)->filter(fn ($p) => in_array($p->name, $rolePermissions ?? []))->count();
        @endphp

        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between gap-2 border-b border-gray-100 px-4 py-3 dark:border-gray-700 {{ $headerClass }}">
                <label class="flex cursor-pointer items-center gap-2">
                    <input
                        type="checkbox"
                        class="select-all h-4 w-4 rounded border-gray-300 shadow-sm {{ $checkboxClass }} dark:border-gray-600 dark:ring-offset-gray-800"
                        data-target="{{ $groupClass }}"
                        @checked($selectedCount === count($permissions))
                    >
                    <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $label }}</span>
                </label>
                <span class="rounded-full bg-white px-2 py-0.5 text-xs font-medium text-gray-500 shadow-sm dark:bg-gray-800 dark:text-gray-400">{{ $selectedCount }}/{{ count($permissions) }}</span>
            </div>

            <div class="space-y-1 p-3">
                @foreach ($permissions as $permission)
                    <label class="group flex cursor-pointer items-center gap-2 rounded-lg px-2 py-1.5 transition hover:bg-gray-50 dark:hover:bg-gray-700/40">
                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->name }}"
                            @checked(in_array($permission->name, $rolePermissions ?? []))
                            class="{{ $groupClass }} h-4 w-4 rounded border-gray-300 shadow-sm {{ $checkboxClass }} dark:border-gray-600 dark:ring-offset-gray-800"
                        >
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-gray-100">{{ ucwords(str_replace('-', ' ', $permission->name)) }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<script>
    document.querySelectorAll('.select-all').forEach((el) => {
        el.addEventListener('change', () => {
            document.querySelectorAll('.' + el.dataset.target).forEach((checkbox) => {
                checkbox.checked = el.checked;
            });
        });
    });
</script>
