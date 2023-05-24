<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Parcelle;
use App\Models\Recolte;
use App\Models\Ressourcerecolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecolteController extends Controller
{
    public function index()
    {
        $recolte=Recolte::where('user_id',Auth::user()->id)->get();
        return view('recolte.recolte',compact('recolte'));
    }

    public function store(){
        $parcelle=Parcelle::where('user_id',Auth::user()->id)->get();
        $employe=Employe::where('user_id',Auth::user()->id)->get();
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
                    'user_id' => Auth::user()->id,

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


    public function show()
    {

        $recolte=Recolte::where('user_id',Auth::user()->id)->get();
        $ressource=Ressourcerecolte::where('user_id',Auth::user()->id)->get();
        return view('recolte.ressource',compact('recolte','ressource'));
    }

    public function add(Request $request)
    {
        try {
            $so = Ressourcerecolte::create([
                'recolte_id' => $request->recolte_id,
                'machine_recolte' => $request->machine_recolte,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('ressource.show')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    public function update(Request $request){
        $ressource=Ressourcerecolte::find($request->id);
        $ressource->update([
            'recolte_id' => $request->recolte_id,
            'machine_recolte' => $request->machine_recolte,
        ]);
        return redirect()->route('ressource.show')->with('success', 'Les données ont été modifiées avec succès!');
    }

    public function delete(Request $request){
        $ressource=Ressourcerecolte::find($request->id);
        $ressource->delete();
        return redirect()->route('ressource.show')->with('warning', 'Les données ont été supprimer avec succès!');
    }


}