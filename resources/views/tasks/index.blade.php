<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Tarefa') }}
        </h2>
    

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Nova tarefa" required>
        <input type="datetime-local" name="due_datetime" required>
        <input type="hidden" name="status" value="Pendente">
        <button type="submit">Criar tarefa</button>
    </form>

        <main>
            <div class="row">
                @if(session('msg') || session('error') || session('success'))
                    <p class="msg">{{ session('msg') }}</p>
                    <p class="error">{{ session('error') }}</p>
                    <p class="success">{{ session('success') }}</p>
                @endif
                @yield('content')
            </div>
        </main>
    </x-slot>
    <hr>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4>Filtros</h4>   
                            <hr>

                            <form method="GET" action="{{ route('tasks.search') }}" class="mt-4">
                                @csrf
                                <div class="flex space-x-4">
                                    <div>
                                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                        <select name="status" id="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" style="width: 110px;">
                                            <option value="">Todos</option>
                                            <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                            <option value="Fazendo" {{ request('status') == 'Fazendo' ? 'selected' : '' }}>Fazendo</option>
                                            <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                                        </select>
                                    </div>
                                    <div class="flex items-end">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        @foreach($tasks as $task)
                            <div>
                                <Strong>{{ $task->title }}</Strong>
                                <p>{{ $task->due_datetime }}</p>
                                <p>{{ $task->due_time }}</p>
                                <p>Estado:{{ $task->status}}</p>
                            </div>
                            <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                            @endforeach
                </div>
            </div>   
        </div>  
         
        
</x-app-layout>