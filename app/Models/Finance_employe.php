<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'salair',
        'date_paiement',
        'user_id',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}