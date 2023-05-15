<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Parcelle;
use App\Models\Recolte;
use Illuminate\Http\Request;

class RecolteController extends Controller
{
    public function index()
    {
        $recolte=Recolte::all();
        return view('recolte.recolte',compact('recolte'));
    }

    public function store(){
        $parcelle=Parcelle::all();
        $employe=Employe::all();
        return view('recolte.empty',compact('parcelle','employe'));
    }

    public function creat(Request $request){

        try {

            $request->validate([
                'nom_parcelle' => 'required',
                'nom_employe' => 'required',
                 ]);
                 $so = Recolte::create([
                    'parcelle_id' => $request->nom_parcelle,
                    'quantité_récoltée'=>$request->quantité_récoltée,
                    'date_récolte' =>  $request->date_récolte,
                    'coût_récolte' => $request->coût_récolte,
                    'Moyen_rendement' => $request->Moyen_rendement,
                    'qualité_récolte' => $request->qualité_récolte,
                    'prix_de_vente' => $request->prix_de_vente,

                ]);
                $so->employes()->attach($request->nom_employe);

            return redirect()->route('recolte.index')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){

             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }


    }

    public function destroy(Request $request){
        $recolte=Recolte::find($request->id);
        $recolte->delete();
        return redirect()->route('recolte.index')->with('warning', 'Les données ont été supprimer avec succès!');
    }

}