@props(['status'])

{{-- 🎨 ALTERADO: mensagem de sucesso (ex.: "link enviado") passa a usar laranja
     em vez de verde, já que a paleta oficial não inclui verde e essa mensagem não
     é um alerta de erro — só uma confirmação neutra. --}}
@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-ember-dark']) }}>
        {{ $status }}
    </div>
@endif
