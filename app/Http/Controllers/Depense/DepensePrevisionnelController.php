<?php

namespace App\Http\Controllers\Depense;

use App\Http\Controllers\Controller;
use App\Models\Depenses\DepensePrevisionnel;
use App\Models\Depenses\TypeDepense;
use Illuminate\Http\Request;

class DepensePrevisionnelController extends Controller
{

    public function afficherFormulaireDepenses($id_fiche_technique)
    {
        $typesDepenses = TypeDepense::listeTypeDepense();

        return view('staffmada.depense.depensePrevisionnelle', [
            'id_fiche_technique' => $id_fiche_technique,
            'typesDepenses' => $typesDepenses,
        ]);
    }

    public function insererDepensesPrevisionnelles(Request $request, $id_fiche_technique)
    {
        $request->validate([
            'designation.*' => 'required|string',
            'type_depense.*' => 'required|integer',
            'quantite.*' => 'required|integer|min:1',
            'prix_unitaire.*' => 'required|numeric|min:0',
        ]);

        $depenses = [];
        foreach ($request->designation as $index => $designation) {
            $quantite = $request->quantite[$index];
            $prix_unitaire = $request->prix_unitaire[$index];

            $depenses[] = [
                'id_fiche_technique' => $id_fiche_technique,
                'designation' => $designation,
                'quantite' => $quantite,
                'prix_unitaire' => $prix_unitaire,
                'montant_total' => $quantite * $prix_unitaire,
            ];
        }

        DepensePrevisionnel::insererDepensesPrevisionnelles($depenses);

        return redirect()->route('depensesPrevisionnels.formulaire', ['id_fiche_technique' => $id_fiche_technique])
                         ->with('success', 'Dépenses prévisionnelles ajoutées avec succès.');
    }
}
