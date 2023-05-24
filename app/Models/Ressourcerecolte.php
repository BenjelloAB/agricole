<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressourcerecolte extends Model
{
    use HasFactory;

    protected $fillable = [
        'recolte_id',
        'machine_recolte',
        'user_id',
    ];

    public function recolte()
    {
        return $this->belongsTo(Recolte::class);
    }


}