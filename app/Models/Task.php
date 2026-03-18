<?php

namespace App\Models;
use App\Models\User;

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
}
