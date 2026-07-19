{{-- 🎨 ALTERADO: texto branco sobre o fundo preto do dropdown, hover em laranja. --}}
<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-paper/80 hover:bg-ink hover:text-ember focus:outline-none focus:bg-ink focus:text-ember transition duration-150 ease-in-out']) }}>{{ $slot }}</a>
