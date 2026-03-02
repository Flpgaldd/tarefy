<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
        Auth::user()->tasks()->create([
            'title' => $request->title,
            'due_datetime' => $request->due_datetime,
            'status' => 'pending',
            ]);

        return redirect()->route('tasks.index');
    }
} 