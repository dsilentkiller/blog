<?php

namespace App\Models\Admin\Loan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable =['date','person_name','finish_date','person_phone','person_address','total_amount', 'paid_amount','due_amount','paid_by','created_by','updated_by','status'];
}
