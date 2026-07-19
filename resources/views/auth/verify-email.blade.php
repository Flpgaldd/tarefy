<x-guest-layout>
    {{-- 🎨 ALTERADO: texto de apoio para text-ink/60. --}}
    <div class="mb-4 text-sm text-ink/60">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        {{-- 🎨 ALTERADO: de text-green-600/dark:text-green-400 (fora da paleta)
             para text-ember-dark, mesmo critério usado nas outras confirmações
             de sucesso do app. --}}
        <div class="mb-4 font-medium text-sm text-ember-dark">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            {{-- 🎨 ALTERADO: mesmo tratamento de link usado em login/register. --}}
            <button type="submit" class="underline text-sm text-ink/60 hover:text-ember-dark rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ember">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
