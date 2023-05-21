<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cultur extends Model
{
    use HasFactory;
    protected $fillable = [
        'parcelle_id',
        'nom',
        'type',
        'date_de_plantation_culture',
        'date_de_récolte_prévue_culture',
        'besoin_en_eau',
        'besoin_en_nutriments_culture',
        'besoin_en_pesticides_culture',
        'état_de_santé_culture',
    ];
    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
    public function employes()
    {
        return $this->belongsToMany(Employe::class);
    }
    public function ressourceculture(): HasOne
    {
        return $this->hasOne(Ressourceculture::class);
    }
    public function finance_culture()
    {
        return $this->hasMany(Finance_Culture::class);
    }
}