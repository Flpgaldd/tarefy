@props(['active'])

@php
//🎨 ALTERADO: link ativo agora tem borda inferior laranja (border-ember) e texto
//  branco puro; inativo é branco semi-transparente com hover laranja. Antes usava
//indigo + cinza, que não pertence à nova paleta.

    $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-ember text-sm font-medium leading-5 text-paper focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-paper/60 hover:text-ember hover:border-ember/40 focus:outline-none focus:text-ember transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
