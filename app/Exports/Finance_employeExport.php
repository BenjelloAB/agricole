<?php

namespace App\Exports;

use App\Models\Finance_employe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\User;

class Finance_employeExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Finance_employe::query();
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
            $user->employe->prenom,
            $user->employe->nom,
            $user->salair,
            $user->role,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Prenom',
            'Nom',
            'Salair',
            'Role',
            'User_id',
            'Created_at',
        ];
    }
}