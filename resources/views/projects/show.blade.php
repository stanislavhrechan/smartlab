@extends('layouts.show')
@section('content')

<main class="bg-white min-h-screen text-[#252525]">
    <section class="px-6 md:px-16 pb-16">
        <div class="mt-16 max-w-5xl">
            <h1 class="text-8xl font-dm font-bold tracking-[1%] leading-[100%] text-[#031831]">
                {{ $project->title }}
            </h1>

            <p class="text-[18px] mt-10 max-w-2xl leading-[100%]">
                {{ $project->short_description }} A vdaka :
            </p>

            @if($project->partners->isNotEmpty())
                <div class="flex flex-wrap gap-4 mt-10">

                    @foreach($project->partners as $partner)

                        <div class="border border-black/10 rounded-xl px-6 py-2 font-dm font-bold">
                            {{ $partner->name }}
                        </div>

                    @endforeach

                </div>
            @endif

        </div>

        @if($project->image)
            <div class="mt-16 w-full h-[350px] md:h-[600px] overflow-hidden rounded-xl">
                <img
                    src="{{ Storage::url($project->image) }}"
                    alt="{{ $project->title }}"
                    class="w-full h-full object-cover"
                >
            </div>
        @endif

    </section>


    <section class="flex flex-col mx-10 mb-[20vh]">
        <div class="border-b border-b-black/35 pb-5">
            <h2 class="text-8xl font-dm font-bold tracking-[1%] leading-[100%] text-[#031831]">
                O projekte
            </h2>
        </div>
        <div class="flex justify-start mt-5">
            <div class="flex flex-col gap-5 w-full ml-[56%]">
                <div class="flex gap-10">
                    <p class="w-[480px] shrink-0 text-[#031831] text-[16.5px] leading-[130%]">
                        {{ $project->description }}
                    </p>
                </div>
            </div>
        </div>

    </section>


    <!-- @if($project->goals()->exists())
        <section class="px-6 md:px-16 py-24 bg-[#F5F7F6]">

            <span class="text-xs uppercase tracking-widest text-gray-400">
                02 / Ciele projektu
            </span>

            <div class="grid md:grid-cols-2 gap-8 mt-12">

                @foreach($project->goals()->get() as $index => $goal)

                    <div class="border-t border-black/20 pt-6">

                        <span class="text-sm text-gray-400">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <p class="text-xl mt-5 leading-relaxed">
                            {{ $goal->description }}
                        </p>

                    </div>

                @endforeach

            </div>

        </section>
    @endif


    {{-- ACTIVITIES --}}
    @if($project->activities->isNotEmpty())
        <section class="px-6 md:px-16 py-24">

            <span class="text-xs uppercase tracking-widest text-gray-400">
                03 / Realizácia projektu
            </span>

            <div class="mt-12 space-y-12">

                @foreach($project->activities as $index => $activity)

                    <div class="grid md:grid-cols-3 gap-8 border-t border-black/20 pt-8">

                        <span class="text-sm text-gray-400">
                            Aktivita {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="md:col-span-2">

                            <h3 class="text-2xl font-semibold">
                                {{ $activity->title }}
                            </h3>

                            <p class="text-gray-500 mt-4 leading-relaxed">
                                {{ $activity->description }}
                            </p>

                            @if($activity->partners->isNotEmpty())
                                <div class="flex flex-wrap gap-2 mt-6">
                                    @foreach($activity->partners as $partner)
                                        <span class="text-xs border border-black/15 rounded-full px-3 py-2">
                                            {{ $partner->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </section>
    @endif


    {{-- OUTPUTS --}}
    @if($project->outputs()->exists())
        <section class="px-6 md:px-16 py-24 bg-[#F5F7F6]">

            <span class="text-xs uppercase tracking-widest text-gray-400">
                04 / Výsledky projektu
            </span>

            <div class="mt-12 grid md:grid-cols-2 gap-6">

                @foreach($project->outputs()->get() as $index => $output)

                    <div class="bg-white p-8 rounded-xl">

                        <span class="text-sm text-gray-400">
                            Výsledok {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <p class="text-xl mt-5">
                            {{ $output->description }}
                        </p>

                    </div>

                @endforeach

            </div>

        </section>
    @endif -->


    {{-- PARTNERS --}}
    

</main>

@endsection
