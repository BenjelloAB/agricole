<?php

namespace App\Http\Controllers;

use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Parcelle;
use App\Models\Ressourceculture;
use Illuminate\Http\Request;

class CulturController extends Controller
{
    public function index()
    {
        $culture=Cultur::all();

        return view('culture.cultur',compact('culture'));
    }

    public function store(){
        $parcelle=Parcelle::all();
        $employe=Employe::all();
        return view('culture.empty',compact('parcelle','employe'));
    }

    public function creat(Request $request){

        try {

            $request->validate([
                'nom_parcelle' => 'required',
                'nom_employe' => 'required',
                 ]);

                //  foreach ($request->nom_parcelle as $valeur_case) {
                //     // Vérifiez si la case à cocher a été cochée
                //     if ($valeur_case) {
                //       $cases_coches[] = $valeur_case;
                //     }
                //   }
                  foreach ($request->nom_employe as $valeur_case) {
                    // Vérifiez si la case à cocher a été cochée
                    if ($valeur_case) {
                      $case[] = $valeur_case;
                    }
                  }

                 $so = Cultur::create([
                    'parcelle_id' => $request->nom_parcelle,
                    'employe_id' =>implode(',',$case),
                    'nom'=>$request->nom,
                    'type' =>  $request->type,
                    'date_de_plantation_culture' => $request->date_de_plantation_culture,
                    'date_de_récolte_prévue_culture' => $request->date_de_récolte_prévue_culture,
                    'besoin_en_eau' => $request->besoin_en_eau,
                    'besoin_en_nutriments_culture' => $request->besoin_en_nutriments_culture,
                    'besoin_en_pesticides_culture' => $request->besoin_en_pesticides_culture,
                    'état_de_santé_culture' => $request->état_de_santé_culture,
                ]);



            return redirect()->route('culture.index')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){

             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }


    }

    public function destroy(Request $request)
    {
         try{
              $parcelle = Cultur::findOrFail($request->id);
              $parcelle->delete();
              return redirect()->back()->with('warning', 'Les données ont été supprimer avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }


    /* ressource culture  */

    public function show()
    {
        $cultur=Cultur::all();


        $ressorce=Ressourceculture::all();
        return view('culture.ressource',compact('cultur','ressorce'));
    }
    public function add(Request $request)
    {
        try {
            $so = Ressourceculture::create([
                'culture_id' => $request->cultur,

                'semences'=>$request->semences,
                'engrais' =>  $request->engrais,
                'pesticides' => $request->pesticides,
                'machines_culture' => $request->machines_culture,
            ]);

            return redirect()->route('culture.ressource')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
public function edit(Request $request)
{

    try {
        $ressource = Ressourceculture::findOrFail($request->id);
        $ressource->update([
            'culture_id' => $request->cultur,
            'semences'=>$request->semences,
            'engrais' =>  $request->engrais,
            'pesticides' => $request->pesticides,
            'machines_culture' => $request->machines_culture,
        ]);

        return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès!');
     }catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

}
 public function delet(Request $request){

    try{
        $ressource = Ressourceculture::findOrFail($request->id);
        $ressource->delete();
        return redirect()->back()->with('warning', 'Les données ont été supprimer avec succès!');
   }catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

}
