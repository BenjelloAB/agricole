<?php

namespace App\Exports;

use App\Models\Control;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;

class ControlExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Control::query();
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
            $user->etat_sante,
            $user->texture_du_sol,
            $user->ph_du_sol,
            $user->etat_de_produit_recolte,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Etat de santé',
            'Texture du sol',
            'PH du sol',
            'Etat de produit récolté',
            'Utilisateur',
            'Date de création',
        ];
    }
}