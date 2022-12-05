<?php

namespace App\Models\Admin\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // protected $gurded;
    protected $fillable=['_token','created_by', 'topic','story','image','date'];
}
