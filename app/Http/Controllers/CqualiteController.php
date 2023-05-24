<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Recolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CqualiteController extends Controller
{
   public function index()
   {
        $recolte=Recolte::where('user_id',Auth::user()->id)->get();
        $control=Control::where('user_id',Auth::user()->id)->get();
       return view('control_qualite.qualite',compact('recolte','control'));
   }

   public function add(Request $request)
    {
        try {
            $so = Control::create([
                'recolte_id' => $request->recolte_id,
                'normes_de_qualité' => $request->normes_de_qualité,
                'procédures_de_contrôle_qualité' => $request->procédures_de_contrôle_qualité,
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
            $so->update([
                'recolte_id' => $request->recolte_id,
                'normes_de_qualité' => $request->normes_de_qualité,
                'procédures_de_contrôle_qualité' => $request->procédures_de_contrôle_qualité,
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