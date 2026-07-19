{{-- 🎨 ALTERADO: de bg-white/border-gray-300 para contorno preto sobre branco.
     Ação secundária fica visualmente mais "leve" que a primária (laranja sólido),
     mantendo a hierarquia: laranja > contorno preto > texto simples. --}}
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-paper border-2 border-ink rounded-md font-semibold text-xs text-ink uppercase tracking-widest hover:bg-ink hover:text-paper focus:outline-none focus:ring-2 focus:ring-ember focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
