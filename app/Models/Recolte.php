<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolte extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcelle_id',
        'quantité_récoltée',
        'date_récolte',
        'coût_récolte',
        'Moyen_rendement',
        'qualité_récolte',
        'prix_de_vente',
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