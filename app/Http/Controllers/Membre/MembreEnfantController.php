<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Models\Membres\MembresEnfants;
use App\Models\Membres\MembresParents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembreEnfantController extends Controller
{
    public function afficherMembresEnfants(Request $request)
    {
        $nom = $request->input('nom');
        $prenom = $request->input('prenoms');
        $sort = $request->input('sort', 'nom');
        $order = $request->input('order', 'asc');

        $enfants = MembresEnfants::listeEnfantsEtParents($nom, $prenom, $sort, $order);

        return view('staffmada.membre.membreEnfant', compact('enfants'));
    }

    public function membreBeneficiaire()
    {
        return view('staffmada.membre.membreBeneficiaire');
    }

    public function insertEnfant(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'genre_enfant' => 'required|string',
            'contact' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'fratrie' => 'required|int',
            'ecole' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'annee_scolaire' => 'required|string|max:255',
            'nom_pere' => 'nullable|string|max:255',
            'prenoms_pere' => 'nullable|string|max:255',
            'date_naissance_pere' => 'nullable|date',
            'genre_pere' => 'nullable|string',
            'contact_pere' => 'nullable|string|max:15',
            'adresse_pere' => 'nullable|string|max:255',
            'nom_mere' => 'nullable|string|max:255',
            'prenoms_mere' => 'nullable|string|max:255',
            'date_naissance_mere' => 'nullable|date',
            'genre_mere' => 'nullable|string',
            'contact_mere' => 'nullable|string|max:15',
            'adresse_mere' => 'nullable|string|max:255',
            'nom_tuteur' => 'nullable|string|max:255',
            'prenoms_tuteur' => 'nullable|string|max:255',
            'date_naissance_tuteur' => 'nullable|date',
            'genre_tuteur' => 'nullable|string',
            'contact_tuteur' => 'nullable|string|max:15',
            'adresse_tuteur' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $id_pere = MembresParents::insertParentTuteur([
                'nom' => $request->nom_pere,
                'prenoms' => $request->prenoms_pere,
                'date_naissance' => $request->date_naissance_pere,
                'genre' => $request->genre_pere,
                'profession' => $request->profession_pere,
                'contact' => $request->contact_pere,
                'adresse' => $request->adresse_pere,
                'date_adhesion' => now(),
            ])->id_parent_tuteur;

            $id_mere = MembresParents::insertParentTuteur([
                'nom' => $request->nom_mere,
                'prenoms' => $request->prenoms_mere,
                'date_naissance' => $request->date_naissance_mere,
                'genre' => $request->genre_mere,
                'profession' => $request->profession_mere,
                'contact' => $request->contact_mere,
                'adresse' => $request->adresse_mere,
                'date_adhesion' => now(),
            ])->id_parent_tuteur;

            $id_tuteur = null;
            if ($request->nom_tuteur && $request->prenoms_tuteur) {
                $id_tuteur = MembresParents::insertParentTuteur([
                    'nom' => $request->nom_tuteur,
                    'prenoms' => $request->prenoms_tuteur,
                    'date_naissance' => $request->date_naissance_tuteur,
                    'genre' => $request->genre_tuteur,
                    'profession' => $request->profession_tuteur,
                    'contact' => $request->contact_tuteur,
                    'adresse' => $request->adresse_tuteur,
                    'date_adhesion' => now(),
                ])->id_parent_tuteur;
            }

            MembresEnfants::insertEnfant([
                'nom' => $request->nom,
                'prenoms' => $request->prenoms,
                'date_naissance' => $request->date_naissance,
                'genre' => $request->genre_enfant,
                'contact' => $request->contact,
                'ecole' => $request->ecole,
                'classe' => $request->classe,
                'annee_scolaire' => $request->annee_scolaire,
                'adresse' => $request->adresse,
                'nombre_fratrie' => $request->fratrie,
                'id_pere' => $id_pere,
                'id_mere' => $id_mere,
                'id_tuteur' => $id_tuteur,
                'date_adhesion' => now(),
            ]);
        });

        return redirect()->route('membres.parents')->with('success', 'Enfant et parents ajoutés avec succès.');
    }


    public function examensReussis(Request $request)
    {
        $anneeScolaire = $request->input('annee', date('Y') . '-' . (date('Y') + 1));

        $enfants = MembresEnfants::whereIn('classe', ['7eme', '3eme', 'Terminale'])
                    ->where('annee_scolaire', $anneeScolaire)
                    ->paginate(5);

        return view('staffmada.membre.suiviExamen', compact('enfants'));
    }

    public function updateEnfant(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'contact' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
        ]);

        $enfant = MembresEnfants::updateEnfant($id, $request->all());

        return redirect()->route('membres.enfants')->with('success', 'Informations de l\'enfant mises à jour avec succès.');
    }





}
