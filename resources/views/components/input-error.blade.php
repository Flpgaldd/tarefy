@props(['messages'])

{{--
    🎨 ALTERADO: de lista de texto solto (<ul><li>) para "chips" de alerta —
    cada erro vira um cartãozinho vermelho com ícone, mais fácil de notar que
    texto pequeno perdido embaixo do campo. Vermelho mantido de propósito
    (mesma justificativa do danger-button): é a cor universal de erro e não
    deve competir com o laranja de ação da marca.
--}}
@if ($messages)
    <div {{ $attributes }}>
        @foreach ((array) $messages as $message)
            <p class="flex items-center gap-1.5 text-xs font-medium text-red-700 bg-red-50 border border-red-200 rounded-md px-2.5 py-1.5 mt-1.5">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
            </p>
        @endforeach
    </div>
@endif
