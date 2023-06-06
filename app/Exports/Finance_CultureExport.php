<?php

namespace App\Exports;

use App\Models\Finance_Culture;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;
class Finance_CultureExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Finance_Culture::query();
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
            $user->coût_semences,
            $user->coût_engrais,
            $user->coût_pesticides,
            $user->coût_machines_culture,
            $user->cout_consommation_eau,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Parcelle',
            'Coût semences',
            'Coût engrais',
            'Coût pesticides',
            'Coût machines culture',
            'Coût consommation eau',
            'Utilisateur',
            'Date de création',
        ];
    }
}