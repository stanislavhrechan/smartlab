@props(['partners' => []])
<div class="min-h-screen">
    <div class="mx-auto max-w-[1600px]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-4">
            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-blue-500 text-white   transition duration-300 border-b-4 border-b-blue-600 border-t-4 border-t-blue-400">
                <h3 class="text-white font-semibold text-sm mb-1">Všetci partneri</h3>
                <span class="text-md font-medium">{{$partners->count()}}</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-yellow-500 text-white   transition duration-300 border-b-4 border-t-4 border-b-yellow-600 border-t-yellow-400">
                <h3 class="text-white font-semibold text-sm mb-1">Aktívni partneri</h3>
                <span class="text-lg font-medium">{{$partners->where('is_active', true)->count()}}</span>
            </div>

            <div class="flex items-center justify-between border border-black/15 p-3 rounded-md bg-emerald-500 text-white   transition duration-300 border-b-4 border-b-emerald-600 border-t-4 border-t-emerald-400">
                <h3 class="text-white font-semibold text-sm mb-1">Partneri projektov</h3>
                <span class="text-lg font-medium">0</span>
            </div>

        </div>

        <div class="">

            <div class="max-h-[85vh] overflow-auto">
                <table class="w-full">
                    <thead class="border-b border-b-black/15 bg-gray-100 sticky top-0 z-10">
                        <tr class="text-sm ">
                            <th data-column="name" class="font-semibold py-2 px-4 border-r border-black/15 ">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 rounded border border-black/15 bg-white"></div>Partner ID
                                </div>
                            </th>
                            <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                    </svg>
                                    Organizacia
                                </div>
                            
                            </th>
                            <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                    </svg>
                                    E-mail
                                </div>
                            
                            </th>
                            <th data-column="address" class="font-semibold py-2 px-4 border-r border-black/15">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                    </svg>
                                    Meno
                                </div>
                            
                            </th>
                            <th data-column="email" class="font-semibold py-2 px-4 border-r border-black/15">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5" />
                                    </svg>
                                    Priezvisko
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
                        @foreach($partners as $partner)
                    
                        <tr class="order-row text-sm cursor-pointer hover:bg-blue-50 transition duratiom-250 border-t border-t-black/15">
                            <td class="font-semibold text-xs py-2 px-4 border-r border-black/15">
                                <div class="flex gap-2 items-center">
                                    <div class="w-4 h-4 rounded border border-black/15 bg-white"></div>{{$partner->id}}
                                </div>
                            </td>
                            
                            <td class="py-2 px-4 border-r border-black/10">
                                <div class="border border-black/35 inline-block px-2 rounded py-1 font-semibold">
                                    <div class="flex gap-2 items-center">
                                        <span class="w-[10px] h-[11px] rounded-sm bg-blue-500"></span>
                                        <span class="leading-[100%]">{{$partner->name}}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-r border-black/15 w-[350px]">
                                {{$partner->user->email}}
                            </td>
                            <td class="py-2 px-4 border-r border-black/15">
                                {{$partner->user->name}}
                            </td>
                            <td class="py-2 px-4 border-r border-black/15">
                               {{$partner->user->surname}}
                            </td>
                            <td class="py-2 px-4 border-r border-black/15">
                                {{$partner->created_at->format('d/m/Y')}}
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- <div class="flex flex-col justify-end gap-3 border-t border-gray-100 px-6 py-4 sm:flex-row sm:items-center">

                <div class="flex items-center gap-1">

                    @if($partners->onFirstPage())
                        <span class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-400 border-t-4 border-t-gray-100 border-b-4 border-b-gray-300">
                            Predchádzajúce
                        </span>
                    @else
                        <a href="{{ $partners->previousPageUrl() }}"
                        class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-600 hover:bg-gray-50">
                            Predchádzajúce
                        </a>
                    @endif

                    @foreach($partners->getUrlRange(1, $partners->lastPage()) as $page => $url)

                        <a href="{{ $url }}"
                        class="rounded-lg px-3 py-2 text-xs font-medium
                        {{ $partners->currentPage() == $page
                            ? 'bg-emerald-500 border-t-4 border-t-emerald-400 border-b-4 border-b-emerald-600 text-white'
                            : 'border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
                            {{ $page }}
                        </a>

                    @endforeach

                    @if($partners->hasMorePages())
                        <a href="{{ $partners->nextPageUrl() }}"
                        class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-600 hover:bg-gray-50">
                            Ďalej
                        </a>
                    @else
                        <span class="rounded-lg border border-gray-200 px-3 py-2 text-xs text-gray-400 border-t-4 border-t-gray-100 border-b-4 border-b-gray-300">
                            Ďalej
                        </span>
                    @endif

                </div>
            </div> -->

        </div>

    </div>

</div>
