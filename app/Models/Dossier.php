<?php

namespace App\Models;
use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'phone',
        'residence',
        'aetabl',
        'diplome',
        'detabl',
        'filiere',
        'pays',
        'user_id',
        'certificat',
        'cv',
        'recu',
        'lrecommandation',
        'ldemande',
        'lmotivation',
        'imgdiplome',
        'note',
        'projet',

    ];

    /**recuperation de l'id user
    public static function boot(){
        parent::boot();

        static::creating(function ($model){
            $model->user_id = auth()->user()->id;
        });
    }**/


    //relation un à plusieur
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function notes()
    {
        return $this->hasMany(Note::class, 'dossier_id', 'id');
    }
}
