<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; // Assurez-vous d'importer le modèle Categorie approprié
use App\Models\Cultur;
use App\Models\Event;
use App\Models\Events;
use App\Models\List_Legume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CategorieController extends Controller
{


public function enregistrerCategorie(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required',
        'color' => 'required',
    ]);
    Categorie::create([
        'nom' => $request->nom,
        'couleur' => $request->color,
        'user_id' => Auth::user()->id,
    ]);

    return redirect()->back()->with('success', 'La catégorie a été créée avec succès!');

}


public function index(){

    $legumeData = Cultur::where('user_id',auth()->user()->id)->select('nom', DB::raw('COUNT(*) as count'))
    ->groupBy('nom')
    ->get();

return view('dashboard', compact('legumeData'));
}

public function store(Request $request)
{
    $event = new Events();
    $event->title = $request->input('title');
    $event->start_date = $request->input('start_date');
    $event->end_date = $request->input('end_date');
    $event->save();

    return response()->json(['message' => 'Event stored successfully']);
}


}