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

    // public function scopeSearchStatus($query, $status)
    // {
    //     return $query->where('status', $status);
    // }
}
