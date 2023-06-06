<?php

namespace App\Exports;

use App\Models\Ressourcerecolte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;

class RessourcerecolteExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Ressourcerecolte::query();
    }

    public function map($user): array
    {
        if($user->user_id == User::where('id', $user->user_id)->first()->id)
        {
            $user->user_id = User::where('id', $user->user_id)->first()->name;
        }
        else
        {
            $user->user_id = 'null';
        }
        return [
            $user->parcelle->nom,
            $user->machine_recolte,
            $user->machine_recolte,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Machine',
            'Quantité récoltée',
            'Utilisateur',
            'Date de création',
        ];
    }
}