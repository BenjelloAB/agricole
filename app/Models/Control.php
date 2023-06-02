<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcelle_id',
        'etat_sante',
        'texture_du_sol',
        'ph_du_sol',
        'etat_de_produit_recolte',
        'user_id',
    ];
    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
}
