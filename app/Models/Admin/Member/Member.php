<?php

namespace App\Models\Admin\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable =['name', 'address','phone','age','gender','marital_status','status','email','password','image'];
}
