<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Finance_employe;
use App\Models\List_Legume;
use App\Models\Parcelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 1){
            return view('home');
        }else{
            $count_emp = Employe::where('user_id',auth()->user()->id)->count('id');
            $count_parcelle = Parcelle::where('user_id',auth()->user()->id)->count('id');

            $cout_semences = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_semences');
            $cout_engrais = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_engrais');
            $cout_pesticides = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_pesticides');
            $cout_machines_culture = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_machines_culture');
            $cout_total = $cout_semences + $cout_engrais + $cout_pesticides + $cout_machines_culture;

            $cout_recolte= DB::table('finance__recoltes')->where('user_id',auth()->user()->id)->sum('coût_récolte');
            $employe = DB::table('finance_employes')->where('user_id',auth()->user()->id)->sum('salair');
            $cout_CRE = $cout_total + $cout_recolte + $employe;
            $hhh = Finance_employe::where('user_id',auth()->user()->id)->simplePaginate(3);

            $legumeData = Cultur::where('user_id',auth()->user()->id)->select('nom', DB::raw('COUNT(*) as count'))
            ->groupBy('nom')
            ->get();
            $employee=Employe::where('user_id',auth()->user()->id)->get();
            $categorie= Categorie::where('user_id',auth()->user()->id)->get();
            return view('dashboard',compact('count_emp','count_parcelle','cout_CRE','hhh','legumeData','employee','categorie'));
        }

    }
}