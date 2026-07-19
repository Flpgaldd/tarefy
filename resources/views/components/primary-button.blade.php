{{-- 🎨 ALTERADO: de bg-gray-800/dark:bg-gray-200 para bg-ember.
     O botão primário é a ação mais importante da tela, então recebe a cor de
     maior destaque da paleta (laranja) — hierarquia visual clara. --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-ember border border-transparent rounded-md font-semibold text-xs text-paper uppercase tracking-widest hover:bg-ember-dark focus:bg-ember-dark active:bg-ember-dark focus:outline-none focus:ring-2 focus:ring-ink focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
