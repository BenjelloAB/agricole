<?php

namespace App\Http\Controllers;

use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Finance_Culture;
use App\Models\Finance_employe;
use App\Models\Finance_Recolte;
use App\Models\Parcelle;
use App\Models\Recolte;
use App\Models\Ressourceculture;
use App\Models\Ressourcerecolte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceCultureController extends Controller
{
    public function index()
    {

        $finance_culture = Finance_Culture::where('user_id',Auth::user()->id)->get();
        $cultur=Parcelle::where('user_id',Auth::user()->id)->get();
        $ressourceculture=Ressourceculture::where('user_id',Auth::user()->id)->get();
        return view('finance.finance_culture', compact('finance_culture', 'cultur', 'ressourceculture'));
    }

    public function store(Request $request)
    {
        try {
            $finance_culture = new Finance_Culture();
            $finance_culture->parcelle_id = $request->cultur_id;
            // $finance_culture->ressourceculture_id = $request->ressourceculture_id;
            $finance_culture->coût_semences = $request->coût_semences;
            $finance_culture->coût_engrais = $request->coût_engrais;
            $finance_culture->coût_pesticides = $request->coût_pesticides;
            $finance_culture->coût_machines_culture = $request->coût_machines_culture;
            $finance_culture->cout_consommation_eau = $request->cout_consommation_eau;
            $finance_culture->user_id = Auth::user()->id;
            $finance_culture->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updat(Request $request)
    {
        try {
            $finance_culture = Finance_Culture::find($request->id);
            $finance_culture->parcelle_id = $request->cultur_id;
            // $finance_culture->ressourceculture_id = $request->ressourceculture_id;
            $finance_culture->coût_semences = $request->coût_semences;
            $finance_culture->coût_engrais = $request->coût_engrais;
            $finance_culture->coût_pesticides = $request->coût_pesticides;
            $finance_culture->coût_machines_culture = $request->coût_machines_culture;
            $finance_culture->cout_consommation_eau = $request->cout_consommation_eau;
            $finance_culture->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $finance_culture = Finance_Culture::find($request->id);
            $finance_culture->delete();
            return redirect()->back()->with('warning', 'Les données ont été supprimées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show()
    {
        $finance_recolte=Finance_Recolte::where('user_id',Auth::user()->id)->get();
        $recolte = Parcelle::where('user_id',Auth::user()->id)->get();
        return view('finance.recolte', compact('recolte', 'finance_recolte'));
    }

    public function add(Request $request)
    {

        try {
            $finance_recolte = new Finance_Recolte();
            $finance_recolte->parcelle_id = $request->recolte_id;
            $finance_recolte->coût_récolte = $request->coût_récolte;
            $finance_recolte->user_id = Auth::user()->id;
            $finance_recolte->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {

        try {
            $finance_recolte = Finance_Recolte::find($request->id);
            $finance_recolte->parcelle_id = $request->recolte_id;
            $finance_recolte->coût_récolte = $request->coût_récolte;
            $finance_recolte->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete(Request $request)
    {

        try {
            $finance_recolte = Finance_Recolte::find($request->id);
            $finance_recolte->delete();
            return redirect()->back()->with('warning', 'Les données ont été supprimées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show2()
    {
        $finance_employee=Finance_employe::where('user_id',Auth::user()->id)->get();
        $employe=Employe::where('user_id',Auth::user()->id)->get();
        return view('finance.employe', compact('employe', 'finance_employee'));
    }

    public function add2(Request $request)
    {

        try {
            $finance_employee = new Finance_employe();
            $finance_employee->employe_id = $request->employe_id;
            $finance_employee->salair = $request->salair;
            $finance_employee->role = $request->role;
            $finance_employee->user_id = Auth::user()->id;
            $finance_employee->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit2(Request $request)
    {

        try {
            $finance_employee = Finance_employe::find($request->id);
            $finance_employee->employe_id = $request->employe_id;
            $finance_employee->salair = $request->salair;
            $finance_employee->role = $request->role;
            $finance_employee->save();
            return redirect()->back()->with('success', 'Les données ont été modifiées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete2(Request $request)
    {

        try {
            $finance_employee = Finance_employe::find($request->id);
            $finance_employee->delete();
            return redirect()->back()->with('warning', 'Les données ont été supprimées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /*ajax*/

    public function getplant($id){
        $plant = Cultur::where('parcelle_id',$id)->pluck('nom','id');
        return $plant;
    }
    public function gettaille($id){
        $plant = Parcelle::where('id',$id)->pluck('taille','id');
        return $plant;
    }
    public function getmachine($id){
        $plant = Ressourceculture::where('parcelle_id',$id)->pluck('nom_machine','id');
        return $plant;
    }
    public function getmachine1($id){
        $plant = Ressourcerecolte::where('parcelle_id',$id)->pluck('machine_recolte','id');
        return $plant;
    }
    public function getsemences($id){
        $plant = Ressourceculture::where('parcelle_id',$id)->pluck('semences','id');
        return $plant;
    }
    public function getengrais($id){
        $plant = Ressourceculture::where('parcelle_id',$id)->pluck('engrais','id');
        return $plant;
    }
    public function getpesticides($id){
        $plant = Ressourceculture::where('parcelle_id',$id)->pluck('pesticides','id');
        return $plant;
    }
    public function getbesion($id){
        $plant = Ressourceculture::where('parcelle_id',$id)->pluck('besoin_en_eau','id');
        return $plant;
    }
}