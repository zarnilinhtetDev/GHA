<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function companyIncome()
    {
        return $this->hasMany(CompanyIncome::class);
    }
    public function inout()
    {
        return $this->hasMany(Inout::class);
    }
}
