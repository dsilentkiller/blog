<?php

namespace App\Models\Admin\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable =[

        'ledger_name',


    ];
}
