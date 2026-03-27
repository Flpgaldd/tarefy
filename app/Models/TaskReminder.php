<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskReminder extends Model
{
    protected $fillable = [
        'task_id',
        'reminder_datetime'
    ];

    protected $casts = [
        'reminder_datetime' => 'datetime',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
