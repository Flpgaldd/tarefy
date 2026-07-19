{{--
    🎨 Marca Tarefy — versão padrão (quadrado preto + check laranja).
    Use em fundos CLAROS. Para fundos escuros/pretos (navbar, tela de login),
    use <x-application-logo-inverse> em vez deste componente, senão o quadrado
    preto "some" dentro do fundo preto.
--}}
<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240" role="img" aria-label="Tarefy">
    <rect x="20" y="20" width="200" height="200" rx="40" fill="#0D0D0D"/>
    <path d="M65,125 L100,160 L175,80" fill="none" stroke="#FF6A00" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
