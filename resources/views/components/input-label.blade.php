@props(['value'])

{{-- 🎨 ALTERADO: de text-gray-700/dark:text-gray-300 para text-ink, texto sempre
     preto sólido sobre fundos claros — reforça o contraste "preto/branco para leitura". --}}
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-ink']) }}>
    {{ $value ?? $slot }}
</label>
