<?php

namespace App\Models\Admin\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable=['date','amount','person_address','client_name','purpose','remark','image','payment_method','created_by','status'];
}
