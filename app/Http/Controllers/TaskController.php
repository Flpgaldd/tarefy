<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_datetime' => 'required|date',
        ]);
       $task = Auth::user()->tasks()->create([
            'title' => $request->title,
            'due_datetime' => $request->due_datetime,
            'status' => 'Pendente',
            ]);

        if($task)
            return redirect()->route('tasks.index')->with('msg', 'Tarefa criada com sucesso!');
        else        
            return redirect()->route('tasks.index')->with('error', 'Ocorreu um erro ao criar a tarefa.');
    }

    public function update(Request $request, Task $task)
    {
        Gate::authorize('update', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'due_datetime' => 'required|date',
        ]);
        $task->update([
            'title' => $request->title,
            'due_datetime' => $request->due_datetime,
            'status' => $request->status,
        ]);

        if($task)
        {
            return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
        } else {
            return redirect()->route('tasks.index')->with('error', 'Ocorreu um erro ao atualizar a tarefa.');
        }
    }
    public function edit(Task $task){
        
    Gate::authorize('edit', $task);

        
        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {

        Gate::authorize('delete', $task);

        $deleted = $task->delete();

        if($deleted)
            return redirect()->route('tasks.index')->with('msg', 'Tarefa excluída com sucesso!');
        else
            return redirect()->route('tasks.index')->with('error', 'Ocorreu um erro ao excluir a tarefa.');
    }

    public function search(Request $request)
    {
        $status = $request->input('status');
        $tasks = Auth::user()->tasks()->where('status', 'like', "%$status%")->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        Gate::authorize('view', $task);

        return view('tasks.index', compact('task'));
    }
} 