<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 🎯 ALTERADO: antes era só `return view('dashboard');`, sem nenhum dado.
// Agora busca as estatísticas reais do usuário logado através de
// User::taskStats() — a mesma fonte usada em "Minhas Tarefas", garantindo que
// os números do dashboard sempre coincidam com os da outra tela.
Route::get('/dashboard', function () {
    $stats = Auth::user()->taskStats();

    return view('dashboard', $stats);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.perfil');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('tasks')->middleware('auth')->group(function () {
    Route::get('/search', [TaskController::class, 'search'])->name('tasks.search');
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

require __DIR__.'/auth.php';    
