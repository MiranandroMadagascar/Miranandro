<?php

namespace App\Http\Controllers\Activite;

use App\Http\Controllers\Controller;
use App\Models\Activites\Activite;
use App\Models\Activites\FicheTechnique;
use Illuminate\Http\Request;

class FicheTechniqueController extends Controller
{
    public function afficherFormulaireFiche($id_activite)
    {
        $activite = Activite::activiteParId($id_activite);

        return view('staffmada.activite.ficheTechnique', ['id_activite' => $id_activite]);
    }

    public function insererFicheTechnique(Request $request, $id_activite)
    {
        $request->validate([
            'objectif' => 'required|string',
            'methodologie' => 'required|string',
            'participants' => 'required|string',
            'justifications' => 'nullable|string',
        ]);
    
        $data = [
            'id_activite' => $id_activite, 
            'objectif' => $request->objectif,
            'methodologie' => $request->methodologie,
            'participants' => $request->participants,
            'justifications' => $request->justifications,
        ];
    
        $ficheTechnique = FicheTechnique::insererFicheTechnique($data);
    
        if ($request->has('ajouter_depenses')) {
            return redirect()->route('depensesPrevisionnels.formulaire', ['id_fiche_technique' => $ficheTechnique->id_fiche_technique])
                             ->with('success', 'Fiche technique ajoutée, veuillez ajouter des dépenses prévisionnelles.');
        }
    
        return redirect()->route('fiche_technique.formulaire', ['id_activite' => $id_activite])->with('success', 'Fiche technique ajoutée avec succès.');
    }
    


}
