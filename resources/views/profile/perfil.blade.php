<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div style="margin-bottom: 10px;">
            {{ __('Perfil') }}
            </div>
        </h2>
        <button>
        <a href="{{ route('profile.edit') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Editar Perfil') }}
        </a>
    </button>
    </x-slot>

    
</x-app-layout>