<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-paper leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- 🎨 ALTERADO: os 3 cartões (dados, senha, exclusão de conta) ganham
             borda esquerda laranja, no mesmo padrão dos cartões das demais telas.
             Os @include continuam apontando para os mesmos partials — não abri
             esses arquivos, então o conteúdo interno deles não foi alterado
             (recomendo aplicar os mesmos tokens de cor neles quando você enviar). --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-paper border-l-4 border-ember shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-paper border-l-4 border-ember shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-paper border-l-4 border-red-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
