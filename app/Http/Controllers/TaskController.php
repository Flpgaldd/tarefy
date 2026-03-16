<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{   
    public function index()
    {   
        $user = Auth::user();

        $tasks = $user->tasks()->orderBy('due_datetime', 'asc')->get();
        


         $stats = $this->getTaskStats($user);
        
         return view('tasks.index', array_merge(
            ['tasks' => $tasks],    
            $stats
         ));
    }

    public function store(StoreTaskRequest $request)
    {
        $user = Auth::user();
       $task = $user->tasks()->create([
            'title' => $request->title,
            'due_datetime' => $request->due_datetime
            ]);

        if($task)
            return redirect()->route('tasks.index')->with('msg', 'Tarefa criada com sucesso!');
        else        
            return redirect()->route('tasks.index')->with('error', 'Ocorreu um erro ao criar a tarefa.');
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);
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
       $status = $request->query('status');
        
       $user = Auth::user();

        $query = $user->tasks();
        
       if ($status == 'Pendente') {
            $query->pending();
        }

        if ($status == 'Fazendo') {
            $query->doing();
        }

        if ($status == 'Concluída') {
            $query->completed();
        }

        $tasks = $query->orderBy('due_datetime', 'asc')
        ->get();

        $stats = $this->getTaskStats($user);
        
        return view('tasks.index', array_merge(
            ['tasks' => $tasks],
            $stats
        ));
    }

    public function show(Task $task)
    {
        Gate::authorize('view', $task);

        return view('tasks.index', compact('task'));
    }
    private function getTaskStats($user)
    {
        return [
            'total' => $user->tasks()->count(),
            'pending' => $user->tasks()->pending()->count(),
            'doing' => $user->tasks()->doing()->count(),
            'completed' => $user->tasks()->completed()->count(),
        ];
    }
} 