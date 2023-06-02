<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressourcerecolte extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcelle_id',
        'machine_recolte',
        'user_id',
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }


}