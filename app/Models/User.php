<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'year',
        'confirmation_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relation plusieur à un 
    public function dossiers()
    {
        return $this->hasMany('App\Models\Dossier');
    }

    //relation user et massage
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    //relation user et Note
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    //relation user et transaction
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
