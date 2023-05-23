<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Transaction',
        'user_id',
    ];

    //relation un à plusieur
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
