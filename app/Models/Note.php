<?php

namespace App\Models;
use App\Models\Dossier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    use HasFactory;

    //protections des données à enregistrer

    protected $fillable = [
        'note',
        'user_id',
        'dossier_id',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relation plusieur à un 
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
