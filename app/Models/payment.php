<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
