<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tarefy') }} — Organize suas tarefas</title>

        <link rel="icon" type="image/svg+xml" href="{{ asset('images/tarefy-mark.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-mist text-ink">

        {{-- ===================== TOPO ===================== --}}
        <header class="bg-ink">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 h-20 flex items-center justify-between">
                <x-application-logo-horizontal-inverse class="h-9 w-auto" />

                <nav class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center px-5 py-2 bg-ember hover:bg-ember-dark text-paper font-semibold text-xs uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                            {{ __('Ir para o Dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-paper/80 hover:text-ember transition">
                            {{ __('Entrar') }}
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-5 py-2 bg-ember hover:bg-ember-dark text-paper font-semibold text-xs uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                            {{ __('Criar conta') }}
                        </a>
                    @endauth
                </nav>
            </div>
        </header>

        {{-- ===================== HERO ===================== --}}
        <section class="bg-ink border-t border-ink-soft">
            <div class="max-w-5xl mx-auto px-6 sm:px-8 py-24 text-center">
                <span class="inline-block text-xs font-semibold uppercase tracking-widest text-ember bg-ember/10 border border-ember/30 rounded-full px-4 py-1.5 mb-6">
                    {{ __('Gestão de tarefas, sem complicação') }}
                </span>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-paper leading-tight">
                    {{ __('Organize suas tarefas') }}
                    <br class="hidden sm:block">
                    {{ __('sem') }} <span class="text-ember">{{ __('perder o prazo') }}</span>.
                </h1>

                <p class="mt-6 text-lg text-paper/60 max-w-2xl mx-auto">
                    {{ __('Crie, acompanhe e conclua suas tarefas em um só lugar. Defina vencimentos, lembretes e nunca mais esqueça do que importa.') }}
                </p>

                <div class="mt-10 flex items-center justify-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center px-8 py-3 bg-ember hover:bg-ember-dark text-paper font-semibold text-sm uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                            {{ __('Ir para o Dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-8 py-3 bg-ember hover:bg-ember-dark text-paper font-semibold text-sm uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                            {{ __('Começar agora — é grátis') }}
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-8 py-3 bg-transparent border-2 border-paper/30 hover:border-ember hover:text-ember text-paper font-semibold text-sm uppercase tracking-widest rounded-md transition ease-in-out duration-150">
                            {{ __('Já tenho conta') }}
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        {{-- ===================== RECURSOS ===================== --}}
        <section class="max-w-6xl mx-auto px-6 sm:px-8 py-20">
            <div class="text-center mb-14">
                <h2 class="text-sm font-semibold uppercase tracking-widest text-ember">{{ __('Como funciona') }}</h2>
                <p class="mt-2 text-3xl font-bold text-ink">{{ __('Tudo que você precisa pra não perder o controle') }}</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-6">
                {{-- Card 1 --}}
                <div class="bg-paper border-l-4 border-ember rounded-lg shadow-sm p-6">
                    <div class="w-11 h-11 rounded-full bg-ink flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-ember" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-ink mb-1">{{ __('Crie em segundos') }}</h3>
                    <p class="text-sm text-ink/60">{{ __('Adicione uma tarefa nova com título, data de vencimento e lembrete em poucos cliques.') }}</p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-paper border-l-4 border-ember rounded-lg shadow-sm p-6">
                    <div class="w-11 h-11 rounded-full bg-ink flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-ember" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-ink mb-1">{{ __('Acompanhe o status') }}</h3>
                    <p class="text-sm text-ink/60">{{ __('Pendente, Fazendo ou Concluída — filtre e veja de relance o que ainda falta.') }}</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-paper border-l-4 border-ember rounded-lg shadow-sm p-6">
                    <div class="w-11 h-11 rounded-full bg-ink flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-ember" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-ink mb-1">{{ __('Nunca perca o prazo') }}</h3>
                    <p class="text-sm text-ink/60">{{ __('Tarefas atrasadas ficam sinalizadas na hora, direto na sua lista.') }}</p>
                </div>
            </div>
        </section>

        {{-- ===================== RODAPÉ ===================== --}}
        <footer class="bg-ink">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <x-application-logo-horizontal-inverse class="h-7 w-auto opacity-80" />
                <p class="text-xs text-paper/40">
                    &copy; {{ date('Y') }} Tarefy. {{ __('Todos os direitos reservados.') }}
                </p>
            </div>
        </footer>
    </body>
</html>
