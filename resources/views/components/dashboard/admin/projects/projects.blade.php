@props(['projects' => [] , 'partners' => [] ])
<div class="min-h-screen">
    <div class="mx-auto max-w-[1600px]">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-4">

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-blue-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-blue-600 border-t-4 border-t-blue-400">
                <h3 class="text-white font-semibold text-sm mb-1">Všetky projekty</h3>
                <span class="text-md font-medium">{{$projects->count()}}</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-yellow-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-yellow-600 border-t-4 border-t-yellow-400">
                <h3 class="text-white font-semibold text-sm mb-1">Aktívne projekty</h3>
                <span class="text-lg font-medium">{{$projects->where('type', 'opportunity')->count()}}</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-emerald-500 text-white  cursor-pointer transition duration-300 border-b-4 border-b-emerald-600 border-t-4 border-t-emerald-400">
                <h3 class="text-white font-semibold text-sm mb-1">Dokončené projekty</h3>
                <span class="text-lg font-medium">{{$projects->where('type', 'informational')->count()}}</span>
            </div>

        </div>
       <div class="my-2 flex justify-end">
            <x-dashboard.admin.projects.create-project :partners="$partners"/>
       </div>
        <div class="max-h-[85vh] overflow-auto">
            <table class="w-full">
                <thead class="border-b border-b-black/15 bg-gray-100 sticky top-0 z-10">
                    <tr class="text-sm ">
                        <th data-column="name" class="font-semibold py-2 px-4 border-r border-black/15 ">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded border border-black/15 bg-white"></div>Projekt ID
                            </div>
                        </th>
                        <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                </svg>
                                Projekt
                            </div>
                        
                        </th>
                        <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                </svg>
                                Opis
                            </div>
                        
                        </th>
                        <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Vlastník
                            </div>
                        </th>
                        <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                </svg>
                                Partneri
                            </div>
                        
                        </th>
                        <th data-column="email" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>


                                Status
                            </div>
                        </th>
                        <th data-column="connect" class="font-semibold py-2 px-4 border-r border-black/15">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                                Datum vytvorenia
                            </div>
                        </th>
        
                        <th data-column="connect" class="font-semibold py-2 pl-4">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                   
                    <tr class="order-row text-sm cursor-pointer hover:bg-blue-50 transition duratiom-250 border-t border-t-black/15"  @click="$dispatch('open-project', { id: {{ $project->id }} })">
                        <td class="font-semibold text-xs py-2 px-4 border-r border-black/15">
                            <div class="flex gap-2 items-center">
                                <div class="w-4 h-4 rounded border border-black/15 bg-white"></div>{{$project->id}}
                            </div>
                        </td>
                        
                        <td class="py-2 px-4 border-r border-black/10">
                            <div class="border border-black/35 inline-block px-2 rounded py-1 font-semibold">
                                <div class="flex gap-2 items-center">
                                    <span class="w-[10px] h-[11px] rounded-sm bg-blue-500"></span>
                                    <span class="leading-[100%]">{{$project->title}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-2 px-4 border-r border-black/15 w-[350px] leading-[130%] text-black/75">
                            {{ Str::words($project->short_description, 10, '...') }}
                        </td>
                        <td class="text-right py-2 px-4 border-r border-black/15 font-mono">
                            # user {{$project->user->id}}
                        </td>
                        <td class="py-2 px-4 border-r border-black/15">
                            @forelse($project->partners as $partner)
                                <span class="">
                                    {{ $partner->name }}
                                </span>
                            @empty
                                <span class="text-xs text-gray-400 italic">
                                    Bez partnerov
                                </span>
                            @endforelse

                        </td>
                        <td class="py-2 px-4 border-r border-black/15">
                            @if($project->type === 'informational')
                                <span class="">
                                    Informačný
                                </span>
                            @elseif($project->type === 'opportunity')
                                <span class="">
                                    Príležitosť
                                </span>
                            @endif
                        </td>
                        <td class="text-left py-2 px-4 border-r border-black/15">
                            {{$project->created_at?->format('d/m/Y')}}
                        </td>
                        <td>
                            <x-dashboard.admin.projects.update-project :project="$project" :partners="$partners"/>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- <div class="flex flex-col justify-between gap-3 border-t border-gray-100 px-6 py-4 sm:flex-row sm:items-center">

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

        </div> -->

        

    </div>
</div>

