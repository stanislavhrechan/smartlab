@extends('layouts.onboarding')

@section('content')

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
function onboarding() {
    return {
        organization: '',
        description: '',
        website_url: '',
        loading: false,
        logo: null,
        logoPreview: null,

        handleLogo(event) {
            const file = event.target.files[0];

            if (!file) return;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Nahrajte obrázok vo formáte PNG, JPG alebo WEBP.');
                event.target.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Maximálna veľkosť loga je 2 MB.');
                event.target.value = '';
                return;
            }

            this.logo = file;
            this.logoPreview = URL.createObjectURL(file);
        },

        removeLogo() {
            this.logo = null;

            if (this.logoPreview) {
                URL.revokeObjectURL(this.logoPreview);
                this.logoPreview = null;
            }

            this.$refs.logoInput.value = '';
        },

        canSubmit() {
            return this.organization.trim().length > 2
                && this.description.trim().length > 0
                && this.website_url.trim().length > 0;
        },

        async submit() {
            if (!this.canSubmit() || this.loading) return;

            this.loading = true;

            try {
                const formData = new FormData();

                formData.append('name', this.organization);
                formData.append('description', this.description);
                formData.append('website_url', this.website_url);
                if (this.logo) {
                    formData.append('logo', this.logo);
                }

                const res = await fetch('/onboarding', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Error');
                }

                window.location.href = data.redirect;

            } catch (e) {
                alert(e.message || 'Chyba pri odosielaní');
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>

<div
    x-data="onboarding()"
    x-cloak
    class="min-h-screen bg-[#E5ECEE] flex items-center justify-center p-5 relative overflow-hidden"
>
    <div class="absolute w-[500px] h-[500px] rounded-full bg-[#2F938D]/15 -left-40 -bottom-40"></div>
    <div class="absolute w-[350px] h-[350px] rounded-full border border-[#2F938D]/30 -right-32 -top-32"></div>

    <div class="relative z-10 w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="hidden lg:flex flex-col justify-between bg-[#D5E1E5] p-12 min-h-[650px] relative overflow-hidden">

            <div class="relative z-10">
                <span class="font-bold  text-xl text-[#2C2D32]">
                    SMARTLAB<span class="text-[#2F938D]"></span>
                </span>
            </div>

            <div class="relative z-10">
                <h2 class="text-5xl font-semibold tracking-[1%] leading-[1.1] text-[#2C2D32]">
                    Prepájame<br>
                    ľudí. Tvoríme<br>
                    <span class="text-[#2F938D]">príležitosti.</span>
                </h2>

                <p class="mt-6 text-[#59656A] max-w-sm leading-relaxed">
                    Vytvorte profil organizácie a otvorte dvere spolupráci so študentmi, odborníkmi a inovatívnymi tímami.
                </p>
            </div>

            {{-- Abstract graphic --}}
            <div class="absolute right-[-50px] bottom-[-50px] w-[350px] h-[350px]">
                <div class="absolute w-64 h-64 rounded-full bg-[#2F938D]/20 top-0 left-0"></div>
                <div class="absolute w-48 h-48 border border-[#2F938D]/60 rotate-45 bottom-5 right-5"></div>
                <div class="absolute w-20 h-20 bg-[#2F938D] bottom-20 left-20"></div>
            </div>

            <div class="relative z-10 text-sm text-[#59656A]">
                Inovačné prostredie UCM v Trnave
            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="p-7 sm:p-10 lg:p-14 flex flex-col justify-center">

            <div class="mb-10">
                <div class="flex items-center justify-between mb-8">
                    <span class="font-bold tracking-tight text-lg text-[#2C2D32] lg:hidden">
                        SMARTLAB<span class="text-[#2F938D]">.</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight text-[#2C2D32]">
                    Nastavenie partnera
                </h1>

                <p class="text-sm text-gray-500 mt-4 leading-relaxed max-w-md">
                    Aby ste mohli začať pracovať v ovládacom paneli SmartLab, uveďte základné informácie o organizácii, ktorú zastupujete.
                </p>
            </div>

            <form @submit.prevent="submit()" class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-[#2C2D32] mb-2">
                        Názov organizácie <span class="text-[#2F938D]">*</span>
                    </label>

                    <input
                        type="text"
                        x-model="organization"
                        placeholder="Napr. GovTech Lab"
                        required
                        class="w-full border border-gray-200 rounded-lg px-4 py-3.5 text-sm outline-none transition focus:border-[#2F938D] focus:ring-2 focus:ring-[#2F938D]/10"
                    >
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-[#2C2D32] mb-2">
                        Logo organizácie*
                    </label>

                    <div class="border border-dashed border-gray-300 rounded-xl p-4 transition hover:border-[#2F938D]">

                        <div class="flex items-center gap-4">

                            <!-- Logo preview -->
                            <div class="w-20 h-20 shrink-0 rounded-lg bg-[#E5ECEE] flex items-center justify-center overflow-hidden">

                                <template x-if="logoPreview">
                                    <img
                                        :src="logoPreview"
                                        alt="Logo preview"
                                        class="w-full h-full object-contain p-2"
                                    >
                                </template>

                                <template x-if="!logoPreview">
                                    <span class="text-2xl text-[#2F938D]">+</span>
                                </template>

                            </div>

                            <div class="flex-1 min-w-0">

                                <template x-if="!logo">
                                    <div>
                                        <p class="text-sm font-medium text-[#2C2D32]">
                                            Nahrajte logo organizácie
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            PNG, JPG alebo WEBP · Max. 2 MB
                                        </p>
                                    </div>
                                </template>

                                <template x-if="logo">
                                    <div>
                                        <p class="text-sm font-medium text-[#2C2D32] truncate"
                                        x-text="logo.name">
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            Logo je pripravené na nahratie.
                                        </p>
                                    </div>
                                </template>

                                <div class="flex items-center gap-3 mt-3">

                                    <label
                                        for="organization-logo"
                                        class="text-xs font-semibold text-[#2F938D] cursor-pointer hover:underline"
                                    >
                                        <span x-text="logo ? 'Zmeniť logo' : 'Vybrať súbor'"></span>
                                    </label>

                                    <button
                                        x-show="logo"
                                        type="button"
                                        @click="removeLogo()"
                                        class="text-xs text-red-500 hover:underline"
                                    >
                                        Odstrániť
                                    </button>

                                </div>
                            </div>

                        </div>

                        <input
                            x-ref="logoInput"
                            id="organization-logo"
                            type="file"
                            accept="image/png,image/jpeg,image/webp"
                            @change="handleLogo($event)"
                            class="hidden"
                        >

                    </div>
                </div>


                <div>
                    <label class="block text-sm font-medium text-[#2C2D32] mb-2">
                        Popis organizácie <span class="text-[#2F938D]">*</span>
                    </label>

                    <textarea
                        x-model="description"
                        rows="4"
                        placeholder="Predstavte svoju organizáciu..."
                        required
                        class="w-full border border-gray-200 rounded-lg px-4 py-3.5 text-sm outline-none transition resize-none focus:border-[#2F938D] focus:ring-2 focus:ring-[#2F938D]/10"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#2C2D32] mb-2">
                        Webová stránka <span class="text-[#2F938D]">*</span>
                    </label>

                    <input
                        type="url"
                        x-model="website_url"
                        placeholder="https://example.sk"
                        required
                        class="w-full border border-gray-200 rounded-lg px-4 py-3.5 text-sm outline-none transition focus:border-[#2F938D] focus:ring-2 focus:ring-[#2F938D]/10"
                    >
                </div>

                <button
                    type="submit"
                    :disabled="!canSubmit() || loading"
                    class="w-full bg-[#2C2D32] hover:bg-[#2F938D] text-white rounded-lg py-4 text-sm font-medium transition duration-300 disabled:opacity-40 disabled:cursor-not-allowed"
                >
                    <span x-show="!loading">Vytvoriť organizáciu</span>
                    <span x-show="loading">Spracovanie...</span>
                </button>

            </form>

            <p class="text-sm text-gray-400 mt-8 text-center">
                SmartLab UCM & Trnava · Partner platform
            </p>

        </div>
    </div>
</div>

@endsection