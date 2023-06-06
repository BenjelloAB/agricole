<?php

namespace App\Exports;

use App\Models\Employe;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Employe::query();
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
            $user->prenom,
            $user->date,
            $user->lieu,
            $user->situation,
            $user->adress,
            $user->cin,
            $user->tele,
            $user->mail,
            $user->scolaire,
            $user->experiance,
            $user->employe,
            $user->user_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prenom',
            'Date de naissance',
            'Lieu de naissance',
            'Situation familiale',
            'Adresse',
            'CIN',
            'Telephone',
            'Email',
            'Niveau scolaire',
            'Experiance',
            'Employe',
            'Responsable',
            'Date de création',
        ];
    }
}