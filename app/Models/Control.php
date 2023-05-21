<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'recolte_id',
        'normes_de_qualité',
        'procédures_de_contrôle_qualité',
    ];
    public function recolte()
    {
        return $this->belongsTo(Recolte::class);
    }
}
