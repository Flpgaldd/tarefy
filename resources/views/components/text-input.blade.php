@props(['disabled' => false])

{{-- 🎨 ALTERADO: borda de foco/anel de indigo para ember (laranja), borda padrão
     mais escura (ink/20) para definição clara do campo sobre o fundo mist. --}}
<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-ink/20 bg-paper text-ink focus:border-ember focus:ring-ember rounded-md shadow-sm']) }}>
