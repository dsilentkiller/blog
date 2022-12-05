<?php

namespace App\Models\Admin\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'finish_date',
        'todolist',
        'status'

    ];
}
