<x-app-layout>
    <h2>Minhas tarefas</h2>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Nova tarefa" required>
        <input type="date" name="due_datetime" required>
        <button type="submit">Criar tarefa</button>
    </form>

    <hr>

    @foreach($tasks as $task)
        <div>
            <Strong>{{ $task->title }}</Strong>
            <p>{{ $task->due_datetime }}</p>
            <p>status:{{ $task->status}}</p>
        </div>
        @endforeach
</x-app-layout>