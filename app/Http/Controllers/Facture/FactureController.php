<?php

namespace App\Http\Controllers\Facture;

use App\Http\Controllers\Controller;
use App\Models\Activites\Activite;
use Illuminate\Http\Request;
use App\Models\Facture\Facture;
use App\Models\Facture\DetailFacture;
use App\Models\MembreAdherent;
use App\Models\Membres\MembresAdherents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class FactureController extends Controller
{
    public function create($id_activite)
    {
        $activite = Activite::findOrFail($id_activite); 
        $responsables = MembresAdherents::where('id_section', 1)->get(); 

        $numeroFacture = 'FACT' . str_pad(Facture::count() + 1, 5, '0', STR_PAD_LEFT);
        
        return view('staffmada.facture.facture', compact('activite', 'responsables', 'numeroFacture'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_activite' => 'required|integer',
            'responsable' => 'required|integer',
            'nom_client' => 'required|string|max:300',
            'date_facture' => 'required|date',
            'montant_total' => 'required|numeric',
            'designation.*' => 'required|string|max:255',
            'quantite.*' => 'required|integer',
            'prix_unitaire.*' => 'required|numeric',
        ]);

        $facture = Facture::create([
            'id_activite' => $validatedData['id_activite'],
            'responsable' => $validatedData['responsable'],
            'nom_client' => $validatedData['nom_client'],
            'date_facture' => $validatedData['date_facture'],
            'montant_total' => $validatedData['montant_total'],
            'numero' => 'FACT' . str_pad(Facture::count() + 1, 5, '0', STR_PAD_LEFT),
        ]);

        foreach ($validatedData['designation'] as $index => $designation) {
            DetailFacture::create([
                'id_facture' => $facture->id_facture,
                'designation' => $designation,
                'quantite' => $validatedData['quantite'][$index],
                'prix_unitaire' => $validatedData['prix_unitaire'][$index],
                'montant_total' => $validatedData['quantite'][$index] * $validatedData['prix_unitaire'][$index],
            ]);
        }

        return redirect()->route('facture.show', ['id' => $facture->id_facture])
        ->with('success', 'Facture créée avec succès');
    }

    public function show($id)
    {
        $facture = DB::table('facture as f')
                    ->join('membres_adherents as ma', 'f.responsable', '=', 'ma.id_membre_adherent')
                    ->leftJoin('detail_facture as df', 'f.id_facture', '=', 'df.id_facture')
                    ->select(
                        'f.id_facture', 'f.numero', 'f.nom_client', 'f.date_facture', 'f.montant_total as montant_total_facture',
                        'ma.nom as nom_responsable', 'ma.prenoms as prenoms_responsable', 
                        'df.designation', 'df.quantite', 'df.prix_unitaire', 'df.montant_total'
                    )
                    ->where('f.id_facture', $id)
                    ->get();

        if (!$facture->isEmpty()) {
            return view('staffmada.facture.formatFacture', compact('facture'));
        }

        return redirect()->route('facture.create')->with('error', 'Facture introuvable');
    }

    public function exportFacturePDF($factureId)
    {
        $facture = DB::table('vue_factures_details')
                    ->where('id_facture', $factureId)
                    ->get();
        
        $pdf = Pdf::loadView('staffmada.facture.pdf', compact('facture'));

        return $pdf->download('facture_' . $facture[0]->numero_facture . '.pdf');
    }

    public function pieceComptable()
    {
        $activitesAvecFactures = DB::table('vue_activites_avec_factures')->paginate(10);

        return view('staffmada.facture.pieceComptable', compact('activitesAvecFactures'));
    }

    public function facturesParActivite($id_activite)
    {
        $activite = DB::table('activites')->where('id_activite', $id_activite)->first();

        $factures = DB::table('facture as f')
                        ->join('membres_adherents as ma', 'f.responsable', '=', 'ma.id_membre_adherent')
                        ->leftJoin('detail_facture as df', 'f.id_facture', '=', 'df.id_facture')
                        ->select(
                            'f.id_facture', 'f.numero as numero_facture', 'f.nom_client', 'f.date_facture', 'f.montant_total as montant_facture',
                            'ma.nom as nom_responsable', 'ma.prenoms as prenoms_responsable'
                        )
                        ->where('f.id_activite', $id_activite)
                        ->groupBy('f.id_facture', 'ma.nom', 'ma.prenoms')
                        ->paginate(5);

        foreach ($factures as $facture) {
            $facture->details = DB::table('detail_facture')
                                    ->where('id_facture', $facture->id_facture)
                                    ->get();
        }

        return view('staffmada.facture.factureActivite', compact('activite', 'factures'));
    }


    

}
