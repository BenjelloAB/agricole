<?php

namespace App\Exports;

use App\Models\Cultur;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CulturExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Cultur::query();
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
            $user->nom,
            $user->debut_culture,
            $user->fin_culture,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Nom',
            'Date de début',
            'Date de fin',
            'Responsable',
            'Date de création',
        ];
    }
}