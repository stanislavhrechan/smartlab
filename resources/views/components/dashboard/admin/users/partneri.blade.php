
<div class="min-h-screen">

    <div class="mx-auto max-w-[1600px]">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-4">
            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-blue-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-blue-600 border-t-4 border-t-blue-400">
                <h3 class="text-white font-semibold text-sm mb-1">Všetci partneri</h3>
                <span class="text-md font-medium">18</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-yellow-500 text-white  cursor-pointer transition duration-300 border-b-4 border-t-4 border-b-yellow-600 border-t-yellow-400">
                <h3 class="text-white font-semibold text-sm mb-1">Aktívni partneri</h3>
                <span class="text-lg font-medium">14</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-emerald-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-emerald-600 border-t-4 border-t-emerald-400">
                <h3 class="text-white font-semibold text-sm mb-1">Partneri projektov</h3>
                <span class="text-lg font-medium">7</span>
            </div>

        </div>

        {{-- Partners Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200/80 bg-white">

            {{-- Header --}}
            <div class="flex flex-col justify-between gap-4 border-b border-gray-100 p-5 lg:flex-row lg:items-center">

                <div>
                    <h2 class="text-base font-semibold text-gray-900">
                        Zoznam partnerov
                    </h2>

                    <p class="mt-1 text-xs text-gray-400">
                        Evidencia a správa partnerských organizácií.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-2">

                    {{-- Search --}}
                    <div class="flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2.5">

                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m16 16 4 4"/>
                        </svg>

                        <input
                            type="text"
                            placeholder="Hľadať partnera..."
                            class="w-48 border-0 bg-transparent p-0 text-sm outline-none focus:ring-0"
                        >

                    </div>

                    {{-- Filter --}}
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

                            <th class="px-6 py-4">Partner</th>
                            <th class="px-6 py-4">Partner ID</th>
                            <th class="px-6 py-4">Typ organizácie</th>
                            <th class="px-6 py-4">Projekty</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Akcia</th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach([
                            ['name' => 'Univerzita sv. Cyrila a Metoda', 'email' => 'info@ucm.sk', 'id' => 'PAR-00001', 'type' => 'Vzdelávanie', 'projects' => '3', 'status' => 'Active', 'initials' => 'UCM'],
                            ['name' => 'Mesto Trnava', 'email' => 'info@trnava.sk', 'id' => 'PAR-00002', 'type' => 'Verejná správa', 'projects' => '2', 'status' => 'Active', 'initials' => 'MT'],
                            ['name' => 'Slovak Telekom', 'email' => 'info@telekom.sk', 'id' => 'PAR-00003', 'type' => 'Technológie', 'projects' => '1', 'status' => 'Active', 'initials' => 'ST'],
                            ['name' => 'Kia Slovakia', 'email' => 'info@kia.sk', 'id' => 'PAR-00004', 'type' => 'Priemysel', 'projects' => '0', 'status' => 'Pending', 'initials' => 'KS'],
                            ['name' => 'Innovatrics', 'email' => 'info@innovatrics.com', 'id' => 'PAR-00005', 'type' => 'Technológie', 'projects' => '2', 'status' => 'Active', 'initials' => 'IN'],
                            ['name' => 'Mesto Bratislava', 'email' => 'info@bratislava.sk', 'id' => 'PAR-00006', 'type' => 'Verejná správa', 'projects' => '1', 'status' => 'Inactive', 'initials' => 'MB'],
                            ['name' => 'Microsoft Slovakia', 'email' => 'info@microsoft.com', 'id' => 'PAR-00007', 'type' => 'Technológie', 'projects' => '4', 'status' => 'Active', 'initials' => 'MS'],
                            ['name' => 'Slovenská technická univerzita', 'email' => 'info@stuba.sk', 'id' => 'PAR-00008', 'type' => 'Vzdelávanie', 'projects' => '2', 'status' => 'Active', 'initials' => 'STU'],
                        ] as $partner)

                            <tr class="group transition hover:bg-gray-50/70">

                                {{-- Partner --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#EDF0F6] text-xs font-semibold text-[#263652]">
                                            {{ $partner['initials'] }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-medium text-gray-800">
                                                {{ $partner['name'] }}
                                            </p>

                                            <p class="mt-1 text-xs text-gray-400">
                                                {{ $partner['email'] }}
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                {{-- ID --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 font-mono">
                                    {{ $partner['id'] }}
                                </td>

                                {{-- Organization type --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    {{ $partner['type'] }}
                                </td>

                                {{-- Projects --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    {{ $partner['projects'] }}
                                </td>

                                {{-- Status --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    @php
                                        $styles = [
                                            'Active' => 'bg-emerald-50 text-emerald-700',
                                            'Pending' => 'bg-amber-50 text-amber-700',
                                            'Inactive' => 'bg-gray-100 text-gray-500',
                                        ];
                                    @endphp

                                    <span class="rounded-full px-3 py-1.5 text-xs font-medium {{ $styles[$partner['status']] }}">
                                        {{ $partner['status'] }}
                                    </span>

                                </td>

                                {{-- Action --}}
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
                    Showing <span class="font-medium text-gray-700">1–8</span> of <span class="font-medium text-gray-700">18</span> partners
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

</div>
