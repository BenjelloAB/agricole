<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'date',
        'lieu',
        'situation',
        'adress',
        'cin',
        'tele',
        'experiance',
        'mail',
        'scolaire',
        'employe',
    ];
    public function cultur()
    {
        return $this->belongsToMany(Cultur::class);
    }
    public function recolte()
    {
        return $this->belongsToMany(Recolte::class);
    }
}