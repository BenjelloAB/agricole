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
        'debut_culture',
        'fin_culture',
        'user_id',
    ];
    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
    public function employes()
    {
        return $this->belongsToMany(Employe::class);
    }

}
