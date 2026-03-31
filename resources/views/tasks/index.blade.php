<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Tarefa') }}
        </h2>
        <br>
        
    

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <p>Nome da tarefa:</p>
        <input type="text" name="title" placeholder="Nova tarefa" required>
        <p style="margin-top: 10px;">Data de vencimento:</p>  
        <input type="datetime-local" name="due_datetime" required style="width: 198px;">
        <input type="hidden" name="status" value="Pendente">
        <p style="margin-top: 10px;">Adicionar lembrete:</p>
        <input type="datetime-local" name="reminder_datetime" style="width: 198px;">
        <br>
        <button type="submit" style="margin-top:15px; padding: 5px 10px; background-color: #66db42; cursor: pointer; border-radius: 6px; color: white;">Criar tarefa</button>
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
                            <option value="all">Todos</option>
                            <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="Fazendo" {{ request('status') == 'Fazendo' ? 'selected' : '' }}>Fazendo</option>
                            <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                    </div>
                </div>
                <input type="text" name="title" placeholder="Buscar tarefa" value="{{ request('title') }}" style="height:38px; border-radius: 6px; margin-top: 10px;">
            <div class="flex items-end" style="margin-top: 10px;">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="margin-right: 10px;">Filtrar</button>
                        <a href="{{ route('tasks.index') }}">
                            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Limpar</button>
                        </a>
            </div>  
                
            </form>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Total de tarefas: {{ $total }}</p>
                    <p>Tarefas Pendentes: {{ $pending }}</p>
                    <p>Tarefas Fazendo: {{ $doing }}</p>
                    <p>Tarefas Concluídas: {{ $completed}}</p>
                </div>  
                <hr>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach($tasks as $task)
                    <div>
                        <Strong>{{ $task->title }}</Strong>
                        <p>{{ $task->due_datetime }}</p>
                        <p>Estado:{{ $task->status}}</p>
                        @if($task->due_datetime && \Carbon\Carbon::parse($task->due_datetime)->isPast() && $task->status !== 'Concluída')
                            <span class="text-red-500 font-bold">⚠️ Atrasada</span>
                        @endif
                    </div>
                    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                        <br>
                    </form>
                    <br>
                    <hr>
                    <br>
                @endforeach
                <hr>
            </div>
        </div>   
    </div>  
         
        
</x-app-layout>