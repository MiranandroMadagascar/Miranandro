<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Models\Membres\MembresAdherents;
use App\Models\Volets\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembreAdherentController extends Controller
{
    public function afficherMembresAdherents(Request $request)
    {
        $nom = $request->input('nom');
        $prenoms = $request->input('prenoms');
        $sectionId = $request->input('section'); 
        $sort = $request->input('sort', 'nom_membre'); 
        $order = $request->input('order', 'asc'); 
    
        $membres = MembresAdherents::rechercherMembres($nom, $prenoms, $sectionId, $sort, $order);
        
        $sections = Section::listeSection();
    
        return view('staffmada.membre.membreAdherent', compact('membres', 'sort', 'order', 'nom', 'prenoms', 'sections'));
    }
    

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'contact' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'date_adhesion' => 'required|date',
        ]);

        MembresAdherents::updateMembre($id, $data);

        return redirect()->route('membres.adherents')->with('success', 'Membre mis à jour avec succès.');
    }

    public function create()
    {
        $sections = Section::listeSection();
        
        return view('staffmada.membre.nouveauMembre', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'dtn' => 'required|date',
            'genre' => 'required|string',
            'contact' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email',
            'section' => 'required|integer|exists:section,id_section', 
        ]);

        $numeroMembre = DB::select("SELECT 'AMA' || LPAD(NEXTVAL('numAma')::TEXT, 5, '0') AS numero")[0]->numero;

        MembresAdherents::create([
            'numero' => $numeroMembre,
            'nom' => $request->nom,
            'prenoms' => $request->prenoms,
            'date_naissance' => $request->dtn,
            'genre' => $request->genre,
            'contact' => $request->contact,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'date_adhesion' => now(),
            'section_id' => $request->section, 
        ]);

        return redirect()->route('membres.adherents')->with('success', 'Membre ajouté avec succès!');
    }



    


}
