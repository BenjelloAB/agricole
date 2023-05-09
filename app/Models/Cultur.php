<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultur extends Model
{
    use HasFactory;
    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}