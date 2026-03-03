<h1>Editar Task</h1>

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $task->title }}">

    <input type="datetime-local" name="due_datetime" value="{{ $task->due_datetime }}">

    <button type="submit">Atualizar</button>
</form>