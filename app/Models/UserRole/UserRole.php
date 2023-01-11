<?php

namespace App\Models\UserRole;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable =[
        'role_name',
        'role_description',
        'permissions',
    ];
}
