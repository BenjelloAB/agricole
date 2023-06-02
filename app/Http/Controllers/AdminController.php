<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Finance_Culture;
use App\Models\Finance_employe;
use App\Models\Finance_Recolte;
use App\Models\Parcelle;
use App\Models\Recolte;
use App\Models\Ressourceculture;
use App\Models\Ressourcerecolte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 1){
            $user=User::all();

            return view('respo.respo',compact('user'));
        }
        else{
            return redirect()->route('home');
        }
    }


    public function create(Request $request)
    {
        if(auth()->user()->role == 1){
            $user=User::all();
    $request->validate([
       'name' => ['required', 'string', 'max:255'],
       'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
       'password' => ['required', 'string', 'min:8', 'confirmed'],
        'capital'=>['required','Numeric'],
        ]);
    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'capital'=>$request->capital,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'User created failed.');
    }
}else{
    return redirect()->route('home');
}

    }

    public function edit(Request $request)
    {
        if(auth()->user()->role == 1){
            $user=User::all();
        try {
            $user=User::find($request->id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'capital'=>$request->capital,
            ]);
            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User updated failed.');
        }
    }else{
        return redirect()->route('home');
    }

    }


    public function destroy(Request $request)
    {
         if(auth()->user()->role == 1){
        $user=User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }else{
        return redirect()->route('home');
    }
    }

    public function index2(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $parcelle = Parcelle::where('user_id', $request->nom_parcelle)->get();
        return view('admin.parcelle',compact('user','parcelle'));
    }else{
        return redirect()->route('home');
    }
    }

    // public function filtre1(Request $request){
    //     $parcelle = Parcelle::where('user_id', $request->id)->get();
    //     return view('admin.parcelle',compact('parcelle'));
    // }
    public function index3(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $employes =  Employe::where('user_id', $request->nom_parcelle)->get();
        return view('admin.employe',compact('user','employes'));
    }else{
        return redirect()->route('home');
    }
    }

    public function index4(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $culture =  Cultur::where('user_id', $request->nom_parcelle)->get();
        return view('admin.culture',compact('user','culture'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index5(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $ressorce =  Ressourceculture::where('user_id', $request->nom_parcelle)->get();
        return view('admin.resource',compact('user','ressorce'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index6(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $recolte =  Recolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.recolte',compact('user','recolte'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index7(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $ressource =  Ressourcerecolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.ressource',compact('user','ressource'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index8(Request $request){
         if(auth()->user()->role == 1){
        $user=User::all();
        $control =  Control::where('user_id', $request->nom_parcelle)->get();
        return view('admin.controle',compact('user','control'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index9(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $finance_culture =  Finance_Culture::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeC',compact('user','finance_culture'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index10(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $finance_recolte =  Finance_Recolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeR',compact('user','finance_recolte'));
    }else{
        return redirect()->route('home');
    }
    }
    public function index11(Request $request){
        if(auth()->user()->role == 1){
        $user=User::all();
        $finance_employee =  Finance_employe::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeE',compact('user','finance_employee'));
    }else{
        return redirect()->route('home');
    }
    }

}