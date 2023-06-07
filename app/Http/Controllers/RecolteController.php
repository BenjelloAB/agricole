<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Parcelle;
use App\Models\Recolte;
use App\Models\Ressourcerecolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
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
                'quantité_récoltée' => 'required|numeric',
                'date_récolte_debut' => 'required',
                'date_récolte_fin' => 'required',
                 ]);
                 $so = Recolte::create([
                    'parcelle_id' => $request->nom_parcelle,
                    'quantité_récoltée'=>$request->quantité_récoltée,
                    'date_récolte_debut' =>  $request->date_récolte_debut,
                    'date_récolte_fin' =>  $request->date_récolte_fin,
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

        $recolte=Parcelle::where('user_id',Auth::user()->id)->get();
        $ressource=Ressourcerecolte::where('user_id',Auth::user()->id)->get();
        return view('recolte.ressource',compact('recolte','ressource'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([

                'recolte_id' => 'required',
                'nom_machine' => 'required',
            ]);
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
            $so = Ressourcerecolte::create([
                'parcelle_id' => $request->recolte_id,
                'machine_recolte' => $output,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('ressource.show')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    public function update(Request $request){
        $ressource=Ressourcerecolte::find($request->id);
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
        $ressource->update([
            'parcelle_id' => $request->recolte_id,
            'machine_recolte' => $output,
        ]);
        return redirect()->route('ressource.show')->with('success', 'Les données ont été modifiées avec succès!');
    }

    public function delete(Request $request){
        $ressource=Ressourcerecolte::find($request->id);
        $ressource->delete();
        return redirect()->route('ressource.show')->with('warning', 'Les données ont été supprimer avec succès!');
    }
    public function submitForm(Request $request)
    {
        // Validez les données du formulaire ici si nécessaire

        // Envoie de l'e-mail
        $data = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to('saadboutirhiten@gmail.com')->send(new ContactFormMail($data));

        // Redirigez ou affichez un message de succès ici
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }

}