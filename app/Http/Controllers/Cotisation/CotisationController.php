<?php

namespace App\Http\Controllers\Cotisation;

use App\Http\Controllers\Controller;
use App\Models\Cotisations\TypeCotisation;
use App\Models\Cotisations\Cotisation;
use App\Models\Cotisations\CotisationActif;
use App\Models\Cotisations\CotisationParental;
use App\Models\Membres\MembresAdherents;
use App\Models\Membres\MembresParents;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    public function index()
    {
        $cotisations = Cotisation::getCotisationsWithType();

        $typesCotisations = TypeCotisation::all(); 

        return view('staffmada.cotisation.cotisation', compact('cotisations', 'typesCotisations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_type_cotisation' => 'required|integer',
            'montant' => 'required|numeric|min:0',
        ]);

        Cotisation::updateCotisation($id, $request->all());

        return redirect()->route('cotisation.index')->with('success', 'Cotisation modifiée avec succès.');
    }

    /////////

    public function indexActif()
    {
        $membresAdherents = MembresAdherents::all(); 

        return view('staffmada.cotisation.cotisationActif', compact('membresAdherents'));
    }


    public function insertActif(Request $request)
    {
        $data = $request->validate([
            'id_membre_adherent' => 'required|integer',
            'date_payement' => 'required|date',
        ]);

        $id_cotisation = 1;

        $cotisation = Cotisation::findOrFail($id_cotisation);
        
        $data['montant'] = $cotisation->montant;

        CotisationActif::create([
            'id_membre_adherent' => $data['id_membre_adherent'],
            'date_payement' => $data['date_payement'],
            'montant' => $data['montant'], 
        ]);

        return redirect()->back()->with('success', 'Paiement enregistré avec succès.');
    }


    public function rechercherMembre(Request $request)
    {
        $query = $request->get('query');
        $membres = MembresAdherents::where('nom', 'ILIKE', "%{$query}%")
            ->orWhere('prenoms', 'ILIKE', "%{$query}%")
            ->get();

        if ($membres->isEmpty()) {
            return response()->json(['message' => 'Aucun membre correspondant trouvé.']);
        }

        return response()->json($membres);
    }

    /////////

    public function indexParental()
    {
        $parents = MembresParents::all(); 

        return view('staffmada.cotisation.cotisationParental', compact('parents'));
    }

    public function insertParental(Request $request)
    {
        $data = $request->validate([
            'id_parent_tuteur' => 'required|integer',
            'date_payement' => 'required|date',
        ]);

        $id_cotisation = 2;

        $cotisation = CotisationParental::findOrFail($id_cotisation);
        
        $data['montant'] = $cotisation->montant;

        CotisationParental::insererCotisationParental([
            'id_parent_tuteur' => $data['id_parent_tuteur'],
            'date_payement' => $data['date_payement'],
            'montant' => $data['montant'], 
        ]);

        return redirect()->back()->with('success', 'Paiement enregistré avec succès.');
    }

    public function rechercherParent(Request $request)
    {
        $query = $request->get('query');
        $parents = MembresParents::where('nom', 'ILIKE', "%{$query}%")
            ->orWhere('prenoms', 'ILIKE', "%{$query}%")
            ->get();

        if ($parents->isEmpty()) {
            return response()->json(['message' => 'Aucun parent/tuteur correspondant trouvé.']);
        }

        return response()->json($parents);
    }

    /////////

    public function cotisationsEnRetard()
    {
        $cotisationsParentales = Cotisation::getCotisationsParentalesEnRetard();
        $cotisationsActives = Cotisation::getCotisationsActivesEnRetard();
        
        return view('staffmada.cotisation.cotisationRetard', [
            'cotisationsParentales' => $cotisationsParentales,
            'cotisationsActives' => $cotisationsActives,
        ]);
    }

    public function payerCotisation(Request $request)
    {
        $data = $request->validate([
            'idCotisation' => 'required|integer',
            'typeCotisation' => 'required|string|in:parentale,active',
            'date_payement' => 'required|date',
        ]);

        if ($data['typeCotisation'] === 'parentale') {
            $cotisation = CotisationParental::findOrFail($data['idCotisation']);
            
            CotisationParental::insererCotisationParental([
                'id_parent_tuteur' => $cotisation->id_parent_tuteur,
                'date_payement' => $data['date_payement'],
                'montant' => $cotisation->montant,  
            ]);
        } elseif ($data['typeCotisation'] === 'active') {
            $cotisation = CotisationActif::findOrFail($data['idCotisation']);
            
            CotisationActif::insererCotisationActif([
                'id_membre_adherent' => $cotisation->id_membre_adherent,
                'date_payement' => $data['date_payement'],
                'montant' => $cotisation->montant,  
            ]);
        }

        return redirect()->back()->with('success', 'Paiement enregistré avec succès.');
    }




}
