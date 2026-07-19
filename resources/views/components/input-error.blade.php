@props(['messages'])

{{-- 🎨 MANTIDO (sem alteração de cor): erro de validação continua em vermelho pela
     mesma razão do danger-button — é a convenção universal para "algo está errado"
     e não deve competir com o laranja de ação. Só removi a variante dark:*. --}}
@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-700 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
