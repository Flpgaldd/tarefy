{{--
    🎨 ALTERADO (com ressalva): mantive vermelho aqui, fora da paleta preto/laranja/branco.
    Justificativa: "Excluir" é uma ação destrutiva e irreversível — usar laranja (que já
    significa "ação principal/CTA" no resto da interface) confundiria o usuário e
    aumentaria o risco de exclusões acidentais. Vermelho é a convenção universal de
    perigo. Ajustei o tom para um vermelho mais escuro/dessaturado (red-700) para não
    brigar visualmente com o laranja da marca. Se preferir manter 100% da paleta,
    posso trocar por preto sólido + ícone de lixeira — me avise.
--}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-paper uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
