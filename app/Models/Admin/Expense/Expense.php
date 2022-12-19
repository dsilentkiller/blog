<?php

namespace App\Models\Admin\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable=['date','amount','client_name','purpose','remark','image','payment_method','created_by','amount_taken_from','status'];
}
