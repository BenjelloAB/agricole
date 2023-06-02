<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Hash;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'emplacement',
        'taille',
        'type_de_sol',
        'user_id',
    ];
    public function cultur()
    {
        return $this->hasMany(Cultur::class);
    }
    public function recolte()
    {
        return $this->hasMany(Recolte::class);
    }
    public function ressourceculture(): HasOne
    {
        return $this->hasOne(Ressourceculture::class);
    }
    public function finance_culture()
    {
        return $this->hasMany(Finance_Culture::class);
    }
    public function ressourcerecolte()
    {
        return $this->hasMany(Ressourcerecolte::class);
    }
    public function control()
    {
        return $this->hasMany(Control::class);
    }
}
