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
        'user_id'
    ];
    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
    public function employes()
    {
        return $this->belongsToMany(Employe::class);
    }
    public function ressourcerecolte()
    {
        return $this->hasMany(Ressourcerecolte::class);
    }

    public function control()
    {
        return $this->hasMany(Control::class);
    }
    public function finance_recolte()
    {
        return $this->hasOne(Finance_Recolte::class);
    }
}