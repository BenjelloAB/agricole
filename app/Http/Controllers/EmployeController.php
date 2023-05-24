<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function index()
    {

        $employes = Employe::where('user_id',Auth::user()->id)->get();
        return view('employe.employe',compact('employes'));
    }


    public function store(){
        return view('employe.empty');
    }

    public function create(Request $request){

        try {
           
            Employe::create([
                'nom'=>$request->nom,
              'prenom'=>$request->prenom,
               'date'=>$request->date,
                'lieu'=>$request->lieu,
                'situation'=>$request->situation,
                'adress'=>$request->adress,
                'cin'=>$request->cin,
              'tele'=>$request->tele,
               'mail'=>$request->mail,
                'scolaire'=>$request->scolaire,
                'experiance'=>$request->experiance,
                'employe'=>$request->employe,
                'user_id'=>Auth::user()->id,
            ]);

            return redirect()->route('employe.index')->with('success', 'Les données ont été enregistrées avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }

   }
   public function update(Request $request)
   {
       try{

       $parcelle = Employe::findOrFail($request->id);
       $parcelle->update([
           'nom'=>$request->nom,
         'prenom'=>$request->prenom,
          'date'=>$request->date,
           'lieu'=>$request->lieu,
           'situation'=>$request->situation,
           'adress'=>$request->adress,
           'cin'=>$request->cin,
         'tele'=>$request->tele,
          'mail'=>$request->mail,
           'scolaire'=>$request->scolaire,
           'experiance'=>$request->experiance,
           'employe'=>$request->employe,
       ]);

       return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès!');
   }catch (\Exception $e){
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
   }
    public function destroy(Request $request)
    {
         try{
              $parcelle = Employe::findOrFail($request->id);
              $parcelle->delete();
              return redirect()->back()->with('warning', 'Les données ont été supprimer avec succès!');
         }catch (\Exception $e){
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }
}