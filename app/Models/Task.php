<?php

//Model serve para representar uma entidade do banco de dados, ou seja, uma tabela. No caso, o model seria para representar a tabela de tarefas, onde cada tarefa tem um título, descrição, data de vencimento, status e prioridade. 
//O model também pode ter relacionamentos com outros models, como o relacionamento entre a tarefa e o usuário que a criou, ou o relacionamento entre a tarefa e os lembretes associados a ela.

namespace App\Models;
use App\Models\User;
use app\Models\TaskReminder;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_datetime',
        'status',
        "priority",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopePending($query)
    {
        return $query->where('status', 'Pendente');
    }

    public function scopeDoing($query)
    {
        return $query->where('status', 'Fazendo');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'Concluída');
    }

    public function scopeOverdue($query)
    {
        return $query->where('due_datetime', '<', now())->where('status', '!=', 'Concluída')->wheredate('due_datetime', '!=', now());
    }

    // public function scopeSearchStatus($query, $status)
    // {
    //     return $query->where('status', $status);
    // }
    const PRIORITY_LOW = 'low';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_HIGH = 'high';


    protected $casts = [
    'due_datetime' => 'datetime',
    ];
    public function reminders()
    {
        return $this->hasMany(TaskReminder::class);
    }
}
