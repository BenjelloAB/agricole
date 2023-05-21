<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressourceculture extends Model
{
    use HasFactory;

    protected $fillable = [
        'cultur_id',
        'semences',
        'engrais',
        'pesticides',
        'machines_culture',
    ];

    public function cultur()
    {
        return $this->belongsTo(Cultur::class);
    }

    public function finance_culture()
    {
        return $this->hasMany(Finance_Culture::class);
    }
}