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
 
    {{--
        🎨 ADICIONADO: corpo da página de perfil, que antes ficava vazio (só o
        header existia). Cartão centralizado com foto de perfil, nome e email,
        seguindo o mesmo padrão visual (fundo branco, borda esquerda laranja)
        usado nas outras telas do sistema.
    --}}
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-paper border-l-4 border-ember rounded-lg shadow-sm p-8 flex flex-col items-center text-center">
 
            {{-- Foto de perfil.
                 Não há upload de avatar implementado no sistema ainda, então uso
                 um círculo com as iniciais do nome como placeholder — é o padrão
                 mais comum enquanto não existe foto real. Se você já tem (ou vai
                 ter) um campo de avatar no banco, troco isso por um <img> real. --}}
            @php
                $initials = collect(explode(' ', Auth::user()->name))
                    ->map(fn($part) => mb_substr($part, 0, 1))
                    ->take(2)
                    ->implode('');
            @endphp
            <div class="w-28 h-28 rounded-full bg-ink flex items-center justify-center mb-5">
                <span class="text-3xl font-bold text-ember uppercase">{{ $initials }}</span>
            </div>
 
            {{-- Nome do usuário --}}
            <h3 class="text-xl font-semibold text-ink">{{ Auth::user()->name }}</h3>
 
            {{-- Email do usuário --}}
            <p class="text-sm text-ink/60 mt-1">{{ Auth::user()->email }}</p>
        </div>
    </div>
</x-app-layout>
 
