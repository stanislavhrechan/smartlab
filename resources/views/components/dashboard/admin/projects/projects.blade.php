<div class="min-h-screen">
    <div class="mx-auto max-w-[1600px]">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-4">

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-blue-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-blue-600 border-t-4 border-t-blue-400">
                <h3 class="text-white font-semibold text-sm mb-1">Všetky projekty</h3>
                <span class="text-md font-medium">24</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-yellow-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-yellow-600 border-t-4 border-t-yellow-400">
                <h3 class="text-white font-semibold text-sm mb-1">Aktívne projekty</h3>
                <span class="text-lg font-medium">12</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-emerald-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-emerald-600 border-t-4 border-t-emerald-400">
                <h3 class="text-white font-semibold text-sm mb-1">Dokončené projekty</h3>
                <span class="text-lg font-medium">7</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-gray-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-gray-600 border-t-4 border-t-gray-400">
                <span class="text-white font-semibold text-sm mb-1">Vytvorit' projekt</span>
                <div class="">
                    
                </div>
            </div>

        </div>

        <div class="max-h-[550px] overflow-auto">

            <table class="w-full text-left">

                <thead class="sticky top-0 z-10 bg-gray-50">
                    <tr class="text-[11px] font-medium uppercase tracking-wider text-gray-400">
                        <th class="px-6 py-4">Projekt</th>
                        <th class="px-6 py-4">Projekt ID</th>
                        <th class="px-6 py-4">Vlastník</th>
                        <th class="px-6 py-4">Partneri</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Akcia</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach([
                        ['name' => 'Smart City Trnava', 'description' => 'Digitalizácia mestských služieb', 'id' => 'PRJ-00124', 'owner' => 'Martin Novák', 'email' => 'martin.novak@ucm.sk', 'partners' => '4 partneri', 'status' => 'Active', 'initials' => 'SC'],
                        ['name' => 'Digital Education', 'description' => 'Inovatívne vzdelávacie riešenia', 'id' => 'PRJ-00125', 'owner' => 'Lucia Kováčová', 'email' => 'lucia.k@ucm.sk', 'partners' => '3 partneri', 'status' => 'Active', 'initials' => 'DE'],
                        ['name' => 'Green Campus', 'description' => 'Udržateľnosť univerzitného prostredia', 'id' => 'PRJ-00126', 'owner' => 'Peter Horváth', 'email' => 'peter.h@ucm.sk', 'partners' => '2 partneri', 'status' => 'Completed', 'initials' => 'GC'],
                        ['name' => 'AI Research Lab', 'description' => 'Výskum umelej inteligencie', 'id' => 'PRJ-00127', 'owner' => 'Anna Šimková', 'email' => 'anna.s@ucm.sk', 'partners' => '5 partneri', 'status' => 'Pending', 'initials' => 'AI'],
                        ['name' => 'Digital Government', 'description' => 'Modernizácia verejnej správy', 'id' => 'PRJ-00128', 'owner' => 'Tomáš Bielik', 'email' => 'tomas.b@ucm.sk', 'partners' => '6 partneri', 'status' => 'Active', 'initials' => 'DG'],
                        ['name' => 'Innovation Hub', 'description' => 'Podpora technologických inovácií', 'id' => 'PRJ-00129', 'owner' => 'Nina Poláková', 'email' => 'nina.p@ucm.sk', 'partners' => '3 partneri', 'status' => 'Inactive', 'initials' => 'IH'],
                    ] as $project)

                        <tr class="group transition hover:bg-gray-50/70">

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#EDF0F6] text-xs font-semibold text-[#263652]">
                                        {{ $project['initials'] }}
                                    </div>

                                    <div>
                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $project['name'] }}
                                        </p>

                                        <p class="mt-1 text-xs text-gray-400">
                                            {{ $project['description'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $project['id'] }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        {{ $project['owner'] }}
                                    </p>

                                    <p class="mt-1 text-xs text-gray-400">
                                        {{ $project['email'] }}
                                    </p>
                                </div>
                            </td>

                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $project['partners'] }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-4">
                                @php
                                    $styles = [
                                        'Active' => 'bg-emerald-50 text-emerald-700',
                                        'Pending' => 'bg-amber-50 text-amber-700',
                                        'Completed' => 'bg-blue-50 text-blue-700',
                                        'Inactive' => 'bg-gray-100 text-gray-500',
                                    ];
                                @endphp

                                <span class="rounded-full px-3 py-1.5 text-xs font-medium {{ $styles[$project['status']] }}">
                                    {{ $project['status'] }}
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


        <div class="flex flex-col justify-between gap-3 border-t border-gray-100 px-6 py-4 sm:flex-row sm:items-center">

            <p class="text-xs text-gray-400">
                Showing <span class="font-medium text-gray-700">1–6</span> of <span class="font-medium text-gray-700">12</span> projects
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
                    Next
                </button>
            </div>

        </div>

        

    </div>
</div>