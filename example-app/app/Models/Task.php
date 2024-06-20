<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'description',
        'due_date',
        'finished',
    ];
    protected $casts = [
        'due_date' => 'date',
    ];
}
