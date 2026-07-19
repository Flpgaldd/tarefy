<x-app-layout>
    <x-slot name="header">
        {{-- 🎨 ALTERADO: título e botão agora lado a lado dentro do próprio header
             preto (flex + justify-between), em vez de div/button empilhados de
             forma solta. Botão "Editar Perfil" trocado de azul para laranja. --}}
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-paper leading-tight">
                {{ __('Perfil') }}
            </h2>
            <a href="{{ route('profile.edit') }}"
                class="inline-flex items-center px-4 py-2 bg-ember hover:bg-ember-dark text-paper font-semibold text-xs uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                {{ __('Editar Perfil') }}
            </a>
        </div>
    </x-slot>
</x-app-layout>
