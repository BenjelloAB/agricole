<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    public function index()
    {
        $parcelle = Parcelle::get();
        return view('parcelle.parcelle',compact('parcelle'));
    }
    public function store(Request $request)
    {
        try {

        $request->validate([
            'nom' => 'required',
            'emplacement' => 'required',
            'taille' => 'required',
            'type_de_sol' => 'required',
            'niveau_dirrigation' => 'required',
            'état_de_santé' => 'required',
             ]);
        Parcelle::create($request->all());

        return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès!');
     }catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }
    public function update(Request $request)
    {
        try{

        $request->validate([
            'nom' => 'required',
            'emplacement' => 'required',
            'taille' => 'required',
            'type_de_sol' => 'required',
            'niveau_dirrigation' => 'required',
            'état_de_santé' => 'required',
        ]);
        $parcelle = Parcelle::findOrFail($request->id);
        $parcelle->update([
            'nom'=>$request->nom,
          'emplacement'=>$request->emplacement,
           'taille'=>$request->taille,
            'type_de_sol'=>$request->type_de_sol,
            'niveau_dirrigation'=>$request->niveau_dirrigation,
            'état_de_santé'=>$request->état_de_santé,
        ]);

        return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès!');
    }catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    public function destroy(Request $request){
        $parcelle = Parcelle::findOrFail($request->id)->delete();
        return redirect()->back()->with('warning', 'Les données ont été supprime avec succe!');
        // warning + info + success + error + danger
    }



}