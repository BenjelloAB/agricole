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
        'date_récolte_debut',
        'date_récolte_fin',
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


   
    public function finance_recolte()
    {
        return $this->hasOne(Finance_Recolte::class);
    }
}