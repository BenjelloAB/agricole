<?php

namespace App\Http\Controllers;

use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Finance_Culture;
use App\Models\Finance_employe;
use App\Models\Finance_Recolte;
use App\Models\Recolte;
use App\Models\Ressourceculture;
use Illuminate\Http\Request;

class FinanceCultureController extends Controller
{
    public function index()
    {
        $finance_culture = Finance_Culture::all();
        $cultur=Cultur::all();
        $ressourceculture=Ressourceculture::all();
        return view('finance.finance_culture', compact('finance_culture', 'cultur', 'ressourceculture'));
    }

    public function store(Request $request)
    {
        try {
            $finance_culture = new Finance_Culture();
            $finance_culture->cultur_id = $request->cultur_id;
            $finance_culture->ressourceculture_id = $request->ressourceculture_id;
            $finance_culture->coût_semences = $request->coût_semences;
            $finance_culture->coût_engrais = $request->coût_engrais;
            $finance_culture->coût_pesticides = $request->coût_pesticides;
            $finance_culture->coût_machines_culture = $request->coût_machines_culture;
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
            $finance_culture->cultur_id = $request->cultur_id;
            $finance_culture->ressourceculture_id = $request->ressourceculture_id;
            $finance_culture->coût_semences = $request->coût_semences;
            $finance_culture->coût_engrais = $request->coût_engrais;
            $finance_culture->coût_pesticides = $request->coût_pesticides;
            $finance_culture->coût_machines_culture = $request->coût_machines_culture;
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
        $finance_recolte=Finance_Recolte::all();
        $recolte = Recolte::all();
        return view('finance.recolte', compact('recolte', 'finance_recolte'));
    }

    public function add(Request $request)
    {

        try {
            $finance_recolte = new Finance_Recolte();
            $finance_recolte->recolte_id = $request->recolte_id;
            $finance_recolte->coût_récolte = $request->coût_récolte;
            $finance_recolte->prix_de_vente = $request->prix_de_vente;
            $finance_recolte->revenu_net = $request->revenu_net;
            $finance_recolte->revenu_brut = $request->revenu_brut;
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
            $finance_recolte->recolte_id = $request->recolte_id;
            $finance_recolte->coût_récolte = $request->coût_récolte;
            $finance_recolte->prix_de_vente = $request->prix_de_vente;
            $finance_recolte->revenu_net = $request->revenu_net;
            $finance_recolte->revenu_brut = $request->revenu_brut;
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
        $finance_employee=Finance_employe::all();
        $employe=Employe::all();
        return view('finance.employe', compact('employe', 'finance_employee'));
    }

    public function add2(Request $request)
    {

        try {
            $finance_employee = new Finance_employe();
            $finance_employee->employe_id = $request->employe_id;
            $finance_employee->salair = $request->salair;
            $finance_employee->date_paiement = $request->date_paiement;
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
            $finance_employee->date_paiement = $request->date_paiement;
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
}