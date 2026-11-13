<div class="min-h-screen">

<div class="mx-auto max-w-[1600px]">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-4">

        <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-blue-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-blue-600">
            <h3 class="text-white font-semibold text-sm mb-1">Všetky </h3>
            <span class="text-md font-medium">12</span>
        </div>

        <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-yellow-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-yellow-600">
            <h3 class="text-white font-semibold text-sm mb-1">Aktívny </h3>
            <span class="text-lg font-medium">6</span>
        </div>

        <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-emerald-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-emerald-600">
            <h3 class="text-white font-semibold text-sm mb-1">Účastníci projektu</h3>
            <span class="text-lg font-medium">3</span>
        </div>

    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200/80 bg-white">

        <div class="flex flex-col justify-between gap-4 border-b border-gray-100 p-5 lg:flex-row lg:items-center">

            <div>
                <h2 class="text-base font-semibold text-gray-900">
                   Zoznam študentov
                </h2>

                <p class="mt-1 text-xs text-gray-400">
                    Evidencia registrovaných študentov.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">

                <div class="flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2.5">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" d="m16 16 4 4"/>
                    </svg>

                    <input
                        type="text"
                        placeholder="Hľadať študenta..."
                        class="w-48 border-0 bg-transparent p-0 text-sm outline-none focus:ring-0"
                    >
                </div>

                <button class="flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M7 12h10m-7 5h4"/>
                    </svg>
                    Filters
                </button>

            </div>

        </div>

        {{-- Table --}}
        <div class="max-h-[350px] overflow-auto">

            <table class="w-full text-left">

                <thead class="sticky top-0 z-10 bg-gray-50">
                    <tr class="text-[11px] font-medium uppercase tracking-wider text-gray-400">
                        <th class="px-6 py-4">Študent</th>
                        <th class="px-6 py-4">Študent ID</th>
                        <th class="px-6 py-4">Študijný program</th>
                        <th class="px-6 py-4">Ročník</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Akcia</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach([
                        ['name' => 'Martin Novák', 'email' => 'martin.novak@ucm.sk', 'id' => 'STU-00124', 'program' => 'Informatics', 'year' => '2nd year', 'status' => 'Active', 'initials' => 'MN'],
                        ['name' => 'Lucia Kováčová', 'email' => 'lucia.k@ucm.sk', 'id' => 'STU-00125', 'program' => 'Management', 'year' => '1st year', 'status' => 'Active', 'initials' => 'LK'],
                        ['name' => 'Peter Horváth', 'email' => 'peter.h@ucm.sk', 'id' => 'STU-00126', 'program' => 'Economics', 'year' => '3rd year', 'status' => 'Pending', 'initials' => 'PH'],
                        ['name' => 'Anna Šimková', 'email' => 'anna.s@ucm.sk', 'id' => 'STU-00127', 'program' => 'Informatics', 'year' => '2nd year', 'status' => 'Active', 'initials' => 'AŠ'],
                        ['name' => 'Tomáš Bielik', 'email' => 'tomas.b@ucm.sk', 'id' => 'STU-00128', 'program' => 'Marketing', 'year' => '1st year', 'status' => 'Inactive', 'initials' => 'TB'],
                        ['name' => 'Nina Poláková', 'email' => 'nina.p@ucm.sk', 'id' => 'STU-00129', 'program' => 'Management', 'year' => '3rd year', 'status' => 'Active', 'initials' => 'NP'],
                    ] as $student)

                        <tr class="group transition hover:bg-gray-50/70">

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#EDF0F6] text-xs font-semibold text-[#263652]">
                                        {{ $student['initials'] }}
                                    </div>

                                    <div>
                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $student['name'] }}
                                        </p>

                                        <p class="mt-1 text-xs text-gray-400">
                                            {{ $student['email'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $student['id'] }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $student['program'] }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $student['year'] }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                @php
                                    $styles = [
                                        'Active' => 'bg-emerald-50 text-emerald-700',
                                        'Pending' => 'bg-amber-50 text-amber-700',
                                        'Inactive' => 'bg-gray-100 text-gray-500',
                                    ];
                                @endphp

                                <span class="rounded-full px-3 py-1.5 text-xs font-medium {{ $styles[$student['status']] }}">
                                    {{ $student['status'] }}
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-right">
                                <button class="rounded-lg p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-700">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <circle cx="5" cy="12" r="1"/>
                                        <circle cx="12" cy="12" r="1"/>
                                        <circle cx="19" cy="12" r="1"/>
                                    </svg>
                                </button>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="flex flex-col justify-between gap-3 border-t border-gray-100 px-6 py-4 sm:flex-row sm:items-center">

            <p class="text-xs text-gray-400">
                Showing <span class="font-medium text-gray-700">1–6</span> of <span class="font-medium text-gray-700">248</span> students
            </p>

            <div class="flex items-center gap-1">
                <button class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-400">
                    Previous
                </button>

                <button class="rounded-lg bg-[#263652] px-3 py-2 text-xs font-medium text-white">
                    1
                </button>

                <button class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-600">
                    2
                </button>

                <button class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-600">
                    3
                </button>

                <button class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-600">
                    Next
                </button>
            </div>

        </div>

    </div>


</div>
</div>
