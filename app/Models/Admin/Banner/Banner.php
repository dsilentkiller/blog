<?php

namespace App\Models\Admin\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable =[
        'status',
        'greeting',
        'name',
        'designation',
        'slug',
        'image',



    ];
}
