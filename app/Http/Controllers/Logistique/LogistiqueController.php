<?php

namespace App\Http\Controllers\Logistique;

use App\Http\Controllers\Controller;
use App\Models\Logistique\Logistique;
use App\Models\Logistique\CategorieLogistique;
use App\Models\Logistique\MouvementLogistique;
use App\Models\Logistique\TypeMouvement;
use Illuminate\Http\Request;

class LogistiqueController extends Controller
{
    public function afficherFormulaire()
    {
        $categories = CategorieLogistique::listeCategorieLogistique();
        
        return view('staffmada.logistique.logistique', compact('categories'));
    }

    public function insererLogistique(Request $request)
    {
        $validated = $request->validate([
            'nom_article' => 'required|string|max:100',
            'categorie' => 'required|integer|exists:categorie_logistique,id_categorie_logistique',
            'description' => 'nullable|string',
        ]);

        $data = [
            'nom_article' => $validated['nom_article'],
            'id_categorie_logistique' => $validated['categorie'],
            'description' => $validated['description'],
        ];

        Logistique::insererLogistique($data);

        return redirect()->back()->with('success', 'Article logistique ajouté avec succès.');
    }

    public function afficherMouvement()
    {
        $logistiques = Logistique::all();
        $typesMouvement = TypeMouvement::listeTypeMouvement();
        
        return view('staffmada.logistique.mouvement', compact('logistiques', 'typesMouvement'));
    }

    public function insererMouvement(Request $request)
    {
        $validatedData = $request->validate([
            'id_logistique' => 'required|integer',
            'id_type_mouvement' => 'required|integer',
            'quantite' => 'required|integer|min:1',
            'date_mouvement' => 'required|date',
            'description' => 'nullable|string',
        ]);

        try {
            MouvementLogistique::insererMouvementLogistique($validatedData);

            return redirect()->back()->with('success', 'Mouvement enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
