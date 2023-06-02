<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_Recolte extends Model
{
    use HasFactory;

    protected $fillable = [

        'parcelle_id',
        'coût_récolte',
        'user_id',
    ];

    public function parcelle()
    {
        return $this->belongsTo(Parcelle::class);
    }
}