<x-guest-layout>
    <h1 class="font-semibold text-xl my-4 text-black/80">Vytvorte si účet</h1>
    @if ($errors->any())
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');
        form.classList.add('shake');
    });
    </script>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="flex gap-2">
            <div>
                <x-input-label for="first_name" :value="__('Meno*')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  oninput="handleRegisterInput()"/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="surname" :value="__('Priezvisko*')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname"  oninput="handleRegisterInput()"/>
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>
        </div>
        

        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail*')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" oninput="handleRegisterInput()"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="relative mt-4">
            <x-input-label for="password" :value="__('Heslo*')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full pr-10"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                oninput="handleRegisterInput()"
            />
           

            <button type="button"
                id="togglePassBtn"
                class="absolute top-1/2 right-0 px-3 flex items-center hidden"
                onclick="togglePassword()">

                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>

                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="size-5 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

            </button>
           
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Potvrdit heslo*')" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                oninput="handleRegisterInput()"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <!-- <div class="block mt-4 mb-4">
            <label for="email_notifications" class="inline-flex items-start cursor-pointer">
                <input id="email_notifications" value="1" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer" name="email_notifications">
                <span class="ms-2 text-sm text-gray-600">{{ __('„Súhlasím so zasielaním marketingovej komunikácie od spoločnosti Archív (vrátane automatizovaných systémov) o aktualizáciách produktov, novinkách z odvetvia a pozvánkach na podujatia') }}</span>
            </label>
        </div> -->
        <x-primary-button
            id="registerBtn"
            class="mt-4 w-full flex items-center justify-center bg-[#467EA8] hover:bg-[467EA8]/85 disabled:opacity-50 disabled:bg-[#467EA8]/40 disabled:cursor-not-allowed"
            disabled
        >
            {{ __('Vytvoriť účet') }}
        </x-primary-button>
    </form>
    <div class="w-full border-t border-1 border-black/15 h-[1px] mt-4 mb-8 text-center">
        <p class="text-sm text-black/50 mt-4 font-medium">máte účet? <a href="{{route('login')}}" class="font-semibold text-[#2B2B2B] font-semibold underline">Prihláste sa</a></p>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    handleRegisterInput();
});

function handleRegisterInput() {
    const fist_name = document.getElementById('first_name').value.trim();
    const last_name = document.getElementById('surname').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    const btn = document.getElementById('registerBtn');
    const toggleBtn = document.getElementById('togglePassBtn');

    if (btn) {
        btn.disabled = !(fist_name && last_name && email && password);
    }

    if (!toggleBtn) return;

    if (password.length > 0) {
        toggleBtn.classList.remove('hidden');
    } else {
        toggleBtn.classList.add('hidden');

        const input = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        input.type = 'password';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    }
}

function togglePassword() {
    const input = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    const isHidden = input.type === 'password';

    input.type = isHidden ? 'text' : 'password';

    eyeOpen.classList.toggle('hidden', !isHidden);
    eyeClosed.classList.toggle('hidden', isHidden);
}
</script>

<style>
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-6px); }
    50% { transform: translateX(6px); }
    75% { transform: translateX(-6px); }
}

.shake {
    animation: shake 0.3s ease-in-out;
}
</style>

<script>
    function shakeForm() {
        const form = document.querySelector('form');

        form.classList.remove('shake');
        void form.offsetWidth; // restart animation
        form.classList.add('shake');
    }
</script>
</x-guest-layout>
