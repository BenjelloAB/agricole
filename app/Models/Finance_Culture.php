<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_Culture extends Model
{
    use HasFactory;
    protected $fillable = [
        'cultur_id',
        'ressourceculture_id',
        'coût_semences',
        'coût_engrais',
        'coût_pesticides',
        'coût_machines_culture',
    ];

    public function cultur()
    {
        return $this->belongsTo(Culture::class);
    }

    public function ressourceculture()
    {
        return $this->belongsTo(RessourceCulture::class);
    }
}