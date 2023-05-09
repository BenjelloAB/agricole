<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'emplacement',
        'taille',
        'type_de_sol',
        'niveau_dirrigation',
        'état_de_santé',
    ];
    public function cultur()
    {
        return $this->hasMany(Cultur::class);
    }
}