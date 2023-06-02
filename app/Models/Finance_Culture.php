<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_Culture extends Model
{
    use HasFactory;
    protected $fillable = [

        'parcelle_id',
        'coût_semences',
        'coût_engrais',
        'coût_pesticides',
        'coût_machines_culture',
        'cout_consommation_eau',
        'user_id'
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }

    public function ressourceculture()
    {
        return $this->belongsTo(RessourceCulture::class);
    }
}