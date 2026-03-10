<h1>Editar Task</h1>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $task->title }}">

    <input type="datetime-local" name="due_datetime" value="{{ $task->due_datetime }}">

    <select name="status">
        <option value="Pendente" {{ $task->status === 'Pendente' ? 'selected' : '' }}>Pendente</option>
        <option value="Fazendo" {{ $task->status === 'Fazendo' ? 'selected' : '' }}>Fazendo</option>
        <option value="Concluída" {{ $task->status === 'Concluída' ? 'selected' : '' }}>Concluída</option>
    </select>

    <button type="submit">Atualizar</button>
</form>