<x-guest-layout>
    {{--
        🎨/🔒 ALTERADO: form ganhou x-data com o valor da senha em tempo real
        (Alpine.js, que o projeto já usa em outros componentes como o dropdown).
        Isso alimenta o checklist de requisitos logo abaixo do campo de senha —
        cada regra fica vermelha (✕) ou verde (✓) conforme o usuário digita,
        sem precisar recarregar a página. As mesmas 4 regras aqui no front
        espelham exatamente a validação do backend (RegisteredUserController):
        mínimo 8 caracteres, letras, números e 1 caractere especial.
    --}}
    <form method="POST" action="{{ route('register') }}" x-data="{ password: '' }">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            x-model="password"
                            required autocomplete="new-password" />

            {{-- 🔒 ALTERADO: checklist de requisitos da senha, atualiza em tempo real.
                 Verde (texto-emerald) = regra cumprida; vermelho = ainda falta.
                 Só aparece depois que o usuário começa a digitar (x-show). --}}
            <div class="mt-2 space-y-1" x-show="password.length > 0" style="display: none;">
                <p class="flex items-center gap-1.5 text-xs font-medium"
                   :class="password.length >= 8 ? 'text-emerald-700' : 'text-red-700'">
                    <span x-text="password.length >= 8 ? '✓' : '✕'"></span>
                    {{ __('Mínimo de 8 caracteres') }}
                </p>
                <p class="flex items-center gap-1.5 text-xs font-medium"
                   :class="/[a-zA-Z]/.test(password) ? 'text-emerald-700' : 'text-red-700'">
                    <span x-text="/[a-zA-Z]/.test(password) ? '✓' : '✕'"></span>
                    {{ __('Pelo menos 1 letra') }}
                </p>
                <p class="flex items-center gap-1.5 text-xs font-medium"
                   :class="/[0-9]/.test(password) ? 'text-emerald-700' : 'text-red-700'">
                    <span x-text="/[0-9]/.test(password) ? '✓' : '✕'"></span>
                    {{ __('Pelo menos 1 número') }}
                </p>
                <p class="flex items-center gap-1.5 text-xs font-medium"
                   :class="/[^a-zA-Z0-9]/.test(password) ? 'text-emerald-700' : 'text-red-700'">
                    <span x-text="/[^a-zA-Z0-9]/.test(password) ? '✓' : '✕'"></span>
                    {{ __('Pelo menos 1 caractere especial (ex: ! @ # $)') }}
                </p>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-ink/60 hover:text-ember-dark rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ember" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
