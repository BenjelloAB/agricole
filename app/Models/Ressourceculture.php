<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressourceculture extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcelle_id',
        'semences',
        'engrais',
        'pesticides',
        'besoin_en_eau',
        'nummachine',
        'nom_machine',
        'user_id'
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }

    public function finance_culture()
    {
        return $this->hasMany(Finance_Culture::class);
    }
}
