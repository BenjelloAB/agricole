<?php

namespace App\Exports;

use App\Models\Ressourceculture;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;
class RessourcecultureExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Ressourceculture::query();
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
            $user->semences,
            $user->engrais,
            $user->pesticides,
            $user->besoin_en_eau,
            $user->besoin_en_pesticides_culture,
            $user->nom_machine,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Semences',
            'Engrais',
            'Pesticides',
            'Besoin en eau',
            'Besoin en pesticides',
            'Machine',
            'Responsable',
            'Date de création',
        ];
    }
}