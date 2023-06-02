<?php

namespace App\Http\Controllers;

use App\Models\Cultur;
use App\Models\Employe;
use App\Models\List_Legume;
use App\Models\Parcelle;
use App\Models\Ressourceculture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CulturController extends Controller
{
    public function index()
    {
        $culture=Cultur::where('user_id',auth()->user()->id)->get();



        return view('culture.cultur',compact('culture'));
    }

    public function store(){
        $parcelle=Parcelle::where('user_id',auth()->user()->id)->get();
        $employe=Employe::where('user_id',auth()->user()->id)->get();
        $legume = List_Legume::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('list__legumes')
                ->groupBy('nom');
        })
        ->orderBy('nom', 'asc')
        ->get();
        return view('culture.empty',compact('parcelle','employe','legume'));
    }

    public function creat(Request $request){

        try {

            $request->validate([
                'nom_parcelle' => 'required',
                'nom_employe' => 'required',
                'nom'=>['required','alpha'],
                'debut_culture'=>['required','date'],
                'fin_culture'=> ['required','date'],
                 ]);

                //   foreach ($request->nom_employe as $valeur_case) {
                //     // Vérifiez si la case à cocher a été cochée
                //     if ($valeur_case) {
                //       $case[] = $valeur_case;
                //     }
                //   }
                //   $employeeIds = implode(',',$case);
                 $so = Cultur::create([
                    'parcelle_id' => $request->nom_parcelle,
                    'nom'=>$request->nom,
                    'type' =>  $request->type,
                    'debut_culture' => $request->debut_culture,
                    'fin_culture' => $request->fin_culture,
                    'user_id' =>auth()->user()->id,
                ]);

                $so->employes()->attach($request->nom_employe);

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
        $parcelle=Parcelle::where('user_id',auth()->user()->id)->get();
        $ressorce=Ressourceculture::where('user_id',auth()->user()->id)->get();
        return view('culture.ressource',compact('parcelle','ressorce'));
    }
    public function add(Request $request)
    {

        try {
            // $so = Ressourceculture::create([
            //     'parcelle_id' => $request->parcelle,
            //     'semences'=>$request->semences,
            //     'engrais' =>  $request->engrais,
            //     'pesticides' => $request->pesticides,
            //     'besoin_en_pesticides_culture' => $request->besoin_en_pesticides_culture,
            //     'besoin_en_eau' => $request->besoin_en_eau,
            //     'machines_culture' => $nomMachine,$numMachine,
            //     'user_id' =>auth()->user()->id,
            // ]);
            $nomMachines = $request->input('nom_machine');
            $numMachines = $request->input('numMachine');
            $array1=[];
            $array2=[];
foreach ($nomMachines as $index => $nomMachine) {
    $numMachine = $numMachines[$index];
    $array1[]=$nomMachine;
    $array2[]=$numMachine;

}
$string1 =  implode(' ',$array1);
$string2 =  implode(' ',$array2);

// Split the strings into arrays
$parts1 = Str::of($string1)->explode(' ');
$parts2 = Str::of($string2)->explode(' ');

// Merge the arrays with parentheses around the numbers
$result = [];
$count = min($parts1->count(), $parts2->count());

for ($i = 0; $i < $count; $i++) {
    $result[] = $parts1[$i] . '(' . $parts2[$i] . ')';
}

// If the second string has more parts, append them as-is
for ($i = $count; $i < $parts2->count(); $i++) {
    $result[] = $parts2[$i];
}

// Join the resulting array into a string
$output = implode(' ', $result);

// Output the final merged string
 // Output: Tracteur(1) Charrue(2)

    Ressourceculture::create([
        'parcelle_id' => $request->parcelle,
        'semences'=>$request->semences,
        'engrais' =>  $request->engrais,
        'pesticides' => $request->pesticides,
        'besoin_en_pesticides_culture' => $request->besoin_en_pesticides_culture,
        'besoin_en_eau' => $request->besoin_en_eau,
        'nom_machine' => $output,
        'user_id' =>auth()->user()->id,
    ]);
            return redirect()->route('culture.ressource',compact('output'))->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
public function edit(Request $request)
{

    try {
        $ressource = Ressourceculture::findOrFail($request->id);
         $nomMachines = $request->input('nom_machine');
            $numMachines = $request->input('numMachine');
            $array1=[];
            $array2=[];
foreach ($nomMachines as $index => $nomMachine) {
    $numMachine = $numMachines[$index];
    $array1[]=$nomMachine;
    $array2[]=$numMachine;

}
$string1 =  implode(' ',$array1);
$string2 =  implode(' ',$array2);

// Split the strings into arrays
$parts1 = Str::of($string1)->explode(' ');
$parts2 = Str::of($string2)->explode(' ');

// Merge the arrays with parentheses around the numbers
$result = [];
$count = min($parts1->count(), $parts2->count());

for ($i = 0; $i < $count; $i++) {
    $result[] = $parts1[$i] . '(' . $parts2[$i] . ')';
}

// If the second string has more parts, append them as-is
for ($i = $count; $i < $parts2->count(); $i++) {
    $result[] = $parts2[$i];
}

// Join the resulting array into a string
$output = implode(' ', $result);

// Output the final merged string
 // Output: Tracteur(1) Charr
        $ressource->update([
            'parcelle_id' => $request->parcelle,
            'semences'=>$request->semences,
            'engrais' =>  $request->engrais,
            'pesticides' => $request->pesticides,
            'besoin_en_pesticides_culture' => $request->besoin_en_pesticides_culture,
            'besoin_en_eau' => $request->besoin_en_eau,
            'nom_machine' => $output,
            'user_id' =>auth()->user()->id,
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
