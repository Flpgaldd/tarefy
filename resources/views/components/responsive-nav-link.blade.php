@props(['active'])

@php
//🎨 ALTERADO: mesma lógica do nav-link desktop, adaptada para o menu mobile
//     sobre fundo preto (borda lateral laranja quando ativo). --}}
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-ember text-start text-base font-medium text-paper bg-ink-soft focus:outline-none focus:text-ember focus:bg-ink-soft focus:border-ember transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-paper/60 hover:text-paper hover:bg-ink-soft hover:border-ember/40 focus:outline-none focus:text-paper focus:bg-ink-soft focus:border-ember/40 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
