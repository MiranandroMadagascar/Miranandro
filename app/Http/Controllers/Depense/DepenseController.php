<?php

namespace App\Http\Controllers\Depense;

use App\Http\Controllers\Controller;
use App\Models\Activites\Activite;
use App\Models\Depenses\Depense;
use App\Models\Depenses\TypeDepense;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    public function create($id_activite)
    {
        $activite = Activite::findOrFail($id_activite);

        $typesDepenses = TypeDepense::listeTypeDepense();

        return view('staffmada.depense.depense', compact('activite','typesDepenses'));
    }


    public function store(Request $request, $id_activite)
    {
        $request->validate([
            'designation.*' => 'required|string',
            'type_depense.*' => 'required|integer|exists:type_depense,id_type_depense',
            'quantite.*' => 'required|integer|min:1',
            'prix_unitaire.*' => 'required|numeric|min:0',
        ]);

        $depenses = [];

        for ($i = 0; $i < count($request->designation); $i++) {
            $quantite = $request->quantite[$i];
            $prixUnitaire = $request->prix_unitaire[$i];
            $montantTotal = $quantite * $prixUnitaire;

            $depenses[] = [
                'id_activite' => $id_activite,
                'designation' => $request->designation[$i],
                'date_depense' => now(),
                'id_type_depense' => $request->type_depense[$i],
                'quantite' => $quantite,
                'prix_unitaire' => $prixUnitaire,
                'montant_total' => $montantTotal,
            ];
        }

        Depense::insererDepenses($depenses);

        return redirect()->route('activites.proches')
                        ->with('success', 'Dépenses ajoutées avec succès !');
    }


}
