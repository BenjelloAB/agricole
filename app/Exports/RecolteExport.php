<?php

namespace App\Exports;

use App\Models\Recolte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;
class RecolteExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Recolte::query();
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
            $user->quantité_récoltée,
            $user->date_récolte_debut,
            $user->date_récolte_fin,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Quantité récoltée',
            'Date récolte début',
            'Date récolte fin',
            'Utilisateur',
            'Date de création',
        ];
    }
}