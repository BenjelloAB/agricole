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

    }

    public function edit(Request $request)
    {
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

    }


    public function destroy(Request $request)
    {
        $user=User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function index2(Request $request){
        $user=User::all();
        $parcelle = Parcelle::where('user_id', $request->nom_parcelle)->get();
        return view('admin.parcelle',compact('user','parcelle'));
    }

    // public function filtre1(Request $request){
    //     $parcelle = Parcelle::where('user_id', $request->id)->get();
    //     return view('admin.parcelle',compact('parcelle'));
    // }
    public function index3(Request $request){
        $user=User::all();
        $employes =  Employe::where('user_id', $request->nom_parcelle)->get();
        return view('admin.employe',compact('user','employes'));
    }

    public function index4(Request $request){
        $user=User::all();
        $culture =  Cultur::where('user_id', $request->nom_parcelle)->get();
        return view('admin.culture',compact('user','culture'));
    }
    public function index5(Request $request){
        $user=User::all();
        $ressorce =  Ressourceculture::where('user_id', $request->nom_parcelle)->get();
        return view('admin.resource',compact('user','ressorce'));
    }
    public function index6(Request $request){
        $user=User::all();
        $recolte =  Recolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.recolte',compact('user','recolte'));
    }
    public function index7(Request $request){
        $user=User::all();
        $ressource =  Ressourcerecolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.ressource',compact('user','ressource'));
    }
    public function index8(Request $request){
        $user=User::all();
        $control =  Control::where('user_id', $request->nom_parcelle)->get();
        return view('admin.controle',compact('user','control'));
    }
    public function index9(Request $request){
        $user=User::all();
        $finance_culture =  Finance_Culture::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeC',compact('user','finance_culture'));
    }
    public function index10(Request $request){
        $user=User::all();
        $finance_recolte =  Finance_Recolte::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeR',compact('user','finance_recolte'));
    }
    public function index11(Request $request){
        $user=User::all();
        $finance_employee =  Finance_employe::where('user_id', $request->nom_parcelle)->get();
        return view('admin.financeE',compact('user','finance_employee'));
    }
}