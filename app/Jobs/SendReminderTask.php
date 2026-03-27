<?php

//Job serve para deixar rodando uma tarefa em background, ou seja, sem precisar do usuário ficar esperando a resposta da requisição. 
//No caso, o job seria para enviar um email de lembrete para o usuário quando a data de vencimento da tarefa estiver próxima.

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Dispatcher as Dispatchable;
use App\Models\TaskReminder;
use Illuminate\Support\Facades\Log;

class SendReminderTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public TaskReminder $reminder) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      $task = $this->reminder->task;

        // por enquanto só loga
        Log::info("Lembrete: tarefa {$task->title}");
    }
}
