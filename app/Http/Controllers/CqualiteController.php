<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Parcelle;
use App\Models\Recolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CqualiteController extends Controller
{
   public function index()
   {

        $recolte=Parcelle::where('user_id',Auth::user()->id)->get();
        $control=Control::where('user_id',Auth::user()->id)->get();
       return view('control_qualite.qualite',compact('recolte','control'));
   }

   public function add(Request $request)
    {
        try {
           $request->validate([
                'recolte_id' => 'required',
                'etat_sante' => 'required',
                'texture_du_sol' => 'required',
                'ph_du_sol' => 'required|nullable',
                'etat_de_produit_recolte' => 'required',

           ]);

            $so = Control::create([
                'parcelle_id' => $request->recolte_id,
                'etat_sante' => $request->etat_sante,
                'texture_du_sol' => $request->texture_du_sol,
                'ph_du_sol' => $request->ph_du_sol,
                'etat_de_produit_recolte' => $request->etat_de_produit_recolte,
                 'user_id' =>Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    public function update(Request $request){
        try {
            $so = Control::find($request->id);
            $request->validate([
                'recolte_id' => 'required',
                'etat_sante' => 'required',
                'texture_du_sol' => 'required',
                'ph_du_sol' => 'required|nullable',
                'etat_de_produit_recolte' => 'required',

           ]);

            $so->update([
                'parcelle_id' => $request->recolte_id,
                'etat_sante' => $request->etat_sante,
                'texture_du_sol' => $request->texture_du_sol,
                'ph_du_sol' => $request->ph_du_sol,
                'etat_de_produit_recolte' => $request->etat_de_produit_recolte,
                 'user_id' =>Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request){
        try {
            $so = Control::find($request->id);
            $so->delete();

            return redirect()->back()->with('success', 'Les données ont été supprimées avec succès!');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
