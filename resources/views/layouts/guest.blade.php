<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- 🎨 ALTERADO: favicon adicionado, mesmo arquivo usado no layout principal,
             pra ficar consistente em todas as páginas (autenticadas ou não). --}}
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/tarefy-mark.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- 🎨 ALTERADO: fundo preto (bg-ink) em vez de bg-gray-100, texto branco por padrão.
         Telas de login/registro ganham o mesmo peso visual do bloco estrutural preto. --}}
    <body class="font-sans text-paper antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-ink">
            <div>
                <a href="/">
                    {{-- 🎨 ALTERADO: logo genérico do Breeze trocado pela marca Tarefy.
                         Versão "inverse" (quadrado laranja + check preto) porque o fundo
                         desta tela é preto (bg-ink, definido acima no <body>). --}}
                    <x-application-logo-inverse class="w-20 h-20" />
                </a>
            </div>

            {{-- 🎨 ALTERADO: cartão de conteúdo em branco puro (bg-paper) com borda
                 superior laranja, criando contraste máximo contra o fundo preto. --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-paper text-ink border-t-4 border-ember overflow-hidden sm:rounded-lg shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
