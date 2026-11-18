
@props(['project', 'partners' => []])
<div
    
    x-data="projectDrawer({
        goals: @js($project->goals()->get()->map(fn ($goal) => [
            'id' => (string) $goal->id,
            'description' => $goal->description,
        ])->values()->all()),

        activities: @js(collect($project->activities)->map(fn ($activity) => [
            'id' => (string) $activity->id,
            'title' => $activity->title,
            'description' => $activity->description,
            'partners' => collect($activity->partners)->pluck('id')->map(fn ($id) => (string) $id)->values(),
        ])->values()),

        outputs: @js($project->outputs()->get()->map(fn ($output) => [
            'id' => (string) $output->id,
            'description' => $output->description,
        ])->values())
    })"
    x-cloak
    @keydown.escape.window="close()"
    @open-project.window="if ($event.detail.id === {{ $project->id }}) open()"
    @click.stop
>

    <button
        type="button"
        @click="open()"
        class="pl-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
    </button>

    {{-- Overlay --}}
    <div
        x-show="isOpen"
        x-transition.opacity
        @click="close()"
        class="fixed inset-0 bg-black/30 z-40"
    ></div>

    {{-- Drawer --}}
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-full md:w-[80vw]
               bg-white z-50 shadow-2xl flex flex-col rounded-l-md
               border-l-8 border-gray-200"
    >

        {{-- Header --}}
        <div class="px-5 py-6 border-b border-gray-100 flex items-center justify-between shrink-0">

            <div>
                <h2 class="text-2xl font-semibold tracking-tight">
                    Upraviť projekt
                </h2>

                <p class="text-xs text-gray-400 mt-1">
                    {{ $project->title }}
                </p>
            </div>

            <button
                @click="close()"
                type="button"
                class="w-9 h-9 flex items-center justify-center hover:bg-gray-100 rounded-lg transition"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        {{-- Form --}}
        <form
            action="{{ route('dashboard.admin.projects.update', $project) }}"
            method="POST"
            enctype="multipart/form-data"
            class="flex-1 flex flex-col min-h-0"
        >
            @csrf
            @method('PUT')

            <div class="flex-1 overflow-y-auto px-5 py-5 space-y-9">

                {{-- 01. Basic information --}}
                <section class="space-y-5">

                    <div>
                        <h3 class="text-lg font-semibold mt-1">
                            Základné informácie
                        </h3>
                    </div>

                    <div class="flex justify-between items-start gap-3">
                        <div class="w-[75vw] space-y-5">
                            <div >
                                <label class="block text-sm font-medium mb-2">
                                    Názov projektu *
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $project->title) }}"
                                    required
                                    placeholder="Názov projektu"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm outline-none focus:border-[#2F938D] border-b-4 border-b-gray-200"
                                >

                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Krátky popis
                                </label>

                                <textarea
                                    name="short_description"
                                    rows="8"
                                    maxlength="500"
                                    placeholder="Stručne predstavte projekt..."
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm outline-none focus:border-[#2F938D] border-b-4 border-b-gray-200"
                                >{{ old('short_description', $project->short_description) }}</textarea>
                            </div>
                            
                        </div>

                        <div class="w-[25vw]">
                            <label class="block text-sm font-medium">
                                Nový hlavný obrázok
                            </label>

                            @if($project->image)
                                <div class="mb-2">
                                    <img
                                        src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                        class="w-full h-24 object-cover rounded-lg border border-gray-200"
                                    >

                                    <p class="text-xs text-gray-400">
                                        Aktuálna obálka projektu
                                    </p>
                                </div>
                            @endif

                            <input
                                type="file"
                                name="image"
                                accept="image/png,image/jpeg,image/webp"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm outline-none focus:border-[#2F938D] border-b-4 border-b-gray-200"
                            >

                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <p class="text-xs text-gray-400 mt-1">
                                Ak nenahráte nový obrázok, zostane pôvodný.
                            </p>
                        </div>

                    </div>

                    <div class="">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Popis projektu *
                            </label>

                            <textarea
                                name="description"
                                required
                                rows="8"
                                placeholder="Základné informácie o projekte..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm outline-none focus:border-[#2F938D] border-b-4 border-b-gray-200"
                            >{{ old('description', $project->description) }}</textarea>

                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </section>


                <section class="space-y-5">

                    <div>
                        <h3 class="text-lg font-semibold mt-1">
                            Nastavenie projektu
                        </h3>
                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Typ projektu *
                            </label>

                            <select
                                name="type"
                                x-model="projectType"
                                required
                                class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white border-b-4 border-b-gray-200"
                            >
                                <option value="informational">Informačné</option>
                                <option value="opportunity">Príležitosť</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Stav projektu *
                            </label>

                            <select
                                name="status"
                                required
                                class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white border-b-4 border-b-gray-200"
                            >
                                <option value="published" @selected(old('status', $project->status) === 'published')>
                                    Published
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Začiatok projektu
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}"
                                class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm border-b-4 border-b-gray-200"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Koniec projektu
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}"
                                class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm border-b-4 border-b-gray-200"
                            >
                        </div>

                    </div>

                </section>


                {{-- 03. Partners --}}
                <section class="space-y-5">

                    <div>
                        <span class="text-xs font-semibold text-[#2F938D]">
                            PARTNERI
                        </span>

                        <h3 class="text-lg font-semibold mt-1">
                            Partneri projektu
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            Vyberte organizácie spolupracujúce na projekte.
                        </p>
                    </div>

                    <select
                        name="partners[]"
                        multiple
                        class="w-full min-h-32 border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white"
                    >
                        @foreach($partners as $partner)
                            <option
                                value="{{ $partner->id }}"
                                @selected(
                                    collect(old('partners', $project->partners->pluck('id')->toArray()))
                                        ->contains($partner->id)
                                )
                                class="py-2"
                            >
                                {{ $partner->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('partners')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                    <p class="text-xs text-gray-400">
                        Podržte Ctrl a vyberte viacerých partnerov.
                    </p>

                </section>


                {{-- 04. Opportunity settings --}}
                <template x-if="projectType === 'opportunity'">

                    <section class="space-y-5">

                        <div>
                            <span class="text-xs font-semibold text-[#2F938D]">
                                04 / OPPORTUNITY
                            </span>

                            <h3 class="text-lg font-semibold mt-1">
                                Informácie o odmene
                            </h3>

                            <p class="text-sm text-gray-400 mt-1">
                                Nastavenie odmeny a prihlasovania na projekt.
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Typ odmeny
                            </label>

                            <select
                                name="reward_type"
                                x-model="rewardType"
                                class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white"
                            >
                                <option value="none">Bez odmeny</option>
                                <option value="fixed">Fixná odmena</option>
                                <option value="negotiable">Dohodou</option>
                            </select>
                        </div>

                        <div
                            x-show="rewardType === 'fixed'"
                            class="grid grid-cols-2 gap-4"
                        >

                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Výška odmeny
                                </label>

                                <input
                                    type="number"
                                    name="reward_amount"
                                    value="{{ old('reward_amount', $project->reward_amount) }}"
                                    min="0"
                                    step="0.01"
                                    :disabled="rewardType !== 'fixed'"
                                    placeholder="0.00"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">
                                    Mena
                                </label>

                                <select
                                    name="reward_currency"
                                    :disabled="rewardType !== 'fixed'"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white"
                                >
                                    <option value="EUR" @selected(old('reward_currency', $project->reward_currency) === 'EUR')>
                                        EUR
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">

                            <label class="flex items-center gap-3 cursor-pointer">

                                <input
                                    type="hidden"
                                    name="accepts_applications"
                                    value="0"
                                >

                                <input
                                    type="checkbox"
                                    name="accepts_applications"
                                    value="1"
                                    @checked((bool) old('accepts_applications', $project->accepts_applications))
                                    class="size-4 accent-[#2F938D]"
                                >

                                <div>
                                    <span class="block text-sm font-medium">
                                        Povoliť prihlasovanie
                                    </span>

                                    <span class="block text-xs text-gray-400 mt-1">
                                        Používatelia sa môžu prihlásiť na tento projekt.
                                    </span>
                                </div>

                            </label>

                        </div>

                    </section>

                </template>


                {{-- 05. Informational settings --}}
                <template x-if="projectType === 'informational'">

                    <div class="space-y-9">

                        {{-- Goals --}}
                        <section class="space-y-5">

                            <div class="flex justify-between items-center mt-1">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        Ciele projektu
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Definujte hlavné ciele projektu.
                                    </p>
                                </div>

                                <button
                                    type="button"
                                    @click="goals.push(createGoal())"
                                    class="text-sm bg-[#2F938D] text-white font-medium hover:text-white/75 px-2 py-1 rounded-md"
                                >
                                    + Pridať cieľ
                                </button>

                            </div>

                            <template x-for="(goal, index) in goals" :key="goal.id">

                                <div class="border border-gray-200 rounded-lg p-4 space-y-3">

                                    <div class="flex justify-between items-center">

                                        <span
                                            class="text-sm font-semibold"
                                            x-text="'Cieľ ' + (index + 1)"
                                        ></span>

                                        <button
                                            type="button"
                                            @click="goals.splice(index, 1)"
                                            class="text-red-400 text-sm hover:text-red-600"
                                        >
                                            Odstrániť
                                        </button>

                                    </div>

                                    <textarea
                                        :name="`goals[${index}][description]`"
                                        x-model="goal.description"
                                        rows="3"
                                        placeholder="Popis cieľa..."
                                        class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm resize-none"
                                    ></textarea>

                                </div>

                            </template>

                            <p
                                x-show="goals.length === 0"
                                class="text-sm text-gray-400 text-center py-5 border border-dashed border-gray-200 rounded-lg"
                            >
                                Zatiaľ nebol pridaný žiadny cieľ.
                            </p>

                        </section>


                        {{-- Activities --}}
                        <section class="space-y-5">

                            <div class="flex justify-between items-center mt-1">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        Aktivity projektu
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Jednotlivé kroky realizácie projektu.
                                    </p>
                                </div>

                                <button
                                    type="button"
                                    @click="activities.push(createActivity())"
                                    class="text-sm bg-[#2F938D] text-white font-medium hover:text-white/75 px-2 py-1 rounded-md"
                                >
                                    + Pridať aktivitu
                                </button>

                            </div>

                            <template x-for="(activity, index) in activities" :key="activity.id">

                                <div class="border border-gray-200 rounded-lg p-4 space-y-4">

                                    <div class="flex justify-between items-center">

                                        <span
                                            class="text-sm font-semibold"
                                            x-text="'Aktivita ' + (index + 1)"
                                        ></span>

                                        <button
                                            type="button"
                                            @click="activities.splice(index, 1)"
                                            class="text-red-400 text-sm hover:text-red-600"
                                        >
                                            Odstrániť
                                        </button>

                                    </div>

                                    <input
                                        type="text"
                                        :name="`activities[${index}][title]`"
                                        x-model="activity.title"
                                        placeholder="Názov aktivity"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm"
                                    >

                                    <textarea
                                        :name="`activities[${index}][description]`"
                                        x-model="activity.description"
                                        rows="4"
                                        placeholder="Popis aktivity..."
                                        class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm resize-none"
                                    ></textarea>

                                    <div>

                                        <label class="block text-sm font-medium mb-2">
                                            Partneri aktivity
                                        </label>

                                        <select
                                            multiple
                                            :name="`activities[${index}][partners][]`"
                                            x-model="activity.partners"
                                            class="w-full min-h-28 border border-gray-200 rounded-lg px-3 py-3 text-sm bg-white"
                                        >
                                            @foreach($partners as $partner)
                                                <option value="{{ $partner->id }}">
                                                    {{ $partner->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <p class="text-xs text-gray-400 mt-2">
                                            Môžete vybrať viacerých partnerov.
                                        </p>

                                    </div>

                                </div>

                            </template>

                            <p
                                x-show="activities.length === 0"
                                class="text-sm text-gray-400 text-center py-5 border border-dashed border-gray-200 rounded-lg"
                            >
                                Zatiaľ nebola pridaná žiadna aktivita.
                            </p>

                        </section>


                        {{-- Outputs --}}
                        <section class="space-y-5">

                            <div class="flex justify-between items-center mt-1">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        Výstupy projektu
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Výsledky realizácie projektu.
                                    </p>
                                </div>

                                <button
                                    type="button"
                                    @click="outputs.push(createOutput())"
                                    class="text-sm bg-[#2F938D] text-white font-medium hover:text-white/75 px-2 py-1 rounded-md"
                                >
                                    + Pridať výstup
                                </button>

                            </div>

                            <template x-for="(output, index) in outputs" :key="output.id">

                                <div class="border border-gray-200 rounded-lg p-4 space-y-3">

                                    <div class="flex justify-between items-center">

                                        <span
                                            class="text-sm font-semibold"
                                            x-text="'Výstup ' + (index + 1)"
                                        ></span>

                                        <button
                                            type="button"
                                            @click="outputs.splice(index, 1)"
                                            class="text-red-400 text-sm hover:text-red-600"
                                        >
                                            Odstrániť
                                        </button>

                                    </div>

                                    <textarea
                                        :name="`outputs[${index}][description]`"
                                        x-model="output.description"
                                        rows="3"
                                        placeholder="Popis výstupu..."
                                        class="w-full border border-gray-200 rounded-lg px-3 py-3 text-sm resize-none"
                                    ></textarea>

                                </div>

                            </template>

                            <p
                                x-show="outputs.length === 0"
                                class="text-sm text-gray-400 text-center py-5 border border-dashed border-gray-200 rounded-lg"
                            >
                                Zatiaľ nebol pridaný žiadny výstup.
                            </p>

                        </section>

                    </div>

                </template>


                {{-- 06. Existing gallery --}}
                <section class="space-y-5">

                    <div>
                        <h3 class="text-lg font-semibold mt-1">
                            Galéria projektu
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            Existujúce fotografie projektu.
                        </p>
                    </div>

                    @if($project->images->isNotEmpty())

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

                            @foreach($project->images as $image)

                                <div class="border border-gray-200 rounded-lg overflow-hidden">

                                    <img
                                        src="{{ asset('storage/' . $image->image_path) }}"
                                        alt="{{ $image->alt_text ?? $project->title }}"
                                        class="w-full h-32 object-cover"
                                    >

                                    <div class="p-2">
                                        <p class="text-xs text-gray-500 truncate">
                                            {{ $image->caption ?? 'Fotografia projektu' }}
                                        </p>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <p class="text-sm text-gray-400 py-4 text-center border border-dashed border-gray-200 rounded-lg">
                            Projekt zatiaľ nemá žiadne fotografie.
                        </p>

                    @endif

                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Pridať nové fotografie
                        </label>

                        <input
                            type="file"
                            name="gallery[]"
                            multiple
                            accept="image/png,image/jpeg,image/webp"
                            class="w-full border border-gray-200 rounded-lg p-3 text-sm"
                        >

                        <p class="text-xs text-gray-400 mt-2">
                            JPG, PNG alebo WEBP. Maximálne 5 MB na fotografiu.
                            Nové fotografie sa pridajú k existujúcej galérii.
                        </p>

                        @error('gallery')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </section>

            </div>


            {{-- Footer --}}
            <div class="border-t border-gray-100 px-5 md:px-7 py-5 flex items-center justify-between bg-white shrink-0">

                <button
                    type="button"
                    @click="close()"
                    class="px-6 md:px-8 py-2 bg-red-400 text-white rounded-lg border-t-4 border-t-red-300 border-b-4 border-b-red-500 text-sm font-medium hover:bg-red-500 transition"
                >
                    Zrušiť
                </button>

                <button
                    type="submit"
                    class="px-6 md:px-8 py-2 bg-[#2F938D] text-white rounded-lg border-t-4 border-t-[#42AFA8] border-b-4 border-b-[#227873] text-sm font-medium hover:bg-[#267d78] transition"
                >
                    Uložiť zmeny
                </button>

            </div>

        </form>

    </div>

</div>


<script>
    function projectDrawer(initial = {}) {

        return {

            isOpen: false,

            projectType: @js(old('type', $project->type)),
            rewardType: @js(old('reward_type', $project->reward_type ?? 'none')),

            goals: initial.goals ?? [],
            init() {
    console.log('GOALS:', this.goals);
    console.log('GOALS COUNT:', this.goals.length);
},
            activities: initial.activities ?? [],
            outputs: initial.outputs ?? [],

            createGoal() {
                return {
                    id: crypto.randomUUID(),
                    description: ''
                };
            },

            createActivity() {
                return {
                    id: crypto.randomUUID(),
                    title: '',
                    description: '',
                    partners: []
                };
            },

            createOutput() {
                return {
                    id: crypto.randomUUID(),
                    description: ''
                };
            },

            open() {
                this.isOpen = true;
                document.body.classList.add('overflow-hidden');
            },

            close() {
                this.isOpen = false;
                document.body.classList.remove('overflow-hidden');
            }

        }

    }
</script>
