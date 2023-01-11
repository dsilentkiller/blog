<?php

namespace App\Models\Admin\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;
    protected $fillable =[

        'ledgergroup_name',
        'ledgergroup_code',
        'status',


    ];
}
