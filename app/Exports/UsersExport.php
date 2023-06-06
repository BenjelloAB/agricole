<?php

namespace App\Exports;

use App\Models\Parcelle;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Parcelle::query();
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
            $user->nom,
            $user->emplacement,
            $user->taille,
            $user->type_de_sol,
            $user->niveau_dirrigation,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Emplacement',
            'Taille',
            'Type de sol',
            'Niveau dirrigation',
            'Responsable',
            'Date de création',
        ];
    }
}