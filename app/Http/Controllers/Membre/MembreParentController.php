<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Models\Membres\AnciensMembresParents;
use App\Models\Membres\MembresEnfants;
use App\Models\Membres\MembresParents;
use App\Models\Relations\RelationsParentales;
use Illuminate\Http\Request;

class MembreParentController extends Controller
{
    public function afficherMembresParents(Request $request)
    {
        $recherchePere = $request->input('pere'); 
        $rechercheMere = $request->input('mere'); 
        $rechercheTuteur = $request->input('tuteur'); 

        $sort = $request->input('sort', 'nom_pere');
        $order = $request->input('order', 'asc');

        $parents = MembresParents::listeCouples($recherchePere, $rechercheMere,$rechercheTuteur, $sort, $order);

        return view('staffmada.membre.membreParent', compact('parents'));
    }

    public function insertEnfant(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'genre' => 'required|string',
            'contact' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'ecole' => 'required|string|max:255',
            'fratrie' => 'required|int',
            'classe' => 'required|string|max:255',
            'annee_scolaire' => 'required|string|max:255',
            'id_pere' => 'required|exists:membres_parents_tuteurs,id_parent_tuteur', 
            'id_mere' => 'required|exists:membres_parents_tuteurs,id_parent_tuteur',
            'id_tuteur' => 'required|exists:membres_parents_tuteurs,id_parent_tuteur',
        ]);
    
        $data = [
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'date_naissance' => $request->date_naissance,
            'genre' => $request->genre,
            'contact' => $request->contact,
            'adresse' => $request->adresse,
            'ecole' => $request->ecole,
            'classe' => $request->classe,
            'nombre_fratrie' => $request->fratrie,
            'annee_scolaire' => $request->annee_scolaire,
            'date_adhesion' => now(),
            'id_pere' => $request->id_pere,
            'id_mere' => $request->id_mere,
            'id_tuteur' => $request->id_tuteur,
        ];
    
        MembresEnfants::insertEnfant($data);
    
        return redirect()->route('membres.parents')->with('success', 'Enfant ajouté avec succès.');
    }

    


}
