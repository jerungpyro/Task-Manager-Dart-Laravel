<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'completed',
        'due_date',
        'priority'
    ];

    protected $casts = [
        'completed' => 'boolean',
        'due_date' => 'date',
    ];
}
