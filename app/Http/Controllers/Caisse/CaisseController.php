<?php

namespace App\Http\Controllers\Caisse;

use App\Http\Controllers\Controller;
use App\Models\Caisse\Caisse;
use App\Models\Caisse\CategorieCaisse;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    public function index()
    {
        $categoriesCaisse = CategorieCaisse::listeCategorieCaisse(); 
        return view('staffmada.caisse.caisse', compact('categoriesCaisse'));
    }

    public function inserer(Request $request)
    {
        $request->validate([
            'id_categorie_caisse' => 'required|integer',
            'montant' => 'required|numeric|min:0',
            'date_entree' => 'required|date',
        ]);

        Caisse::insererCaisse([
            'id_categorie_caisse' => $request->id_categorie_caisse,
            'montant' => $request->montant,
            'date_entree' => $request->date_entree,
        ]);

        return redirect()->back()->with('success', 'Montant ajouté à la caisse avec succès.');
    }
}
