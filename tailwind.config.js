import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            /* 🎨 ALTERADO: tokens de cor da identidade Tarefy (preto / laranja / branco).
               Centralizar aqui evita usar hexadecimais soltos nas views e facilita
               qualquer ajuste futuro de tom em um único lugar. */
            colors: {
                ink: '#0D0D0D',       // preto estrutural: navbar, headers, blocos de destaque
                'ink-soft': '#1A1A1A', // preto secundário: cards/hover sobre fundo preto
                ember: '#FF6A00',      // laranja principal: CTAs, estados ativos, destaques
                'ember-dark': '#CC5500', // laranja escuro: hover/active dos elementos laranja
                paper: '#FFFFFF',      // branco: texto sobre preto, fundos de conteúdo
                mist: '#1A1A1A',       // quase-branco: fundo alternativo claro, inputs, divisores
            },
        },
    },

    plugins: [forms],
};
