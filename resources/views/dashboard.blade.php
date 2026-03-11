<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h1>Bem-vindo ao Tarefy, {{ Auth::user()->name }}!</h1>
                   <p>Gerencie suas tarefas de forma eficiente e organizada.</p>
                    <div class="mt-3">
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">Ver minhas tarefas</a>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('profile.perfil') }}" class="text-blue-500 hover:underline">Ver meu perfil</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <main>
        
    </main> 
</x-app-layout>
