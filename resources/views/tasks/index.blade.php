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
        
</x-app-layout>