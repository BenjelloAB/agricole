<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_Recolte extends Model
{
    use HasFactory;

    protected $fillable = [
        'recolte_id',
        'coût_récolte',
        'prix_de_vente',
        'revenu_net',
        'revenu_brut',
    ];

    public function recolte()
    {
        return $this->belongsTo(Recolte::class);
    }
}